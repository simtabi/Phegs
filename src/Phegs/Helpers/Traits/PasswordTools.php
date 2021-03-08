<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use PHLAK\StrGen\Generator;
use PHLAK\StrGen\CharSet;

trait PasswordTools
{
    public function generatePassword($length = 10)
    {
        $generator = new Generator();
        return $generator->charset([CharSet::MIXED_ALPHA, CharSet::NUMERIC])->length($length)->generate();
    }
}