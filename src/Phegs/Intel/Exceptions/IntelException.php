<?php

namespace Simtabi\Pheg\Phegs\Helpers\Intel\Exceptions;

use Exception;

class IntelException extends Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
