<?php

namespace Simtabi\Pheg\Phegs\Navigation;

class Breadcrumbs
{

    /**
     * @var
     */
    private $base;

    /**
     * @var null|string
     */
    private ?string $separator;

    /**
     * @var null|string
     */
    private ?string $ulClass;

    /**
     * @var null|string
     */
    private ?string $ulAriaLabel;

    /**
     * @var null|string
     */
    private ?string $liClass;

    /**
     * @var null|string
     */
    private ?string $liActiveClass = 'active';

    /**
     * @var null|string
     */
    private ?string $liAriaCurrent = 'page';

    /**
     * @var null|string
     */
    private ?string $linkClass;

    /**
     * @var array
     */
    private array $links;

    /**
     * Breadcrumb constructor.
     * @param null|string $separator
     */
    public function __construct(?string $separator = null)
    {

        $this->separator     = $separator;
        $this->ulClass       = null;
        $this->ulAriaLabel   = null;
        $this->liClass       = null;
        $this->liActiveClass = 'active';
        $this->liAriaCurrent = 'page';
        $this->linkClass     = '';
        $this->links         = [];

    }

    /**
     * @return string|null
     */
    public function getSeparator(): ?string
    {
        return $this->separator;
    }

    /**
     * @param string|null $separator
     * @return Self
     */
    public function setSeparator(?string $separator): Self
    {
        $this->separator = $separator;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUlClass(): ?string
    {
        return $this->ulClass;
    }

    /**
     * @param string|null $ulClass
     * @return Self
     */
    public function setUlClass(?string $ulClass): Self
    {
        $this->ulClass = $ulClass;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUlAriaLabel(): ?string
    {
        return $this->ulAriaLabel;
    }

    /**
     * @param string|null $ulAriaLabel
     * @return Self
     */
    public function setUlAriaLabel(?string $ulAriaLabel): Self
    {
        $this->ulAriaLabel = $ulAriaLabel;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLiClass(): ?string
    {
        return $this->liClass;
    }

    /**
     * @param string|null $liClass
     * @return Self
     */
    public function setLiClass(?string $liClass): Self
    {
        $this->liClass = $liClass;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLiActiveClass(): ?string
    {
        return $this->liActiveClass;
    }

    /**
     * @param string|null $liActiveClass
     * @return Self
     */
    public function setLiActiveClass(?string $liActiveClass): Self
    {
        $this->liActiveClass = $liActiveClass;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLiAriaCurrent(): ?string
    {
        return $this->liAriaCurrent;
    }

    /**
     * @param string|null $liAriaCurrent
     * @return Self
     */
    public function setLiAriaCurrent(?string $liAriaCurrent): Self
    {
        $this->liAriaCurrent = $liAriaCurrent;
        return $this;
    }

    /**
     * @return array
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * @param array $links
     * @return Self
     */
    public function setLinks(array $links): Self
    {
        $this->links = $links;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLinkClass(): ?string
    {
        return $this->linkClass;
    }

    /**
     * @param string|null $linkClass
     * @return self
     */
    public function setLinkClass(?string $linkClass): self
    {
        $this->linkClass = $linkClass;
        return $this;
    }






    /**
     * @param string $baseUrl
     * @param string $title
     * @param bool $showTitle
     * @param null|string $icon
     * @param string|null $class
     * @return $this
     */
    public function base(
        string $baseUrl,
        string $title,
        bool $showTitle = true,
        ?string $icon   = null,
        string $class   = null
    ): self
    {
        $this->base = [
            "url"       => $baseUrl,
            "title"     => $title,
            "showTitle" => $showTitle,
            "icon"      => $icon,
            "class"     => $class
        ];
        return $this;
    }

    /**
     * @param string $title
     * @param string|null $url
     * @param null|string $class
     * @return self
     */
    public function addCrumb(string $title, ?string $url, ?string $class = null): self
    {
        $this->links[] = $this->parts($title, $url, $class);
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $ulAriaLabel = $this->ulAriaLabel;
        $ulClass     = $this->ulClass;
        $init        = "<ul class=\"$ulClass\" aria-label=\"$ulAriaLabel\">";
        $end         = "</ul>";

        return $init . ($this->links ? $this->setBase() : "") . $this->mount($this->links) . $end;
    }

    public function allCrumbs(): ?array
    {
        return (!empty($this->links) ? $this->links : null);
    }

    /**
     * @param array $links
     * @return string
     */
    private function mount(array $links): ?string
    {
        if (!$links) {
            return null;
        }

        $last          = count($links) - 1;
        $breadcrumb    = "";
        $liClass       = $this->liClass;
        $liActiveClass = $this->liActiveClass;
        $liAriaCurrent = $this->liAriaCurrent;
        $linkClass     = $this->linkClass;

        for ($b = 0; $b <= $last; $b++) {

            if ($b == $last) {
                $breadcrumb .= "<li class=\"$liActiveClass {$links[$b]["class"]}\" aria-current=\"$liAriaCurrent\">{$this->separator}{$links[$b]["title"]}</li>" . "\n";
            } else {
                $breadcrumb .= "<li class=\"$liClass {$links[$b]["class"]}\">{$this->separator}<a href=\"{$links[$b]["url"]}\" class=\"$linkClass\">{$links[$b]["title"]}</a></li>" . "\n";
            }
        }

        return $breadcrumb;
    }

    /**
     * @return string
     */
    private function setBase(): string
    {
        $title         = ($this->base["showTitle"] ? $this->base["title"] : null);
        $icon          = $this->base["icon"];
        $class         = $this->base["class"];
        $url           = $this->base["url"];
        $liClass       = $this->liClass;
        $liActiveClass = $this->liActiveClass;
        $liAriaCurrent = $this->liAriaCurrent;
        $linkClass     = $this->linkClass;

        if (!$this->links) {
            return "<li class=\"$liActiveClass {$class}\" aria-current=\"$liAriaCurrent\">{$icon}{$title}</li>";
        }

        return "<li class=\"$liClass {$class}\"><a href=\"{$url}\" class=\"$linkClass\">{$icon}{$title}</a></li>";
    }

    /**
     * @param string $title
     * @param string|null $url
     * @param string|null $class
     * @return array
     */
    private function parts(
        string $title,
        string $url   = null,
        string $class = null
    ): array
    {
        $url = $this->setUrl($url);

        return [
            "url"   => $url,
            "title" => $title,
            "class" => $class
        ];
    }

    /**
     * @param string $url
     * @return string
     */
    private function setUrl(string $url): string
    {
        $url = str_replace($this->base["url"], "", $url);
        $url = ($url[0] == "/" ? $url : "/" . $url);

        return $this->base["url"] . $url;
    }
}
