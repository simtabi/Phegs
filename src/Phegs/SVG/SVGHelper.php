<?php


class SVGHelper
{
    public function getIcon($path, $iconClass = "", $svgClass = "", $addElement = true, $element = "span"): string
    {

        if ( ! file_exists($path)) {
            return "<!-- SVG file not found: ".$path." -->";
        }

        $svgContent = file_get_contents($path);

        $dom = new DOMDocument();
        $dom->loadXML($svgContent);

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

        $class  = ["svg-icon"];

        if ( ! empty($iconClass)) {
            $class = array_merge($class, explode(" ", $iconClass));
        }

        $class = implode(" ", $class);

        return !$addElement ? $string : "<$element class="."$class".">" . $string . "</$element>";
    }

    public function getFromSprite($iconName, $spritePath, $iconClass = ""): string
    {
        return "
            <svg class='$iconClass'>
                <use xlink:href='$spritePath#$iconName'/>
            </svg>
        ";
    }

}