<?php

namespace Simtabi\Pheg\Facets\Validation\Traits;

trait UsernameValidatorsTrait
{

    public function isUsername($username, $minLength = 5, $maxLength = 32, $startWithAlphabets = false) {

        // trim username
        $username  = trim($username);

        $minLength = true !== self::isInteger($minLength) ? 5 : $minLength;

        // validate username maximum length
        $maxLength = true !== self::isInteger($maxLength) ? 32 : $maxLength;

        // validate username length
        if(!$this->respect->stringType()->length($minLength, $maxLength, true)->validate($username)){
            return false;
        }

        // if we are to strictly start with alphabets
        $regex     = true === $startWithAlphabets ? '[A-Za-z]' : '';
        if(preg_match('/^'.$regex.'[A-Za-z0-9\d_]{5,'.$maxLength.'}$/', $username)){
            return true;
        }
        return false;
    }


}
