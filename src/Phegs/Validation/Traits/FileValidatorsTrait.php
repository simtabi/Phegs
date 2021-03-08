<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

use VincoWeb\FileInfo\FileInfo as F;

trait FileValidatorsTrait
{

    public function isFileExists($value) {
        if (file_exists($value) && is_readable($value)){
            return true;
        }
        return false;
    }


    public function isRemoteFile($link){
        $finfo = new F();
        return !$finfo->get($link) ? false : true;
    }

    public function isRemoteFileImage($link){
        $finfo = new F();
        return !$finfo->isImage($link) ? false : true;
    }

}
