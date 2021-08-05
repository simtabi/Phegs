<?php

namespace Simtabi\Pheg\Base\Exceptions;

use Exception;

class PhegException extends Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
