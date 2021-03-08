<?php

namespace Simtabi\Pheg\Facets\Generators;

class PassGen
{
    protected $symbols;
    protected $passwords = [];
    protected $usedSymbols;
    private   $length;
    private   $count;
    private   $characters;
    private   $lastPassword;
    /**
     * PasswordGenerator constructor.
     * @param int $length
     * @param int $count
     * @param string $characters
     */
    public function __construct($length = 8, $count = 1, $characters = 'lower_case,upper_case,numbers,special_symbols')
    {
        $this->symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
        $this->symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $this->symbols["numbers"] = '1234567890';
        $this->symbols["special_symbols"] = '!?~@#-_+<>[]{}';
        $this->length = $length;
        $this->count  = $count;
        $this->characters = $characters;
    }
    /**
     * @param int $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }
    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }
    /**
     * @param string $characters
     */
    public function setCharacters($characters)
    {
        $this->characters = $characters;
    }
    /**
     * @return array : return the generated password
     * @internal param $length : the length of the generated password
     * @internal param $count : number of passwords to be generated
     * @internal param string $characters (optional): types of characters to be used in the password
     */
    public function generate()
    {
        /**
         * get characters types to be used for the password
         */
        $characters = explode(",",$this->characters);
        /**
         * build a string with all characters
         */
        foreach ($characters as $key=>$value) {
            $this->usedSymbols .= $this->symbols[$value];
        }
        /**
         * strlen starts from 0 so to get number of characters deduct 1
         */
        $symbols_length = strlen($this->usedSymbols) - 1;
        /**
         *
         */
        for ($p = 0; $p < $this->count; $p++) {
            $pass = '';
            for ($i = 0; $i < $this->length; $i++) {
                $n = rand(0, $symbols_length); // get a random character from the string with all characters
                $pass .= $this->usedSymbols[$n]; // add the character to the password string
            }
            $this->passwords[] = $pass;
        }
        return $this->getPassword();
    }
    /**
     * @return array: list of all generated passwords
     */
    public function getPasswords()
    {
        return $this->passwords;
    }
    /**
     * @return string: single password with random index
     */
    public function getPassword()
    {
        if ($this->getCount() > 1) {
            $this->lastPassword = $this->passwords[rand(0, count($this->passwords)-1)];
        } else {
            $this->lastPassword = $this->passwords[0];
        }
        return $this->lastPassword;
    }
    /**
     * @return string: last returned password
     */
    public function getLastPassword()
    {
        return $this->lastPassword;
    }
    /**
     * @return int length of the password
     */
    public function getLength()
    {
        return $this->length;
    }
    /**
     * @return int count of the passwords generated
     */
    public function getCount()
    {
        return $this->count;
    }
}
