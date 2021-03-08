<?php

namespace Simtabi\Pheg\Phegs\Helpers\Helpers\Components\Debug;

class Paste
{
    // data to be shown next output
    public $data = [];

    // pre default styling
    public $style = '
			display: block;
			color: rgba(52, 73, 94, 1);
			text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
			font-family: Menlo, monospace;
			font-size: 15px !important;
			line-height: 18px !important;
			text-align: left;
			word-break: break-all;
			word-wrap: break-word;
			margin: 10px;
			padding: 30px;
            
            white-space: pre-line;
            
			border-radius: 3px;
			background: #fefbf3;
			border: 1px solid rgba(0, 0, 0, 0.2);

			-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
			-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
	';

    // default config for output
    public static $config = array(
        'width'  => 'auto',
        'height' => 'auto',
    );

    // singleton instance
    public static $instance;

    // add data to be shown next time Pre is rendered
    public static function data($data = NULL, $label = NULL) {

        // get Pre instance
        $pre = self::instance();

        // $data will be cleared after it is output
        if  (func_num_args())
            $pre->data[] = array('data' => $data, 'label' => $label);

        // return instance for method chaining or __toString
        return $pre;

    }

    // shortcut -- Pre::add() -- same as Pre::data()
    public static function add($data = NULL, $label = NULL) {
        return (func_num_args()) ? self::data($data, $label) : self::instance();
    }

    // shortcut to Pre::render()
    public static function r($data = NULL, $label = NULL) {
        return (func_num_args()) ? self::data($data, $label) : self::instance();
    }

    // render all Pre data to a string and return
    public static function render($data = NULL, $label = NULL) {

        // add data if passed
        $pre = (func_num_args()) ? self::data($data, $label) : self::instance();

        // return rendered string
        return (string) $pre;
    }

    // simple wrapper for var_dump that outputs within a styled <pre> tag and fixes whitespace and formatting
    public function __toString() {

        // extract config to this context for convenience
        extract(self::$config);

        if((isset($height) && isset($width)) || isset($height) || isset($width)){

            // you can specify dimensions for a scrollble div
            if ($height !== 'auto' OR $width !== 'auto') {

                // add "px" to height and width
                if (is_numeric($height) AND ! strstr($height, '%')) $height .= 'px';
                if (is_numeric($width)  AND ! strstr($width,  '%')) $width  .= 'px';

                // all scrollables get a border
                $this->style .= " border: 1px solid #ddd; padding: 10px; overflow-y: scroll; height: $height; width: $width;";

            }
        }

        // styled pre tag
        $pre = '<pre style="'.$this->style.'">';

        // iterate over data objects and var_dump 'em
        foreach ($this->data as $data) {

            // pull out data and label
            extract($data);

            // capture var_dump
            ob_start();
            var_dump($data);
            $data = ob_get_clean();

            // special case for NULL values
            if (trim($data) == 'NULL')
                $data = '<span style="color: #777;">NULL</span>'."\n";

            // add label
            if (! empty($label))
                $data = '<span style="
									background-color: #aab2bd;
									border: 1px solid #9fa7b2;
									color: #f6f7fb;
									display: block;
									font-size: 14px;
									font-weight: bold;
									margin: 4px;
									padding: 3px 5px;
									text-shadow: none;
                        ">' .$label.":</span> $data";

            // compile list of class names by searching: object(PreObject)#4 (2) {
            preg_match_all('/object\(([A-Za-z0-9_]+)\)\#[0-9]+\ \([0-9]+\)\ {/', $data, $objects);

            // we have some objects w/ class names
            if (! empty($objects)) {

                // just get the list of object names, without duplicates
                $objects = array_unique($objects[1]);

                // fix all class names to look like this: stdClass#3 object(4) {
                $data = preg_replace('/object\(([A-Za-z0-9_]+)\)\#([0-9]+)\ \(([0-9]+)\)\ {/', '<span style="color: #222; font-weight: bold;">\\1</span> <span style="color: #444;">#\\2</span> <span style="color: #777;">object(\\3)</span> {', $data);

                // remove class name from private members
                foreach ($objects as $object)
                    $data = str_replace(':"'.$object.'"', '', $data);

            }

            // consistent styling of =>'s
            $arrow = '<span style="font-weight: bold; color: #aab2bd;"> => </span>';

            // style special case  NULL
            $data = preg_replace('/=>\s*NULL/i', '=> <span style="color: #777; font-weight: bold;">NULL</span>', $data);

            // array keys are bolder
            $data = preg_replace('/\[\"([a-z0-9_\ \@+\-\(\):]+)\"(:?[a-z]*)\]\s*=>\s*/i', '<span style="color: #383e45; font-weight: bold;">[\\1]</span>\\2'.$arrow, $data);

            // numeric keys are bolder
            $data = preg_replace('/\[([0-9]+)\]\s*=>\s*/', '<span style="color: #434a54; font-weight: bold;">[\\1]</span>'.$arrow, $data);

            // style :private and :protected
            $data = preg_replace('/(:(private|protected))/', '<span style="color: #37bd9c; font-style: italic;">\\1</span>', $data);

            // de-emphasize string labels
            $data = preg_replace('/string\(([0-9]+)\)/', '<span style="color: #967bdc;">string(<span style="color: #4b89dc;">\\1</span>)</span>', $data);

            // de-emphasize int labels
            $data = preg_replace('/int\(([0-9-]+)\)/', '<span style="color: #d870ad;">int(<span style="color: #4b89dc;">\\1</span>)</span>', $data);

            // de-emphasize float labels
            $data = preg_replace('/float\(([0-9\.-]+)\)/', '<span style="color: #d870ad;">float(<span style="color: #3baeda;">\\1</span>)</span>', $data);

            // de-emphasize bool label
            $data = preg_replace('/bool\(([A-Za-z]+)\)/', '<span style="color: #d870ad;">bool(<span style="text-transform: uppercase; color: #db4453;">\\1</span>)</span>', $data);

            // de-emphasize array labels
            $data = preg_replace('/array\(([0-9]+)\)/', '<span style="color: #434a54;">array(\\1)</span>', $data);

            // boost spacing
            $data = preg_replace_callback('/^(\s*)(\S.*)$/m', function($matches) {
                // number of spaces that var_dump gave it
                $indent = strlen($matches[1]);
                // each 2 spaces is one column
                $indent = ($indent > 0) ? str_repeat("    ", $indent/2) : "";
                return $indent.$matches[2];
            }, $data);

            // style opening brackets
            $data = preg_replace('/^(.*)(<\/span>\ \{)$/m', '\\1<span style="color: #777;">\\2</span>', $data);

            // style closing brackets
            $data = preg_replace('/^(\s*)(\})$/m', '\\1<span style="color: #434a54;">\\2</span>', $data);

            // add to pre output
            $pre .= "$data";

        }

        // close pre tag
        $pre .= "</pre>\n\n";

        // reset data
        $this->data = array();

        // return output
        return $pre;

    }

    // uses singleton pattern to take advantage of __toString magic
    public static function instance() {

        // create a new instance
        if (! isset(self::$instance))
            self::$instance = new self();

        // return instance
        return self::$instance;

    }
}

