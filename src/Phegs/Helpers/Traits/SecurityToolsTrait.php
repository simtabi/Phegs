<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

trait SecurityToolsTrait
{

    /**
     * Function encrypt
     *
     *
     * @param $input
     * @param string $method
     * @param int $iteration
     * @param bool $salt
     * @return string
     *
     */
    public static function encrypt($input, $method = "sha512", $iteration = 100, $salt = false)
    {
        // Concatenate the salt if there is any salt
        $input = ($salt == false) ? $input : $salt . $input;
        // Hashing the value
        $input = hash($method, $input);
        // If iteration is not false then we iterate it by $iteration times
        if($iteration !== false) {
            for($i = 1;$i <= $iteration; $i++) {
                $input = hash($method, $input);
            }
        }
        return $input;
    }


    /**
     * method masks the username of an email address
     *
     * @param string $email the email address to mask
     * @param string $char the character to use to mask with
     * @param int $level the percent of the username to mask
     * @return $result
     *
     */
    public static function maskEmail($email, $level = 50, $char = '*' ){

        if(!empty($email)){
            list( $user, $domain ) = preg_split("/@/", $email );

            //username parts mask
            $len_user            = strlen( $user );
            $username_mask_count = floor( $len_user * $level /100 );
            $username_offset     = floor( ( $len_user - $username_mask_count ) / 2 );
            $masked_username     = substr( $user, 0, $username_offset )
                .str_repeat( $char, $username_mask_count )
                .substr( $user, $username_mask_count+$username_offset );

            //domain part mask
            $len_domain          = strlen( $user );
            $random              = rand(60,90);
            $domain_mask_count   = floor( $len_domain * $random /100 );
            $domain_offset       = floor( ( $len_domain - $domain_mask_count ) / 2 );
            $masked_domain       = substr( $domain, 0, $domain_offset )
                .str_repeat( $char, $domain_mask_count )
                .substr( $domain, $domain_mask_count+$domain_offset );

            //return results
            return( $masked_username.'@'.$masked_domain );

        }

        return false;
    }


    public static function obfuscateEmail($email)
    {
        $em   = explode("@",$email);
        $name = implode(array_slice($em, 0, count($em)-1), '@');
        $len  = floor(strlen($name)/2);

        return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);
    }

    public static function emailEncode($email='info@domain.com', $linkText='Contact Us', $attrs ='class="emailencoder"' )
    {
        // remplazar aroba y puntos
        $email = str_replace('@', '&#64;', $email);
        $email = str_replace('.', '&#46;', $email);
        $email = str_split($email, 5);

        $linkText = str_replace('@', '&#64;', $linkText);
        $linkText = str_replace('.', '&#46;', $linkText);
        $linkText = str_split($linkText, 5);

        $part1 = '<a href="ma';
        $part2 = 'ilto&#58;';
        $part3 = '" '. $attrs .' >';
        $part4 = '</a>';

        // generamos el Javascript
        $encoded = '<script type="text/javascript">';
        $encoded .= "document.write('$part1');";
        $encoded .= "document.write('$part2');";
        foreach($email as $e)
        {
            $encoded .= "document.write('$e');";
        }
        $encoded .= "document.write('$part3');";
        foreach($linkText as $l)
        {
            $encoded .= "document.write('$l');";
        }
        $encoded .= "document.write('$part4');";
        $encoded .= '</script>';

        return $encoded;
    }



    /**
     * method masks the username of an email address
     *
     * @param string $number the number address to mask
     * @param int $mask_percentage the percent of the number to mask
     * @param string $mask_char the character to use to mask with
     * @return $result
     */
    public static function maskTelephone($number, $mask_percentage = 60, $mask_char = '*'){

        //username parts mask
        $number_length       = strlen( $number );
        $number_mask_count   = floor( $number_length * $mask_percentage /100 );
        $number_offset       = floor( ( $number_length - $number_mask_count ) / 2 );
        $masked_number       = substr( $number, 0, $number_offset )
            .str_repeat( $mask_char, $number_mask_count )
            .substr( $number, $number_mask_count+$number_offset );

        //return results
        return( $masked_number );

    }

}