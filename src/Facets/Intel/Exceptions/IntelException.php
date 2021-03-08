<?php

namespace Simtabi\Pheg\Facets\Intel\Exceptions;

use Exception;

class IntelException extends Exception
{

    public function __construct($message)
    {
        parent::__construct($message);
    }

}
