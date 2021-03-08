<?php

namespace Simtabi\Pheg\Phegs\Ensue;

use Simtabi\Pheg\Phegs\Ensue\Traits\AgeValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\ArrayValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\ColorValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\CountryValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\CurrencyValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\DataTypeValidatorTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\DateTimeValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\DirectoryValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\EmailValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\FileValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\IPToolsValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\JSONToolsValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\LocaleValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\MathValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\PasswordValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\PhoneValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\PostalCodeValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\RespectValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\SlugValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\StringValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\URLValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\UsernameValidatorsTrait;
use Simtabi\Pheg\Phegs\Ensue\Traits\VersionNumberValidatorsTrait;
use Respect\Validation\Validator as Respect;

class Ensue
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

    public function __construct() {
        $this->respect = new Respect();
    }

    public function respect(): Respect
    {
        return $this->respect;
    }
}
