<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

trait CountryValidatorsTrait
{

    public function isCountry($value){
        // if we can validate it and Respect can't either
        $code  = Countries::getCountryName($value);
        $respect = $this->respect->countryCode()->validate($value);
        if((false === $code) && (false === $respect)){
            return false;
        }
        return true;
    }

}