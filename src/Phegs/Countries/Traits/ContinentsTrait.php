<?php

namespace Simtabi\Pheg\Phegs\Countries\Traits;

trait ContinentsTrait
{

    public function getAllContinents(){
        return $this->getData('continents');
    }

}