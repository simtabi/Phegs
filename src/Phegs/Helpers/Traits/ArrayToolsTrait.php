<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use Simtabi\Pheg\Phegs\DataTools\TypeConverter;
use Simtabi\Pheg\Phegs\Ensue\Ensue;
use stdClass;

trait ArrayToolsTrait
{

    /**
     * Get an item from attributes array using "dot" notation.
     *
     * @param string|null $key
     * @param $data
     * @param mixed $default
     *
     * @return mixed
     */
    public function getFromArray(?string $key, $data, $default = null)
    {
        $data = TypeConverter::fromAnyToArray($data);

        if (is_null($key)) {
            return $data;
        }

        if (array_key_exists($key, $data)) {
            return $data[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (is_array($data) && array_key_exists($segment, $data)) {
                $data = $data[$segment];
            } else {
                return $default;
            }
        }

        return $data;
    }

    public static function getPurifiedArray($ArrayData){
        if (is_object($ArrayData) || is_array($ArrayData)){
            if (count((array)$ArrayData) == 0){
                return false;
            }
        }

        $data = null;
        foreach ($ArrayData as $modelDatum){
            $data[] = $modelDatum;
        }
        return $data;
    }

    public static function getSizableArray($array, $size = 0, $offset = 0){

        // if !array
        if (!is_array($array)){
            return false;
        }

        // count total values in array
        $count = count($array);

        // if size is less or equal to total values,
        // else we will use total count
        // if size is zero, then dont limit the output
        if($size <= $count && ($size !== 0)){
            $count = $size;
        }

        shuffle($array);
        return array_splice($array, $offset, $count);

    }



    public static function putToArray($key, $value, $data){
        $parsed =  explode('.', $key);
        $array  =& $data;
        while (count($parsed) > 1) {
            $next = array_shift($parsed);
            if ( ! isset($array[$next]) || ! is_array($array[$next])) {
                $array[$next] = [];
            }
            $array =& $array[$next];
        }
        $array[array_shift($parsed)] = $value;
        return $array;
    }

    public static function pushToTopOfArray($value, $array){
        if(is_array($array) && !empty($array)){
            // push this error to the very beginning
            array_unshift($array, $value);
        } else{
            $array = $value;
        }

        return $array;
    }

    public static function flattenArray($array){
        $array = TypeConverter::toArray($array);
        if (!is_array($array)){
            return array();
        }

        $result = array();
        foreach ($array as $key => $value){
            if (is_array($value)){
                $result = array_merge($result, self::flattenArray($value));
            }
            else{
                $result[$key] = $value;
            }
        }
        return $result;
    }

    public static function shuffleAssociativeArray($list) {

        // @author http://stackoverflow.com/questions/4102777/php-random-shuffle-array-maintaining-key-value

        if (!is_array($list)) return $list;

        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
            $random[$key] = $list[$key];
        }
        return $random;
    }

    public static function arrayGroupBy(array $arr, callable $keySelector) {
        // @author http://codereview.stackexchange.com/questions/23919/generic-array-group-by-using-lambda
        $result = array();
        foreach ($arr as $i) {
            $key = call_user_func($keySelector, $i);
            $result[$key][] = $i;
        }
        return $result;
    }

    public static function arrayReOrderAndGroup($order, $array) {

        $order_structure = array(
            0 => array(
                0 => 'zippy',
                1 => 'emily',
                2 => 'miles',
            ),

            1 => array(
                0 => 'lisboa',
                1 => 'jim',
                2 => 'fibby',
            ),
        );

        $newOrder = array ();
        for($i=0;$i<count($array); $i++) {
            foreach($order as $category => $user){
                foreach($order[$category] as $key => $username){
                    if((strtolower($array[$i]->username)) == (strtolower($order[$category][$key]))){
                        $newOrder[$category][$key] = $array[$i];
                        continue;
                    }
                }

                // sort the internal structure
                if((!empty($newOrder[$category])) && (is_array($newOrder[$category]))){
                    ksort($newOrder[$category]);
                }

            }
        }

        ksort($newOrder);
        return array_values($newOrder);
    }

    public static function readFromArray($key, $array){

        // convert from object if it is
        $array = TypeConverter::toArray($array);

        // lets walk through the array
        $parsed = explode('.', $key);
        $data   = TypeConverter::toArray($array);
        while ($parsed) {
            $next = array_shift($parsed);
            if (isset($data[$next])) {
                $data = $data[$next];
            }
            else {
                return null;
            }
        }
        return $data;
    }

    public static function partitionArray($data, $sections = 5){

        $built = array();
        $total = 0;
        $parts = 0;

        if(!empty($data) && is_array($data)){

            $total = count($data);
            if(($sections !== 0 && ($sections < $total)) && (($total !== 0) || ($total !== false))){
                for ( $i = 0; $i < $total; $i++) {
                    if ( !($i % $sections) ) {
                        $parts++;
                    }
                    $built[$parts][] = $data[$i];
                }
            }

        }
        return [
            'parts' => $parts, // last partition count
            'total' => $total, // total data count
            'data'  => $built, // partitioned data
        ];
    }

    public static function isInArray($needle, $haystack){
        $found = false;
        foreach ($haystack as $key => $item) {
            if ($needle === $key) {
                $found = true;
                break;
            } elseif (is_array($item)) {
                $found = self::isInArray($needle, $item);
                if($found) {
                    break;
                }
            }
        }
        return $found;
    }

    public static function arraySet($key, $value, array &$data) {
        if ($key === null) {
            return null;
        }

        $keys = explode('.', $key);

        while (count($keys) > 1) {
            $key = array_shift($keys);

            if ( ! isset($data[$key]) || ! is_array($data[$key])) {
                $data[$key] = [];
            }

            $data = &$data[$key];
        }

        $data[array_shift($keys)] = $value;

        return $data;
    }

    public static function filterArray($data){
        $data = TypeConverter::buildArray($data);
        if (!is_array($data)){
            return null;
        }
        foreach ($data as $key => $datum){
            if (is_array($datum)){
                self::filterArray($datum);
            }else{
                if ( empty($datum) && strlen($datum) == 0 ) {
                    unset($data[$key]);
                }
            }
        }

        return $data;
    }

    public static function getRandomArrayElements($array, int $number = 1)
    {
        // https://www.schmengler-se.de/en/2015/09/efficiently-draw-random-elements-from-large-php-array/
        $array       = TypeConverter::fromAnyToArray($array);
        $totalValues = count($array);
        $number      = min($number, $totalValues);
        $picked      = array_fill(0, $number, 0);
        $backup      = array_fill(0, $number, 0);
        // partially shuffle the array, and generate unbiased selection simultaneously
        // this is a variation on fisher-yates-knuth shuffle
        for ($i = 0; $i < $number; $i++) // O(n) times
        {
            $selected              = mt_rand( 0, --$totalValues ); // unbiased sampling N * N-1 * N-2 * .. * N-n+1
            $value                 = $array[ $selected ];
            $array[ $selected ]    = $array[ $totalValues ];
            $array[ $totalValues ] = $value;
            $backup[ $i ]          = $selected;
            $picked[ $i ]          = $value;
        }
        // restore partially shuffled input array from backup
        // optional step, if needed it can be ignored, e.g $a is passed by value, hence copied
        for ($i = $number - 1; $i >= 0; $i--) // O(n) times
        {
            $selected              = $backup[ $i ];
            $value                 = $array[ $totalValues ];
            $array[ $totalValues ] = $array[ $selected ];
            $array[ $selected ]    = $value;
            $totalValues++;
        }
        return $picked;
    }

    public static function randomizeData(array $array, $counter = 10){
        $output = [];
        $count  = 0;
        $total  = count($array);

        // shuffle data
        $array = self::shuffle_assoc($array);

        foreach ($array as $key => $item) {
            if(($counter <= $total) && ($count < $counter)){
                $output[$count] = [
                    'key'   => $key,
                    'value' => $item,
                ];

            }
            $count++;
        }
        return $output;
    }

    public static function shuffle_assoc($list) {
        if (!is_array($list)) return $list;

        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
            $random[$key] = $list[$key];
        }
        return $random;
    }

    /**
     * Get a value from an object or an array.  Allows the ability to fetch a nested value from a
     * heterogeneous multidimensional collection using dot notation.
     *
     * @param array|object $data
     * @param string       $key
     * @param mixed        $default
     * @return mixed
     */
    public static function arrayFetch( $key, $data, $default = null ) {
        $out = $default;
        if ( is_array( $data ) && array_key_exists( $key, $data ) ) {
            $out = $data[$key];
        } else if ( is_object( $data ) && property_exists( $data, $key ) ) {
            $out = $data->$key;
        } else {
            $segments = explode( '.', $key );
            foreach ( $segments as $segment ) {
                if ( is_array( $data ) && array_key_exists( $segment, $data ) ) {
                    $out = $data = $data[$segment];
                } else if ( is_object( $data ) && property_exists( $data, $segment ) ) {
                    $out = $data = $data->$segment;
                } else {
                    $out = $default;
                    break;
                }
            }
        }
        return $out;
    }


    public static function arrayToObject($array) {
        if(!is_array($array)) {
            return $array;
        }

        return json_decode(json_encode($array));

        // alternative
        $object = new \stdClass();
        if (count($array) > 0) {
            foreach ($array as $name=>$value) {
                $name = strtolower(trim($name));
                if (!empty($name)) {
                    $object->$name = self::arrayToObject($value);
                }
            }
            return $object;
        } else {
            return false;
        }
    }

    /**
     * Return an imploded string from a multi dimensional array.
     *
     * @param string $glue
     * @param array  $array
     *
     * @return string
     */
    public static function recursiveImplode($glue, array $array)
    {
        $return = '';
        $index  = 0;
        $count  = count($array);
        foreach ($array as $piece) {
            if (is_array($piece)) {
                $return .= self::recursiveImplode($glue, $piece);
            } else {
                $return .= $piece;
            }
            if ($index < $count - 1) {
                $return .= $glue;
            }
            ++$index;
        }
        return $return;
    }

    public static function debugArray($array, $echo = true ) {
        $output = '<br><pre>' . print_r( $array, true ) . '</pre><br>';
        if(true === $echo){
            echo $output;
        }else{
            return $output;
        }
        return null;
    }



    /**
     * Function parseJsonArray
     *
     * @param $array
     * @param int $parentId
     * @return array
     *
     * http://stackoverflow.com/questions/11357981/save-json-or-multidimentional-array-to-DataBase-flat?answertab=active#tab-top

     */
    public static function parseArrayToJson($array, $parentId = 0){

        if (empty($array) || !is_array($array)){
            return null;
        }

        $return = array();
        foreach ($array as $order => $subArray) {

            $returnSubSubArray = array();
            if (isset($subArray['children'])) {
                $returnSubSubArray = self::parseJsonArray(
                    $subArray['children'],
                    $subArray['id']
                );
            }

            $return[] = array(
                'parent_id' => $parentId,
                'order'     => $order,
                'id'        => $subArray['id'],
            );

            $return = array_merge($return, $returnSubSubArray);
        }

        return $return;
    }

    function objectToArray($object){
        return json_decode(json_encode($object), true);
    }


    function arrayToJSONObj($array){
        return json_decode(json_encode($array, JSON_FORCE_OBJECT), false);
    }



    function object2Array(object $object){
        return json_decode(json_encode($object), true, 512, JSON_THROW_ON_ERROR);
    }

    function array2JSONObj($array){
        return json_decode(json_encode($array, JSON_FORCE_OBJECT), false);
    }

    function array2Object(array $array): stdClass
    {
        $obj = new stdClass;
        foreach($array as $k => $v) {
            if(strlen($k)) {
                if(is_array($v)) {
                    $obj->{$k} = $this->array2Object($v); //RECURSION
                } else {
                    $obj->{$k} = $v;
                }
            }
        }
        return $obj;
    }

    public function count($data, $associative = false): int
    {
        $data = TypeConverter::fromAnyToArray($data, $associative);
        return count( (array) $data);
    }

    public function pushToArray($data, $array): array
    {
        if (is_array($data) && (count($data) >= 1)) {
            return array_merge($array, $data);
        } else {
            return $array;
        }
    }

}
