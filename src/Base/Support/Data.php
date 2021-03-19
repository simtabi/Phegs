<?php

namespace Simtabi\Pheg\Base\Support;

use Adbar\Dot;
use Simtabi\Pheg\Base\Loader;
use Simtabi\Pheg\Base\Support\Traits\DataHelpersTrait;
use Simtabi\Pheg\Base\Support\Traits\FormHelpersTrait;
use Simtabi\Pheg\Base\Support\Traits\SupportHelpersTrait;
use Simtabi\Pheg\Pheg;
use Simtabi\Pheg\Phegs\DataTools\TypeConverter;

class Data
{
    use
        FormHelpersTrait,
        SupportHelpersTrait,
        DataHelpersTrait;

    private Loader $loader;
    private        $data;
    private string $key;
    private        $default = null;
    private Pheg   $pheg;

    /**
     * Create class instance
     *
     * @version      1.0
     * @since        1.0
     */
    private static $instance;

    public static function getInstance(Pheg $pheg) {
        if (isset(self::$instance) && !is_null(self::$instance)) {
            return self::$instance;
        } else {
            self::$instance = new static();

            self::$instance->loader = new Loader();
            self::$instance->data   = new Dot(
                TypeConverter::fromAnyToArray(
                    self::$instance->loader
                        ->setFolderName('config')
                        ->setFileNames(['support_data'])
                        ->toObject()->support_data
                )
            );
            self::$instance->pheg = $pheg;


            return self::$instance;
        }
    }

    private function __construct() {}
    private function __clone() {}

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return self
     */
    public function setKey($key): self
    {
        $this->key = trim($key);
        return $this;
    }

    /**
     * @return string
     */
    public function getDefault(): string
    {
        return $this->default;
    }

    /**
     * @param string $default
     * @return self
     */
    public function setDefault(?string $default): self
    {
        $this->default = trim($default);
        return $this;
    }

    public function getData()
    {

        if ($this->data->has($this->key)) {
            return $this->data->get($this->key);
        }

        if (!empty($this->default) && (is_array($data) && count($data) > 0)) {
            return $this->pheg->getFromArray($this->default, $data);
        }

    }

}

