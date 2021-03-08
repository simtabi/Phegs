<?php

namespace Simtabi\Pheg\Phegs\Helpers\Validation\Traits;

trait IPToolsValidatorsTrait
{

    public function isIP($value) {
        return $this->respect->ip()->validate($value);
    }

    public function isLocalhost($address) {
        $address = empty($address) ? $_SERVER['REMOTE_ADDR'] : $address;
        return in_array($address, [
            '127.0.0.1',
            '::1',
        ]) ? true : false;
    }

    public function isIISServer($value) {
        $sSoftware = strtolower( (!empty($value) ? $value : $_SERVER['SERVER_SOFTWARE']) );
        if ( strpos($sSoftware, "microsoft-iis") !== FALSE ) {
            return true;
        }
        return false;
    }

}