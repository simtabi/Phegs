<?php

namespace Simtabi\Pheg\Phegs\Ensue\Traits;

trait MathValidatorsTrait
{

    public static function isOddNumber(int $number){
        return ($number % 2 == 0) ? true : false;
    }

    public static function roundOffToNearest ( $value, $precision = 2 ): float|int
    {
        $pow = pow ( 10, $precision );
        return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow;
    }

}