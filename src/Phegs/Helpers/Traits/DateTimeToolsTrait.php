<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use DateTimeZone;
use Moment\Moment;
use DateTime;
use Carbon\Carbon;
use Simtabi\Pheg\Base\BaseTools;
use Simtabi\Pheg\Base\Exception\PhegException;
use Simtabi\Pheg\Pheg;
use Simtabi\Pheg\Phegs\DataTools\TypeConverter;
use Simtabi\Pheg\Phegs\Ensue\Ensue;

trait DateTimeToolsTrait
{

    public function getDateDifference($end, $start, $endTimeZone = 'Africa/Nairobi', $startTimeZone = 'Africa/Nairobi'){
        $moment = new Moment($end, $endTimeZone);
        return $moment->from($start, $startTimeZone);
    }

    public function getTimezones(): array
    {

        $lastRegion = null;
        $timezones  = \DateTimeZone::listIdentifiers();
        $grouped    = [];
        $formed     = [];
        $flat       = [];

        $formatName = function ($name) {
            $name = str_replace('/', '_', $name);
            $name = str_replace('-', '_', $name);
            return strtolower(trim($name));
        };

        if (is_array($timezones)) {
            foreach ($timezones as $key => $timezone) {

                $dateTimeZone = new DateTimeZone($timezone);
                $expTimezone  = explode('/', $timezone);

                // Lets sample the time there right now
                $currentTime  = new DateTime(null, $dateTimeZone);
                if (isset($expTimezone[0])) {
                    if ($expTimezone[0] !== $lastRegion) {
                        $lastRegion = $expTimezone[0];
                    }
                    $getOffset = $this->formatDisplayOffset($dateTimeZone->getOffset(new \DateTime()));
                    $grouped[$formatName($lastRegion)][$formatName($timezone)] = [
                        'timezone' => $timezone,
                        'offset'   => $getOffset,
                        'time'     => [
                            'military' => $currentTime->format('H:i'),
                            // Americans can't handle 24hrs, so we give them am pm time
                            'am_pm'    => $currentTime->format('H') > 12 ? $currentTime->format('g:i a') : null,
                        ],
                    ];
                    $formed[$lastRegion][$formatName($timezone)] = $timezone ." (". $getOffset . ")";
                    $flat[$formatName($timezone)]   = $timezone ." (". $getOffset . ")";
                    unset($getOffset);
                }
                unset($dateTimeZone, $expTimezone);
            }
            unset($key, $timezone);
        }

        unset($lastRegion, $timezones);

        return [
            'grouped' => $grouped,
            'formed'  => $formed,
            'flat'    => $flat,
        ];
    }

    public function formatDisplayOffset($offset, $showUTC = true): ?string
    {
        $initial = new DateTime();
        $initial->setTimestamp(abs($offset));
        $hoursFormatted = $initial->format('H:i');

        return ($showUTC === true ? "UTC " : null) . ($offset >= 0 ? '+':'-') . $hoursFormatted;
    }



    public function formatToSeconds($seconds, $timeFormat = 'hour', $toTime = false){

        $timeFormat = strtolower($timeFormat);
        $str        = rtrim($timeFormat, "s");

        // convert the given time based on the active/set time format
        switch ($timeFormat) {

            // let's calculate seconds, we might need them
            case 'h'     :
            case 'hour'  :
            case 'hours' : $inSeconds = ($seconds * 3600);   break;

            // let's calculate seconds, we might need them
            case 'm'       :
            case 'minute'  :
            case 'minutes' : $inSeconds = ($seconds * 60);   break;

            // let's calculate seconds, we might need them
            case 's'       :
            case 'second'  :
            case 'seconds' : $inSeconds = $seconds;   break;

            // nothing in the criteria? set a default value
            default : $inSeconds = $seconds;            break;
        }

        // add plurality if given time is greater than 1
        $l = "s";
        if($inSeconds > 1){
            $str = "$str".$l;
        }

        // get time format after pluralization
        $str = ucwords(strtolower($str));

        // if convert seconds to time
        if($toTime){
            $converted = $this->secondsToTime($inSeconds)->data->string;
        }else{
            $converted = $inSeconds;
        }

        // return values as array
        return [
            'converted' => $converted,
            'raw_time'  => $inSeconds,
            'seconds'   => $inSeconds,
            'format'    => $str,
        ];

    }

    public function formattedSeconds($seconds, $format = FALSE){

        if($format){

            // return formatted values from array
            $data = $this->formatToSeconds($seconds);
            return $data['raw_time'] . $data['format'];

        }else{
            return $seconds;
        }

    }


    public function secondsToTime($seconds){

        // output variables
        $status = FALSE;
        $errors = NULL;
        $data   = NULL;
        $str    = NULL;

        try{

            // validate time
            if(TRUE !== Ensue::isInteger($seconds) && TRUE !== Ensue::isNumeric($seconds)){
                throw new PhegException(BaseTools::_e('TIME_VALIDATION_INVALID_SECONDS'));
            }

            // validate time
            if(TRUE !== Ensue::isInteger($seconds) && TRUE !== Ensue::isNumeric($seconds)){
                throw new PhegException(BaseTools::_e('TIME_VALIDATION_INVALID_SECONDS'));
            }

            // calculate and set time variables
            $then  = new DateTime(date('Y-m-d H:i:s', $seconds));
            $now   = new DateTime(date('Y-m-d H:i:s', time()));
            $diff  = $then->diff($now);
            $data  = array(
                'years'   => $diff->y,
                'months'  => $diff->m,
                'days'    => $diff->d,
                'hours'   => $diff->h,
                'minutes' => $diff->i,
                'seconds' => $diff->s
            );

            // set data and status
            $Y   = $data["years"];
            $M   = $data["months"];
            $d   = $data["days"];
            $h   = $data["hours"];
            $m   = $data["minutes"];
            $s   = $data["seconds"];
            $str = "$Y:$M:$d:$h:$m:$s";

        }catch(PhegException $e){
            $errors = $e->getMessage();
        }

        return TypeConverter::toObject(array(
            'status' => $status,
            'errors' => Pheg::filterArray($errors),
            'data'   => [
                'string' => $str,
                'array'  => $data,
            ],
        ));

    }

    public function addToTime($time, $format = 'minute', $default_time = NULL, $date_format = 'Y-m-d H:i:s'){

        // output variables
        $status = FALSE;
        $errors = NULL;
        $data   = NULL;

        try{

            if($format === ('hour' || 'hours')){
                $formatted_time = $time * 3600; //1hr = 3600 seconds
            }elseif($format === ('minute' || 'minutes')){
                $formatted_time = $time * 60;   // 1min = 60 seconds
            }else{
                $formatted_time = $time * 60;   // 1min = 60 seconds
            }

            if(empty($default_time)){
                $current_time = $this->getCurrentTime();
            }else{
                $current_time = $default_time;
            }

            if($time > 0){
                $new_date = (strtotime($current_time) + $formatted_time);
                $status   = TRUE;
                $data     = date ( $date_format , $new_date );
            }else{
                throw new PhegException(BaseTools::_e('time_addition_error'));
            }

        }catch(PhegException $e){
            $errors = $e->getMessage();
        }

        return TypeConverter::toObject(array(
            'status' => $status,
            'errors' => Pheg::filterArray($errors),
            'data'   => $data,
        ));

    }


    public function simpleTime($dateTime, $outputFormat = 'M j, Y g:i a', $defaultFormat = 'Y-m-d H:i:s', $timezone = "Africa/Nairobi"){

        // set default fallback format
        $defaultFormat = empty($defaultFormat) ? 'Y-m-d H:i:s' : $defaultFormat;

        // init date object
        $dateObj = new DateTime();
        $dateObj->setTimezone(new DateTimeZone($timezone));
        $date = null;

        // if is timestamp
        if (Validators::isTimestamp($dateTime)){
            $date = $dateObj->setTimestamp($dateTime)->format($defaultFormat);
        }else{
            if (Validators::isDate($dateTime, $defaultFormat) OR Validators::isDateTime($dateTime, $defaultFormat)){
                $date = $dateTime;
            }
        }

        // get date format
        if (!empty($date)){
            $fromFormat = DateTime::createFromFormat($defaultFormat, $date);
            if($fromFormat && $fromFormat->format($defaultFormat) == $date){
                $initDate = new DateTime($date);
                return $initDate->format($outputFormat);
            }
        }

        return false;
    }

    public function humanizeSeconds($seconds, $getIn = array(), $char = 's', $conjunction = 'and') {

        // set variables
        $secondsInYear 	 = 31536000;//365 days
        $secondsInMonth  = 2592000;//30 days
        $secondsInWeek 	 = 604800;//7 days
        $secondsInDay 	 = 86400;//24 hours
        $secondsInHour   = 3600;//60 minutes
        $secondsInMinute = 60;//60 seconds
        $secondsInSecond = 1;//1 second

        if(!is_array($getIn) || empty($getIn)){
            // Will auto load this array if getIn is empty
            $getIn = array('year','month','week','day','hour','minute','second');
        }

        // validate char
        if (empty($char) || (!is_string($char))){
            $char = 's';
        }

        // data variables
        $lastInArray = end($getIn);
        $error = false;
        $secs  = 0;
        $data  = array();
        $text  = "";
        $out   = array();

        // do the magic
        foreach ($getIn as $type) {

            $type = strtolower($type);
            switch ($type) {
                case 'year'  : $secs = $secondsInYear;   break;
                case 'month' : $secs = $secondsInMonth;  break;
                case 'week'  : $secs = $secondsInWeek;   break;
                case 'day'   : $secs = $secondsInDay;    break;
                case 'hour'  : $secs = $secondsInHour;   break;
                case 'minute': $secs = $secondsInMinute; break;
                case 'second': $secs = $secondsInSecond; break;
                default      : $error = true;            break;
            }

            // if something went wrong
            if (false === $error)
            {
                //This is really the core of the code, the rest is just handling
                $data[$type] = floor($seconds/$secs);
                $seconds       = $seconds - ($data[$type]*$secs);

                // assign values
                $int = number_format($data[$type]);
                $str = $int.' '.$type.($int >= 2 ? $char : ($int == 0 ? $char : ''));

                // push to array
                $out['set'][$type]['int'] = $int;
                $out['set'][$type]['str'] = $str;

                // generate long string
                $text .= $str;

                if(($type != $lastInArray) && ($seconds != 0)){
                    $text .= '.';
                }

            }

        }

        // construct textual format and append a conjunction before the last item
        $out['text'] = Helpers::naturalLanguageJoin(explode('.',$text), $conjunction);

        return TypeConverter::toObject($out);
    }

    public function dateTimeDifference($endTime, $startTime, $twoView = false){
        $fmt = 'Y-m-d H:i:s';
        $str = $this->simpleTime($startTime, $fmt);
        $now = new DateTime($str);
        $end = $this->simpleTime($endTime, $fmt);
        $ref = new DateTime($end);
        $diff = $now->diff($ref);

        // build formats
        if ($twoView){
            $_y  = $diff->format("%Y");
            $y_s = $diff->format("%Y years");

            $_mn  = $diff->format("%a");
            $mn_s = $diff->format("%a months");

            $_d  = $diff->format("%D");
            $d_s = $diff->format("%D days");

            $_h  = $diff->format("%H");
            $h_s = $diff->format("%H hours");

            $_m  = $diff->format("%I");
            $m_s = $diff->format("%I minutes");

            $_s  = $diff->format("%S");
            $s_s = $diff->format("%S seconds");


            $string = $diff->format("%Y years %a months %D days %H hours %I minutes %S seconds");
        }
        else{
            $_y  = $diff->format("%y");
            $y_s = $diff->format("%y years");

            $_mn  = $diff->format("%a");
            $mn_s = $diff->format("%a months");

            $_d  = $diff->format("%y");
            $d_s = $diff->format("%y days");

            $_h  = $diff->format("%i");
            $h_s = $diff->format("%i hours");

            $_m  = $diff->format("%i");
            $m_s = $diff->format("%i minutes");

            $_s  = $diff->format("%s");
            $s_s = $diff->format("%s seconds");

            $string = $diff->format("%y years %a months %d days %h hours %i minutes %s seconds");
        }


        return TypeConverter::toObject(array(
            'years' => array(
                'digits' => $_y,
                'string' => $y_s,
            ),
            'months' => array(
                'digits' => $_mn,
                'string' => $mn_s,
            ),
            'days' => array(
                'digits' => $_d,
                'string' => $d_s,
            ),
            'hours' => array(
                'digits' => $_h,
                'string' => $h_s,
            ),
            'minutes' => array(
                'digits' => $_m,
                'string' => $m_s,
            ),
            'seconds' => array(
                'digits' => $_s,
                'string' => $s_s,
            ),

            'string' => $string,
        ));
    }


    public function yearsToSeconds($value = '1'){
        return ceil($value * 31536000);
    }

    public function monthsToSeconds($value = '1'){
        return ceil($value * 2592000);
    }

    public function weeksToSeconds($value = '1'){
        return ceil($value * 604800);
    }

    public function daysToSeconds($value = '1'){
        return $value * (24*(60*60));
    }

    public function hoursToSeconds($value){
        return $value * (60*60);
    }

    public function minutesToSeconds($value){
        return $value *60;
    }





    public function yearsInRangeByOrder($startYear = 1900, $endYear = NULL, $sort = false){

        if(empty($endYear)){
            $currentYear = date('Y');
        }else{
            $currentYear = $endYear;
        }

        // range of years
        $years = range($startYear, $currentYear);

        // if sort
        if($sort){
            natsort($years);
            $years = array_reverse($years, true);
        }
        return $years;
    }

    public function yearsInRange($endYear = '', $startYear = 1900, $sort = true){

        // Year to start available options at
        if(empty($startYear)){
            $startYear = 1900;
        }
        if(TRUE !== Validators::isYear($startYear)){
            $startYear = 1900;
        }

        // Set your latest year you want in the range, in this case we use PHP to
        # just set it to the current year.
        if(empty($endYear)){
            $endYear = date('Y');
        }
        if(TRUE !== Validators::isYear($endYear)){
            $endYear = date('Y');
        }

        // build year ranges
        $years = range( $endYear, $startYear );
        $out = array();
        for($i = 0; $i < count($years); $i++){
            $out[$years[$i]] = $years[$i];
        }

        // if sort
        if($sort){
            natsort($out);
            $out = array_reverse($out, true);
        }
        return $out;
    }


    public function timeBasedGreetings($timezone = 'Africa/Nairobi'){

        // output variables
        $status      = false;
        $errors      = null;
        $currentTime = null;
        $greetings   = null;
        $format      = '24H';

        try{

            // validate timezone
            if(empty($timezone)){
                throw new PhegException(BaseTools::_e('TIMEZONE_IS_REQUIRED'));
            }else{
                $validateTimezone = Ensue::isTimezone($timezone);
                if(TRUE !== $validateTimezone){
                    throw new PhegException($validateTimezone);
                }
            }

            // get current time in 24hrs
            $objDateTime = new DateTime();
            $objDateTime->setTimezone(new DateTimeZone($timezone));
            $currentTime = $objDateTime->format('G');

            // filter greeting
            switch ($currentTime){
                case ($currentTime >= 0 && $currentTime <= 11) :
                    $greetings = BaseTools::_e('TIME_WELCOME_GREETING_GOOD_MORNING') ; break;
                case ($currentTime >= 12 && $currentTime <=17 ) :
                    $greetings = BaseTools::_e('TIME_WELCOME_GREETING_GOOD_AFTERNOON') ; break;
                case ($currentTime >= 18 && $currentTime <=23) :
                    $greetings = BaseTools::_e('TIME_WELCOME_GREETING_GOOD_EVENING') ; break;
                default : $greetings = BaseTools::_e('TIME_WELCOME_GREETING'); break;
            }

            // set status
            $status = TRUE;

        }catch (PhegException $e){
            $errors = $e->getMessage();
        }

        $errors = Pheg::filterArray($errors);
        return    TypeConverter::toObject(array(
            'status' => $status,
            'errors' => $errors,
            'data'   => array(
                'debug'     => array(
                    'timezone' => empty($timezone) ? NULL : $timezone,
                    'format'   => $format,
                    'time'     => $currentTime,
                ),
                'greetings' => $greetings,
            ),
        ));
    }


    public function dateOrdinalSuffix(){
        echo date('M j<\s\up>S</\s\up> Y'); // < PHP 5.2.2
        echo date('M j<\s\up>S</\s\up> Y'); // >= PHP 5.2.2
    }


    public function isDateGreater($date, $defaultDate = ''){

        $date = strtotime($date);
        if(empty($defaultDate)){
            $default = strtotime($this->getCurrentTime());
        }else{
            $default = strtotime($defaultDate);
        }

        if($date > $default) {
            echo '<span class="status expired">Expired</span>';
            return TRUE;
        }

        return false;
    }

    public function evaluateCertainTime($dateTimeStr, $operand = '>', $datetimeFormat = "Y-m-d H:i:s")
    {
        $timeNow = new DateTime($this->getCurrentTime($timestamp = FALSE, $datetimeFormat));
        $timeAgo = new DateTime($dateTimeStr);

        switch (strtolower($operand))
        {
            case '>'   : $status = ($timeAgo > $timeNow)  ?  TRUE : FALSE; break;
            case '>='  : $status = ($timeAgo >= $timeNow) ?  TRUE : FALSE; break;
            case '<'   : $status = ($timeAgo < $timeNow)  ?  TRUE : FALSE; break;
            case '<='  : $status = ($timeAgo <= $timeNow) ?  TRUE : FALSE; break;
            default :
                $status          = BaseTools::_e('operand not set or is invalid');
        }
        return $status;
    }

    public function timeAgo($time, $fromTimestamp = false, $tense = "ago"){
        if(empty($time)) return "n/a";
        $time       = true === $fromTimestamp ? $time : strtotime($time);
        $periods    = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths    = array("60","60","24","7","4.35","12","10");
        $now        = time();
        $difference = $now - $time;
        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }
        $difference = round($difference);
        if($difference != 1) {
            $periods[$j].= "s";
        }
        return "$difference $periods[$j] $tense ";
    }


    public function formatTime(Carbon $timestamp, $format = 'j M Y H:i'): ?string
    {
        $first = Carbon::create(0000, 0, 0, 00, 00, 00);
        if ($timestamp->lte($first)) {
            return null;
        }

        return $timestamp->format($format);
    }

    public function parseDateFromDatabase($time, $format = 'Y-m-d'): ?string
    {
        return $this->formatTime(Carbon::parse($time), $format);
    }

    function getFormattedTime($baseTime = null, $format = 'M jS, Y H:i T', $timezone = 'America/New_York'){
        try {

            // if we are given a timestamp
            if ($this->isValidTimeStamp($baseTime)){
                $timeNow  = new DateTime();
                $timeNow->setTimestamp($baseTime);
            }else{
                $timeNow  = new DateTime($baseTime);
            }

            // set timezone
            $timezone = new DateTimeZone($timezone);
            $timeNow->setTimezone($timezone);

            if ($this->isValidTimeStamp($baseTime)){
                $timeNow->setTimestamp($baseTime);
            }

            return $timeNow->format($format);
        }catch (PhegException $exception){
            echo "Something is wrong with your time" . $exception->getMessage();
        }
        return false;
    }

    public function createCarbonDateTimeObj(string $dateTimeString): Carbon
    {
        return Carbon::parse($dateTimeString);
    }

    public function getTimeAgoFromString(string $dateTimeString, $other = null, $syntax = null, $short = false, $parts = 1, $options = null): ?string
    {
        return $this->createCarbonDateTimeObj($dateTimeString)->diffForHumans($other, $syntax, $short, $parts, $options);
    }

    public function parseSqlDateTimeFormat($dateTime, $forSql = true, $readFormat = "Y-m-d H:i:s", $storeFormat = "Y-m-d"){
        $dateTime = str_replace( "/", "-", trim($dateTime));
        $dateTime = str_replace( ",", "-", $dateTime);
        $dateTime = str_replace( ".", "-", $dateTime);
        if ($forSql) {
            return date((!empty($storeFormat) ? $storeFormat : "Y-m-d"), strtotime( $dateTime ) );
        }
        return date((!empty($readFormat) ? $readFormat : "Y-m-d H:i:s"), strtotime($dateTime));
    }
    
}
