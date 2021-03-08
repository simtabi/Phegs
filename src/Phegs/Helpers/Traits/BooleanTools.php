<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

trait BooleanTools
{

    public static function returnIf($condition, $value)
    {
        if ($condition) {
            return $value;
        }
        return null;
    }

}