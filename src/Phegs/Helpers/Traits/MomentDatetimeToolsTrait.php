<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use DateTimeZone;
use Moment\Moment;
use DateTime;
use Carbon\Carbon;
use Simtabi\Pheg\Base\BasePhegTools;
use Simtabi\Pheg\Base\Exceptions\PhegException;
use Simtabi\Pheg\Pheg;
use Simtabi\Pheg\Phegs\DataTools\TypeConverter;
use Simtabi\Pheg\Phegs\Ensue\Ensue;

trait MomentDatetimeToolsTrait
{

    private
        $date,
        $time,
        $timeFormat,
        $dateFormat,
        $dateTime,
        $dateTimeFormat;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeFormat()
    {
        return $this->timeFormat;
    }

    /**
     * @param mixed $timeFormat
     * @return $this
     */
    public function setTimeFormat($timeFormat)
    {
        $this->timeFormat = $timeFormat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateFormat()
    {
        return $this->dateFormat;
    }

    /**
     * @param mixed $dateFormat
     * @return $this
     */
    public function setDateFormat($dateFormat)
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param mixed $dateTime
     * @return $this
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateTimeFormat()
    {
        return $this->dateTimeFormat;
    }

    /**
     * @param mixed $dateTimeFormat
     * @return $this
     */
    public function setDateTimeFormat($dateTimeFormat)
    {
        $this->dateTimeFormat = $dateTimeFormat;
        return $this;
    }


    public function getCurrentTime($getTimestamp = false, $datetimeFormat = "Y-m-d H:i:s", $datetime = null, $timezone = "Africa/Nairobi") {

        $objDateTime = new DateTime();
        $objDateTime->setTimezone(new DateTimeZone($timezone));

        if (!empty($datetime)) {
            $floatUnixTime = (is_string($datetime)) ? strtotime($datetime) : $datetime;
            if (method_exists($objDateTime, "setTimestamp")) {
                $objDateTime->setTimestamp($floatUnixTime);
            }
            else {
                $arrDate = getdate($floatUnixTime);
                $objDateTime->setDate($arrDate['year'],  $arrDate['mon'],     $arrDate['day']);
                $objDateTime->setTime($arrDate['hours'], $arrDate['minutes'], $arrDate['seconds']);
            }
        }

        return $getTimestamp ? strtotime($objDateTime->format($datetimeFormat)): $objDateTime->format($datetimeFormat);

    }


}