<?php

namespace Simtabi\Pheg\Facets\Intel\Components;

use VincoWeb\FileInfo\FileInfo as F;

class FileInfo
{

    public function getFile(){
        return new FileInfo();
    }

    public function isRemoteFile($link){
        return !$this->getFile()->get($link) ? false : true;
    }

    public function isRemoteImage($link){
        return !$this->getFile()->isImage($link) ? false : true;
    }

    public function isRemoteFileImage($link){
        $finfo = new F();
        return !$finfo->isImage($link) ? false : true;
    }

    public function remoteFileInfo($link){
        $finfo = new F();
        return $finfo->get($link);
    }

    public function getRemoteFileInfo($link){
        return $this->getFile()->get($link);
    }
}






