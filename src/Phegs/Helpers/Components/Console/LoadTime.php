<?php

namespace Simtabi\Pheg\Phegs\Helpers\Components\Console;

class LoadTime
{
    private $start  = 0;
    private $end    = 0;
    private $time   = 0;


    public function __construct(){
        $this->start= microtime(true);
    }

    public function __destruct(){
        $this->end  = microtime(true);
        $this->time = $this->end - $this->start;
        echo "Loaded in $this->time seconds\n";
    }

}
