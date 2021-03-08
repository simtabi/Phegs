<?php

namespace Simtabi\Pheg\Phegs\Ensue\Traits;

trait RespectValidatorsTrait
{

    public function minLength($value = null, $minimum = 0)
    {
        if(Respect::stringType()->length($minimum, null)->validate($value)){
            return true;
        }
        return false;
    }

    public function maxLength($value = null, $maximum = 5)
    {
        if(Respect::stringType()->length(null, $maximum)->validate($value)){
            return true;
        }
        return false;
    }

    public function exactLength($value = null, $compareTo = 0)
    {
        if(Respect::equals($compareTo)->validate($value)){
            return true;
        }
        return false;
    }

    public function greaterThan($value = null, $min = 0, $inclusive = true)
    {
        if (true === $inclusive){
            if(Respect::intVal()->max($min, true)->validate($value)){
                return true;
            }
        }else{
            if(Respect::intVal()->max($min)->validate($value)){
                return true;
            }
        }
        return false;
    }

    public function lessThan($value = null, $max = 0, $inclusive = true)
    {
        if (true === $inclusive){
            if(Respect::intVal()->min($max, true)->validate($value)){
                return true;
            }
        }else{
            if(Respect::intVal()->min($max)->validate($value)){
                return true;
            }
        }

        return false;
    }

    public function alpha($value = null)
    {
        if(Respect::alpha()->validate($value)){
            return true;
        }
        return false;
    }

    public function alphanumeric($value = null)
    {
        if(Respect::alnum()->validate($value)){
            return true;
        }
        return false;
    }

    public function startsWith($value = null, $match = null)
    {
        if(Respect::startsWith($value)->validate($match)){
            return true;
        }
        return false;
    }

    public function endsWith($value = null, $match = null)
    {
        if(Respect::endsWith($value)->validate($match)){
            return true;
        }
        return false;
    }

    public function contains($value = null, $match = null)
    {
        if(Respect::contains($value)->validate($match)){
            return true;
        }
        return false;
    }

    public function regex($value = null, $regex = null)
    {
        if($this->respect->regex($regex)->validate($value)){
            return true;
        }
        return false;
    }


    public function isGreaterThan($value, $length = 5) {
        if(Respect::stringType()->length(null, $length)->validate($value)){
            return true;
        }
        return false;
    }

    public function isLessThan($value, $length = 5) {
        if(Respect::stringType()->length($length, null)->validate($value)){
            return true;
        }
        return false;
    }

    public function isIdentical($val1, $val2) {
        if(Respect::equals($val1)->validate($val2)){
            return true;
        }
        return false;
    }

    public function isInRange($value, $minimum, $maximum) {
        if(Respect::stringType()->length($minimum, $maximum)->validate($value)){
            return true;
        }
        return false;
    }

}