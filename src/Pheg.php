<?php

namespace Simtabi\Pheg;

use Simtabi\Pheg\Base\Loader;
use Simtabi\Pheg\Phegs\Copyright\Copyright;
use Simtabi\Pheg\Phegs\Generators\KeyGenerator;
use Simtabi\Pheg\Phegs\Helpers\Traits\Base64ToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\BooleanTools;
use Simtabi\Pheg\Phegs\Helpers\Traits\FormToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\GravatarToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\HTMLToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\JSONToolsTrait;
use Simtabi\Pheg\Phegs\Helpers\Traits\MathToolsTrait;
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
use Simtabi\Pheg\Phegs\Helpers\Traits\UIDTools;
use Simtabi\Pheg\Phegs\Helpers\Traits\URLToolsTrait;
use Simtabi\Pheg\Phegs\Ensue\Ensue;

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
        MoneyToolsTrait,
        PasswordTools,
        PhoneToolsTrait,
        SecurityToolsTrait,
        ServerToolsTrait,
        SlugToolsTrait,
        SQLToolsTrait,
        StringToolsTrait,
        UIDTools,
        URLToolsTrait;

    private static Loader $dataLoader;

    public function __construct() {
        self::$dataLoader = new Loader();
    }

    public static function getSupportData($request = null)
    {
        $data = self::$dataLoader->setFolderName('config')->setFileNames(['support_data'])->toObject();
        if (!empty($request) && isset($data->support_data->$request)) {
            return $data->support_data->$request;
        }else{
            return isset($data->support_data) ? $data->support_data : null;
        }
    }

    public static function copyright(): Copyright
    {
        return new Copyright();
    }

    public static function validate(): Ensue
    {
        return new Ensue();
    }

    public static function keygen(): KeyGenerator
    {
        return new KeyGenerator();
    }

}
