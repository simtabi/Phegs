<?php


namespace Simtabi\Pheg\Phegs\Helpers\Chips\Traits;


use Simtabi\Pheg\Phegs\Helpers\Components\HtmlTools\Html2Text;
use Simtabi\Pheg\Phegs\Validation\Validate;

trait HTMLToolsTrait
{

    public static function bolderHtmlString($string, $type = 1){
        return '<strong>'. self::makeItReadable($string, $type) .'</strong>';
    }

    public static function parseHTMLTags($tags, $enclose = true, $trim = false) {

        // if empty
        if (Validate::isEmpty($tags)){
            return '';
        }

        $out = '';
        if(!is_array($tags)){
            // decode entities
            $tags = html_entity_decode($tags);
            // remove opening tag
            $tags = str_replace('<', '', $tags);
            // remove closing tag
            $tags = str_replace('>', ',', $tags);

            // convert to array
            $tags = explode(',', $tags);
        }

        foreach ($tags as $key => $item){
            if(!is_array($item)){
                // decode entities
                $item = html_entity_decode($item);
                // remove opening tag
                $item = str_replace('<', '', $item);
                // remove closing tag
                $item = str_replace('>', ',', $item);
                // remove spaces
                $item = str_replace(' ', '', $item);
                // remove special characters
                $item = preg_replace('/[^A-Za-z0-9\-]/', '', $item);
                // get prepared tags
                $out .=  true === $enclose ? "<$item>" : (count($tags) > 1 ? "$item," : $item);
            }
        }
        $out = ((true === $trim) ? rtrim("$out,", ',') : $out);
        return !empty($out) ? $out : '';
    }

    function nl2br($string)
    {
        return str_replace("\n", '<br />', $string);
    }

    public static function html2text($htmlContent, $options = array()){
        return Html2Text::convert($htmlContent, $options);
    }

    public static function formatTags($string, $splitter = ',', $notWanted = null){
        $notWanted = empty($notWanted) ? '\\/:*?"<>;,|' : $notWanted;
        return preg_replace('{(.)\1+}','$1', str_replace(str_split($notWanted), $splitter, $string));
    }

    public static function bolderSprintf($argument, $wrapper){
        $argument = '<strong>'. ucwords(strtolower(str_replace('_', ' ', $argument))) .'</strong>';
        return sprintf($wrapper, $argument);
    }

}