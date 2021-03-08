<?php

namespace Simtabi\Pheg\Facets\Chips\Traits;

use Simtabi\Pheg\Facets\Validation\Validate;
use Html2Text\Html2Text;
use NumberFormatter;

trait StringToolsTrait
{

    public static function wordCountUTF8($sentence) {
        return count(preg_split('~[^\p{L}\p{N}\']+~u', strip_tags( $sentence ) ));
    }

    public static function approximateReadingTime($story, $spacing = null, $short_form = false) {

        // if empty story
        if(empty($story) && !is_string($story)){
            return false;
        }

        // escape
        $story = trim( htmlspecialchars($story, ENT_QUOTES, 'UTF-8') );

        // set variables
        $word_count = self::wordCountUTF8($story);
        $minutes    = floor( $word_count / 120 );
        $seconds    = floor( $word_count % 120 / ( 120 / 60 ) );

        $min_str    = true === $short_form ? 'min' :'minute';
        $sec_str    = true === $short_form ? 'sec' :'second';
        $var_str    = 's';

        if(is_null($spacing)){
            $spacing = '';
        }else{
            $spacing = (!empty($spacing) ? $spacing : ' ');
        }

        $min_var = (($minutes == 1) ? false : true);
        $sec_var = (($seconds == 1) ? false : true);

        if ( 1 <= $minutes ) {
            $set_reading_minutes  = $minutes . $spacing . ucwords(strtolower($min_str . ((true === $min_var ? $var_str : null))));
            $set_reading_seconds  = $seconds . $spacing . ucwords(strtolower($sec_str . ((true === $sec_var ? $var_str : null))));
        } else {
            $set_reading_minutes  = $minutes . $spacing . ucwords(strtolower($min_str . "'" . ((true === $min_var ? $var_str : null))));
            $set_reading_seconds  = $seconds . $spacing . ucwords(strtolower($sec_str . "'" . ((true === $sec_var ? $var_str : null))));
        }

        $data['time'] = TypeConverter::toObject(array(
            'formatted' => array(
                'minutes' => html_entity_decode($set_reading_minutes),
                'seconds' => html_entity_decode($set_reading_seconds),
            ),
            'raw'      => array(
                'minutes' => $minutes,
                'seconds' => $seconds,
            ),

        ));

        $data['words']   = TypeConverter::toObject(array(
            'total'   => $word_count,
            'chars'   => strlen(strip_tags($story)),
            'article' => $story,
        ));
        return $data;
    }

    public static function formatArticleReadCount($readCounts, $str = 'Read', $multiple = 's', $spacing = null) {

        // validate
        if(true !== Validators::isInteger($readCounts)){
            return false;
        }

        if(is_null($spacing)){
            $spacing = '';
        }else{
            $spacing = (!empty($spacing) ? $spacing : "&nbsp;");
        }

        if($readCounts !== 0){
            if($readCounts > 1){
                $data['formatted'] = $readCounts . $spacing . ucfirst($str.$multiple);
            }elseif($readCounts === 1){
                $data['formatted'] = $readCounts . $spacing . ucfirst($str);
            }else{
                $data['formatted'] = $readCounts . $spacing . ucfirst($str);
            }
        }else{

            if(false === $readCounts || ($readCounts === 0)){
                $data['formatted'] = $readCounts . $spacing . ucfirst($str.$multiple);
            }else{
                $data['formatted'] = $readCounts . $spacing . ucfirst($str);
            }

        }
        $data['raw'] = $readCounts;
        return $data;
    }

    public static function summarizeText($text, $length = 400, $append = '...', $splitOnWholeWords = true){
        // https://www.drupal.org/node/46415
        if (strlen($text) <= $length) return $text;
        $split = 0;
        if ($splitOnWholeWords) {
            $i = 0; $lplus1 = $length + 1;
            while (($i = strpos($text, ' ', $i + 1)) < $lplus1) {
                if ($i === false) break;
                $split = $i;
            }
        }
        else{
            $split = $length;
        }

        return substr($text, 0, $split).$append;
    }



    public static function makeItReadable($str, $type = 1){
        switch ($type){
            case 1 :
                $words = ucfirst(strtolower(str_replace('_', ' ', $str)));
                break;

            case 2 :
                $words = strtolower(str_replace('_', ' ', $str));
                break;

            case 3 :
                $words = strtoupper(str_replace('_', ' ', $str));
                break;

            case 4 :
                $str = self::multipleExplode ($str, $delimiters = '-_');
                $_w  = '';
                foreach ($str as $i => $j){ $_w .= ucfirst($j) . ' ';}
                $words = trim($_w);
                break;

            default :
                $words = ucwords(strtolower(str_replace('_', ' ', $str)));
                break;
        }

        return $words;
    }






    public static function truncate($string, $length = 150) {
        $limit = abs((int)$length);
        if(strlen($string) > $limit) {
            $string = preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\1...', $string);
        }
        return $string;
    }


    public static function dropCap($string){
        return preg_replace('/^([\<\sa-z\d\/\>]*)(([a-z\&\;]+)|([\"\'\w]))/', '$1<b>$2</b>', $string);
    }






    /**
     * Function getFirstSentence
     *
     *
     * @param $content
     * @return mixed
     *
     * http://monchito.com/blog/regex-php-snippets-for-seo-purposes
     */
    public static function getFirstSentence($content) {
        $content = html_entity_decode(strip_tags($content));
        $pos = strpos($content, '.');
        if ($pos === false) {
            return $content;
        } else {
            return substr($content, 0, $pos + 1);
        }
    }

    /**
     * Function neatTrim
     *
     *
     * @param $str
     * @param int $total
     * @param string $delimiter
     * @return string
     *
     * http://monchito.com/blog/regex-php-snippets-for-seo-purposes
     */
    public static function neatTrim($str, $total = 5, $delimiter='...') {
        $len = strlen($str);
        if ($len > $total) {
            preg_match('/(.{' . $total . '}.*?)\b/', $str, $matches);
            return rtrim($matches[1]) . $delimiter;
        }
        else {
            return $str;
        }
    }


    public static function sentenceCase($text) {
        $text = preg_split('/([.?!]+)/', $text, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
        $out = '';
        foreach ($text as $key => $sentence) {
            $out .= ($key & 1) == 0 ? ucfirst(strtolower(trim($sentence))) : $sentence .' ';
        }
        return trim($out);
    }

    public static function sentenceCap($text, $breakpoint = '.') {
        $text = explode($breakpoint, $text);
        $out  = array();
        foreach ($text as $sentence) {
            $out[] = ucfirst(strtolower($sentence));
        }
        return implode($breakpoint, $out);
    }


    /**
     * Function multipleExplode
     *
     *
     * @param $string - has to be a Str
     * @param array $delimiters - has to be an Array
     * @return mixed
     *
     */
    public static function multipleExplode ($string, $delimiters = ',:-_') {
        return preg_split( "/[$delimiters]/", $string );
    }

    public static function addCharIf($count, $word, $char, $space = false){
        return $count.(true === $space ? " " : '').$word.($count >= 2 ? $char : ($count == 0 ? $char : ''));
    }

    public static function naturalLanguageJoin(array $list, $conjunction = 'and') {

        // Join a string with a natural language conjunction at the end.
        //https://gist.github.com/angry-dan/e01b8712d6538510dd9c

        // option 1
        $last  = array_slice($list, -1);
        $first = join(', ', array_slice($list, 0, -1));
        $both  = array_filter(array_merge(array($first), $last), 'strlen');
        $last  = join(" $conjunction ", $both);
        return $last;

        // option 2
        $last = array_pop($list);
        if ($list) {
            return implode(', ', $list) . ' ' . $conjunction . ' ' . $last;
        }
        return $last;

    }

    public static function trimRepeatingCharOnTheRight($word, $char = ','){
        return preg_replace("/$char+/", $char, rtrim($word, $char));
    }

    public static function stripRepeatingChars($word){
        return preg_replace('{(.)\1+}','$1',$word);
    }

    public static function trimSpacesAndWhiteSpaces($str, $stripSpecials = true){

        // remove spaces
        $str = str_replace(' ', '', $str);
        // remove white spaces
        $str = preg_replace('/\s+/', '', $str);

        return true === $stripSpecials ? self::removeSpecialChars($str) : $str;
    }

    public static function removeSpecialChars($text){
        return preg_replace("/[^A-Za-z0-9 -]/", '', $text);
    }


    public static function getReadableString($length = 8) {

        // output variable
        $output = "";

        // build alphabets list
        $alphabets = array(
            // all constants into an array
            'consonant' => array("b","c","d","f","g","h","j","k","l","m","n","p","r","s","t","v","w","x","y","z"),
            // all vowels into an array
            'vowels'    => array("a","e","i","o","u"),
        );

        //start with a consonant or array (0 = consonant, 1 = vowel)
        $start = rand(0, 1);

        // add a consonant and a vowel until the length of the string has been met
        for($i=1; $i<=ceil($length/2); $i++) {

            // if we are to start with a consonant (0==start)
            if($start == 0) {
                $output .= $alphabets['consonant'][rand(0, 19)];
                $output .= $alphabets['vowels'][rand(0, 4)];
            } else {
                $output .= $alphabets['vowels'][rand(0, 4)];
                $output .= $alphabets['consonant'][rand(0, 19)];
            }

        }

        // return output
        return $output;
    }

    /**
     * Function generateUniqueRandomWord
     *
     *
     * @param int $length
     * @param bool $addNumbers
     * @param bool $addSpecialChars
     * @param bool $addExtraSpecialChars
     * @param null $pattern
     * @return mixed
     *
     */
    public static function getRandomizedWord($length = 12, $addNumbers = true, $addSpecialChars = true, $addExtraSpecialChars = false, $pattern = null)
    {

        $seed = empty($pattern) ? 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' : $pattern;
        if ( $addNumbers )
            $seed .= '0123456789';
        if ( $addSpecialChars )
            $seed .= '!@#$%^&*()';
        if ( $addExtraSpecialChars )
            $seed .= '-_ []{}<>~`+=,.;:/?|';

        $seed = str_split($seed);
        $word = '';

        for ($i = 0; $i < $length; $i++) {
            $word .= $seed[array_rand($seed)];
        }

        return self::trimSpacesAndWhiteSpaces($word);
    }

    public static function buildFullName($obj, $substitute = false){

        $firstName = ucfirst($obj->first_name);
        $lastName  = ucfirst($obj->last_name);
        $username  = ucfirst($obj->username);
        $email     = $obj->email;
        $name      = null;

        if (!empty($firstName) && !empty($lastName)) {
            $name = sprintf("%s %s", ucwords($obj->first_name), ucwords($obj->last_name));
        }else{
            if (!empty($firstName)) {
                $name = $firstName;
            }elseif (!empty($lastName)) {
                $name = $lastName;
            }elseif (!empty($username)) {
                $name = $username;
            }else{
                $name = $email;
            }
        }

        if (!$substitute && (empty($firstName) && empty($lastName))) {
            return false;
        }

        return $name;

    }


    /**
     * Generate initials from a name
     *
     * @param string $string
     * @return string
     */
    public static function buildStringInitials(string $string) : string
    {
        $words = explode(' ', $string);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
        }
        return self::buildInitialsFromSingleWord($string);
    }

    /**
     * Make initials from a word with no spaces
     *
     * @param string $name
     * @return string
     */
    protected static function buildInitialsFromSingleWord(string $name) : string
    {
        preg_match_all('#([A-Z]+)#', $name, $capitals);
        if (count($capitals[1]) >= 2) {
            return substr(implode('', $capitals[1]), 0, 2);
        }
        return strtoupper(substr($name, 0, 2));
    }

    public static function buildRandomUsername(string $firstName = "John", string $lastName = "Doe", int $randNo = 1000){
        $buildFullName = $firstName . " " . $lastName;
        $usernameParts = array_filter(explode(" ", strtolower($buildFullName))); //explode and lowercase name
        $usernameParts = array_slice($usernameParts, 0, 2); //return only first two array part

        $part1 = (!empty($usernameParts[0]))?substr($usernameParts[0], 0,8):""; //cut first name to 8 letters
        $part2 = (!empty($usernameParts[1]))?substr($usernameParts[1], 0,5):""; //cut second name to 5 letters
        $part3 = ($randNo) ? rand(0, $randNo) : "";

        $out   = $part1. str_shuffle($part2). $part3; //str_shuffle to randomly shuffle all characters

        return strtolower(trim($out));
    }

    public static function buildUsernameFromEmail(string $email): string
    {
        // Split the username and domain from the email
        $parts = explode('@',$email);
        return strtolower(trim($parts[0]));
    }

    public static function extractDomainFromEmail(string $email): string
    {
        // Split the username and domain from the email
        $parts = explode('@',$email);
        return strtolower(trim($parts[1]));
    }


    public static function getTagCloud($str, $minFontSize = 12, $maxFontSize = 30 )
    {

        // output variables
        $status = false;
        $errors = null;
        $data   = array();

        try{


            $isString = Validate::isString($str);
            if(true !== $isString){
                throw new CatchThis($isString);
            }

            // Store frequency of words in an array
            $frequency = array();

            // Get individual words and build a frequency table
            foreach( str_word_count( $str, 1 ) as $word )
            {
                // For each word found in the frequency table, increment its value by one
                array_key_exists( $word, $frequency ) ? $frequency[ $word ]++ : $frequency[ $word ] = 0;
            }

            $minimumCount = min( array_values( $frequency ) );
            $maximumCount = max( array_values( $frequency ) );
            $spread       = $maximumCount - $minimumCount;
            $arrayTags    = array();

            $spread == 0 && $spread = 1;

            foreach( $frequency as $tag => $count )
            {
                $fontSize = $minFontSize + ( $count - $minimumCount ) * ( $maxFontSize - $minFontSize ) / $spread;
                $arrayTags[] = array(
                    'count'  => floor( $count ),
                    'size'   => floor( $fontSize ),
                    'tag'    => htmlspecialchars( stripslashes( $tag ) ),
                );
            }

            // set data and status
            if(!empty($arrayTags)){
                $status = true;
                $data   = $arrayTags;
            }

        }catch (CatchThis $e){
            $errors = $e->getMessage();
        }

        return TypeConverter::toObject(array(
            'status' => $status,
            'errors' => self::filterArray($errors),
            'data'   => $data,
        ));

    }


    /**
     * Function generateUniqueRandomWord
     *
     *
     * @param int $length
     * @param bool $addNumbers
     * @param bool $addSpecialChars
     * @param bool $addExtraSpecialChars
     * @param null $pattern
     * @return mixed
     *
     */
    public static function generateRandomizedWord($length = 12, $addNumbers = true, $addSpecialChars = true, $addExtraSpecialChars = false, $pattern = null)
    {

        $seed = empty($pattern) ? 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' : $pattern;
        if ( $addNumbers )
            $seed .= '0123456789';
        if ( $addSpecialChars )
            $seed .= '!@#$%^&*()';
        if ( $addExtraSpecialChars )
            $seed .= '-_ []{}<>~`+=,.;:/?|';

        $seed = str_split($seed);
        $word = '';

        for ($i = 0; $i < $length; $i++) {
            $word .= $seed[array_rand($seed)];
        }

        return self::trimSpacesAndWhiteSpaces($word);
    }



    /**
     * Generates a random string of given $length.
     *
     * @param Integer $length The string length.
     * @return String The randomly generated string.
     */
    public static function randomString( $length )
    {
        $seed = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrtsuvwxyz0123456789';
        $max  = strlen( $seed ) - 1;
        $string = '';
        for ( $i = 0; $i < $length; ++$i )
            $string .= $seed{intval( mt_rand( 0.0, $max ) )};
        return $string;
    }


    public static function generateString($length = '12', $power = null, $addSpecialCharacters = false){

        $characters = "#$%^&*()+=-[]';,./{}|:<>?~";
        $pattern    = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789".(true === $addSpecialCharacters ? $characters : '');
        $pattern    = trim($pattern);
        $output     = null;

        if(!empty($power)){
            srand((double)microtime()*1000000*$power);
        }
        else{
            srand((double)microtime()*1000000);
        }

        for($i = 0; $i <$length; $i++) {
            $output.= $pattern[rand()%strlen($pattern)];
        }
        return $output;
    }

    /**
     * Generates a random string of given $length.
     *
     * @param Integer $length The string length.
     * @return String The randomly generated string.
     */
    public static function generateRandomizedString($length )
    {
        $seed = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrtsuvwxyz0123456789';
        $max  = strlen( $seed ) - 1;
        $string = '';
        for ( $i = 0; $i < $length; ++$i )
            $string .= $seed{intval( mt_rand( 0.0, $max ) )};
        return $string;
    }


    public static function generateReadableString($length = 8) {

        // output variable
        $output = "";

        // build alphabets list
        $alphabets = array(
            // all constants into an array
            'consonant' => array("b","c","d","f","g","h","j","k","l","m","n","p","r","s","t","v","w","x","y","z"),
            // all vowels into an array
            'vowels'    => array("a","e","i","o","u"),
        );

        //start with a consonant or array (0 = consonant, 1 = vowel)
        $start = rand(0, 1);

        // add a consonant and a vowel until the length of the string has been met
        for($i=1; $i<=ceil($length/2); $i++) {

            // if we are to start with a consonant (0==start)
            if($start == 0) {
                $output .= $alphabets['consonant'][rand(0, 19)];
                $output .= $alphabets['vowels'][rand(0, 4)];
            } else {
                $output .= $alphabets['vowels'][rand(0, 4)];
                $output .= $alphabets['consonant'][rand(0, 19)];
            }

        }

        // return output
        return $output;
    }

}