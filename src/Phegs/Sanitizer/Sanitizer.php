<?php

namespace Simtabi\Snippets\Packages\Sanitizer;

use HTMLPurifier_Config;

class Sanitizer
{

    /**
     * Class Variables
     * @var null
     */

    private static $allowedBasicTags = ' a, abbr, acronym, b, blockquote, caption, cite, code,  dd, del, dfn, div, dl, dt, em, i, ins,
    tr, tt, u, ul, var, b, i, s, span, h1, ';

    private static $allowedHTML5Tags = array(
        'img[src|alt|title|width|height|style|data-mce-src|data-mce-json]',
        'figure', 'figcaption',
        'video[src|type|width|height|poster|preload|controls]', 'source[src|type]',
        'a[href|target]',
        'iframe[width|height|src|frameborder|allowfullscreen]',
        'strong', 'b', 'i', 'u', 'em', 'br', 'font',
        'h1[style]', 'h2[style]', 'h3[style]', 'h4[style]', 'h5[style]', 'h6[style]',
        'p[style]', 'div[style]', 'center', 'address[style]',
        'span[style]', 'pre[style]',
        'ul', 'ol', 'li',
        'table[width|height|border|style]', 'th[width|height|border|style]',
        'tr[width|height|border|style]', 'td[width|height|border|style]',
        'hr'
    );

    /**
     * Class constructor
     *
     * @version      1.0
     * @since        1.0
     */
    public function __construct() {

    }



    private static function getAllowedBasicTags()
    {
        return trim(self::$allowedBasicTags);
    }


    /**
     * @return array
     */
    public static function getAllowedHTML5Tags()
    {
        return self::$allowedHTML5Tags;
    }

    private static function tempPath(){
        $temp_path  = str_replace('/', '\\', APP_STORAGE . 'html-purifier');
        return str_replace('\\', DS, $temp_path);
    }

    public static function purifyHTML($word, $allowedTags) {
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Doctype', 'HTML 4.01 Transitional');
        $config->set('CSS.AllowTricky', true);
        $config->set('Cache.SerializerPath', self::tempPath());
        // Allow iframes from:
        // o YouTube.com
        // o Vimeo.com
        $config->set('HTML.SafeIframe', true);
        $config->set('URI.SafeIframeRegexp', '%^(http:|https:)?//(www.youtube(?:-nocookie)?.com/embed/|player.vimeo.com/video/)%');
        $allowedTags = empty($allowedTags) ? '' : is_array($allowedTags) ? implode(',', $allowedTags) : '';
        $config->set('HTML.Allowed', $allowedTags);

        // Set some HTML5 properties
        $config->set('HTML.DefinitionID', 'html5-definitions'); // unqiue id
        $config->set('HTML.DefinitionRev', 1);
        if ($def = $config->maybeGetRawHTMLDefinition()) {
            // http://developers.whatwg.org/sections.html
            $def->addElement('section', 'Block', 'Flow', 'Common');
            $def->addElement('nav',     'Block', 'Flow', 'Common');
            $def->addElement('article', 'Block', 'Flow', 'Common');
            $def->addElement('aside',   'Block', 'Flow', 'Common');
            $def->addElement('header',  'Block', 'Flow', 'Common');
            $def->addElement('footer',  'Block', 'Flow', 'Common');

            // Content model actually excludes several tags, not modelled here
            $def->addElement('address', 'Block', 'Flow', 'Common');
            $def->addElement('hgroup', 'Block', 'Required: h1 | h2 | h3 | h4 | h5 | h6', 'Common');
            // http://developers.whatwg.org/grouping-content.html

            $def->addElement('figure', 'Block', 'Optional: (figcaption, Flow) | (Flow, figcaption) | Flow', 'Common');
            $def->addElement('figcaption', 'Inline', 'Flow', 'Common');

            // http://developers.whatwg.org/the-video-element.html#the-video-element
            $def->addElement('video', 'Block', 'Optional: (source, Flow) | (Flow, source) | Flow', 'Common', array(
                'src' => 'URI',
                'type' => 'Text',
                'width' => 'Length',
                'height' => 'Length',
                'poster' => 'URI',
                'preload' => 'Enum#auto,metadata,none',
                'controls' => 'Bool',
            ));
            $def->addElement('source', 'Block', 'Flow', 'Common', array(
                'src' => 'URI',
                'type' => 'Text',
            ));

            // http://developers.whatwg.org/text-level-semantics.html
            $def->addElement('s',    'Inline', 'Inline', 'Common');
            $def->addElement('var',  'Inline', 'Inline', 'Common');
            $def->addElement('sub',  'Inline', 'Inline', 'Common');
            $def->addElement('sup',  'Inline', 'Inline', 'Common');
            $def->addElement('mark', 'Inline', 'Inline', 'Common');
            $def->addElement('wbr',  'Inline', 'Empty', 'Core');

            // http://developers.whatwg.org/edits.html
            $def->addElement('ins', 'Block', 'Flow', 'Common', array('cite' => 'URI', 'datetime' => 'CDATA'));
            $def->addElement('del', 'Block', 'Flow', 'Common', array('cite' => 'URI', 'datetime' => 'CDATA'));

            // TinyMCE
            $def->addAttribute('img', 'data-mce-src', 'Text');
            $def->addAttribute('img', 'data-mce-json', 'Text');
            // Others
            $def->addAttribute('iframe', 'allowfullscreen', 'Bool');
            $def->addAttribute('table', 'height', 'Text');
            $def->addAttribute('td', 'border', 'Text');
            $def->addAttribute('th', 'border', 'Text');
            $def->addAttribute('tr', 'width', 'Text');
            $def->addAttribute('tr', 'height', 'Text');
            $def->addAttribute('tr', 'border', 'Text');
        }
        $purify = new \HTMLPurifier($config);
        return $purify->purify($word);
    }


    /**
     * Function filter
     *
     *
     * @param $word
     * @param int $level (1 = lowest, 2 = medium, 3 = higher, 4 = highest)
     * @param null $allowedTags
     * @param bool $chars
     * @return mixed
     *
     */
    public static function filter($word, $level = 4, $allowedTags = NULL, $chars = FALSE){

        // filter levels
        // 1 = lowest, 2 = medium, 3 = higher, 4 = highest

        // if is array or object
        if(is_array($word) || is_object($word)){
            return array_map( array( __CLASS__, 'filter') , (array) $word );
        }

        // set default level
        $level = (Validators::isInteger($level)) || (Validators::isString($level)) ? $level : 4;
        $level = strtolower(trim($level));

        $word = preg_replace('/<script[^>]*>([\s\S]*?)<\/script[^>]*>/i', '', $word);
        switch ($level) {

            // for custom content. i.e profile about info, etc
            case 1:
            case 'basic':

                $word = self::purifyHTML($word, 'b, i, s, p, u, strong, span, br,');
                break;

            // for WYSIWYG editors
            case 2:
            case 'wysiwig':

                $word = self::purifyHTML($word, self::getAllowedHTML5Tags());
                break;

            // custom sanitation, strict mode
            case 3:
            case 'strict':

                if(empty($allowedTags)){
                    $search = array(
                        '@<script[^>]*?>.*?</script>@si',
                        '@<[\/\!]*?[^<>]*?>@si',
                        '@<style[^>]*?>.*?</style>@siU',
                        '@<![\s\S]*?--[ \t\n\r]*>@'
                    );
                    $word = preg_replace($search, '', $word);
                }

                $tags = self::parseHTMLTags($allowedTags, TRUE, TRUE);
                $word = strip_tags($word, (false === $tags ? null : $tags));
                break;

            // custom sanitation, super-strict mode
            case 4:
            case 'superstrict':

                if(empty($allowedTags)){
                    $search = array(
                        '@<script[^>]*?>.*?</script>@si',
                        '@<style[^>]*?>.*?</style>@siU'
                    );
                    $word = preg_replace($search, '', $word);
                }

                $word = self::purifyHTML(trim($word), null);
                break;

            // by default we will purify and sanitize everything! no stone unturned
            default ;

                $word = self::purifyHTML(trim($word), null);
                break;
        }

        if(!preg_match('!nofollow!', $word)){
            $word = str_replace('href=','rel="nofollow" href=', $word);
        }

        // if encode special chars
        if(TRUE === $chars){
            if(phpversion() >= 5.4){
                $word = htmlspecialchars(trim($word), ENT_QUOTES | ENT_HTML5,"UTF-8");
            }else{
                $word = htmlspecialchars(trim($word), ENT_QUOTES,"UTF-8");
            }
        }

        // Return content with HTML5 support if needed
        return trim($word);
    }


    public static function escapeHTML($html, $decode = TRUE){
        if(TRUE === $decode){
            return html_entity_decode($html);
        }else{
            return htmlentities($html, ENT_QUOTES, 'UTF-8');
        }
    }


    public static function purifyArrayOrObject ($array) {
        $array = is_object($array) ? DataType::toArray($array) : $array;
        if (!is_array($array) || !count($array)) { return array(); }
        foreach ($array as $k => $v) {
            if (!is_array($v) && !is_object($v)) {
                $array[$k] = htmlspecialchars(strip_tags(trim($v)));
            }
            if (is_array($v)) {
                $array[$k] = self::purifyArrayOrObject($v);
            }
        }
        return $array;
    }
}
