<?php

namespace Simtabi\Pheg\Phegs\Ensue\Traits;

trait MathValidatorsTrait
{

    public function isOddNumber(int $number){
        return ($number % 2 == 0) ? true : false;
    }

}