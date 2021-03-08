<?php

namespace Simtabi\Pheg\Facets\Helpers\Traits;

use VincoWeb\FileInfo\FileInfo as F;

trait FileToolsTrait
{

    public function getRemoteFileInfo($link){
        $finfo = new F();
        return $finfo->get($link);
    }

}
