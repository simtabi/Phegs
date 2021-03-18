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
     * SupportDataHelper constructor.
     */
    public function __construct(Pheg $pheg)
    {
        $this->loader = new Loader();
        $this->data   = new Dot(
            TypeConverter::fromAnyToArray(
                $this->loader
                    ->setFolderName('config')
                    ->setFileNames(['support_data'])
                    ->toObject()->support_data
            )
        );
        $this->pheg = $pheg;
    }

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

