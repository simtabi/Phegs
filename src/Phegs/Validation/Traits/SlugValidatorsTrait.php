<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

trait SlugValidatorsTrait
{

    public function isSlug($value){
        if($this->respect->slug()->validate($value)){
            return true;
        }
        return false;
    }

}
