<?php

namespace Simtabi\Pheg\Phegs\Copyright;

use DateTime;

class Copyright
{

    public const
        TYPE_COMBINED = 'combined',
        TYPE_START    = 'start',
        TYPE_END      = 'end';

    private
        $dateTime,
        $registeredSign           = "&reg;",
        $trademarkSign            = "&trade;",
        $trademarked              = true,
        $registered               = true,


        $copyrightDeclarationText = '',
        $companyName              = '',
        $copyrightStartYear       = '',
        $copyrightEndYear         = '',
        $longVersion              = true,
        $longFormat               = true,
        $type                     = 'combined',
        $build                    = null;

    public function __construct(){
        $this->dateTime = new DateTime();
    }

    /**
     * @return string
     */
    public function getRegisteredSign(): string
    {
        return $this->registeredSign;
    }

    /**
     * @param string $registeredSign
     * @return self
     */
    public function setRegisteredSign(string $registeredSign): self
    {
        $this->registeredSign = $registeredSign;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrademarkSign(): string
    {
        return $this->trademarkSign;
    }

    /**
     * @param string $trademarkSign
     * @return self
     */
    public function setTrademarkSign(string $trademarkSign): self
    {
        $this->trademarkSign = $trademarkSign;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTrademarked(): bool
    {
        return $this->trademarked;
    }

    /**
     * @param bool $trademarked
     * @return self
     */
    public function setTrademarked(bool $trademarked): self
    {
        $this->trademarked = $trademarked;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRegistered(): bool
    {
        return $this->registered;
    }

    /**
     * @param bool $registered
     * @return self
     */
    public function setRegistered(bool $registered): self
    {
        $this->registered = $registered;
        return $this;
    }


    /**
     * @return string
     */
    public function getCopyrightDeclarationText(): string
    {
        return $this->copyrightDeclarationText;
    }

    /**
     * @param string $copyrightDeclarationText
     * @return self
     */
    public function setCopyrightDeclarationText(string $copyrightDeclarationText): self
    {
        $this->copyrightDeclarationText = $copyrightDeclarationText;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return self
     */
    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCopyrightStartYear(): string
    {
        return $this->copyrightStartYear;
    }

    /**
     * @param string $copyrightStartYear
     * @return self
     */
    public function setCopyrightStartYear(string $copyrightStartYear): self
    {
        $this->copyrightStartYear = $copyrightStartYear;
        return $this;
    }

    /**
     * @return string
     */
    public function getCopyrightEndYear(): string
    {
        return $this->copyrightEndYear;
    }

    /**
     * @param string $copyrightEndYear
     * @return self
     */
    public function setCopyrightEndYear(string $copyrightEndYear): self
    {
        $this->copyrightEndYear = $copyrightEndYear;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLongVersion(): bool
    {
        return $this->longVersion;
    }

    /**
     * @param bool $longVersion
     * @return self
     */
    public function setLongVersion(bool $longVersion): self
    {
        $this->longVersion = $longVersion;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLongFormat(): bool
    {
        return $this->longFormat;
    }

    /**
     * @param bool $longFormat
     * @return self
     */
    public function setLongFormat(bool $longFormat): self
    {
        $this->longFormat = $longFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }


    private function build(){

        $startYear   = $this->copyrightStartYear;
        $endYear     = $this->copyrightEndYear;
        $longFormat  = $this->longFormat;
        $longVersion = $this->longVersion;
        $type        = $this->type;

        // some variables
        $dateTime    = new DateTime();

        // get and process start year
        if(empty($startYear)){
            $startYear = date('Y') . '-01-01';
        }else{
            $startYear = $startYear . '-01-01';
        }

        // get and process end year
        if(empty($endYear)){
            $startYear = date('Y') . '-01-01';
        }else{
            $endYear = $endYear . '-01-01';
        }

        // start process
        if(!empty($startYear) && !empty($endYear)){
            switch ($longFormat){
                // lets filter format output
                case true :

                    // start year
                    $dateTime->setTimestamp(strtotime($startYear));
                    $startYear = $dateTime->format('Y');

                    // end year
                    $dateTime->setTimestamp(strtotime($endYear));
                    $endYear  = $dateTime->format('Y');
                    ; break;
                case false :

                    // start year
                    $dateTime->setTimestamp(strtotime($startYear));
                    $startYear = $dateTime->format('y');

                    // end year
                    $dateTime->setTimestamp(strtotime($endYear));
                    $endYear   = $dateTime->format('y');

                    ; break;
                default :
                    // start year
                    $dateTime->setTimestamp(strtotime($startYear));
                    $startYear = $dateTime->format('y');

                    // end year
                    $dateTime->setTimestamp(strtotime($endYear));
                    $endYear   = $dateTime->format('y');
                    ; break;
            }

            // lets filter version request
            switch ($longVersion){
                case true :
                    switch ($type){
                        // lets filter output request
                        case "combined" : $this->build = $startYear . " - " . $endYear ; break;
                        case "start"    : $this->build = $startYear; break;
                        case "end"      : $this->build = $endYear; break;
                        default         : $this->build = $endYear; break;
                    } break;
                case false :
                    switch ($type){
                        // lets filter output request
                        case "start" : $this->build = $startYear ; break;
                        case "end"   : $this->build = $endYear; break;
                        default      : $this->build = $endYear; break;
                    } break;
                default :
                    switch ($type){
                        case "start" : $this->build = $startYear; break;
                        case "end"   : $this->build = $endYear; break;
                        default      : $this->build = $endYear; break;
                    } break;
            }

        }
        else{

            // set default date
            $dateTime->setTimestamp(strtotime(date('Y')));

            // lets filter output request
            switch ($longVersion){
                case true  : $this->build = $dateTime->format('Y'); break;
                case false : $this->build = $dateTime->format('y'); break;
                default    : $this->build = $dateTime->format('y'); break;
            }

        }

        return $this;
    }

    public function buildCopyrightYear(){
        return $this->build();
    }

    public function buildCopyrightText(){

        // get copyright year
        $copyrightYear = $this->copyrightYear();
        $companyName   = $this->companyName;
        $declaration   = $this->copyrightDeclarationText;

        // construct
        $htmlText = '&copy;&nbsp;' . $copyrightYear . '&nbsp;' . $companyName . '&nbsp;&centerdot;&nbsp;' . ucfirst(strtolower(htmlentities($declaration)));
        return html_entity_decode($htmlText);
    }

    public function buildCompanyName($companyName){
        // get company name
        $companyName = ucwords(strtolower($companyName));

        // construct signs
        $trademark  = !$this->isTrademarked() ? '' : $this->getTrademarkSign();
        $registered = !$this->isRegistered() ? ''  : " " .$this->getRegisteredSign();
        return $companyName . $trademark . $registered;
    }

}