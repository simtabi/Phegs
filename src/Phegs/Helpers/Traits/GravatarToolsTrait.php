<?php


namespace Simtabi\Pheg\Phegs\Helpers\Chips\Traits;


trait GravatarToolsTrait
{

    /**
     * Get Gravatar image by email.
     *
     * @param string $email
     * @param int $size
     * @param string $rating [g|pg|r|x]
     * @param string $default
     * @return string
     */

    public static function getGravatar($email, $size = 200, $is_https = false, $rating = 'g', $default = 'monsterid' ): ?string
    {
        if ( $is_https ) {
            $url = 'https://secure.gravatar.com/';
        } else {
            $url = 'http://www.gravatar.com/';
        }
        $id = md5(strtolower(trim($email)));
        return $url . 'avatar/' . $id . '/?d=' . $default . '&s=' . (int) abs( $size ) . '&r=' . $rating;
    }

}