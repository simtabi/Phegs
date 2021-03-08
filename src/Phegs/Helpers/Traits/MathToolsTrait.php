<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use Simtabi\Pheg\Phegs\Validation\Ensue;

trait MathToolsTrait
{

    public static function zeroFillNumber ($num, $zerofill = '1'){
        return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
    }


    // generates a random number
    public static function randomizeNumber($minimum, $maximum)
    {
        return mt_rand($minimum, $maximum);
    }

    public static function numberBreakdown($number, $getUnsigned = false)
    {
        $negative = 1;
        if ($number < 0)
        {
            $negative = -1;
            $number  *= -1;
        }

        // if get unsigned
        if ($getUnsigned){
            $data = array(
                'whole' => floor($number),
                'float' => ($number - floor($number))
            );
        }
        else{
            $data = array(
                'whole' => floor($number) * $negative,
                'float' => ($number - floor($number)) * $negative,
            );
        }

        return TypeConverter::toObject($data);
    }


    public static function convertToPercentage($number){
        return round((float) $number * 100 );
    }


    public static function percentageBetween2Numbers($number, $total, $precision = 2){

        //  variables
        $number = (float) $number;
        $total  = (float) $total;

        // if number is greater than total
        if ($number > $total){
            return false;
        }

        // calculate
        $out = $number / ($total / 100);
        if (false === $precision){
            $out = round($out,2);
        }
        elseif ($precision > 0){
            $out = round($out,$precision);
        }
        else{
            $out = round($out);
        }

        return $out;
    }

    public static function addOrdinalNumberSuffix($number) {

        // output variables
        $status = false;
        $errors = null;
        $ord    = null;

        try{

            if(!Ensue::isInteger($number)){
                throw new CatchThis(Ensue::getError());
            }else{
                if (!in_array(($number % 100), array(11,12,13))){
                    switch ($number % 10) {
                        case    1 : $ord = 'st'; break;
                        case    2 : $ord = 'nd'; break;
                        case    3 : $ord = 'rd'; break;
                        default;    $ord = 'th'; break;
                    }
                }
                $status = true;
            }

        }catch (CatchThis $e){
            $errors = $e->getMessage();
        }
        return TypeConverter::toObject(array(
            'status' => $status,
            'errors' => self::filterArray($errors),
            'data'   => array(
                'string'  => true === $status ? $number . $ord : null,
                'ordinal' => $ord,
                'number'  => $number,
            )
        ));
    }

    public static function breakdownNumber($number, $getUnsigned = false)
    {
        $negative = 1;
        if ($number < 0)
        {
            $negative = -1;
            $number  *= -1;
        }

        // if get unsigned
        if ($getUnsigned){
            $data = array(
                'whole' => floor($number),
                'float' => ($number - floor($number))
            );
        }
        else{
            $data = array(
                'whole' => floor($number) * $negative,
                'float' => ($number - floor($number)) * $negative,
            );
        }

        return TypeConverter::toObject($data);
    }

    function numberFormat($number, $decimals = 0){
        return number_format($number, $decimals);
    }

    public static function generatePercentageBetween2Numbers($number, $total, $precision = 2){

        //  variables
        $number = (float) $number;
        $total  = (float) $total;

        // if number is greater than total
        if ($number > $total){
            return false;
        }

        // calculate
        $out = $number / ($total / 100);
        if (false === $precision){
            $out = round($out,2);
        }
        elseif ($precision > 0){
            $out = round($out,$precision);
        }
        else{
            $out = round($out);
        }

        return $out;
    }

    public static function generateNumbersInRange($end, $start = 0, $step = 10){
        // http://php.net/manual/en/function.range.php
        $ranges = [];
        foreach ( range($start, $end, $step) as $item ) {
            $ranges[] = $item;
        }
        return $ranges;
    }


    public static function generateNumber($length = '12', $power = null){
        $output  = null;
        $pattern = "0123456789";

        if($power !== null){
            srand((double)microtime()*1000000*$power);
        }else{
            srand((double)microtime()*1000000);
        }

        for($i = 0; $i <$length; $i++) {
            $output.= $pattern[rand()%strlen($pattern)];
        }
        return $output;
    }

    // generates a random number
    public static function generateRandomizeNumber($minimum, $maximum)
    {
        return mt_rand($minimum, $maximum);
    }
}