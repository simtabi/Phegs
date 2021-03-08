<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

trait DirectoryValidatorsTrait
{

    public function isEmptyDir($value) {
        if (!is_readable($value))
            return null;
        $handle = opendir($value);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                return false;
            }
        }
        return true;
    }

}