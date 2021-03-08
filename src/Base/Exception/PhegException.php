<?php

namespace Simtabi\Pheg\Base\Exception;

use Exception;

class PhegException extends Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
