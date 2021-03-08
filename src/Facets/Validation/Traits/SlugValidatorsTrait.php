<?php

namespace Simtabi\Pheg\Facets\Validation\Traits;

trait SlugValidatorsTrait
{

    public function isSlug($value){
        if($this->respect->slug()->validate($value)){
            return true;
        }
        return false;
    }

}
