<?php

namespace Simtabi\Pheg\Phegs\Helpers\Intel\Traits;

trait IntelTrait
{

    /**
     * @return Device
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      04-01-2019 —— 19:20
     * @link      http://simtabi.com
     * @since     2019-01-04
     * @version   1.0
     */
    public function device($userAgent = null, array $headers = []){
        return new Device($userAgent, $headers);
    }

    public function bot($userAgent = null, array $headers = []){
        return new Bot($userAgent, $headers);
    }

}
