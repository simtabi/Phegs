<?php

namespace Simtabi\Pheg\Facets\SocialMedia;

class SocialMedia
{


    public static function getSocialShare($social, $title)
    {
        $link = "";
        $URL  = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        switch ($social) {
            case "facebook":
                $link = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($URL);
                break;
            case "twitter":
                $link = "https://twitter.com/intent/tweet?text=$title&url=" . urlencode($URL);
                break;
            case "google":
                $link = "https://plus.google.com/share?url=" . urlencode($URL);
                break;
            case "linkedin":
                $link = "http://www.linkedin.com/shareArticle?mini=true&url=" . urlencode($URL) . "&title=$title";
                break;
            case "tumblr":
                $link = "http://www.tumblr.com/share/link?url=" . urlencode($URL);
                break;
        }

        return $link;
    }

    public static function generateYouTubeIframe($url, $width, $height, $class = 'clearfix')
    {
        $youtube = new YouTube($url);
        if ($youtube->getId()) {
            return '
        <div class="'.$class.'">
          <iframe width="'.$width.'" height="'.$height.'" src="'.$youtube->getEmbedUrl().'?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
        ';
        }
        return false;
    }

    public static function generateSocialShareLinks($social, $title)
    {
        $link = "";
        $URL  = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        switch ($social) {
            case "facebook":
                $link = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($URL);
                break;
            case "twitter":
                $link = "https://twitter.com/intent/tweet?text=$title&url=" . urlencode($URL);
                break;
            case "google":
                $link = "https://plus.google.com/share?url=" . urlencode($URL);
                break;
            case "linkedin":
                $link = "http://www.linkedin.com/shareArticle?mini=true&url=" . urlencode($URL) . "&title=$title";
                break;
            case "tumblr":
                $link = "http://www.tumblr.com/share/link?url=" . urlencode($URL);
                break;
        }

        return $link;
    }

}
