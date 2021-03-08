<?php

namespace Simtabi\Pheg\Facets\Validation\Traits;

trait URLValidatorsTrait
{

    public function isUrl($value){
        if(Respect::url()->validate($value)){
            return true;
        }
        return false;
    }

}
