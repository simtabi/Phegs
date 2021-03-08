<?php

namespace Simtabi\Pheg\Facets\Validation\Traits;

trait AgeValidatorsTrait
{

    public function isLegalAge($value, $limit = 18) {
        if($this->respect->age($limit)->validate($value)){
            return true;
        }
        return false;
    }

}