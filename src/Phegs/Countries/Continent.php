<?php

namespace Simtabi\Pheg\Phegs\Countries;

class Continent
{

    /**
     * @var array
     */
    private $continents = [
        "AN" => "Antarctica",
        "NA" => "North America",
        "SA" => "South America",
        "EU" => "Europe",
        "AF" => "Africa",
        "AS" => "Asia",
        "OC" => "Australia (Oceania)",
    ];

    /**
     * @var array
     */
    private $countryToContinentMap = [
        "AF" => "AS",
        "AP" => "AS",
        "AX" => "EU",
        "AL" => "EU",
        "DZ" => "AF",
        "AS" => "OC",
        "AD" => "EU",
        "AO" => "AF",
        "AI" => "NA",
        "AQ" => "AN",
        "AG" => "NA",
        "AR" => "SA",
        "AM" => "AS",
        "AW" => "NA",
        "AU" => "OC",
        "AT" => "EU",
        "AZ" => "AS",
        "BA" => "EU",
        "BB" => "NA",
        "BD" => "AS",
        "BE" => "EU",
        "BF" => "AF",
        "BG" => "EU",
        "BH" => "AS",
        "BI" => "AF",
        "BJ" => "AF",
        "BM" => "NA",
        "BN" => "AS",
        "BO" => "SA",
        "BQ" => "SA",
        "BR" => "SA",
        "BS" => "NA",
        "BT" => "AS",
        "BV" => "AN",
        "BW" => "AF",
        "BY" => "EU",
        "BZ" => "NA",
        "IO" => "AS",
        "KH" => "AS",
        "CM" => "AF",
        "CA" => "NA",
        "CV" => "AF",
        "KY" => "NA",
        "CF" => "AF",
        "TD" => "AF",
        "CL" => "SA",
        "CN" => "AS",
        "CX" => "AS",
        "CC" => "AS",
        "CO" => "SA",
        "KM" => "AF",
        "CD" => "AF",
        "CG" => "AF",
        "CK" => "OC",
        "CR" => "NA",
        "CI" => "AF",
        "HR" => "EU",
        "CU" => "NA",
        "CS" => "EU",
        "CW" => "SA",
        "CY" => "AS",
        "CZ" => "EU",
        "DK" => "EU",
        "DJ" => "AF",
        "DM" => "NA",
        "DO" => "NA",
        "EC" => "SA",
        "EG" => "AF",
        "SV" => "NA",
        "GQ" => "AF",
        "ER" => "AF",
        "EE" => "EU",
        "ET" => "AF",
        "EU" => "EU",
        "FO" => "EU",
        "FK" => "SA",
        "FJ" => "OC",
        "FI" => "EU",
        "FR" => "EU",
        "GF" => "SA",
        "PF" => "OC",
        "TF" => "AN",
        "GA" => "AF",
        "GM" => "AF",
        "GE" => "AS",
        "DE" => "EU",
        "GH" => "AF",
        "GI" => "EU",
        "GR" => "EU",
        "GL" => "NA",
        "GD" => "NA",
        "GP" => "NA",
        "GU" => "OC",
        "GT" => "NA",
        "GG" => "EU",
        "GN" => "AF",
        "GW" => "AF",
        "GY" => "SA",
        "HT" => "NA",
        "HM" => "AN",
        "VA" => "EU",
        "HN" => "NA",
        "HK" => "AS",
        "HU" => "EU",
        "IS" => "EU",
        "IN" => "AS",
        "ID" => "AS",
        "IR" => "AS",
        "IQ" => "AS",
        "IE" => "EU",
        "IM" => "EU",
        "IL" => "AS",
        "IT" => "EU",
        "JM" => "NA",
        "JP" => "AS",
        "JE" => "EU",
        "JO" => "AS",
        "KZ" => "AS",
        "KE" => "AF",
        "KI" => "OC",
        "KP" => "AS",
        "KR" => "AS",
        "KW" => "AS",
        "KG" => "AS",
        "LA" => "AS",
        "LV" => "EU",
        "LB" => "AS",
        "LS" => "AF",
        "LR" => "AF",
        "LY" => "AF",
        "LI" => "EU",
        "LT" => "EU",
        "LU" => "EU",
        "MO" => "AS",
        "MK" => "EU",
        "MG" => "AF",
        "MW" => "AF",
        "MY" => "AS",
        "MV" => "AS",
        "ML" => "AF",
        "MT" => "EU",
        "MH" => "OC",
        "MQ" => "NA",
        "MR" => "AF",
        "MU" => "AF",
        "YT" => "AF",
        "MX" => "NA",
        "FM" => "OC",
        "MD" => "EU",
        "MC" => "EU",
        "MN" => "AS",
        "ME" => "EU",
        "MS" => "NA",
        "MA" => "AF",
        "MZ" => "AF",
        "MM" => "AS",
        "NA" => "AF",
        "NR" => "OC",
        "NP" => "AS",
        "AN" => "NA",
        "NL" => "EU",
        "NC" => "OC",
        "NZ" => "OC",
        "NI" => "NA",
        "NE" => "AF",
        "NG" => "AF",
        "NU" => "OC",
        "NF" => "OC",
        "MP" => "OC",
        "NO" => "EU",
        "OM" => "AS",
        "PK" => "AS",
        "PW" => "OC",
        "PS" => "AS",
        "PA" => "NA",
        "PG" => "OC",
        "PY" => "SA",
        "PE" => "SA",
        "PH" => "AS",
        "PN" => "OC",
        "PL" => "EU",
        "PT" => "EU",
        "PR" => "NA",
        "QA" => "AS",
        "RE" => "AF",
        "RO" => "EU",
        "RU" => "EU",
        "RW" => "AF",
        "SH" => "AF",
        "KN" => "NA",
        "LC" => "NA",
        "PM" => "NA",
        "VC" => "NA",
        "WS" => "OC",
        "SM" => "EU",
        "ST" => "AF",
        "SA" => "AS",
        "SN" => "AF",
        "RS" => "EU",
        "SC" => "AF",
        "SL" => "AF",
        "SG" => "AS",
        "SK" => "EU",
        "SI" => "EU",
        "SB" => "OC",
        "SO" => "AF",
        "ZA" => "AF",
        "GS" => "AN",
        "ES" => "EU",
        "LK" => "AS",
        "SD" => "AF",
        "SR" => "SA",
        "SJ" => "EU",
        "SZ" => "AF",
        "SX" => "SA",
        "SE" => "EU",
        "CH" => "EU",
        "SY" => "AS",
        "TW" => "AS",
        "TJ" => "AS",
        "TZ" => "AF",
        "TH" => "AS",
        "TL" => "AS",
        "TG" => "AF",
        "TK" => "OC",
        "TO" => "OC",
        "TT" => "NA",
        "TN" => "AF",
        "TR" => "AS",
        "TM" => "AS",
        "TC" => "NA",
        "TV" => "OC",
        "UG" => "AF",
        "UA" => "EU",
        "AE" => "AS",
        "GB" => "EU",
        "UK" => "EU",
        "UM" => "OC",
        "US" => "NA",
        "UY" => "SA",
        "UZ" => "AS",
        "VU" => "OC",
        "VE" => "SA",
        "VN" => "AS",
        "VG" => "NA",
        "VI" => "NA",
        "WF" => "OC",
        "EH" => "AF",
        "YE" => "AS",
        "YU" => "EU",
        "ZM" => "AF",
        "ZW" => "AF",
    ];

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


    /**
     * @return array
     */
    public function getContinents(): array
    {
        return $this->continents;
    }

    /**
     * @return array
     */
    public function getCountryToContinentMap(): array
    {
        return $this->countryToContinentMap;
    }

    public  function getName($code){
        return arrayFetch($code, self::getContinents(), null);
    }

    public function getCodes(){
        $data = [];
        foreach (self::getContinents() as $continent => $name){
            $data[] = strtoupper(trim($continent));
        }
        return $data;
    }

    public function isValidContinentCode($code){
        return isset(self::getContinents()[strtoupper(trim($code))]) ? true : false;
    }

    public function listAll(){
        return self::getContinents();
    }

    public function getByCountry($countryCode){
        return arrayFetch(strtoupper(trim($countryCode)), self::getCountryToContinentMap(), null);
    }

    public function listCountries($continentCode = null){
        $data = [];
        foreach (self::getCountryToContinentMap() as $country => $continent){
            $continent = strtoupper(trim($continent));
            $country   = strtoupper(trim($country));
            if (isset($data[$continent])){
                $data[$continent][] = $country;

            }else{
                $data[$continent] = $country;
            }

        }
        return $data;
    }

}
