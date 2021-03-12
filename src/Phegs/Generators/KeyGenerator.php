<?php


namespace Simtabi\Pheg\Phegs\Generators;


class KeyGenerator
{


    /**
     * [*]=>a-z
     * [.]=>0-9
     * [+]=>a-z and 0-9
     */

    private $uppercase = true;

    /**
     * ProductKeyGenerator constructor.
     * @param bool $uppercase
     */
    public function __construct(bool $uppercase = true)
    {
        $this->uppercase = $uppercase;
    }

    /**
     * @return bool
     */
    public function isUppercase(): bool
    {
        return $this->uppercase;
    }

    /**
     * @param bool $uppercase
     * @return self
     */
    public function setUppercase(bool $uppercase): self
    {
        $this->uppercase = $uppercase;
        return $this;
    }

    function key($format) {
        $format = str_replace(" ", "", $format);
        $array  = str_split($format);
        $count  = count($array);
        for ($i = 0; $i < $count; $i++) {
            $array[$i] = $this -> generateChar($array[$i]);
        }
        return implode("", $array);
    }

    private function generateChar($char) {
        $r = null;

        switch ($char) {
            case '.' :
                $r = rand(0, 9);
                break;
            case '*' :
                $r = $this -> randomChar();
                break;
            case '+' :
                (rand(0, 1)) ? $r = rand(0, 9) : $r = $this -> randomChar();
                break;
            default :
                $r = $char;
        }

        return $r;
    }

    private function randomChar() {
        $Characters = "abcdefghijklmnopqrstuxyvwz";
        $CharNumber = strlen($Characters);

        $index = mt_rand(0, $CharNumber - 1);
        $char  = ($this -> uppercase) ? strtoupper($Characters[$index]) : $Characters[$index];
        return $char;
    }

}