<?php

namespace Simtabi\Pheg\Facets\Generators\Notification;

class Notify
{

    /**
     * GrabIt holder class variables.
     *
     * @var array
     *
     * @version      1.0
     * @since        1.0
     */
    public $happy       = array();
    public $alert       = array();
    public $warning     = array();
    public $give        = array();
    public $in_love     = array();
    public $pinky       = array();
    public $dont_worry  = array();
    public $just_worry  = array();
    public $justify     = array();
    public $temporary   = array();
    public $sad         = array();
    public $very_sad    = array();
    public $default     = array();
    public $nothing     = array();
    public $eating      = array();
    public $hungry      = array();
    public $error       = array();
    public $bitter      = array();
    public $dreamy      = array();
    public $celebrate   = array();
    public $success     = array();
    public $ambiguous   = array();
    public $notify      = array();
    public $active      = array();
    public $dump        = array();
    public $stuck       = array();
    public $progress    = array();
    public $working     = array();
    public $action      = array();
    public $static      = array();
    public $sleepy      = array();
    public $doze        = array();
    public $debug       = array();
    public $angry       = array();
    public $mad         = array();
    public $critical    = array();
    public $danger      = array();
    public $emergency   = array();
    public $urgency     = array();
    public $confused    = array();
    public $worried     = array();
    public $mitigate    = array();
    public $info        = array();
    public $informed    = array();
    public $calm        = array();
    public $blue        = array();
    public $neat        = array();
    public $code        = array();


    /**
     * Chained Method Variables
     *
     * @version      1.0
     * @since        1.0
     */
    private $__close_button = TRUE;
    private $__icon_class   = NULL;
    private $__heading      = NULL;
    private $__content      = array();
    private $__style        = NULL;


    /**
     * GrabIt Identifiers
     *
     * @var string
     */
    private $default_identifier = 'global';


    /**
     * GrabIt Errors
     *
     * @var string
     */
    private $errors             = array();
    private $error_message      = array(
        'should_be_array' => 'Message data should be an array!',
        'empty_grab_data' => 'Empty grab data message. Please provide some!',
    );


    /**
     * Grouped Grab class variable
     *
     * @var array
     *
     * @version      1.0
     * @since        1.0
     */
    private $group              = array();

    /**
     * Holder variables
     *
     * @version      1.0
     * @since        1.0
     */
    private $default_style      = 'default';
    public  $icon_class         = NULL;
    public  $close_btn          = FALSE;
    public  $heading            = NULL;

    /**
     * GrabIt configuration
     *
     * We will store the Grab Name, Icon class and its' default heading
     *
     * @var array
     *
     * @version      1.0
     * @since        1.0
     */

    private $config             = array(
        'happy' => array(
            'header' => 'happy!',
            'icon' => 'ti-bell',
        ),
        'alert' => array(
            'header' => 'alert!',
            'icon' => 'ti-bell',
        ),
        'warning' => array(
            'header' => 'warning!',
            'icon' => 'ti-bell',
        ),
        'give' => array(
            'header' => 'give!',
            'icon' => 'ti-bell',
        ),
        'in_love' => array(
            'header' => 'in_love!',
            'icon' => 'ti-bell',
        ),
        'pinky' => array(
            'header' => 'pinky!',
            'icon' => 'ti-bell',
        ),
        'dont_worry' => array(
            'header' => 'dont_worry!',
            'icon' => 'ti-bell',
        ),
        'just_worry' => array(
            'header' => 'just_worry!',
            'icon' => 'ti-bell',
        ),
        'justify' => array(
            'header' => 'justify!',
            'icon' => 'ti-bell',
        ),
        'temporary' => array(
            'header' => 'temporary!',
            'icon' => 'ti-bell',
        ),
        'sad' => array(
            'header' => 'sad!',
            'icon' => 'ti-bell',
        ),
        'very_sad' => array(
            'header' => 'very_sad!',
            'icon' => 'ti-bell',
        ),
        'default' => array(
            'header' => 'default!',
            'icon' => 'ti-bell',
        ),
        'nothing' => array(
            'header' => 'nothing!',
            'icon' => 'ti-bell',
        ),
        'eating' => array(
            'header' => 'eating!',
            'icon' => 'ti-bell',
        ),
        'hungry' => array(
            'header' => 'hungry!',
            'icon' => 'ti-bell',
        ),
        'error' => array(
            'header' => 'error!',
            'icon' => 'ti-bell',
        ),
        'bitter' => array(
            'header' => 'bitter!',
            'icon' => 'ti-bell',
        ),
        'dreamy' => array(
            'header' => 'dreamy!',
            'icon' => 'ti-bell',
        ),
        'celebrate' => array(
            'header' => 'celebrate!',
            'icon' => 'ti-bell',
        ),
        'success' => array(
            'header' => 'success!',
            'icon' => 'ti-bell',
        ),
        'ambiguous' => array(
            'header' => 'ambiguous!',
            'icon' => 'ti-bell',
        ),
        'notify' => array(
            'header' => 'notify!',
            'icon' => 'ti-bell',
        ),
        'active' => array(
            'header' => 'active!',
            'icon' => 'ti-bell',
        ),
        'dump' => array(
            'header' => 'dump!',
            'icon' => 'ti-bell',
        ),
        'stuck' => array(
            'header' => 'stuck!',
            'icon' => 'ti-bell',
        ),
        'progress' => array(
            'header' => 'progress!',
            'icon' => 'ti-bell',
        ),
        'working' => array(
            'header' => 'working!',
            'icon' => 'ti-bell',
        ),
        'action' => array(
            'header' => 'action!',
            'icon' => 'ti-bell',
        ),
        'static' => array(
            'header' => 'static!',
            'icon' => 'ti-bell',
        ),
        'sleepy' => array(
            'header' => 'sleepy!',
            'icon' => 'ti-bell',
        ),
        'doze' => array(
            'header' => 'doze!',
            'icon' => 'ti-bell',
        ),
        'debug' => array(
            'header' => 'debug!',
            'icon' => 'ti-bell',
        ),
        'angry' => array(
            'header' => 'angry!',
            'icon' => 'ti-bell',
        ),
        'mad' => array(
            'header' => 'mad!',
            'icon' => 'ti-bell',
        ),
        'critical' => array(
            'header' => 'critical!',
            'icon' => 'ti-bell',
        ),
        'danger' => array(
            'header' => 'danger!',
            'icon' => 'ti-bell',
        ),
        'emergency' => array(
            'header' => 'emergency!',
            'icon' => 'ti-bell',
        ),
        'urgency' => array(
            'header' => 'urgency!',
            'icon' => 'ti-bell',
        ),
        'confused' => array(
            'header' => 'confused!',
            'icon' => 'ti-bell',
        ),
        'worried' => array(
            'header' => 'worried!',
            'icon' => 'ti-bell',
        ),
        'mitigate' => array(
            'header' => 'mitigate!',
            'icon' => 'ti-bell',
        ),
        'info' => array(
            'header' => 'info!',
            'icon' => 'ti-bell',
        ),
        'informed' => array(
            'header' => 'informed!',
            'icon' => 'ti-bell',
        ),
        'calm' => array(
            'header' => 'calm!',
            'icon' => 'ti-bell',
        ),
        'blue' => array(
            'header' => 'blue!',
            'icon' => 'ti-bell',
        ),
        'neat' => array(
            'header' => 'neat!',
            'icon' => 'ti-bell',
        ),
        'code' => array(
            'header' => 'code!',
            'icon' => 'ti-bell',
        ),
    );

    /**
     * GrabIt session expiry time in seconds
     * @var int
     */
    private $expiry_time        = 5;

    /**
     * GrabIt session name
     * @var string
     */
    private $session_name       = 'GrabIt';

    /**
     * Class constructor
     *
     * @version      1.0
     * @since        1.0
     */
    public function __construct() {

    }


    private function logErrors($errors){
        return $this->errors[] = $errors;
    }

    public function getErrors(){
        if(!empty($this->errors)){
            return $this->errors;
        }
        return FALSE;
    }


    public function getConfiguration(){
        return $this->config;
    }



    public function setIconClass($IconClass){
        $this->__icon_class = $IconClass;
        return $this;
    }

    public function getIconClass(){
        if(!empty($this->__icon_class)){
            return $this->__icon_class;
        }
        return FALSE;
    }


    public function setHeading($Heading){
        $this->__heading = $Heading;
        return $this;
    }

    public function getHeading(){
        if(!empty($this->__heading)){
            return $this->__heading;
        }
        return FALSE;
    }


    public function setContent($Content){
        $this->__content = (array) $Content;
        return $this;
    }

    public function getContent(){
        if(!empty($this->__content)){
            return $this->__content;
        }
        $this->logErrors($this->error_message['empty_grab_data']);
        return FALSE;
    }


    public function setStyle($Style){
        $this->__style = strtolower($Style);
        return $this;
    }

    public function getStyle(){
        if(!empty($this->__style)){
            return $this->__style;
        }
        return FALSE;
    }


    public function setCloseBtn($CloseButton = TRUE){
        $this->__close_button = $CloseButton;
        return $this;
    }

    public function getCloseBtn(){
        if(!empty($this->__close_button)){
            return $this->__close_button;
        }
        return FALSE;
    }


    public function render($groupName = NULL){

        $Style        = $this->getStyle();
        $Heading      = $this->getHeading();
        $Content      = $this->getContent();
        $IconClass    = $this->getIconClass();
        $CloseButton  = $this->getCloseBtn();

        $Generated = $this->__generate($Content, $Style, $Heading, $IconClass, $CloseButton);

        if(!empty($groupName)){
            return $this->group[] = array($groupName => $Generated);
        }elseif(empty($groupName)){
            return $this->group[] = array($this->default_identifier => $Generated);
        }else{
            return $Generated;
        }
    }



    public function __print($echo = TRUE, $identifier = NULL, $class = NULL){

        $style = NULL;
        if(empty($class)){
            $style = 'style="margin: 0;"';
        }

        $html = NULL;
        if(is_array($identifier)){
            foreach($identifier as $i){

                if(FALSE !== $this->__design(FALSE, $i)){
                    $html = '
                <article class="clearfix wow '.$class.'" '.$style.'>
                   '.$this->__design(FALSE, $i).'
                </article> ';
                }

            }
        }else{
            if(FALSE !== $this->__design(FALSE, $identifier)){
                $html = '
                <article class="clearfix wow '.$class.'" '.$style.'>
                   '.$this->__design(FALSE, $identifier).'
                </article> ';
            }

        }

        if(!empty($html)){
            if(TRUE === $echo){
                echo $html;
            }else{
                return $html;
            }
        }

        return FALSE;
    }


    public function getStylesheet($echo = FALSE){

        $path = ASSETS_PATH .'commons/libraries/stylesheets/grabit/styles.css';
        $path = str_replace('/', DS, $path);
        if(file_exists($path)){

            $stylesheet  = '<style type="text/css">';
            $stylesheet .=   file_get_contents($path);
            $stylesheet .= '</style>';

            if($echo){
                echo $stylesheet;
            }else return $stylesheet;

        }

        return FALSE;
    }




    public function __pushToSession($message = array(), $group_id = NULL, $timed = TRUE, $purge = FALSE){

        ## - get and set expiry time
        $expiry    = $this->__getExpiryTime();

        ## - get and set session name
        $sessionName = $this->__getSessionName();

        if(!empty($message)){

            ## - if purge messages is allowed
            if($purge){
                $this->__purgeFromSession();
            }

            ## - if timed message
            if($timed){

                $_SESSION[$sessionName] = array(
                    $expiry =>array(
                        'heading'    => ((isset($message['heading']))    ? $message['heading']    : NULL),
                        'content'    => ((isset($message['content']))    ? $message['content']    : NULL),
                        'style'      => ((isset($message['style']))      ? $message['style']      : NULL),
                        'icon_class' => ((isset($message['icon_class'])) ? $message['icon_class'] : NULL),
                        'close_btn'  => ((isset($message['close_btn']))  ? $message['close_btn']  : NULL),
                    ),
                );

            }else{

                ## - if name is not empty while timed messages = FALSE,
                if(!empty($group_id)){
                    ## - set random name
                    $randomId = rand(1, 10);
                    $group_id = 'grabIt_'.$randomId;
                }

                $_SESSION[$sessionName] = array(
                    "$group_id" => array(
                        'heading'    => ((isset($message['heading']))    ? $message['heading']    : NULL),
                        'content'    => ((isset($message['content']))    ? $message['content']    : NULL),
                        'style'      => ((isset($message['style']))      ? $message['style']      : NULL),
                        'icon_class' => ((isset($message['icon_class'])) ? $message['icon_class'] : NULL),
                        'close_btn'  => ((isset($message['close_btn']))  ? $message['close_btn']  : NULL),
                    ),
                );

            }

            ## if session message is not empty
            if(!empty($_SESSION[$sessionName])){
                return $_SESSION[$sessionName];
            }

        }

        return FALSE;
    }

    public function __purgeFromSession($all = FALSE){

        $time_now = intval($this->__getCurrentTime(TRUE));
        $title    = $this->__getSessionName();
        $data     = $this->__getSession();

        if($data){

            ## - if purge all
            if($all){
                unset($_SESSION[$title]);
                $_SESSION[$title] = array();
            }else{

                foreach($_SESSION[$title] as $time => $data){
                    ## - get message expiry time
                    if($time_now > $time){
                        unset($_SESSION[$title]);
                    }
                }

            }

            return TRUE;
        }

        return FALSE;
    }

    public function __renderFromSession($echo = TRUE){

        $time_now  = intval($this->__getCurrentTime(TRUE));
        $data      = $this->__getSession();

        if($data && (is_array($data) || is_object($data))){

            foreach($data as $time => $error){
                ## - get message expiry time
                if($time_now < $time){

                    $msg_data = array(
                        'heading'    => $error->heading,
                        'content'    => $error->content,
                        'style'      => $error->style,
                        'icon_class' => $error->icon_class,
                        'close_btn'  => $error->close_btn,
                    );

                    ## - set and return error messages
                    if($echo){
                        echo $this->__getFromArray($msg_data);
                    }else{
                        return $this->__getFromArray($msg_data);
                    }

                }else{
                    ## - lets delete old messages
                    $this->__purgeFromSession(TRUE);
                }
            }

        }
        return FALSE;
    }


    private function toArray($data){
        if (!is_object($data)) return $data;
        $out = array();
        foreach ($data as $k => $dat){
            if (is_object($data)){
                self::toArray($data);
            }
            else{
                $out[$k] = $dat;
            }
        }
        return $out;
    }



    private function __readContentData($data) {

        if(empty($data)){
            return FALSE;
        }

        $no_nested_child = 'no-nested-child';
        $has_nested      = 'has-nested';
        $has_child       = 'has-child';
        $no_child        = 'no-child';
        $list            = '';

        // if is object, convert to array
        $data = DataType::buildArray($data);

        if (is_array($data)){

            foreach ($data as $count => $entries) {
                if(!is_array($entries) && (!is_object($entries))){
                    $list .= '<li class="'.$no_child.'">'.$entries.'</li>';
                }else{
                    for($i = 0; $i < count($entries); $i++){
                        $entry = $entries[$i];
                        if(is_array($entry) && (!empty($entry))){

                            $list .= '<ul class="'.$has_nested.'">';

                            ## - loop through nested data
                            foreach($entry as $k => $j){
                                if(is_array($j) && (!empty($j))){
                                    $list .= '<li class="'.$has_child.'">'. $this->__processNested($j) . '</li>';
                                }else{
                                    $list .= '<li class="'.$no_nested_child.'">'.$j.'</li>';
                                }
                            }

                            $list .= '</ul>';

                        }else{
                            $list .= '<li class="'.$no_child.'">'.$entry.'</li>';
                        }
                    }
                }

            }

        }else{
            $list .= '<li>'.$data.'</li>';
        }

        return $list;
    }

    private function __processNested($data, $parent_id = 0){

        ## - ensure it's only an array
        if(!array($data)){
            $this->logErrors($this->error_message['should_be_array']);
            return FALSE;
        }

        $message_class = 'grab-message';
        $heading_class = 'grab-heading';
        $nested_class  = 'is-nested';
        $url_class     = 'grab-url';
        $html          = '';
        $url           = '';
        foreach ($data as $detail){
            $heading = ((isset($detail['heading'])   && (!empty($detail['heading'])))   ? $detail['heading']   : NULL);
            $message = ((isset($detail['content'])   && (!empty($detail['content'])))   ? $detail['content']   : NULL);
            $p_id    = ((isset($detail['parent_id']) && (!empty($detail['parent_id']))) ? $detail['parent_id'] : 0);
            $id      = ((isset($detail['id'])        && (!empty($detail['id'])))        ? $detail['id']        : 1);

            $url_title = ((isset($detail['url']['title']) && (!empty($detail['url']['title']))) ? $detail['url']['title'] : NULL);
            $url_link  = ((isset($detail['url']['title']) && (!empty($detail['url']['title']))) ? $detail['url']['title'] : NULL);

            if(!empty($heading)){
                $heading = '<p class="'.$heading_class.'"> '.$heading.'</p>';
            }

            if(!empty($url_link)){
                $url = '<a class="'.$url_class.'" href='.$url_link.'>'.(empty($url_title) ? $url_link : $url_title).'</a>';
            }

            if(!empty($message)){
                $message = '<div class="'.$message_class.'"> '.$message.'</div>';
            }

            if ($p_id == $parent_id) {
                $html .= '<li>
				         '.$heading.'
				         '.$url.'
				         '.$message.'
				         '.$this->__processNested($data, $id).'
				         </li>
				';
            }

        }

        return $html ?  "\n<ul class='".$nested_class."'>\n$html</ul>\n" : NULL;
    }

    private function __design($echo = TRUE, $identifier = NULL){

        ## - initialize the output holder variable
        $output = NULL;
        $grab   = NULL;

        ## - grabit configuration
        $data = $this->getConfiguration();

        foreach($data as $style => $detail){
            if((isset($data[$style]) && (!empty($data[$style]))) && (!empty($this->$style))){
                $output .= $this->__generate($this->$style, str_replace('_', '-', $style), $this->heading, $this->icon_class, $this->close_btn);
            }
        }

        ## - switch between desired output
        if(TRUE === $echo){

            ## - get based on given name
            if(!empty($identifier)){
                if(FALSE !== $this->__getGrouped($identifier)){
                    $grab = $this->__getGrouped($identifier);
                }
            }elseif(empty($identifier)){
                if(FALSE !== $this->__getGrouped($this->default_identifier)){
                    $grab = $this->__getGrouped($this->default_identifier);
                }
            }else{
                $grab = $output;
            }

        }else{

            ## - get based on given name
            if(!empty($identifier)){
                if(FALSE !== $this->__getGrouped($identifier)){
                    $grab = $this->__getGrouped($identifier);
                }
            }else{
                $grab = $output;
            }

            if(!empty($grab)){
                return $grab;
            }
        }

        return FALSE;
    }

    private function __getGrouped($groupName){

        if(!empty($this->group)){

            $identified = $this->group;
            $output     = NULL;
            if(is_array($identified)){

                foreach($identified as $entry => $grab){

                    if(is_array($grab)){
                        foreach($grab as $e => $g){
                            if($e == $groupName){
                                $output .= $g;
                            }
                        }
                    }else{
                        if($entry == $groupName){
                            $output .= $identified[$entry];
                        }
                    }

                } return $output;

            }else{
                return $this->group;
            }

        }

        return FALSE;
    }

    private function __getFromArray($content = array()){

        if(!empty($content)){

            ## - structure
            $heading     = ((isset($content['heading']))    ? $content['heading']    : NULL);
            $_content    = ((isset($content['content']))    ? $content['content']    : NULL);
            $style       = ((isset($content['style']))      ? $content['style']      : NULL);
            $icon_class  = ((isset($content['icon_class'])) ? $content['icon_class'] : NULL);
            $close_btn   = ((isset($content['close_btn']))  ? $content['close_btn']  : NULL);

            return $this->__generate($_content, $style, $heading, $icon_class, $close_btn);
        }

        return FALSE;
    }

    private function __generate($content = array(), $style, $heading = NULL, $icon_class = NULL, $close_btn = FALSE){

        ## - if is not empty
        if(empty($content)){
            return FALSE;
        }else{
            ## - if is not array recreate
            if(!array($content)){
                $content[] = $content;
            }
        }

        ## - grabit configuration
        $configuration = $this->getConfiguration();

        ## - build and assign error list
        $content       = $this->__readContentData($content);

        ## - set error style
        if(empty($style)){
            $style = $this->default_style;
        }else{
            if(!isset($configuration[$style]) && (empty($configuration[$style]))){
                ## - if given style exists
                $style = $this->default_style;
            }
        }

        ## - set icon
        if(FALSE === $icon_class){
            $icon = FALSE;
        } else{

            if((empty($icon_class)) || (is_null($icon_class))){
                $icon = FALSE;
            } else{
                if(TRUE == $icon_class){
                    $icon = $configuration[$style]['icon'];
                } else{
                    $icon = $icon_class;
                }

                $icon = '<i class="grabit-icon grabit-icon-medium '.$icon.'"></i>';
            }
        }

        ## - set heading
        if(empty($heading)){
            if(empty($this->heading)){
                $heading = FALSE;
            }
        }

        ## - build header block
        $header_html = '<div class="grabit-heading">
                             <h1 class="grabit-header"> '.$heading.' </h1>
                           </div>';

        ## - build close button
        $close = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					   <span aria-hidden="true">&times;</span>
					  </button>';

        ## - construct and return error block
        $block = 'grab-block';
        $html  =  ' <div class="grabit grabit-'.$style.' grabit-large-type grabit-small-padding grabit-clear-radius grabit-add-border grabit-clear-shadow '.(FALSE !== $icon ? 'grabit-has-icon grabit-icon-align-left' : '').' fade in alert" role="alert">
						'.($close_btn ? $close : '').'
						'.(FALSE !== $icon ? $icon : '').'
						<div class="grabit-wrapper">
						  '.((FALSE !== $heading) ? $header_html : '').'
								<ul class="'.$block.'">
							      '.$content.'
							     </ul>
						</div>
					</div>';

        ## - return content
        return $html;
    }



    private function __getSession($config = FALSE){

        $title = $this->__getSessionName();

        ## - grab data from the session variable
        if(isset($_SESSION[$title]) && (!empty($_SESSION[$title]))){
            return json_decode(json_encode($_SESSION[$title], $config));
        }

        return FALSE;
    }

    private function __getSessionName(){
        return $this->session_name;
    }

    private function __getExpiryTime(){

        $expiry_time = intval($this->expiry_time);
        $time_now    = intval($this->__getCurrentTime(TRUE));

        if(!empty($time_now)){
            return $time_now + $expiry_time;
        }

        return FALSE;
    }

    private function __getCurrentTime($timestamp = FALSE, $datetime_format = "Y-m-d H:i:s", $datetime = NULL, $timezone = "Africa/Nairobi") {

        $objDateTime = new \DateTime();
        $objDateTime->setTimezone(new \DateTimeZone($timezone));

        if (!empty($datetime)) {
            $float_unix_time = (is_string($datetime)) ? strtotime($datetime) : $datetime;
            if (method_exists($objDateTime, "setTimestamp")) {
                $objDateTime->setTimestamp($float_unix_time);
            }
            else {
                $arrDate = getdate($float_unix_time);
                $objDateTime->setDate($arrDate['year'],  $arrDate['mon'],     $arrDate['day']);
                $objDateTime->setTime($arrDate['hours'], $arrDate['minutes'], $arrDate['seconds']);
            }
        }

        if(TRUE == $timestamp){
            ## - if get timestamp
            return strtotime($objDateTime->format($datetime_format));
        }else{
            return $objDateTime->format($datetime_format);
        }
    }
}
