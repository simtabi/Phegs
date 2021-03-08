<?php

namespace Simtabi\Pheg\Phegs\Helpers\Validation\Traits;

trait URLValidatorsTrait
{

    public function isUrl($value){
        if(Respect::url()->validate($value)){
            return true;
        }
        return false;
    }

}
