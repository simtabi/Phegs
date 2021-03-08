<?php

namespace Simtabi\Pheg\Phegs\Helpers\Validation;

use Respect\Validation\Validator as Respect;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\AgeValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\ArrayValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\ColorValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\CountryValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\CurrencyValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\DataTypeValidatorTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\DateTimeValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\DirectoryValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\EmailValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\FileValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\IPToolsValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\JSONToolsValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\LocaleValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\MathValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\PasswordValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\PhoneValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\PostalCodeValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\RespectValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\SlugValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\StringValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\URLValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\UsernameValidatorsTrait;
use Simtabi\Pheg\Phegs\Helpers\Validation\Traits\VersionNumberValidatorsTrait;

class Validate
{

    use
        AgeValidatorsTrait,
        ArrayValidatorsTrait,
        ColorValidatorsTrait,
        CountryValidatorsTrait,
        CurrencyValidatorsTrait,
        DataTypeValidatorTrait,
        DateTimeValidatorsTrait,
        DirectoryValidatorsTrait,
        EmailValidatorsTrait,
        FileValidatorsTrait,
        IPToolsValidatorsTrait,
        JSONToolsValidatorsTrait,
        LocaleValidatorsTrait,
        MathValidatorsTrait,
        PasswordValidatorsTrait,
        PhoneValidatorsTrait,
        PostalCodeValidatorsTrait,
        RespectValidatorsTrait,
        SlugValidatorsTrait,
        StringValidatorsTrait,
        URLValidatorsTrait,
        UsernameValidatorsTrait,
        VersionNumberValidatorsTrait;

    /** @var Respect */
    private $respect;

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

    private function __construct() {
        $this->respect = new Respect();
    }

    private function __clone() {}

    public function respect(): Respect
    {
        return $this->respect;
    }
}
