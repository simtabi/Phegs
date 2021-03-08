<?php

namespace Simtabi\Pheg\Phegs\Generators\Navigation;

class Breadcrumbs
{
    /***
     * Class Variables
     * @var array
     */
    private $breadcrumbs = array();
    private $append_li   = FALSE;
    private $bracelet    = '»';

    private $active_li_class   = NULL;
    private $active_link_class = NULL;

    /**
     * Class constructor
     *
     * @version      1.0
     * @since        1.0
     */
    public function __construct() {

    }

    private function setBreadcrumb($title, $link, $li_class = NULL, $link_class = NULL) {
        $i                     = count($this->breadcrumbs);
        $this->breadcrumbs[$i] = array(
            'title'      => $title,
            'link'       => $link,
            'li_class'   => $li_class,
            'link_class' => $link_class,
        );
        return $this;
    }

    public function getBreadcrumb(){
        return $this->breadcrumbs;
    }

    public function setAppendLi($status = TRUE){
        $this->append_li = $status;
        return $this;
    }

    public function getAppendLi(){
        return $this->append_li;
    }

    public function setBracelet($bracelet = '»'){
        $this->bracelet = $bracelet;
        return $this;
    }

    private function getBracelet(){
        return $this->bracelet;
    }

    public function setActiveLiClass($class = NULL){
        $this->active_li_class = $class;
        return $this;
    }

    private function getActiveLiClass(){
        return $this->active_li_class;
    }

    public function setActiveLinkClass($class = NULL){
        $this->active_link_class = $class;
        return $this;
    }

    private function getActiveLinkClass(){
        return $this->active_link_class;
    }



    private function make() {

        $breadcrumbs = $this->getBreadcrumb();
        $bracelet    = Sanitize::filter($this->getBracelet());
        $bracelet    = !empty($bracelet) ? $bracelet : '';
        $total       = count($breadcrumbs);
        $title       = '';
        $link        = '';
        $html        = '';

        ## - active breadcrumb status
        $brCurrent   = FALSE;


        for ($i = 0; $i < $total; $i++) {

            ## - set last as active breadcrumb
            if(($i == $total-1) && ($i >= 1)){
                $brCurrent  = TRUE;
                $brData     = $breadcrumbs[$i];
                ## - get, set and sanitize link and  titles
                $title      = isset($brData['title'])      && !empty($brData['title'])      ?   Sanitize::filter($brData['title'])                          : '';
                $link       = isset($brData['link'])       && !empty($brData['link'])       ?   Sanitize::filter($brData['link'])                           : '';
            }else{

                $brData     = $breadcrumbs[$i];

                ## - get and validate classes
                $li_class   = isset($brData['li_class'])   && !empty($brData['li_class'])   ?  ' class="'.Sanitize::filter($brData['li_class']).'" '    : '';
                $link_class = isset($brData['link_class']) && !empty($brData['link_class']) ?  ' class="'.Sanitize::filter($brData['link_class']).'" '  : '';

                ## - get, set and sanitize link and  titles
                $title      = isset($brData['title'])      && !empty($brData['title'])      ?   Sanitize::filter($brData['title'])                      : '';
                $link       = isset($brData['link'])       && !empty($brData['link'])       ?   Sanitize::filter($brData['link'])                       : '';

                ## - if we are to wrap inside a li
                if(TRUE === $this->getAppendLi()){
                    $__str  = '<li '.$li_class .' > <a href="'.$link.'" '. $link_class .' > '.$title.' </a> </li>';
                }else{
                    $__str  = '<a href="'.$link.'" '. $link_class .' > '.$title.' </a>';
                }

                ## - build output
                $html      .= ($i > 0) ? $bracelet . $__str : $__str;
            }
        }

        ## - if current breadcrumb status
        if(TRUE === $brCurrent){

            ## - generate active crumb
            $__active_li_class   = !empty($this->getActiveLiClass())   ? ' class="'.Sanitize::filter($this->getActiveLiClass()).'" '   : '';
            $__active_link_class = !empty($this->getActiveLinkClass()) ? ' class="'.Sanitize::filter($this->getActiveLinkClass()).'" ' : '';

            $wrap = FALSE; ## - change this TRUE if you want to wrap active crumb in a link
            if(TRUE === $wrap){
                ## - if we are to wrap inside a li
                if(TRUE === $this->getAppendLi()){
                    $__active_str = '<li '.$__active_li_class .' > <a href=" '.$link.' " '. $__active_link_class .' > '.$title.' </a> </li>';
                }else{
                    $__active_str = '<a href=" '.$link.' " '. $__active_link_class .' > '.$title.' </a>';
                }
            }else{
                $__active_str     = '<li '.$__active_li_class .' > '.$title.' </li>';
            }

            ## - build output
            $html .= ($i > 0) ? $bracelet . $__active_str : $__active_str;

        }

        ## - return
        return $html;
    }

    public static function generate($data, $append_li = FALSE, $active_link_class = NULL, $active_li_class = NULL, $bracelet = '»'){

        ## - output variables
        $status = FALSE;
        $errors = NULL;
        $__data = NULL;

        try{

            ## - initialize class and set variables
            $generate   = self::getInstance();
            $push       = NULL;

            ## - some variables
            $li_class   = NULL;
            $link_class = NULL;

            ## - validate
            if(!array($data)){
                throw new CatchThis(Translator::_e('BREADCRUMB_INVALID_CONFIG_DATA'));
            }else{
                if(empty($data)){
                    throw new CatchThis(Translator::_e('BREADCRUMB_EMPTY_CONFIG_DATA'));
                }
            }

            foreach ($data as $entry => $detail){
                if(is_array($detail)){
                    if( (isset($detail['title']) && !empty($detail['title'])) && (isset($detail['link']) && !empty($detail['link']))){

                        if(TRUE !== Validators::isString($detail['title'])){
                            $errors[] = Translator::_e('BREADCRUMB_INVALID_TITLE');
                        }if(TRUE !== Validators::isString($detail['link'])){
                            $errors[] = Translator::_e('BREADCRUMB_INVALID_LINK');
                        }

                        if(TRUE === Validators::isString($detail['title']) && TRUE === Validators::isString($detail['link'])){
                            if(isset($detail['li_class'])){
                                if(TRUE !== Validators::isString($detail['li_class'])){
                                    $errors[] = Translator::_e('BREADCRUMB_INVALID_LINK_CLASS');
                                }else{
                                    $li_class = Sanitize::filter($detail['li_class']);
                                }
                            }if(isset($detail['link_class'])){
                                if(TRUE !== Validators::isString($detail['link_class'])){
                                    $errors[] = Translator::_e('BREADCRUMB_INVALID_LI_CLASS');
                                }else{
                                    $link_class = Sanitize::filter($detail['link_class']);
                                }
                            }

                            $title = Sanitize::filter($detail['title']);
                            $link  = Sanitize::filter($detail['link']);
                            $push = $generate->setBreadcrumb($title, $link, $li_class, $link_class);
                        }
                    }
                }
            }

            ## - generate, set status and data
            if(!empty($push)){
                $status = TRUE;
                $__data = $push
                    ->setAppendLi($append_li)
                    ->setActiveLiClass($active_li_class)
                    ->setActiveLinkClass($active_link_class)
                    ->setBracelet($bracelet)
                    ->make();
            }

        }catch (CatchThis $e){
            $errors = $e->getMessage();
        }

        $errors = Fabiano::filterArray($errors);
        return    DataType::toObject(array(
            'status' => $status,
            'errors' => $errors,
            'html'   => $__data,
        ));

    }
}
