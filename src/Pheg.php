<?php

namespace Simtabi\Pheg;

use Adbar\Dot;
use Simtabi\Pheg\Phegs\DataTools\TypeConverter;
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
use Jasny\DotKey\DotKey;
use Pharaonic\DotArray\DotArray;


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

    private Loader $dataLoader;
    private $supportData;

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
            self::$instance->dataLoader  = new Loader();
            self::$instance->supportData = new Dot(TypeConverter::fromAnyToArray(self::$instance->dataLoader
                ->setFolderName('config')
                ->setFileNames(['support_data'])
                ->toObject()->support_data));
            return self::$instance;
        }
    }

    private function __construct() {}
    private function __clone() {}

    public static function getSupportData($request = null, $subRequest = null)
    {
        $request    = trim($request);
        $subRequest = trim($subRequest);
        $subRequest = empty($subRequest) ? $request : $request .'.'. $subRequest;
        $subject    = self::getInstance()->supportData;

        if ($subject->has($request)) {
            if ($subject->has($subRequest)) {
                return $subject->get($subRequest);
            }
            return $subject->get($request);
        }
        return $subject->all();
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
