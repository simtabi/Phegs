<?php

namespace Simtabi\Pheg\Facets\Helpers\Traits;

use GpsLab\Component\Base64UID\Generator\RandomCharGenerator;
use GpsLab\Component\Base64UID\Base64UID;

trait UIDTools
{

    /**
     * @param int $length
     * @param string $charset
     * @return mixed
     */
    function base64Uid($length = 12, $charset = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
        return (new RandomCharGenerator($length, $charset))->generate();
    }

}