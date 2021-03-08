<?php

namespace Simtabi\Pheg\Phegs\Validation\Traits;

use libphonenumber\geocoding\PhoneNumberOfflineGeocoder;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberToCarrierMapper;
use libphonenumber\PhoneNumberToTimeZonesMapper;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\ShortNumberInfo;
use Simtabi\Pheg\Phegs\Helpers\Base\Services\BaseFactoryTools;
use Simtabi\Pheg\Phegs\Helpers\Base\Services\Translator;

trait PhoneValidatorsTrait
{

    public static function isValidCallingCode($value){
        return !Countries::getCountryNameByCallingCode($value) ? false : true;
    }

    public static function isValidPhoneNumber($value, $defaultRegion = BaseFactoryTools::DEFAULT_REGION){

        // output variables
        $status = false;
        $errors = null;

        try {

            // strip and remove white spaces from number
            $value    = str_replace(" ", "", trim($value));

            // initialize class and assign variable
            $phoneNumberUtility = PhoneNumberUtil::getInstance();
            $phoneNumberObject  = $phoneNumberUtility->parse($value, $defaultRegion);

            // validate
            $validNumber    = $phoneNumberUtility->isValidNumber($phoneNumberObject);
            $possibleNumber = $phoneNumberUtility->isPossibleNumber($phoneNumberObject);

            // if valid and possible number
            if($validNumber && $possibleNumber){
                $status = true;
            }

            // if not a possible number
            else if (!$possibleNumber){
                throw new CatchThis(Translator::_e('NOT_A_POSSIBLE_PHONE_NUMBER'));
            }

            // if not a valid number
            else if (!$validNumber){
                throw new CatchThis(Translator::_e('INVALID_PHONE_NUMBER'));
            }

        } catch (NumberParseException $e) {
            $errors = $e->getMessage();
        }

        return DataType::toObject(array(
            'status' => $status,
            'errors' => $errors,
        ));
    }


    public function isPhoneNumber($value, $defaultRegion = "KE"){
        if (self::isValidPhoneNumber($value, $defaultRegion)->status)
            return true;
        return false;
    }

    public function isCallingCode($value){
        // if we can validate
        if((false === Countries::getCountryNameByCallingCode($value))){
            return false;
        }
        return true;
    }

}
