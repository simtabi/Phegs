<?php

namespace Simtabi\Pheg\Base;

use Respect\Validation\Validator as Respect;

class BaseTools
{

    public const
        TIMEZONE_AFRICA     = 'africa',
        TIMEZONE_AMERICA    = 'america',
        TIMEZONE_ANTARCTICA = 'antarctica',
        TIMEZONE_ASIA       = 'asia',
        TIMEZONE_ATLANTIC   = 'atlantic',
        TIMEZONE_AUSTRALIA  = 'australia',
        TIMEZONE_EUROPE     = 'europe',
        TIMEZONE_INDIAN     = 'indian',
        TIMEZONE_PACIFIC    = 'pacific',
        TIMEZONE_UTC        = 'utc';


    /**
     * Default region for telephone utilities
     */
    public const DEFAULT_REGION = 'KE';

    /**
     * Default language
     */
    public const DEFAULT_LOCALE = 'en';

    public const PHEG_DIR_PATH = __DIR__.'/../../';


    /**
     * @var string
     */
    protected static $defaultRegion = 'KE';

    /**
     * @param string $defaultRegion
     * @return string
     */
    public static function setDefaultRegion(string $defaultRegion): string
    {
        self::$defaultRegion = $defaultRegion;
        return  self::$defaultRegion;
    }

    /**
     * @return string
     */
    public static function getDefaultRegion(): string
    {
        return self::$defaultRegion;
    }

    public static function respect(){
        return new Respect();
    }


    public static function getRootPath(int $levels = 2){
        return dirname( __DIR__ , $levels);
    }

    public static function _e($val){
        return $val;
    }
}
