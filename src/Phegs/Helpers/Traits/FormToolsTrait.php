<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use Simtabi\Pheg\Phegs\Ensue\Ensue;

trait FormToolsTrait
{

    public function ifIsSet($var, $getKey = false, $default = null){

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


    public function getCheckboxStatus($name){
        return isset($_REQUEST[$name]) ? ' checked="true" ' : '';
    }


    /**
     * Get checkbox value status
     *
     * @param $input
     * @return bool
     *
     */
    public function isCheckboxStatus($input){
        return !empty($input) || 1 === $input ? 1 : 0;
    }

}