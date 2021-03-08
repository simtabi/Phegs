<?php

namespace Simtabi\Pheg\Phegs\Intel\Components;

use DeviceDetector\DeviceDetector;
use UserAgentParser\Exception\PackageNotLoadedException;
use UserAgentParser\Provider;

class UserAgent
{
    /**
     * Class constructor
     *
     * @version      1.0
     * @since        1.0
     */
    public function __construct() {
    }

    public function isBot($userAgent = null){

        // output variables
        $errors = null;
        $data   = null;

        try{

            // get device intel
            $userAgent = empty($userAgent) ? $_SERVER['HTTP_USER_AGENT'] : $userAgent;
            $intel     = new DeviceDetector($userAgent);

            // parse data
            $intel->parse();

            // get intel on handle bots,spiders,crawlers,...
            if ($intel->isBot()) {
                $data = $intel->getBot();
            }

        }catch(CatchThis $e){
            $errors = $e->getMessage();
        }

        return TypeConverter::toObject(array(
            'errors' => $errors,
            'data'   => $data,
        ));

    }

    public function getUserAgent($use_chain = FALSE, $all_headers = true){

        // output variables
        $status = FALSE;
        $errors = NULL;
        $data   = NULL;

        try {


            // get device intel
            $intel  = new DeviceDetector($_SERVER['HTTP_USER_AGENT']);

            // parse data
            $intel->parse();

            // get and set user agent
            $__user_agent = $intel->getUserAgent();

            if(true === $use_chain){

                $chain = new Provider\Chain([
                    new Provider\PiwikDeviceDetector(),
                    new Provider\WhichBrowser(),
                    new Provider\UAParser(),
                    new Provider\Woothee(),
                    new Provider\DonatjUAParser()
                ]);

                if(true === $all_headers){
                    // optional add all headers, to improve the result further (used currently only by WhichBrowser)
                    $result = $chain->parse($chain, getallheaders());
                }else{
                    // @var $result \UserAgentParser\Model\UserAgent
                    $result = $chain->parse($__user_agent);
                }


            }else{

                // set provider
                $provider = new Provider\PiwikDeviceDetector();
                // @var $result \UserAgentParser\Model\UserAgent
                $result = $provider->parse($__user_agent);

            }

            // lets get bot info
            if($result->getBot()->getIsBot() === true) {
                // if one part has no result, it's always set not null
                $result->getBot()->getName();
                $result->getBot()->getType();
            }

            // now we get everything else
            $result->getBrowser()->getName();
            $result->getBrowser()->getVersion()->getComplete();

            $result->getRenderingEngine()->getName();
            $result->getRenderingEngine()->getVersion()->getComplete();

            $result->getOperatingSystem()->getName();
            $result->getOperatingSystem()->getVersion()->getComplete();

            $result->getDevice()->getModel();
            $result->getDevice()->getBrand();
            $result->getDevice()->getType();
            $result->getDevice()->getIsMobile();
            $result->getDevice()->getIsTouch();

            // set data and status
            $status = true;
            $data   = $result->toArray();

        } catch (PackageNotLoadedException $e){
            $errors = $e->getMessage();
        }


        return TypeConverter::toObject(array(
            'status' => $status,
            'errors' => $errors,
            'serialized' => !empty($data) ? serialize($data) : NULL,
            'array'      => $data,
        ));

    }
}
