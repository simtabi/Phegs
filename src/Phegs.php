<?php

namespace Simtabi\Pheg;

use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\Base64ToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\FormToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\GravatarToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\HTMLToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\JSONToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\MathToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\MoneyToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\PhoneToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\SecurityToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\ServerToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\SlugToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\SQLToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Chips\Traits\StringToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Factories\URLToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Helpers\Traits\ArrayToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Helpers\Traits\ColorToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Helpers\Traits\DateTimeToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Helpers\Traits\DirectoryToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Helpers\Traits\FileToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Helpers\Traits\HumanizeTrait;

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
