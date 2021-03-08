<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use Cocur\Slugify\Slugify;

trait SlugToolsTrait
{

   public static function slugify(string $string, $sep = '_', array $args = []): string
    {
        return (new Slugify($args))->slugify($string, $sep);
    }

}