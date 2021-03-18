<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';


$t = \Simtabi\Pheg\Phegs\Countries\Countries::getInstance();

dd($t->getAllLanguages());
dd($t->setAsObject(false)->setCurrencyCode('kes')->getCurrenciesList());
$t->getAll();