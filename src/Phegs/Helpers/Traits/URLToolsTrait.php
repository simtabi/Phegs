<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use Spatie\Url\Url;

trait URLToolsTrait
{


    public static function baseUrl(){

        // First we need to get the protocol the website is using
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] === 443) ? "https://" : "http://";

        // Build URL
        $baseURL  = $protocol.$_SERVER['HTTP_HOST'].'/';

        // Append project root folder/project-folder or yourdomain.com/foldername
        $baseURL .= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])).'/';
        // $baseURL .= rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') .'/';


        // Ensure we always have a trailing slash,
        // but first we trim all existing ones,
        // then we append to ensure consistency
        $baseURL = trim($baseURL, '/').'/';

        return $baseURL;
    }




    public static function appendScheme($url, $https = false){
        $url = Url::fromString($url);

        // if no scheme, append
        if (!$url->getScheme() == 'https' && !$url->getScheme() == 'http'){
            $url = (!$https ? 'http://' : 'https://') . $url;
        }

        return $url;
    }


    public static function encodeURL($url) {
        $reserved = [
            ':'  => '!%3A!ui',
            '/'  => '!%2F!ui',
            '?'  => '!%3F!ui',
            '#'  => '!%23!ui',
            '['  => '!%5B!ui',
            ']'  => '!%5D!ui',
            '@'  => '!%40!ui',
            '!'  => '!%21!ui',
            '$'  => '!%24!ui',
            '&'  => '!%26!ui',
            '\'' => '!%27!ui',
            '('  => '!%28!ui',
            ')'  => '!%29!ui',
            '*'  => '!%2A!ui',
            '+'  => '!%2B!ui',
            ','  => '!%2C!ui',
            ';'  => '!%3B!ui',
            '='  => '!%3D!ui',
            '%'  => '!%25!ui',
        ];
        $url = rawurlencode($url);
        $url = preg_replace(array_values($reserved), array_keys($reserved), $url);
        return $url;
    }

    /**
     * Function add_http
     *
     * @param $url
     * @param bool|false $https
     * @return string
     *
     * @author http://stackoverflow.com/questions/2762061/how-to-add-http-if-its-not-exists-in-the-url
     */
    public static function addHttp($url, $https = false) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            if($https){
                $url = "https://" . $url;
            }else{
                $url = "http://" . $url;
            }
        }
        return $url;
    }

    /**
     * Function remove_http
     *
     * @param $url
     * @return mixed
     *
     * @author http://stackoverflow.com/questions/4357668/how-do-i-remove-http-https-and-slash-from-user-input-in-php
     */
    public static function removeHttp($url) {
        /**
         *
         *
        $disallowed = array('http://', 'https://');
        foreach($disallowed as $d) {
        if(strpos($url, $d) === 0) {
        return str_replace($d, '', $url);
        }
        }
        return $url;
         */

        return preg_replace('#^https?://#', '', $url);
    }

    /**
     * Function format_url
     *
     * @param $url
     * @param bool|true $formatted
     * @param bool|false $https
     * @return string
     *
     */
    public static function formatUrl($url, $formatted = true, $https = false){

        $url = self::addHttp(self::removeHttp($url), $https);
        if(!$formatted){
            $output = self::removeHttp($url);
        }else{
            $output = $url;
        }

        return $output;
    }


    public static function generateLinkTo($page, $location, $microsite = null, $appendHomeUrl = true){

        // clean variables
        $location = Sanitize::filter($location);
        $page = Sanitize::filter($page);

        // validate system key
        $zoneKey = Config::getRoute("keys.zone");
        $pageKey = Config::getRoute("keys.zone_page");
        $typeKey = Config::getRoute("keys.zone_type");

        // validate existence of given value
        $check = function ($key){
            $data  = Config::getRoute("zones");
            if (isset($data[$key])){
                return true;
            }
            return false;
        };

        // if location !found
        if (!$check($location)){
            return false;
        }

        // build link
        $typeKey  = !empty($microsite) ? "&$typeKey=$microsite" : '';
        $location = (true === $appendHomeUrl ? self::baseURL() : '') . "?$zoneKey=$location$typeKey&$pageKey=$page";

        // set url and status
        return html_entity_decode($location);
    }

    public static function linkTo($page, $location, $echo = FALSE,  $microsite = null, $appendHomeUrl = true){
        $link = self::generateLinkTo($page, $location, $microsite, $appendHomeUrl);
        if(TRUE === $echo){
            echo $link;
        }else{
            return $link;
        }
        return false;
    }

    public static function currentPageURL() {
        $url = 'http';
        if ($_SERVER["HTTPS"] == "on") {$url .= "s";}
        $url .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $url .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . urlencode($_SERVER["REQUEST_URI"]);
        }
        else {
            $url .= $_SERVER["SERVER_NAME"] . urlencode($_SERVER["REQUEST_URI"]);
        }
        return htmlspecialchars(Sanitize::filter($url));
    }

    public static function generateLocationLink($location, $page, $key = null, $value = null, $microsite = null, $appendHomeUrl = true){
        $value = !empty($key) && !empty($value) ? "&$key=$value" : '';
        $url   = self::linkTo($page, $location, FALSE,  $microsite, $appendHomeUrl) . $value;
        return Sanitize::filter(htmlentities($url));
    }


    public static function redirect($url, $message = array(), $header = ""){

        if(!empty($message)){
            $_SESSION["msg"] = Sanitize::filter($message);
        }

        switch ($header) {
            case '301':
                header('HTTP/1.1 301 Moved Permanently');
                break;
            case '404':
                header('HTTP/1.1 404 Not Found');
                break;
            case '503':
                header('HTTP/1.1 503 Service Temporarily Unavailable');
                header('Status: 503 Service Temporarily Unavailable');
                header('Retry-After: 60');
                break;
        }

        header("Location: $url");
        exit;
    }

    public static function setReferrer(){
        return $_SESSION['backToUrl'] = str_replace('//?', '/?', self::currentPageURL());
    }

    public static function goToReferrer(){
        if (isset($_SESSION['backToUrl']) && !empty($_SESSION['backToUrl'])){
            $url = $_SESSION['backToUrl'];  // fetch url
            unset($_SESSION['backToUrl']);  // delete from session
            self::redirect(urldecode($url), null, null);
        }
        return false;
    }

}
