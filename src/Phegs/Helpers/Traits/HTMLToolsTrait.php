<?php

namespace Simtabi\Pheg\Phegs\Helpers\Traits;

use Simtabi\Pheg\Pheg;
use Simtabi\Pheg\Phegs\Helpers\Components\HtmlTools\Html2Text;
use Simtabi\Pheg\Phegs\Ensue\Ensue;
use DOMDocument;
use DOMXPath;

trait HTMLToolsTrait
{

    public static function bolderHtmlString($string, $type = 1){
        return '<strong>'. self::makeItReadable($string, $type) .'</strong>';
    }

    public static function parseHTMLTags($tags, $enclose = true, $trim = false) {

        // if empty
        if (Ensue::isEmpty($tags)){
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

    public static function nl2br($string)
    {
        return str_replace("\n", '<br />', $string);
    }

    public static function formatTags($string, $splitter = ',', $notWanted = null){
        $notWanted = empty($notWanted) ? '\\/:*?"<>;,|' : $notWanted;
        return preg_replace('{(.)\1+}','$1', str_replace(str_split($notWanted), $splitter, $string));
    }

    public static function bolderSprintf($argument, $wrapper){
        $argument = '<strong>'. ucwords(strtolower(str_replace('_', ' ', $argument))) .'</strong>';
        return sprintf($wrapper, $argument);
    }

    public static function oddEvenClass(int $number){
        return self::isOddNumber($number) ? 'Even' : 'Odd';
    }

    public static function progressbar($done, $total, $info = "", $width = 50) {
        $percentage = round(($done * 100) / $total);
        $bar        = round(($width * $percentage) / 100);
        return sprintf("%s%%[%s>%s]%s\r", $percentage, str_repeat("=", $bar), str_repeat(" ", $width-$bar), $info);
    }



    public function getSvgIcon($path, $iconClass = "", $svgClass = "")
    {

        if ( ! file_exists($path)) {
            return "<!-- SVG file not found: ".$path." -->";
        }

        $svg_content = file_get_contents($path);

        $dom = new DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new DOMXPath($dom);
        foreach ($xpath->query("//comment()") as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // add class to svg
        if ( ! empty($svgClass)) {
            foreach ($dom->getElementsByTagName("svg") as $element) {
                $element->setAttribute("class", $svgClass);
            }
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName("title");
        if ($title["length"]) {
            $dom->documentElement->removeChild($title[0]);
        }

        $desc = $dom->getElementsByTagName("desc");
        if ($desc["length"]) {
            $dom->documentElement->removeChild($desc[0]);
        }

        $defs = $dom->getElementsByTagName("defs");
        if ($defs["length"]) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g =  $dom->getElementsByTagName("g");
        foreach ($g as $el) {
            $el->removeAttribute("id");
        }

        $mask =  $dom->getElementsByTagName("mask");
        foreach ($mask as $el) {
            $el->removeAttribute("id");
        }

        $rect =  $dom->getElementsByTagName("rect");
        foreach ($rect as $el) {
            $el->removeAttribute("id");
        }

        $path =  $dom->getElementsByTagName("path");
        foreach ($path as $el) {
            $el->removeAttribute("id");
        }

        $circle =  $dom->getElementsByTagName("circle");
        foreach ($circle as $el) {
            $el->removeAttribute("id");
        }

        $use =  $dom->getElementsByTagName("use");
        foreach ($use as $el) {
            $el->removeAttribute("id");
        }

        $polygon =  $dom->getElementsByTagName("polygon");
        foreach ($polygon as $el) {
            $el->removeAttribute("id");
        }

        $ellipse =  $dom->getElementsByTagName("ellipse");
        foreach ($ellipse as $el) {
            $el->removeAttribute("id");
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = ["svg-icon"];

        if ( ! empty($iconClass)) {
            $cls = array_merge($cls, explode(" ", $iconClass));
        }

        return "<span class=". implode(" ", $cls) .">" . $string . "</span>";
    }
}