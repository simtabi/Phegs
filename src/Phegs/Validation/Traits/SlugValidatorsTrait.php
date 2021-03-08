<?php

namespace Simtabi\Pheg\Phegs\Helpers\Validation\Traits;

trait SlugValidatorsTrait
{

    public function isSlug($value){
        if($this->respect->slug()->validate($value)){
            return true;
        }
        return false;
    }

}
