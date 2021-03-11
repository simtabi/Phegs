<?php

namespace Simtabi\Pheg\Phegs\Ensue\Traits;

use Carbon\Carbon;

trait DateTimeValidatorsTrait
{

    /**
     * The Carbon time instance.
     *
     * @var Carbon
     */
    protected $carbonTime;

    /**
     * The difference in seconds between the Carbon time and current time.
     *
     * @var int
     */
    protected $diffInSeconds;

    /**
     * The timezone that will be used.
     *
     * @var string
     */
    protected $timezone;

    /**
     * Create a new Parser instance.
     *
     * @param Carbon $carbon
     * @param string $timezone
     * @return void
     */
    private function __construct(Carbon $carbon, $timezone = null)
    {
        $this->carbonTime = $carbon;
        $this->timezone   = $timezone;
        $this->setDifference($carbon);
    }



    /**
     * Determine if the difference is more than a minute.
     *
     * @return bool
     */
    protected function isMoreThanAMinute()
    {
        return $this->carbonTime->diffInSeconds >= 60;
    }
    
    /**
     * Determine if the difference is more than a hour.
     *
     * @return bool
     */
    protected function isMoreThanAHour()
    {
        return $this->diffInSeconds >= 3600;
    }
    
    /**
     * Determine if the difference is more than a day.
     *
     * @return bool
     */
    protected function isMoreThanADay()
    {
        return $this->diffInSeconds >= 86400;
    }
    
    /**
     * Determine if the difference is more than a week.
     *
     * @return bool
     */
    protected function isMoreThanAWeek()
    {
        return $this->diffInSeconds >= 604800;
    }
    
    /**
     * Determine if the Carbon time's year is different with current year.
     *
     * @return bool
     */
    protected function isTheYearDifferent()
    {
        return $this->carbonTime->year !== Carbon::now($this->timezone)->year;
    }

    public function isDateFormat($value = null, $format = 'MM/DD/YYYY')
    {
        // Datetime validation from http://www.phpro.org/examples/Validate-Date-Using-PHP.html
        if (empty($value)) {
            return false;
        }

        switch($format) {
            case 'YYYY/MM/DD':
            case 'YYYY-MM-DD':
                list($y, $m, $d) = preg_split('/[-\.\/ ]/', $value);
                break;

            case 'YYYY/DD/MM':
            case 'YYYY-DD-MM':
                list($y, $d, $m) = preg_split('/[-\.\/ ]/', $value);
                break;

            case 'DD-MM-YYYY':
            case 'DD/MM/YYYY':
                list($d, $m, $y) = preg_split('/[-\.\/ ]/', $value);
                break;

            case 'MM-DD-YYYY':
            case 'MM/DD/YYYY':
                list($m, $d, $y) = preg_split('/[-\.\/ ]/', $value);
                break;

            case 'YYYYMMDD':
                $y = substr($value, 0, 4);
                $m = substr($value, 4, 2);
                $d = substr($value, 6, 2);
                break;

            case 'YYYYDDMM':
                $y = substr($value, 0, 4);
                $d = substr($value, 4, 2);
                $m = substr($value, 6, 2);
                break;

            default:
                return false;
                break;
        }
        if (checkdate($m, $d, $y)){
            return true;
        }

        return false;
    }

    public function isTimestamp($timestamp)
    {
        $check = (is_int($timestamp) OR is_float($timestamp))
            ? $timestamp
            : (string) (int) $timestamp;
        $status =  ($check === $timestamp)
        AND ( (int) $timestamp <=  PHP_INT_MAX)
        AND ( (int) $timestamp >= ~PHP_INT_MAX);

        if ($status){
            return true;
        }
        return false;
    }

    /**
     * @param $timestamp
     * @return bool
     */
    function isTimestampAlt($timestamp)
    {

        if(strtotime(date('d-m-Y H:i:s',$timestamp)) === (int)$timestamp) {
            return true;
        } else return false;

    }

    public function isZeroDate($value){
        // http://stackoverflow.com/questions/8853956/check-if-date-is-equal-to-0000-00-00-000000
        if(empty($value) || (is_null($value))){
            $value = '0000-00-00';
        }
        switch (trim($value))
        {
            case '0000-00-00 00:00:00' : $status = true; break;
            case '0000-00-00'          : $status = true; break;
            default                    : $status = false; break;
        }

        if ($status){
            return true;
        }
        return false;
    }

    public function isDateTime($value, $format = 'Y-m-d H:i:s'){
        if ($this->isDate($value, $format)){
            return true;
        }
        return false;
    }

    public function isDate($value, $format = 'Y-m-d') {
        if(!empty($format)){
            if($this->respect->date($format)->validate($value)){
                return true;
            }
        }else{
            if($this->respect->date()->validate($value)){
                return true;
            }
        }
        return false;
    }

    public function isYear($value) {
        if($this->respect->date('Y')->validate($value)){
            return true;
        }
        return false;
    }

    public static function isTimezone($value) {
        if(true === in_array($value, timezone_identifiers_list())){
            return true;
        }
        return false;
    }

    public static function isValidTimeStamp($timestamp)
    {

        if(strtotime(date('d-m-Y H:i:s', $timestamp)) === (int)$timestamp) {
            return true;
        } else return false;

    }
}
