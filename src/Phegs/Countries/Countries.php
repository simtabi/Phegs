<?php

namespace Simtabi\Pheg\Phegs\Countries;

class Countries
{

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

    private function __construct() {}
    private function __clone() {}

    /**
     * @return Continent
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      02-01-2019
     * @link      http://simtabi.com
     * @since     2019-01-02
     * @version   1.0
     */
    public static function Continents(){
        return self::Continents();
    }

    /**
     * @return Country
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      02-01-2019
     * @link      http://simtabi.com
     * @since     2019-01-02
     * @version   1.0
     */
    public static function Country(){
      //  return new Country();
    }

    /**
     * @return Currency
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      02-01-2019
     * @link      http://simtabi.com
     * @since     2019-01-02
     * @version   1.0
     */
    public static function Currency(){
      //  return new Currency();
    }
}

