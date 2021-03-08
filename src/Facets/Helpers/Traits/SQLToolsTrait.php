<?php


namespace Simtabi\Pheg\Phegs\Helpers\Chips\Traits;


trait SQLToolsTrait
{

    public static function readSQLStateMessage($message){

        // https://gist.github.com/IlanFrumer/7888809

        // pattern one lookup
        $patternOne    = "/^SQLSTATE\[\w+\]:[^:]+:\s*(\d*)\s*(.*)/";
        $matchOneCount = preg_match($patternOne, $message, $matchOne);

        // pattern two lookup
        $patternTwo    = "/SQLSTATE\[(\w+)\] \[(\w+)\] (.*)/";
        $matchTwoCount = preg_match($patternTwo, $message, $matchTwo);

        // default message variables
        $pdoMessage = null;
        $sqlState   = null;
        $code       = null;

        // if match one has something
        if ($matchOneCount) {
            $pdoMessage     = $matchOne[2];
            $sqlState       = $matchOne[0];
            $code           = $matchOne[1];
        }else{
            if ($matchTwoCount) {
                $pdoMessage = $matchTwo[2];
                $sqlState   = $matchTwo[0];
                $code       = $matchTwo[1];
            }
        }

        return TypeConverter::toObject(array(
            'message' => $pdoMessage,
            'state'   => $sqlState,
            'code'    => !empty($code) ? $code : 0,
        ));
    }

}