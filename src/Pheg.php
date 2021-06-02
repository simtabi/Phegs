<?php

namespace Simtabi\Pheg;

use Simtabi\Pheg\Base\BasePhegTools;
use Simtabi\Pheg\Base\Support\Data;
use Simtabi\Pheg\Phegs\Countries\Countries;
use Simtabi\Pheg\Phegs\Copyright\Copyright;
use Simtabi\Pheg\Phegs\Factories\Base64UID;
use Simtabi\Pheg\Phegs\Generators\KeyGenerator;
use Simtabi\Pheg\Phegs\Helpers\Traits\Base64ToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\BooleanTools;
use Simtabi\Pheg\Phegs\Helpers\Traits\FormToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\GravatarToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\HTMLToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\JSONToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\MathToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\MomentDatetimeToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\MoneyToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\PasswordTools;
use Simtabi\Pheg\Phegs\Helpers\Traits\PhoneToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\SecurityToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\ServerToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\SlugToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\SQLToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\StringToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\ArrayToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\ColorToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\DateTimeToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\DirectoryToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\FileToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\HumanizeTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\URLToolsTrait;
use Simtabi\Pheg\Phegs\Ensue\Ensue;
use Simtabi\Pheg\Phegs\Navigation\Breadcrumbs;
use Respect\Validation\Validator as Respect;


class Pheg
{

    use
        ArrayToolsTrait,
        Base64ToolsTrait,
        BooleanTools,
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
        MomentDatetimeToolsTrait,
        MoneyToolsTrait,
        PasswordTools,
        PhoneToolsTrait,
        SecurityToolsTrait,
        ServerToolsTrait,
        SlugToolsTrait,
        SQLToolsTrait,
        StringToolsTrait,
        URLToolsTrait;

    public static Respect $respectValidation;

    /**
     * Create class instance
     *
     * @version      1.0
     * @since        1.0
     */
    private static $instance;

    public static function getInstance() {
        if (isset(self::$instance) && !is_null(self::$instance)) {
            return self::$instance;
        } else {
            self::$instance = new static();
            self::$respectValidation = new Respect();
            return self::$instance;
        }
    }

    private function __construct() {
    }
    private function __clone() {}

    public function copyright(): Copyright
    {
        return new Copyright();
    }

    public function validate(): Ensue
    {
        return new Ensue();
    }

    public function keygen(): KeyGenerator
    {
        return new KeyGenerator();
    }

    public function countries(): ?Countries
    {
        return (Countries::getInstance(BasePhegTools::getRootPath(4)));
    }

    public function data()
    {
        return Data::getInstance(self::$instance);
    }

    public function breadcrumb(?string $separator = null)
    {
        return new Breadcrumbs($separator);
    }

    public function base64Uid(): ?Base64UID
    {
        return Base64UID::getInstance();
    }

}
