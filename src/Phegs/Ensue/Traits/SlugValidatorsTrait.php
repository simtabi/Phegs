<?php

namespace Simtabi\Pheg\Phegs\Ensue\Traits;

trait SlugValidatorsTrait
{

    public function isSlug($value){
        if($this->respect->slug()->validate($value)){
            return true;
        }
        return false;
    }

}
