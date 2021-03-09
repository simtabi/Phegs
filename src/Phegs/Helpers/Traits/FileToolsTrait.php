<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use VincoWeb\FileInfo\FileInfo as F;

trait FileToolsTrait
{

    public static function getRemoteFileInfo($link){
        $finfo = new F();
        return $finfo->get($link);
    }

}
