<?php

namespace Simtabi\Pheg\Phegs\Countries\Traits;
use DateTimeZone;

trait ContinentsTrait
{

    public function getAllContinents(){
        return $this->getData('continents');
    }

}