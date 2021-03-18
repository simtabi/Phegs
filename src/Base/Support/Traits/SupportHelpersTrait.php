<?php

namespace Simtabi\Pheg\Base\Support\Traits;

trait SupportHelpersTrait
{

    public function quickAccess($key, $data)
    {
        return $this->pheg->getFromArray($key, $data);
    }

}
