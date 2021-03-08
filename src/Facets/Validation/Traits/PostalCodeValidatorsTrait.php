<?php

namespace Simtabi\Pheg\Facets\Validation\Traits;

trait PostalCodeValidatorsTrait
{

    public function isPostalCode($value, $locale = 'US'){
        if($this->respect->numeric()->postalCode($locale)->validate($value)){
            return true;
        }
        return false;
    }

}