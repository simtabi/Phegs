<?php

namespace Simtabi\Pheg\Facets\Helpers\Traits;

trait ColorToolsTrait
{

    public static function hex2rgba($color, $opacity = false) {

// default values
// http://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/
        $defaultRgb = 'rgb(0,0,0)';
        $defaultHex = '000000';

//Return default if no color provided
        if(empty($color)){ return $defaultRgb; }

//Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }

//Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            $hex = array( $defaultHex[0] . $defaultHex[0], $defaultHex[1] . $defaultHex[1], $defaultHex[2] . $defaultHex[2] );
        }

//Convert hexadecimal to rgb
        $rgb =  array_map('hexdec', $hex);

//Check if opacity is set(rgba or rgb)
        if (false != $opacity){
            $opacity = abs($opacity) > 1 ? 1.0 : $opacity;
            $output  = 'rgba('.implode(",",$rgb).','.$opacity.')';
        }
        else if (0 === $opacity){
            $output  = 'rgba('.implode(",",$rgb).','.$opacity.')';
        }
        else {
            $output = 'rgb('.implode(",",$rgb).')';
        }

// generate rgb array
        $array = array();
        for ($i = 0; $i < count($rgb); $i++){
            switch ($i){
                case 0: $array['r'] = $rgb[$i]; break;
                case 1: $array['g'] = $rgb[$i]; break;
                case 2: $array['b'] = $rgb[$i]; break;
            }
        }

//Return rgb(a) color string
        return TypeConverter::toObject(array(
            'opacity' => $opacity,
            'array'   => $array,
            'css'     => $output,
        ));
    }

    public static function argb2rgba($color)
    {
// default values
        $defaultRgba = 'rgba(0,0,0,1)';
        $defaultHex  = '000000';

        $output = 'rgba(0,0,0,1)';

//Return default if no color provided
        if(empty($color)){ return $defaultRgba; }

//Sanitize $color if "#" is provided
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }

        if (strlen($color) == 8) { //ARGB
            $opacity = round(hexdec($color[0].$color[1]) / 255, 2);
            $hex = array($color[2].$color[3], $color[4].$color[5], $color[6].$color[7]);
            $rgb = array_map('hexdec', $hex);
            $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
        }

        return $output;
    }

    public static function generateRandomColor(){

// generate random color and assign to variables
        $r = Helpers::randomizeNumber(200, 255);
        $g = Helpers::randomizeNumber(200, 255);
        $b = Helpers::randomizeNumber(200, 255);

// convert rgb to hex
        $hex = '#' . sprintf('%02x', $r) . sprintf('%02x', $g) . sprintf('%02x', $b);;

        return array(
            'rgb' => array(
                'r' => $r,
                'g' => $g,
                'b' => $b,
            ),
            'hex' => $hex,
        );
    }

    public static function decodeHEXColor($hexColor){
        return array(
            'r' => hexdec(substr($hexColor, 0, 2)),
            'g' => hexdec(substr($hexColor, 2, 2)),
            'b' => hexdec(substr($hexColor, 4, 2)),
        );
    }

    public static function fromIntToHex($color, $prependHash = true)
    {
        return ($prependHash ? '#' : '').sprintf('%06X', $color);
    }

    public static function fromHexToInt($color)
    {
        return hexdec(ltrim($color, '#'));
    }

    public static function fromIntToRgb($color)
    {
        return array(
            'r' => $color >> 16 & 0xFF,
            'g' => $color >> 8 & 0xFF,
            'b' => $color & 0xFF,
        );
    }

    public static function fromRgbToInt(array $components)
    {
        return ($components['r'] * 65536) + ($components['g'] * 256) + ($components['b']);
    }

    /**
     * Calculates the brightness of the given color.
     *
     * @link http://www.nbdtech.com/Blog/archive/2008/04/27/Calculating-the-Perceived-Brightness-of-a-Color.aspx
     *
     * @param $color string the hex color string.
     * @return float the brightness.
     */
    public static function calculateBrightness($color)
    {
        $components = is_array($color) ? $color : TypeConverter::toArray(self::hex2rgba($color)->array);
        return sqrt(0.241 * pow($components['r'], 2) + 0.691 * pow($components['g'], 2) + 0.068 * pow($components['b'], 2));
    }

    /**
     * Calculates the saturation of the given color.
     *
     * @param $color string the color as array or hex color string.
     * @return float the saturation.
     */
    public static function calculateSaturation($color)
    {
        $components = is_array($color) ? $color : TypeConverter::toArray(self::hex2rgba($color)->array);
        $var_Min    = min($components['r'], $components['g'], $components['b']);
        $var_Max    = max($components['r'], $components['g'], $components['b']);
        $del_Max    = $var_Max - $var_Min;
        return $del_Max / $var_Max;
    }


    public static function darkenColor($rgb, $darker=2) {

        $hash = (strpos($rgb, '#') !== false) ? '#' : '';
        $rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
        if(strlen($rgb) != 6) return $hash.'000000';
        $darker = ($darker > 1) ? $darker : 1;

        list($R16,$G16,$B16) = str_split($rgb,2);

        $R = sprintf("%02X", floor(hexdec($R16)/$darker));
        $G = sprintf("%02X", floor(hexdec($G16)/$darker));
        $B = sprintf("%02X", floor(hexdec($B16)/$darker));

        return $hash.$R.$G.$B;
    }

    public static function rgb2hex2rgb($color){
        if(!$color) return false;
        $color = trim($color);
        $result = false;
        if(preg_match("/^[0-9ABCDEFabcdef\#]+$/i", $color)){
            $hex = str_replace('#','', $color);
            if(!$hex) return false;
            if(strlen($hex) == 3):
                $result['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
                $result['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
                $result['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            else:
                $result['r'] = hexdec(substr($hex,0,2));
                $result['g'] = hexdec(substr($hex,2,2));
                $result['b'] = hexdec(substr($hex,4,2));
            endif;
        }elseif (preg_match("/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i", $color)){
            $rgbstr = str_replace(array(',',' ','.'), ':', $color);
            $rgbarr = explode(":", $rgbstr);
            $result = '#';
            $result .= str_pad(dechex($rgbarr[0]), 2, "0", STR_PAD_LEFT);
            $result .= str_pad(dechex($rgbarr[1]), 2, "0", STR_PAD_LEFT);
            $result .= str_pad(dechex($rgbarr[2]), 2, "0", STR_PAD_LEFT);
            $result = strtoupper($result);
        }else{
            $result = false;
        }

        return $result;
    }

    public static function genRandomColor(){
        $randomcolor = '#' . strtoupper(dechex(rand(0,10000000)));
        if (strlen($randomcolor) != 7){
            $randomcolor = str_pad($randomcolor, 10, '0', STR_PAD_RIGHT);
            $randomcolor = substr($randomcolor,0,7);
        }
        return $randomcolor;
    }


    public static function getColorFromHex( $hex ) {
        // Strip # sign is present
        $color = str_replace("#", "", $hex);
        // Make sure it's 6 digits
        if( strlen($color) == 3 ) {
            $color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
        } else if( strlen($color) != 6 ) {
            return self::_e('HEX color needs to be 6 or 3 digits long');
        }
        return $color;
    }

}
