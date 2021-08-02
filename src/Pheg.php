<?php

namespace Simtabi\Pheg;

use Simtabi\Pheg\Base\BasePhegTools;
use Simtabi\Pheg\Base\Support\Data;
use Simtabi\Pheg\Phegs\Countries\Countries;
use Simtabi\Pheg\Phegs\Copyright\Copyright;
use Simtabi\Pheg\Phegs\Factories\Base64UID;
use Simtabi\Pheg\Phegs\Generators\KeyGenerator;
use Simtabi\Pheg\Phegs\Helpers\Components\HtmlTools\Html2Text;
use Simtabi\Pheg\Phegs\Helpers\Components\HtmlTools\HTMLCleaner;
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
use Simtabi\Pheg\Phegs\Security\Base64Handler;


class Pheg
{

    use ArrayToolsTrait;
    use Base64ToolsTrait;
    use BooleanTools;
    use ColorToolsTrait;
    use DateTimeToolsTrait;
    use DirectoryToolsTrait;
    use FileToolsTrait;
    use FormToolsTrait;
    use GravatarToolsTrait;
    use HTMLToolsTrait;
    use HumanizeTrait;
    use JSONToolsTrait;
    use MathToolsTrait;
    use MomentDatetimeToolsTrait;
    use MoneyToolsTrait;
    use PasswordTools;
    use PhoneToolsTrait;
    use SecurityToolsTrait;
    use ServerToolsTrait;
    use SlugToolsTrait;
    use SQLToolsTrait;
    use StringToolsTrait;
    use URLToolsTrait;

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

    private function __construct()
    {

    }
    private function __clone() {}

    final public function copyright(): Copyright
    {
        return new Copyright();
    }

    final public function validate(): Ensue
    {
        return new Ensue();
    }

    final public function keygen(): KeyGenerator
    {
        return new KeyGenerator();
    }

    final public function countries(): ?Countries
    {
        return (Countries::getInstance(BasePhegTools::getRootPath(4)));
    }

    final public function data()
    {
        return Data::getInstance(self::$instance);
    }

    final public function breadcrumb(?string $separator = null)
    {
        return new Breadcrumbs($separator);
    }

    public function base64Uid(): ?Base64UID
    {
        return Base64UID::getInstance();
    }

    final public function base64Handler(): Base64Handler
    {
        return new Base64Handler();
    }

    final public function html2text(): Html2Text
    {
        return new Html2Text();
    }

    final public function html5Cleaner(): HTMLCleaner
    {
        return new HTMLCleaner();
    }

}