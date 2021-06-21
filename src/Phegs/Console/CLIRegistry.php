<?php

namespace Simtabi\Pheg\Phegs\Console;

use RunTimeException;

/**
 * CLIRegistry is a registry class that stores metrics for the progress bar
 */
class CLIRegistry
{

    /**
     * Registry
     */
    public $registry = [];

    /**
     * Sets the value for a key
     *
     * @param string $key
     * @param mixed  $value
     */
    public function setValue($key, $value)
    {
        $this->registry[$key] = $value;
    }

    /**
     * Returns the value associated to a key
     *
     * @param string $key
     * @return mixed
     * @throws RunTimeException
     */
    public function getValue($key)
    {
        if (!isset($this->registry[$key])){
            throw new RunTimeException('Invalid offset requested');
        }

        return $this->registry[$key];
    }

}
