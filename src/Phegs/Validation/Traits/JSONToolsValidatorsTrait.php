<?php


namespace Simtabi\Pheg\Phegs\Validation\Traits;


trait JSONToolsValidatorsTrait
{

    public static function isJSON($value, $alt = false){

        if(!$alt){
            return is_string($value) && is_object(json_decode($value)) ? true : false;
        }

        // checks for calculating if the string given to it is JSON.
        // So, it is the most perfect one, but it's slower than the other.
        # Requires PHP 5.4 and above
        $status = is_string($value)
        && is_object(json_decode($value))
        && (json_last_error() == JSON_ERROR_NONE) ? true : false;
        if (!$status){
            return false;
        }
        return true;
    }

}