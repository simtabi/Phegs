<?php

use Simtabi\Pheg\Pheg;

if (!function_exists('get_form_timezones')) {
    function get_form_timezones(): array
    {
        return Pheg::getTimezones()['formed'];
    }
}


if (!function_exists('get_form_spd_date_formats')) {
    function get_form_spd_date_formats($request = 'short')
    {
        $data = get_spd_datetime_formats("date.$request");
        $out  = [];
        if (!empty($data)) {
            foreach ($data as $k => $datum){
                $out[$k] = $datum->human;
            }
            return $out;
        }
        return $out;
    }
}

if (!function_exists('get_form_spd_datetime_formats')) {
    function get_form_spd_datetime_formats($request = 'short')
    {
        $data = get_spd_datetime_formats("datetime.$request");
        $out  = [];
        if (!empty($data)) {
            foreach ($data as $k => $datum){
                $out[$k] = $datum->human;
            }
            return $out;
        }
        return $out;
    }
}

if (!function_exists('get_form_spd_time_formats')) {
    function get_form_spd_time_formats($request = 'short')
    {
        $data = get_spd_datetime_formats("time.$request");
        $out  = [];
        if (!empty($data)) {
            foreach ($data as $k => $datum){
                $out[$k] = $datum->human;
            }
            return $out;
        }
        return $out;
    }
}

if (!function_exists('get_form_spd_js_formats')) {
    function get_form_spd_js_formats($request = 'date')
    {
        $data = get_spd_datetime_formats("js.$request");
        $out  = [];
        if (!empty($data)) {
            foreach ($data as $k => $datum){
                $out[$k] = $datum->human;
            }
            return $out;
        }
        return $out;
    }
}

