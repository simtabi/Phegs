<?php

namespace Helpers;

class Menu
{

    private $type = 'li';
    private $nestIcon;
    private $liClass;
    private $ulType = 'ul';
    private $divClass;
    private $toggleClass;
    private $toggleIcon;
    private $ulSubClass;
    private $dropdownClass;
    private $toggleOptions;
    private $heading;
    private $subHeading;
    private $headingIcon;
    private $headingClass;
    private $subHeadingClass;
    private $data;


    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $nestIcon
     * @return $this
     */
    public function setNestIcon($nestIcon)
    {
        $this->nestIcon = $nestIcon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNestIcon()
    {
        return $this->nestIcon;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setLiClass($class)
    {
        $this->liClass = $class;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLiClass()
    {
        return $this->liClass;
    }

    /**
     * @param string $ulType
     * @return $this
     */
    public function setUlType($ulType)
    {
        $this->ulType = $ulType;
        return $this;
    }

    /**
     * @return string
     */
    public function getUlType()
    {
        return $this->ulType;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setDivClass($class)
    {
        $this->divClass = $class;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDivClass()
    {
        return $this->divClass;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setToggleClass($class)
    {
        $this->toggleClass = $class;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToggleClass()
    {
        return $this->toggleClass;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setToggleIcon($class)
    {
        $this->toggleIcon = $class;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToggleIcon()
    {
        return $this->toggleIcon;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setUlSubClass($class)
    {
        $this->ulSubClass = $class;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUlSubClass()
    {
        return $this->ulSubClass;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setDropdownClass($class)
    {
        $this->dropdownClass = $class;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDropdownClass()
    {
        return $this->dropdownClass;
    }

    /**
     * @param mixed $options
     * @return $this
     */
    public function setToggleOptions($options)
    {
        $this->toggleOptions = $options;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToggleOptions()
    {
        return $this->toggleOptions;
    }

    /**
     * @param mixed $text
     * @return $this
     */
    public function setHeading($text)
    {
        $this->heading = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * @param mixed $text
     * @return $this
     */
    public function setSubHeading($text)
    {
        $this->subHeading = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubHeading()
    {
        return $this->subHeading;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setHeadingIcon($class)
    {
        $this->headingIcon = $class;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeadingIcon()
    {
        return $this->headingIcon;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setHeadingClass($class)
    {
        $this->headingClass = $class;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeadingClass()
    {
        return $this->headingClass;
    }

    /**
     * @param mixed $class
     * @return $this
     */
    public function setSubHeadingClass($class)
    {
        $this->subHeadingClass = $class;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubHeadingClass()
    {
        return $this->subHeadingClass;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * Menu constructor.
     */
    public function __construct()
    {

    }


    public function buildUlLinksDiv($data, $title, $link = '', $heading = '', $divClass = '', $ulClass = '', $hClass = '', $li = true){

        $divClass = (empty($ulClass) ? ''   : "class='$divClass'");
        $ulClass  = (empty($ulClass) ? ''   : "class='$ulClass'");
        $hClass   = (empty($hClass) ? ''    : "class='$hClass'");
        $heading  = (empty($heading) ? ''   : "<h4 $hClass> $heading </h4>");
        $ulStart  = ($li ? "<ul $ulClass>"  : '');
        $ulEnd    = ($li ? "</ul>"  : '');
        $counter  = 1;
        $html     = '';
        while($counter < count($data) + 1){

            $html .= "<div $divClass>
                            $heading
                         $ulStart";

            if(isset($data[$counter])){
                foreach($data[$counter] as $e => $info){
                    $href  = (empty($link) ? '#'  : "{$info->$link}");
                    $html .= ($li ? "<li> <a href='$href'> {$info->$title} </a> </li>" : "<a href='$href'> {$info->$title} </a>");
                }
            }

            $html .= "  $ulEnd
                      </div>";
            $counter++;
        }

        return $html;
    }

    public function partition($data, $html){

        $li = isset($html['li']) && !empty($html['li']) ? true : false;

        $ulOpen  = ($li ? "<ul ".(!empty($ul_class) ? "class='$ul_class'" : '').">"  : "<div ".(!empty($ul_class) ? "class='$ul_class'" : '').">");
        $ulClose = ($li ? "</ul>"  : '</div>');

        $output = '';
        foreach($data as $link) {

            $isChild = ( (is_array($link) && (array_key_exists('child',$link))) ? true : false );
            $title   = $link['title'];
            $url     = $link['link_type'] == 'internal' ? Console::baseURL() . $link['link'] : $link['link'];

            // Design & build menu
            $output .= '
						   '.($li ? "<li>"  : '').'
								<a  href="'.$url.'" target="'.$link['target'].'" >
								 '.html_entity_decode($title).'
								</a>';

            // If child exists
            if($isChild){
                $output .= " $ulOpen ";
                $output .= $this->partition($link['child'], $html);
                $output .= "   $ulClose" ."\n";
            }

            $output .= ' '.($li ? "</li>"  : '</br>').' '."\n";
        }

        // Return built menu structure and contents
        return $output;
    }

    public function hasChildren($data, $id) {
        foreach ($data as $datum) {
            if ($datum['parent_id'] == $id)
                return true;
        }
        return false;
    }
    public function buildMenu($data, $parent = 0)
    {
        $result = "<ul>";
        foreach ($data as $row)
        {
            if ($row['parent_id'] == $parent){
                $result.= "<li>{$row['title']}";
                if ($this->hasChildren($data,$row['id']))
                    $result.= $this->buildMenu($data,$row['id']);
                $result.= "</li>";
            }
        }
        $result.= "</ul>";

        return $result;
    }

}



$menu = Array( // Presumed to have been coming from a SQL SELECT, populated for demo.
    Array('id'=>1,'title'=>'Menu 1',          'parent_id'=>null),
    Array('id'=>2,'title'=>'Sub 1.1',         'parent_id'=>1),
    Array('id'=>3,'title'=>'Sub 1.2',         'parent_id'=>1),
    Array('id'=>4,'title'=>'Sub 1.3',         'parent_id'=>1),
    Array('id'=>5,'title'=>'Menu 2',          'parent_id'=>null),
    Array('id'=>6,'title'=>'Sub 2.1',         'parent_id'=>5),
    Array('id'=>7,'title'=>'Sub Sub 2.1.1',   'parent_id'=>6),
    Array('id'=>8,'title'=>'Sub 2.2',         'parent_id'=>5),
    Array('id'=>9,'title'=>'Menu 3',          'parent_id'=>null),
);
