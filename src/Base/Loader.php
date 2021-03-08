<?php

namespace Simtabi\Pheg\Base;

class Loader
{

    public array $data         = [];
    public $fileNames          = null;
    public ?string $folderName = null;

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
     * @param null $fileNames
     * @return array|mixed
     */
    public function getData($fileNames = null): array
    {

        $data = [];
        if (is_array($fileNames)){
            foreach ($fileNames as $fileName){
                $fileName = trim($fileName);
                if (isset($this->data[$fileName])) {
                    $data[][$fileName] = $this->data[$fileName];
                }
            }
        }else{
            $fileNames = trim($fileNames);
            $data[][$fileNames] = isset($this->data[$fileNames]) && !empty($fileNames) ? $this->data[$fileNames] : $this->data;
        }

        return $data;
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

    /**
     * @return null
     */
    public function getFolderName()
    {
        return $this->folderNames;
    }

    /**
     * @param null $folderName
     * @return Loader
     */
    public function setFolderName($folderName)
    {
        $this->folderName = $folderName;
        return $this;
    }

    private function path($fileName, $folderName): ?string
    {
        $folderName = trim($folderName);
        $folderName = (!empty($folderName) ? $folderName . '/' : '');
        $fileName   = trim($fileName);
        return __DIR__ . '/../../' . $folderName . $fileName;
    }

    public function run(){
        $folderName = $this->folderName;
        $fileNames  = $this->fileNames;
        if (!is_array($fileNames)) {
            $fileNames = [$fileNames];
        }
        return $this->loadFileData($fileNames, $folderName);
    }

    private function loadFileData(array $files, string $folderName){
        if (!is_array($files)) { return false; }

        foreach ( $files as $file){
            $file = $this->path($file, $folderName) . '.php';
            if (file_exists($file) && is_readable($file)) {
                $this->data[$file] = require_once($file);
            }
        }
        return  $this;
    }

    private function reset(){
        $this->data      = [];
        $this->fileNames = null;
    }

}
