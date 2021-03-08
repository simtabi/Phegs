<?php

namespace Simtabi\Pheg\Phegs\Helpers\Validation\Traits;

trait StringValidatorsTrait
{

    /***
     * Function is_title
     *
     * http://stackoverflow.com/questions/3623719/php-regex-to-check-a-english-name
     * http://stackoverflow.com/questions/1261338/php-regex-for-human-names
     * http://stackoverflow.com/questions/275160/regex-for-names
     * http://www.regextester.com/
     * http://www.regexr.com/
     *
     * @param $value
     * @param int $length
     * @return bool
     *
     */
    public function isTitle($value, $length = 80) {

        // for later reference
        # $illegal = "#$%^&*()+=-[]';,./{}|:<>?~";
        $allowed = '~\-!@#$%\^&\*\(\)';

        $value = trim($value);
        if(Respect::stringType()->validate($value)){
            return (!preg_match("/^[\w\s$allowed]{1,$length}$/", trim($value))) ? false : true;
        }
        return false;
    }

    public function hasNoRepeatingChars($value, $minimumCount = 3){
        if (!preg_match('/([a-z]{'.$minimumCount.',}|[0-9]{'.$minimumCount.',})/i', $value)) {
            return true;
        }
        return false;
    }

}
