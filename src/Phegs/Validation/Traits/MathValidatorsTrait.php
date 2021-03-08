<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

trait MathValidatorsTrait
{

    public function isOddNumber($number){
        if ($number == 0){
            return false;
        }
        if ($number % 2 == 0) {
            false;
        }
        return true;
    }

}