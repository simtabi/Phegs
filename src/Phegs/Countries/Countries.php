<?php

namespace Simtabi\Pheg\Phegs\Countries;

use Simtabi\Pheg\Phegs\Countries\Traits\ContinentsTrait;
use Simtabi\Pheg\Phegs\Countries\Traits\CountriesTrait;
use Simtabi\Pheg\Phegs\Countries\Traits\CurrenciesTrait;
use Simtabi\Pheg\Phegs\Countries\Traits\ISOCodesTrait;
use Simtabi\Pheg\Phegs\Countries\Traits\LanguagesTrait;
use Adbar\Dot;
use DirectoryIterator;
use Simtabi\Json\Json;
use Simtabi\Pheg\Base\BaseTools;
use Simtabi\Pheg\Phegs\Countries\Traits\ValidatorsTrait;
use Simtabi\Pheg\Phegs\DataTools\TypeConverter;
use stdClass;

class Countries
{

    use
        ContinentsTrait,
        CountriesTrait,
        CurrenciesTrait,
        ISOCodesTrait,
        LanguagesTrait,
        ValidatorsTrait;

    private string $basePath  = '';
    private bool   $asObject  = false;
    private array  $keys      = [];
    private Dot    $data;
    private array  $raw       = [];
    private array  $loaded    = [];
    private array  $loadFrom  = [];

    /**
     * Create class instance
     *
     * @version      1.0
     * @since        1.0
     */
    private static ?self $instance;

    public static function getInstance(string $basePath = '') {
        if (isset(self::$instance) && !is_null(self::$instance)) {
            return self::$instance;
        } else {

            self::$instance = new static();
            if (!empty($basePath) && is_string($basePath)) {
                self::$instance->basePath = $basePath;
            }

            self::$instance->setLoadFrom([
                'countries' => self::$instance->basePath.'/annexare/countries-list/data',
                'currency'  => [
                    BaseTools::PHEG_DIR_PATH.'/data/currency'
                ],
            ]);
            
            self::$instance->initialize();

            return self::$instance;
        }
    }

    private function __construct() {}
    private function __clone() {}

    private function initialize(){

        $autoloadJSONFiles = function (string $directory, $id) {

            $data = [];
            $name = function ($filename){
                return str_replace('.json', '', $filename);
            };

            // loop to get all files
            foreach ((new DirectoryIterator($directory)) as $cacheKey => $fileInfo) {
                if (!$fileInfo->isDot()) {
                    $filename               = $fileInfo->getFilename();
                    $_name                  = $name($filename);
                    $this->raw[$id][$_name] = [
                        'filename' => $filename,
                        'pathname' => $fileInfo->getPathname(),
                    ];
                    $this->setKeys($_name);
                    $this->setLoaded($id);
                    $data[$_name] = Json::fileToArray($fileInfo->getPathname());
                }
            }

            return $data;
        };



        $array = [];
        foreach ($this->loadFrom as $key => $item){
            if (is_array($item)) {
                foreach ($item as $value){
                    if (!is_array($value)) {
                        $array[$key] = $autoloadJSONFiles($value, $key);
                    }
                }
            }else{
                $array[$key] = $autoloadJSONFiles($item, $key);
            }
        }
        $this->setData(new Dot($array));
        return $this;
    }


    /**
     * @return array
     */
    public function getRaw(): array
    {
        return $this->raw;
    }

    /**
     * @param array $raw
     * @return self
     */
    public function setRaw(array $raw): self
    {
        $this->raw = $raw;
        return $this;
    }



    /**
     * @return array
     */
    public function getLoaded(): array
    {
        return $this->loaded;
    }

    /**
     * @param string $loaded
     * @return self
     */
    public function setLoaded(string $loaded): self
    {
        $this->loaded[] = $loaded;
        return $this;
    }

    /**
     * @return array
     */
    public function getLoadFrom(): array
    {
        return $this->loadFrom;
    }

    /**
     * @param array $loadFrom
     * @return self
     */
    public function setLoadFrom(array $loadFrom): self
    {
        $this->loadFrom = $loadFrom;
        return $this;
    }



    /**
     * @return bool
     */
    public function isAsObject(): bool
    {
        return $this->asObject;
    }

    /**
     * @param bool $asObject
     * @return self
     */
    public function setAsObject(bool $asObject): self
    {
        $this->asObject = $asObject;
        return $this;
    }

    /**
     * @return array
     */
    public function getKeys(): array
    {
        return $this->keys;
    }

    /**
     * @param string $keys
     * @return self
     */
    private function setKeys(string $keys): self
    {
        $this->keys[] = $keys;
        return $this;
    }

    /**
     * @param null $request
     * @return object|stdClass
     */
    public function getData($request)
    {
        $request = trim($request);
        $data    = [];

        if ($this->data->has($request)) {
            $data = $this->data->get($request);
        }
        return $this->isAsObject() ? TypeConverter::fromAnyToObject($data) : $data;
    }

    /**
     * @param Dot $data
     * @return self
     */
    private function setData(Dot $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getAll(){
        return $this->isAsObject() ? TypeConverter::fromAnyToObject($this->data->all()) : $this->data->all();
    }

}
