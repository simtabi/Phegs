<?php

namespace Simtabi\Pheg\Base\Support\Traits;

trait SupportHelpersTrait
{

    public function quickAccess($key, $data)
    {
        if (empty($key)) {
            return null;
        }
        return $this->pheg->getFromArray($key, $data);
    }

}
