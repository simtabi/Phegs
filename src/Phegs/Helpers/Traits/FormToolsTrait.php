<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use Simtabi\Pheg\Phegs\Validation\Ensue;

trait FormToolsTrait
{

    public static function ifIsSet($var, $getKey = false, $default = null){

        // some logic
        if (!isset($_REQUEST[$var])){
            $request = null;
        }else{
            if (Ensue::isEmpty($var)){
                $request = null;
            }else{
                $request = $_REQUEST[$var];
            }
        }

        // if return key
        if(true === $getKey)
        {
            return !Ensue::isEmpty($var) ? $var : null;
        }

        // return default value if empty request
        return !Ensue::isEmpty($request) ? $request : $default;
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