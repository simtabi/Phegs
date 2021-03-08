<?php


namespace Simtabi\Pheg\Phegs\Helpers\Chips\Traits;


use JsonException;
use Simtabi\Pheg\Phegs\Helpers\Validation\Validate;

trait JSONToolsTrait
{

    public static function jsonPrettyPrint($data, $html = false, $raw_array = true, $config = false) {

        if($raw_array){
            $json = json_encode($data, $config);
        }elseif($raw_array == false && (Validate::isJSON($data))){
            $json = $data;
        }else{
            return false;
        }

        $out = ''; $nl = "\n"; $cnt = 0; $tab = 4; $len = strlen($json); $space = ' ';
        if($html) {
            $space = '&nbsp;';
            $nl    = '<br/>';
        }

        $k = strlen($space)?strlen($space):1;
        for ($i=0; $i<=$len; $i++) {
            $char = substr($json, $i, 1);
            if($char == '}' || $char == ']') {
                $cnt --;
                $out .= $nl . str_pad('', ($tab * $cnt * $k), $space);
            } else if($char == '{' || $char == '[') {
                $cnt ++;
            }
            $out .= $char;
            if($char == ',' || $char == '{' || $char == '[') {
                $out .= $nl . str_pad('', ($tab * $cnt * $k), $space);
            }
            if($char == ':') {
                $out .= ' ';
            }
        }

        return $out;
    }


    /**
     * @param array $data
     * @return string
     * @throws JsonException
     */
    function jsonEncodePrettify($data)
    {
        return json_encode($data, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public static function jsonEscapeUnicode($str){
        return json_decode((preg_replace('/\\\u([0-9a-z]{4})/', '&#x$1;', TypeConverter::toJson($str))));
    }


    /**
     * Function parseJsonToArray
     *
     * @param $array
     * @param int $parentId
     * @return array
     *
     * http://stackoverflow.com/questions/11357981/save-json-or-multidimentional-array-to-DataBase-flat?answertab=active#tab-top
     *
     */
    public static function parseJsonToArray($array, $parentId = 0){

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

}