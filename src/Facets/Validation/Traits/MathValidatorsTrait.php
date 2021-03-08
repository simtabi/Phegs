<?php

namespace Simtabi\Pheg\Facets\Validation\Traits;

trait MathValidatorsTrait
{

    public static function isOddNumber($number){
        if ($number == 0){
            return false;
        }
        if ($number % 2 == 0) {
            false;
        }
        return true;
    }

}