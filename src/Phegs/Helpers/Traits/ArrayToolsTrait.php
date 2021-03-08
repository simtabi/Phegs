<?php

namespace Simtabi\Pheg\Phegs\Helpers\Helpers\Traits;

use Simtabi\Pheg\Phegs\Validation\Validate;

trait ArrayToolsTrait
{

    // @todo finish this method
    public static function getRandomArrayEntries($ModelData, $limit = 1, $getObject = false){
        return self::generateRandomElementFromArray(self::getPurifiedArray($ModelData));
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
        return TypeConverter::toObject($data);
    }

    public static function generateRandomElementFromArray($array)
    {
        if (is_object($array) || is_array($array)){
            if (count((array)$array) == 0){
                return false;
            }
        }
        $array = (array) $array;
        $data  = [];
        foreach ($array as $item){
            $data[] = $item;
        }
        return TypeConverter::toObject($data[array_rand($data)]);
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

    /**
     * @param $key
     * @param $data
     * @return array|null|mixed
     */
    public static function getFromArray($key, $data){
        if (Validators::isEmpty($key)){
            return $data;
        }
        else{
            $parsed = explode('.', $key);
            $data   = is_object($data) ? TypeConverter::toArray($data) : $data;
            while ($parsed) {
                $next = array_shift($parsed);
                if (isset($data[$next])) {
                    $data = $data[$next];
                } else {
                    return null;
                }
            }
            return $data;
        }
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



    /**
     * @param $array
     * @return bool|object
     */
    public static function getRandomArrayElement($array)
    {
        if (is_object($array) || is_array($array)){
            if (count((array)$array) == 0){
                return false;
            }
        }
        $array = (array) $array;
        $data  = [];
        foreach ($array as $item){
            $data[] = $item;
        }
        return $data[array_rand($data)];
    }

    /**
     * @param $ModelData
     * @return bool|object
     */
    public static function getOneRandomModelEntry($ModelData){
        return self::getRandomArrayElement(get_clean_model_array($ModelData));
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


    public static function randomizeData(array $array, $counter = 10){
        $output = [];

        if (is_array($array) && (($total = count($array)) > 0)) {

            // shuffle data
            shuffle($array);

            foreach ($array as $key => $data) {
                if(($counter <= $total) && $key <= $counter){
                    $output[$key] = $data;
                }
            }

            return $output;

        }

        return false;
    }

    public static function generateRandomizedArray(array $array, $counter = 10, $limit = null){
        $formatted = [];
        $output    = [];
        $i         = 1;
        // shuffle data
        shuffle($array);
        foreach ($array as $data) {

            if(!is_bool($array)){
                $total = count($array);
                if($total !== 0){

                    if($counter < $total){
                        if(!empty($limit)){
                            while (($i <= $counter) && ($i == $limit)) {

                                //assign to our array
                                $formatted[$i] = $data;
                                $output = $formatted;
                                $i++;
                            }
                        }else{

                            while ($i <= $counter) {
                                //assign to our array
                                $formatted[$i] = $data;
                                $output = $formatted;
                                $i++;
                            }
                        }
                    }else{

                        if(!empty($limit)){
                            while (($i <= $total) && ($i == $limit)) {

                                //assign to our array
                                $formatted[$i] = $data;
                                $output = $formatted;
                                $i++;
                            }
                        }else{

                            while ($i <= $total) {
                                //assign to our array
                                $formatted[$i] = $data;
                                $output = $formatted;
                                $i++;
                            }
                        }

                    }


                }
            }

        }

        if($counter == 1){
            foreach($output as $out){
                $output = $out;
            }

            return $output;
        }else{
            return $output;
        }
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
                    $obj->{$k} = array2Object($v); //RECURSION
                } else {
                    $obj->{$k} = $v;
                }
            }
        }
        return $obj;
    }
}
