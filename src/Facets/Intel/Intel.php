<?php

namespace Simtabi\Pheg\Facets\Intel;

class Intel
{
    use IntelTrait;

    /**
     * @var Core
     */
    private $engine;


    public function __construct($myconfig = []){
        $config       = new Config($myconfig);
        $cache        = new Cache($config);
        $auth         = new Authenticator();
        $httpClient   = new CurlRequest();
        $this->engine = new Core($config, $cache,$httpClient,$auth);
    }
}

$t = new Init();
$t->device()->isDesktop();
