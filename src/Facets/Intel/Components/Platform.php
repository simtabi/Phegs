<?php

namespace Simtabi\Pheg\Facets\Intel\Components;

use Exception;

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;

class Platform
{

    private static $isBot;
    private static $botInfo;
    private static $type;
    private static $os;
    private static $osVersion;
    private static $environment;
    private static $data;

    /**
     * Create class instance
     *
     * @version      1.0
     * @since        1.0
     */
    private static $instance;

    public static function getInstance($userAgent = null) {
        if (isset(self::$instance)) {
            return self::$instance;
        } else {
            self::$instance = new static($userAgent);
            return self::$instance;
        }
    }

    private function __construct($userAgent = null) {
        try{
            // OPTIONAL: Set version truncation to none, so full versions will be returned
            // By default only minor versions will be returned (e.g. X.Y)
            // for other options see VERSION_TRUNCATION_* constants in DeviceParserAbstract class
            DeviceParserAbstract::setVersionTruncation(DeviceParserAbstract::VERSION_TRUNCATION_NONE);

            $dd = new DeviceDetector($userAgent);

            // OPTIONAL: Set caching method
            // By default static cache is used, which works best within one php process (memory array caching)
            // To cache across requests use caching in files or memcache
            $dd->setCache(new Doctrine\Common\Cache\PhpFileCache('./tmp/'));

            // OPTIONAL: Set custom yaml parser
            // By default Spyc will be used for parsing yaml files. You can also use another yaml parser.
            // You may need to implement the Yaml Parser facade if you want to use another parser than Spyc or [Symfony](https://github.com/symfony/yaml)
            $dd->setYamlParser(new DeviceDetector\Yaml\Symfony());

            // OPTIONAL: If called, getBot() will only return true if a bot was detected  (speeds up detection a bit)
            $dd->discardBotInformation();

            // OPTIONAL: If called, bot detection will completely be skipped (bots will be detected as regular devices then)
            $dd->skipBotDetection();

            $dd->parse();

            // set data
            self::$isBot = $dd->isBot();
            self::$botInfo = $dd->getBot();

            self::$type = $dd->isBot();
            self::$os = $dd->getOs();
            self::$osVersion = $dd->getOs();
            self::$environment = $dd->isBot();
            self::$data = $dd->getClient();

            if ($dd->isBot()) {
                // handle bots,spiders,crawlers,...
                self::$botInfo = $dd->getBot();
            } else {
                $clientInfo = $dd->getClient(); // holds information about browser, feed reader, media player, ...
                $osInfo = $dd->getOs();
                $device = $dd->getDevice();
                $brand = $dd->getBrandName();
                $model = $dd->getModel();
            }

        }catch (Exception $e){

        }catch (IntelException $e){

        }
    }
    private function __clone() {}


    public static function isBot(){}
    public static function botInfo(){}

    public static function type(){}
    public static function os(){}
    public static function osVersion(){}
    public static function environment(){}
    public static function data(){}

}
