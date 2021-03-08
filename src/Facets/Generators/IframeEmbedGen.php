<?php

namespace Simtabi\Pheg\Phegs\Helpers\Generators;

class IframeEmbedGen
{
    /**
     * Link Data
     * @var array
     */
    protected $link = [];

    /**
     * IFrame Styles
     * @var array
     */
    protected $iframeStyle = [];

    /**
     * IFrame Script
     * @var array
     */
    protected $iframeScript = [];

    /**
     * List of attributes to set on object/iframe.
     *
     * @var array
     */
    protected $iframeAttribute = [];

    /**
     * List of parameters to set on object code.
     *
     * @var array
     */
    protected $iframeParameter = [];

    /**
     * AMP mode.
     * https://www.ampproject.org/
     *
     * @var bool
     */
    protected $ampMode = false;

    /**
     * List of attributes to set on object/iframe.
     *
     * @var array
     */
    protected $attribute = [];

    /**
     * List of parameters to set on object code.
     *
     * @var array
     */
    protected $parameter = [];

    /**
     * List of embed parameters to set on object code.
     *
     * @var array
     */
    protected $embed = [];

    /**
     * List of attributes to set on a video object/iframe.
     *
     * @var array
     */
    protected $videoAttribute = [];

    /**
     * IframeEmbedGen constructor.
     * @param bool $reset
     */
    public function __construct($reset = false)
    {
        if ($reset){
            $this->reset();
        }
    }

    public function generateIframeId($length = 9){
        return (new StrGen())->all($length);
    }

    /**
     * @param string $iframeId
     * @param string $iframeUrl
     * @return $this
     */
    public function setLink($iframeId, string $iframeUrl)
    {
        $this->link[trim($iframeId)] = trim($iframeUrl);
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getLink($iframeId)
    {
        return isset($this->link[$iframeId]) ? $this->link[$iframeId] : null;
    }

    /**
     * @return array
     */
    public function getLinks(): array
    {
        return $this->link;
    }

    /**
     * @param string $iframeId
     * @param string $iframeStyle
     * @return $this
     */
    public function setIframeStyle($iframeId, string $iframeStyle)
    {
        $this->iframeStyle[trim($iframeId)] = trim($iframeStyle);
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getIframeStyle($iframeId)
    {
        return isset($this->iframeStyle[$iframeId]) ? $this->iframeStyle[$iframeId] : null;
    }

    /**
     * @return array
     */
    public function getIframeStyles(): array
    {
        return $this->iframeStyle;
    }


    /**
     * @param string $iframeId
     * @param string $iframeScript
     * @return $this
     */
    public function setIframeScript($iframeId, string $iframeScript)
    {
        $this->iframeScript[trim($iframeId)] = trim($iframeScript);
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getIframeScript($iframeId)
    {
        return isset($this->iframeScript[$iframeId]) ? $this->iframeScript[$iframeId] : null;
    }

    /**
     * @return array
     */
    public function getIframeScripts(): array
    {
        return $this->iframeScript;
    }

    /**
     * @param string $iframeId
     * @param string $iframeAttribute
     * @return $this
     */
    public function setIframeAttribute($iframeId, string $iframeAttribute)
    {
        $this->iframeAttribute[trim($iframeId)] = trim($iframeAttribute);
        return $this;
    }

    /**
     * @return array
     */
    public function getIframeAttribute($iframeId = null): array
    {
        if (!empty($iframeId)){
            return isset($this->iframeAttribute[$iframeId]) ? $this->iframeAttribute[$iframeId] : [];
        }
        return $this->iframeAttribute;
    }

    /**
     * @param string $iframeId
     * @param string $iframeParameter
     * @return $this
     */
    public function setIframeParameter($iframeId, string $iframeParameter)
    {
        $this->iframeParameter[trim($iframeId)] = trim($iframeParameter);
        return $this;
    }

    /**
     * @return array
     */
    public function getIframeParameter($iframeId = null): array
    {
        if (!empty($iframeId)){
            return isset($this->iframeParameter[$iframeId]) ? $this->iframeParameter[$iframeId] : [];
        }
        return $this->iframeParameter;
    }

    /**
     * @param bool $ampMode
     * @return $this
     */
    public function setAmpMode(bool $ampMode)
    {
        $this->ampMode = $ampMode;
        return $this;
    }
    /**
     * @return bool
     */
    public function getAmpMode(): bool
    {
        return $this->ampMode ? true : false;
    }

    public function setAttribute($iframeId, $key, $val = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $val) {
                $this->attribute[$iframeId][$k] = $val;
            }
        } else {
            $this->attribute[$iframeId][$key] = $val;
        }

        return $this;
    }

    public function getAttribute($iframeId = null): array
    {
        if (!empty($iframeId)){
            return isset($this->attribute[$iframeId]) ? $this->attribute[$iframeId] : [];
        }
        return $this->attribute;
    }

    public function setParameter($iframeId, $key, $val = null)
    {
        if (is_array($key) ) {
            foreach ($key as $k => $val) {
                $this->parameter[$iframeId][$k] = $val;
            }
        } else {
            $this->parameter[$iframeId][$key] = $val;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getParameter($iframeId = null): array
    {
        if (!empty($iframeId)){
            return isset($this->parameter[$iframeId]) ? $this->parameter[$iframeId] : [];
        }
        return $this->parameter;
    }

    public function setEmbed($iframeId, $key, $val = null)
    {
        if (is_array($key) ) {
            foreach ($key as $k => $val) {
                $this->embed[$iframeId][$k] = $val;
            }
        } else {
            $this->embed[$iframeId][$key] = $val;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getEmbed($iframeId = null): array
    {
        if (!empty($iframeId)){
            return isset($this->embed[$iframeId]) ? $this->embed[$iframeId] : [];
        }
        return $this->embed;
    }

    public function setVideoAttribute($iframeId, $key, $val = null)
    {
        if (is_array($key) ) {
            foreach ($key as $k => $val) {
                $this->videoAttribute[$iframeId][$k] = $val;
            }
        } else {
            $this->videoAttribute[$iframeId][$key] = $val;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getVideoAttribute($iframeId = null): array
    {
        if (!empty($iframeId)){
            return isset($this->videoAttribute[$iframeId]) ? $this->videoAttribute[$iframeId] : [];
        }
        return $this->videoAttribute;
    }

    public function getHtmlElement($iframeId)
    {
        $prevAmpMode = $this->ampMode;
        $output      = false;
        $this->changeAmpModeStatus(false);
        if ($iframe = $this->forgeIframeElement($iframeId)) $output = $iframe;
        if ($forged = $this->forgeVideoElement($iframeId))  $output = $forged;
        if ($object = $this->forgeObjectElement($iframeId)) $output = $object;
        $this->ampMode = $prevAmpMode;
        return $output;
    }

    /**
     * Generate AMP html code for embed.
     *
     * @return string
     */
    public function getAmpHtmlElement($iframeId)
    {
        $prevAmpMode = $this->ampMode;
        $output      = false;
        $this->changeAmpModeStatus(true);
        if ($iframe = $this->forgeIframeElement($iframeId)) $output = $iframe;
        if ($forged = $this->forgeVideoElement($iframeId))  $output = $forged;
        if ($object = $this->forgeObjectElement($iframeId)) $output = $object;
        $this->ampMode = $prevAmpMode;
        return $output;
    }

    /**
     * Alias for iframe forge method.
     *
     * @return string
     */
    public function getIframeElement($iframeId)
    {
        return $this->forgeIframeElement($iframeId);
    }

    /**
     * Alias for object forge method.
     *
     * @return string
     */
    public function getObjectElement($iframeId)
    {
        return $this->forgeObjectElement($iframeId);
    }

    /**
     * Alias for video forge method.
     *
     * @return string
     */
    public function getVideoElement($iframeId)
    {
        return $this->forgeVideoElement($iframeId);
    }


    /**
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      11-01-2019 —— 17:43
     * @link      http://simtabi.com
     * @since     2019-01-11
     * @version   1.0
     */
    private function reset(){
        $this->link = [];
        $this->iframeStyle = [];
        $this->iframeScript = [];
        $this->iframeAttributes = [];
        $this->iframeParameters = [];
        $this->ampMode = false;
        $this->attributes = [];
        $this->parameters = [];
        $this->embed = [];
        $this->videoAttribute = [];
    }

    /**
     * Strip HTML and PHP tags from a string.
     *
     * @param  string $str The input string.
     * @return string Returns the stripped string.
     */
    private function stripHtmlTags($str)
    {
        $str = html_entity_decode($str);
        // Strip HTML
        $str = preg_replace('#<br[^>]*?>#siu', "\n", $str);
        $str = preg_replace(
            [
                '#<head[^>]*?>.*?</head>#siu',
                '#<style[^>]*?>.*?</style>#siu',
                '#<script[^>]*?.*?</script>#siu',
                '#<object[^>]*?.*?</object>#siu',
                '#<embed[^>]*?.*?</embed>#siu',
                '#<applet[^>]*?.*?</applet>#siu',
                '#<noframes[^>]*?.*?</noframes>#siu',
                '#<noscript[^>]*?.*?</noscript>#siu',
                '#<noembed[^>]*?.*?</noembed>#siu'
            ],
            '',
            $str
        );
        $str = strip_tags($str);
        // Trim whitespace
        $str = str_replace("\t", '', $str);
        $str = preg_replace('#\n\r|\r\n#', "\n", $str);
        $str = preg_replace('#\n{3,}#', "\n\n", $str);
        return trim($str);
    }

    /**
     * Changes AMP status mode.
     * @param bool $enable
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      11-01-2019 —— 14:42
     * @link      http://simtabi.com
     * @since     2019-01-11
     * @version   1.0
     */
    private function changeAmpModeStatus(bool $enable = false)
    {
        $this->ampMode = $enable ? true : false;
    }

    private function forgeTagElement($tag, array $attributes){
        // Start html tag.
        $html = "<$tag";
        foreach ($attributes as $attribute => $val) {
            $html .= sprintf(' %s="%s"', $attribute, $val);
        }
        // Close html tag.
        $html .= "></$tag>";
        return $html;
    }

    /**
     * Generate script for embed if required and available. Usually required for certain iframes.
     *
     * @return string
     */
    private function forgeScriptElement($iframeId)
    {
        return $this->forgeTagElement('script', $this->getIframeAttribute($iframeId));
    }

    /**
     * Generate iframe for embed if required and available.
     *
     * @return string
     */
    private function forgeIframeElement($iframeId)
    {
        // forge iframe
        $iframe = $this->forgeTagElement(($this->ampMode ? 'amp-iframe' : 'iframe'), $this->getIframeAttribute($iframeId));

        // forge script
        $iframe .= $this->forgeScriptElement($iframeId);

        return $iframe;
    }

    /**
     * Generate object for embed if required and available.
     *
     * @return string
     */
    private function forgeObjectElement($iframeId)
    {
        $attr = $this->getAttribute($iframeId);
        $prms = $this->getParameter($iframeId);
        $embd = $this->getEmbed($iframeId);

        // Start object tag.
        $object = '<object';

        if (!empty($attr)){
            foreach ($attr as $attribute => $val) {
                $object .= sprintf(' %s="%s"', $attribute, $val);
            }
        }

        // End object tag.
        $object .= '>';

        // Create params.
        if (!empty($attr)){
            foreach ($prms as $param => $val) {
                $object .= sprintf('<param name="%s" value="%s"></param>', $param, $val);
            }
        }

        // Create embed.
        if (!empty($embd)){
            $object .= '<embed';
            // embed can have same attributes as object itself (height, width etc)
            foreach ($embd as $attribute => $val) {
                $val = ( is_bool($val) && $val ? ($val ? 'true' : 'false') : $val );
                $object .= sprintf(' %s="%s"', $attribute, $val);
            }
            $object .= '></embed>';
        }

        // Close object tag.
        $object .= '</object>';

        // forge script
        $object .= $this->forgeScriptElement($iframeId);

        return $object;
    }

    /**
     * Generate HTML5 video tag if required and available.
     *
     * @return string
     */
    private function forgeVideoElement($iframeId)
    {
        $vAttr = $this->getVideoAttribute($iframeId);
        $tag   = $this->ampMode ? 'amp-video' : 'video';

        // Start video tag.
        $video = "<$tag";

        if (!empty($vAttr)){
            foreach ($vAttr as $attribute => $val) {
                if (! is_array($val)) {
                    $video .= sprintf(' %s="%s"', $attribute, $val);
                }
            }
        }

        // Close start of video tag.
        $video .='>';

        // Add inner elements.
        $video .= $this->forgeInnerElements($vAttr, true);

        // Wrap video tag.
        $video .= "</$tag>";

        // forge script
        $video .= $this->forgeScriptElement($iframeId);

        return $video;
    }

    private function forgeInnerElements($attributes = [], $initial = false, $tag = null)
    {
        $output = '';
        // Add inner elements.
        $l = count($attributes);
        $i = 0;
        foreach ($attributes as $key => $val) {
            $i++;
            if (is_array($val) && ! is_numeric($key)) {
                $output .= $this->forgeInnerElements($val, false, $key);
            } elseif (is_array($val)) {
                $output .=  "<$tag " . $this->forgeInnerElements($val) . "></$tag>";
            } elseif (! $initial) {
                $output .= "$key=\"$val\"";
                if ($i !== $l) $output .= ' ';
            }
        }
        return $output;
    }

}
