<?php

namespace Simtabi\Pheg\Facets\Validation\Traits;

trait LocaleValidatorsTrait
{

    public function isLanguage($value){
        if($this->respect->languageCode()->validate($value)){
            return true;
        }else if($this->respect->languageCode('alpha-3')->validate($value)){
            return true;
        }
        return false;
    }

}
