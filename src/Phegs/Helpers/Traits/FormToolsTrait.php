<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use Simtabi\Pheg\Phegs\Validation\Validate;

trait FormToolsTrait
{

    public static function ifIsSet($var, $getKey = false, $default = null){

        // some logic
        if (!isset($_REQUEST[$var])){
            $request = null;
        }else{
            if (Validate::isEmpty($var)){
                $request = null;
            }else{
                $request = $_REQUEST[$var];
            }
        }

        // if return key
        if(true === $getKey)
        {
            return !Validate::isEmpty($var) ? $var : null;
        }

        // return default value if empty request
        return !Validate::isEmpty($request) ? $request : $default;
    }


    public static function getCheckboxStatus($name){
        return isset($_REQUEST[$name]) ? ' checked="true" ' : '';
    }


    /**
     * Get checkbox value status
     *
     * @param $input
     * @return bool
     *
     */
    public static function checkboxStatus($input){
        return !empty($input) || 1 === $input ? true : false;
    }

}