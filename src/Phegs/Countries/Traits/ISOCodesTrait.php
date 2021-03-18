<?php

namespace Simtabi\Pheg\Phegs\Countries\Traits;

use Sokil\IsoCodes\IsoCodesFactory;
use Sokil\IsoCodes\TranslationDriver\DummyDriver;

trait ISOCodesTrait
{

    public function getIsoCodes(){
        $isoCodes = new IsoCodesFactory(
            null,
            new DummyDriver()
        );

        return $isoCodes;
    }

}