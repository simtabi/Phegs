<?php

namespace Simtabi\Pheg\Phegs\Ensue\Traits;

trait ColorValidatorsTrait
{

    public function isHexColor($value){
        if (!preg_match("/^(#)?([0-9a-fA-F]{1,2}){6}$/i", trim($value))){
            return true;
        }
        return false;
    }

}
