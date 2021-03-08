<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

trait ArrayValidatorsTrait
{

    /**
     * Checks if an array is associative or not
     * @param array $array
     * @return boolean Returns true in a given array is associative and false if it's not
     */
    function isAssociativeArrayAlt(array $array): bool
    {
        if (empty($array) || !is_array($array)) {
            return false;
        }

        foreach (array_keys($array) as $key) {
            if (!is_int($key)) {
                return true;
            }
        }
        return false;
    }

    public function isAssociativeArray( $array = array() ) {
        if (array_keys( $array ) !== range( 0, count( $array ) - 1 )){
            return true;
        }
        return false;
    }

    public function isArray($value) {
        if($this->respect->arrayType()->validate($value)){
            return true;
        }
        return false;
    }

    public function isObject($value) {
        if($this->respect->arrayType()->validate($value)){
            return true;
        }
        return false;
    }

    public function isArrayOrObject($value) {

        if($this->respect->arrayVal()->validate($value)){
            return true;
        }
        elseif($this->respect->arrayType()->validate($value)){
            return true;
        }
        return false;
    }

    public function isUsableArrayObject($value, $filter = true){
        if (!self::isArrayOrObject($value)){
            return false;
        }

        // remove empty values
        $value = true === $filter ? Helpers::filterArray($value) : $value;

        // if array is not empty
        if ($this->respect->arrayVal()->notEmpty()->validate($value)){
            return true;
        }
        return false;
    }

    public function inArray($value = null, $list = [])
    {
        if (in_array($value, $list)){
            return true;
        }
        return false;
    }

    public function isFoundInArray($needle, $haystack){
        $found = false;
        foreach ($haystack as $key => $item) {
            if ($needle === $key) {
                $found = true;
                break;
            } elseif (is_array($item)) {
                $found = $this->isFoundInArray($needle, $item);
                if($found) {
                    break;
                }
            }
        }
        return $found;
    }

    /**
     * @param $obj
     * @return bool|object
     */
    public function objIsEmpty($obj): bool
    {
        if (! ((array)$obj)) {
            return true;
        }
        return false;
    }

}
