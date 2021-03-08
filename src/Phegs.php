<?php

namespace Simtabi\Pheg;

use Simtabi\Pheg\Facets\Chips\Traits\Base64ToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\FormToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\GravatarToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\HTMLToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\JSONToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\MathToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\MoneyToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\PhoneToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\SecurityToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\ServerToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\SlugToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\SQLToolsTrait;
use Simtabi\Pheg\Facets\Chips\Traits\StringToolsTrait;
use Simtabi\Pheg\Facets\Factories\URLToolsTrait;
use Simtabi\Pheg\Facets\Helpers\Traits\ArrayToolsTrait;
use Simtabi\Pheg\Facets\Helpers\Traits\ColorToolsTrait;
use Simtabi\Pheg\Facets\Helpers\Traits\DateTimeToolsTrait;
use Simtabi\Pheg\Facets\Helpers\Traits\DirectoryToolsTrait;
use Simtabi\Pheg\Facets\Helpers\Traits\FileToolsTrait;
use Simtabi\Pheg\Facets\Helpers\Traits\HumanizeTrait;

class Phegs
{

    use
        ArrayToolsTrait,
        Base64ToolsTrait,
        ColorToolsTrait,
        DateTimeToolsTrait,
        DirectoryToolsTrait,
        FileToolsTrait,
        FormToolsTrait,
        GravatarToolsTrait,
        HTMLToolsTrait,
        HumanizeTrait,
        JSONToolsTrait,
        MathToolsTrait,
        MoneyToolsTrait,
        PhoneToolsTrait,
        SecurityToolsTrait,
        ServerToolsTrait,
        SlugToolsTrait,
        SQLToolsTrait,
        StringToolsTrait,
        URLToolsTrait
    ;

    /**
     * Create class instance
     *
     * @version      1.0
     * @since        1.0
     */
    private static $instance;
    public static function getInstance() {
        if (isset(self::$instance)) {
            return self::$instance;
        } else {
            self::$instance = new static();
            return self::$instance;
        }
    }

    private function __construct() {}
    private function __clone() {}

}
