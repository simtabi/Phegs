<?php

namespace Simtabi\Pheg\Phegs\Helpers\Helpers\Components\Debug;

use Adbar\Dot;

class Errors
{

    /**
     * Error array access name
     * @var string
     */
    private $name = 'general';

    /**
     * Array Handler
     * @var Dot
     */
    private $handler;

    /**
     * Temporary Storage
     * @var array
     */
    private $errors = [];

    /**
     * Create class instance
     *
     * @version      1.0
     * @since        1.0
     */
    private static $instance;
    public static function getInstance() {
        if (isset(self::$instance)) {
            return self::$instance;
        } else {
            self::$instance = new static();
            return self::$instance;
        }
    }

    private function __construct() {
        $this->handler = new Dot();
    }
    private function __clone() {}


    /**
     * @param $errors
     * @return Errors
     * @throws Exception
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      16-02-2019 —— 10:21
     * @link      http://simtabi.com
     * @since     2019-02-16
     * @version   1.0
     */
    public function setErrors($errors)
    {
        if (empty($this->name)){
            throw new SnippetsException('Error Name/Path can not be empty');
        }

        if (!is_array($this->errors)){
            $this->errors = (array) $this->errors;
        }
        $this->handler->setArray($this->errors);
        $this->handler->push($this->name, $errors);

        return $this;
    }

    /**
     * @param null $key
     * @return array|mixed
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      16-02-2019 —— 10:26
     * @link      http://simtabi.com
     * @since     2019-02-16
     * @version   1.0
     */
    public function getErrors($key = null)
    {
        return !empty($key) ? $this->handler->get($key) : $this->handler->all();
    }


    /**
     * @param string $name
     * @return Errors
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}
