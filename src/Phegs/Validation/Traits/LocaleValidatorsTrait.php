<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

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
