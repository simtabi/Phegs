<?php

// Directory Separator
if (!defined('DS')) {
    switch(PHP_OS){
        case "Linux"   : define("DS", DIRECTORY_SEPARATOR); break;
        case "Windows" : define("DS", DIRECTORY_SEPARATOR); break;
        case "WINNT"   : define("DS", DIRECTORY_SEPARATOR); break;
        default        : define("DS", '/'); break;
    }
}
