<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

trait Base64ToolsTrait
{
    public static function base64JsonEncode($str, $base64 = true){

        if(true === $base64){
            return base64_encode(json_encode($str));
        }
        return json_encode($str);
    }

    public static function base64JsonDecode($str, $base64 = true){

        if(true === $base64){
            return json_decode(base64_decode($str), true);
        }
        return json_encode($str, true);
    }

    public static function base64ImageEncode($path){
        if(!empty($path) && (file_exists($path))){
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        return false;
    }


}