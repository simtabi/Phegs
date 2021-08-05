<?php

namespace Simtabi\Pheg\Base\Exceptions;

use InvalidArgumentException;

class InvalidUuidVersionException extends InvalidArgumentException
{
    protected $message = 'Invalid value! Expected 1,3,4 or 5 integer values.';
}