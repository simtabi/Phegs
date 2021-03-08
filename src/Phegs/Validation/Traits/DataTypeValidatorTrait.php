<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

trait DataTypeValidatorTrait
{

    public function isInteger($value) {
        if($this->respect->intVal()->validate($value)){
            return true;
        }
        return false;
    }

    public function isNumeric($value) {
        if($this->respect->numeric()->validate($value)){
            return true;
        }
        return false;
    }

    public function isBool($value){
        return $this->isBoolean($value);
    }

    public function isBoolean($value){
        if($this->respect->boolVal()->validate($value)){
            return true;
        }elseif($this->respect->boolType()->validate($value)){
            return true;
        }
        return false;
    }

    public function isTrue($value){
        if($this->respect->trueVal()->validate($value) == true){
            return true;
        }
        return false;
    }

    public function isFloat($value){
        if (is_float($value)){
            return true;
        }
        return false;
    }

    public function isFalse($value){
        if($this->respect->trueVal()->validate($value) == false){
            return true;
        }
        return false;
    }

    public function isString($value) {

        // ensure it's of a string type value and !empty
        if( $this->respect->StringType()->validate($value) && !(empty($value) && strlen($value) == 0  || is_null($value))){
            return true;
        }
        return false;
    }

    public function isEmpty($value) {

        // if is an array or an object
        if ($this->isArrayOrObject($value)){
            if ($this->isUsableArrayObject($value)){
                return true;
            }
        }
        else{
            if ( empty($value) && strlen($value) == 0 ) {
                return true;
            }
        }
        return false;
    }

}
