<?php

namespace Simtabi\Pheg\Facets\Validation\Traits;

trait ColorValidatorsTrait
{

    public function isHexColor($value){
        if (!preg_match("/^(#)?([0-9a-fA-F]{1,2}){6}$/i", trim($value))){
            return true;
        }
        return false;
    }

}
