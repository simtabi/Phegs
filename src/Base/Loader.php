<?php

namespace Simtabi\Pheg\Base;

class Loader
{

    public array $data = [];
    public $fileNames  = null;

    public function __construct(){
        $this->reset();
    }

    /**
     * @param mixed $data
     * @return Loader
     */
    protected function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array|mixed
     */
    public function getData(): array
    {
      return $this->data;
    }

    /**
     * @param string|array $fileNames
     * @return Loader
     */
    public function setFileNames($fileNames): self
    {
        if (!is_array($fileNames)) {
            $fileNames   = [$fileNames];
        }
        $this->fileNames = $fileNames;
        return $this;
    }

    /**
     * @return array|string
     */
    public function getFileNames()
    {
        return $this->fileNames;
    }

    public function path($folder = ''): ?string
    {
        return __DIR__ . '../../' . (!empty($folder) ? $folder . '/' : '');
    }

    public function run(){
        $files = $this->fileNames;
        if (!is_array($files)) {
            $files = [$files];
        }
        return $this->loadFileData($files);
    }

    private function loadFileData(array $files){
        if (!is_array($files)) { return false; }

        foreach ( $files as $file){
            $file = $this->path($file) . '.php';
            if (file_exists($file) && is_readable($file)) {
                $this->data[$file] = require_once($file);
            }
        }
        return  $this;
    }

    private function reset(){
        $this->data     = [];
        $this->fileNames = null;
    }

}