<?php

namespace Simtabi\Pheg\Phegs\Helpers\Helpers\Traits;

trait CopyrightTools
{

    function buildCopyrightYear($startYear = null){
        if(empty(intval($startYear))){
            $startYear = date('Y');
        }else
        {
            if(intval($startYear) == date('Y')){
                return intval($startYear);
            }
            if(intval($startYear) < date('Y')){
                return intval($startYear) . ' — ' . date('Y');
            }
            if(intval($startYear) > date('Y')){
                return date('Y');
            }
        }
        return  $startYear;
    }

}