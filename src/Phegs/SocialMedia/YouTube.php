<?php

namespace Simtabi\Pheg\Phegs\SocialMedia;

class YouTube {

    /**
     * @var string Original youtube id
     */
    private $_youtubeId;

    /**
     * @param $code youtube id or youtube url
     */
    public function __construct(string $code)
    {
        $this->_youtubeId = self::parseYoutubeId($code);
    }
    /**
     * Smart ID to obtain youtube
     * @param string $code youtube id or youtube url
     *
     * @return string
     */
    static public function parseYoutubeId(string $code)
    {
        //example https://www.youtube.com/watch?v=xr1kXiEtCmo
        $matches = [];
        if (preg_match_all('/\.com\/watch\?v\=(.*)$/i', $code, $matches))
        {
            if (isset($matches[1][0]))
            {
                return (string) $matches[1][0];
            }
        }
        // https://youtu.be/xr1kXiEtCmo
        $matches = [];
        if (preg_match_all('/youtu\.be\/(.*)$/i', $code, $matches))
        {
            if (isset($matches[1][0]))
            {
                return (string) $matches[1][0];
            }
        }
        // <iframe width="640" height="360" src="https://www.youtube.com/embed/xr1kXiEtCmo?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        $matches = [];
        if (preg_match_all('/\.com\/embed\/(.*)?/i', $code, $matches))
        {
            if (isset($matches[1][0]))
            {
                return (string) $matches[1][0];
            }
        }
        return '';
    }
    /**
     * @return string
     */
    public function getId()
    {
        return $this->_youtubeId;
    }
    /**
     * @return string
     */
    public function getEmbedUrl()
    {
        if (!$this->_youtubeId)
        {
            return '';
        }
        return (string) "//www.youtube.com/embed/" . $this->_youtubeId;
    }
    /**
     * @return string
     */
    public function getWatchUrl()
    {
        if (!$this->_youtubeId)
        {
            return '';
        }
        return "//www.youtube.com/watch?v=" . $this->_youtubeId;
    }
    /**
     * @return string
     */
    public function getImageUrl()
    {
        if (!$this->_youtubeId)
        {
            return '';
        }
        return "//img.youtube.com/vi/" . $this->_youtubeId . '/0.jpg';
    }
}
