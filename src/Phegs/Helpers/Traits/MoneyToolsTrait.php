<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

trait MoneyToolsTrait
{

    public static function formatPrice($amount, $currency_iso = 'KES', $locale_iso = 'en_GB'){

        $amount   = floatval($amount);
        $currency = $currency_iso;

        $fmt  = new \NumberFormatter($locale_iso,  \NumberFormatter::CURRENCY);
        $fmt->setTextAttribute(\NumberFormatter::CURRENCY_CODE, 'EUR');
        $fmt->setAttribute(\NumberFormatter::FRACTION_DIGITS, 0);
        return $fmt->formatCurrency($amount, $currency) . PHP_EOL;
    }

}