<?php

namespace Simtabi\Pheg\Facets\Helpers\Traits;

use PHLAK\StrGen\Generator;
use PHLAK\StrGen\CharSet;

class PasswordTools
{
    public function generatePassword($length = 10)
    {
        $generator = new Generator();
        return $generator->charset([CharSet::MIXED_ALPHA, CharSet::NUMERIC])->length($length)->generate();
    }
}