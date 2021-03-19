<?php

namespace Simtabi\Pheg\Phegs\Countries\Traits;

trait LanguagesTrait
{

    protected function getLanguagesData($request = null){
        $data = $this->getCountriesData('languages');
        return isset($data[$request]) && is_array($data) ? $data[$request] : $data;
    }

    public function getAllLanguages($request = null){
        $data = [];
        foreach($this->getLanguagesData() as $key => $item) {
            $data[strtolower(trim($key))] = $item['native'];
        }
        return !empty($request) && isset($data[$request]) ? $data[$request] :$data;
    }

}
