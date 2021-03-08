<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

trait PostalCodeValidatorsTrait
{

    public function isPostalCode($value, $locale = 'US'){
        if($this->respect->numeric()->postalCode($locale)->validate($value)){
            return true;
        }
        return false;
    }

}