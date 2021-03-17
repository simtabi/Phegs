<?php

use Simtabi\Pheg\Pheg;

if (!function_exists('get_form_timezones')) {
    function get_form_timezones(): array
    {
        return Pheg::getTimezones()['formed'];
    }
}