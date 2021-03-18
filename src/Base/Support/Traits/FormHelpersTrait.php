<?php

namespace Simtabi\Pheg\Base\Support\Traits;

trait FormHelpersTrait
{
    
    public function getFormReady_Timezones(): array
    {
        return $this->pheg->getTimezones()['formed'];
    }

    public function getFormReady_DatetimeFormats($type = 'long')
    {
        $data = $this->pheg->getFromArray('datetime.'. trim($type), $this->getDatetimeFormats($default = null));
        $out  = [];
        if (!empty($data)) {
            foreach ($data as $k => $datum){
                $out[$k] = $datum['human'];
            }
            return $out;
        }
        return $out;
    }

    public function getFormReady_DateFormats($type = 'short')
    {
        $data = $this->pheg->getFromArray('date.'. trim($type), $this->getDatetimeFormats($default = null));
        $out  = [];
        if (!empty($data)) {
            foreach ($data as $k => $datum){
                $out[$k] = $datum['human'];
            }
            return $out;
        }
        return $out;
    }

    public function getFormReady_TimeFormats($type = 'short')
    {
        $data = $this->pheg->getFromArray('time.'. trim($type), $this->getDatetimeFormats($default = null));
        $out  = [];
        if (!empty($data)) {
            foreach ($data as $k => $datum){
                $out[$k] = $datum['human'];
            }
            return $out;
        }
        return $out;
    }

    public function getFormReady_JsFormats($type = 'date')
    {
        $data = $this->pheg->getFromArray('js.'. trim($type), $this->getDatetimeFormats($default = null));
        $out  = [];
        if (!empty($data)) {
            foreach ($data as $k => $datum){
                $out[$k] = $datum['human'];
            }
            return $out;
        }
        return $out;
    }


}
