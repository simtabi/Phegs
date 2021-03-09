<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

trait DirectoryToolsTrait
{

    /**
     * Replace date variable in dir path.
     *
     * @param string $dir
     *
     * @return string
     */
   public static function formatDirectory(string $dir)
    {
        $replacements = [
            '{Y}' => date('Y'),
            '{m}' => date('m'),
            '{d}' => date('d'),
            '{H}' => date('H'),
            '{i}' => date('i'),
            '{s}' => date('s'),
        ];

        return str_replace(array_keys($replacements), $replacements, $dir);
    }

}