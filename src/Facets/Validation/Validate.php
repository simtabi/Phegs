<?php

namespace Simtabi\Pheg\Facets\Validation;

use Respect\Validation\Validator as Respect;
use Simtabi\Pheg\Facets\Validation\Traits\AgeValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\ArrayValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\ColorValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\CountryValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\CurrencyValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\DataTypeValidatorTrait;
use Simtabi\Pheg\Facets\Validation\Traits\DateTimeValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\DirectoryValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\EmailValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\FileValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\IPToolsValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\JSONToolsValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\LocaleValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\MathValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\PasswordValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\PhoneValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\PostalCodeValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\RespectValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\SlugValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\StringValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\URLValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\UsernameValidatorsTrait;
use Simtabi\Pheg\Facets\Validation\Traits\VersionNumberValidatorsTrait;

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
