<?php

namespace Simtabi\Pheg\Phegs\Helpers\Validation\Traits;

trait CurrencyValidatorsTrait
{

    public function isCurrency($value){

        // if we can validate it in both alpha2 & alpha3 and Respect can't either
        if((!Countries::getCountryCurrencyCodeByCode($value)) && (!$this->respect->currencyCode()->validate($value))){
            return false;
        }
        return true;
    }

}
