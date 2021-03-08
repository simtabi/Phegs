<?php


namespace Simtabi\Pheg\Phegs\Helpers\Chips\Traits;


trait ServerToolsTrait
{

    /**
     * @param string $sCheckHost
     * @return bool
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      22-02-2019 —— 13:43
     * @link      http://simtabi.com
     * @since     2019-02-22
     * @version   1.0
     */
    public static function checkInternetConnection($sCheckHost = 'www.google.com')
    {
        return (bool) @fsockopen($sCheckHost, 80, $iErrno, $sErrStr, 5);
    }

    public static function blockIP(array $blocked, $message = "Your IP('%s') has been blocked!"){
        $ipAddress = Intel::getIP();
        $message   = !empty($message) ? $message : "Your IP('%s') has been blocked!";
        if(in_array($ipAddress, $blocked)){
            die(sprintf($message, $ipAddress));
        }
    }

}