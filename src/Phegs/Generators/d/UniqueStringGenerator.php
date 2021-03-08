<?php

namespace Simtabi\Laranail\Supports;

class UniqueStringGenerator
{
    public function UniqueString()
    {
        return base64_encode(rand(1,1000)."_".time()."_".rand(1,1000));
        // Basically This is Return Encoding in Base64 of RandomNumber(1-1000)+"_"+CurrentTimeInMilliSecond +"_"+RandomNumber(1-1000)
    }

    public function UniqueNumber()
    {
        return rand(1,1000).time().rand(1,1000);
        // Basically This is Return RandomNumber(1-1000)+CurrentTimeInMilliSecond+RandomNumber(1-1000)
    }

    public function UniqueStringId()
    {
        return base64_encode(rand(1,1000))."-".base64_encode(time())."-".base64_encode(rand(1,1000));
        // Basically This is Return Encoding in Base64 of RandomNumber(1-1000)+"-"+Encoding in Base64 of CurrentTimeInMilliSecond +"-"+Encoding in Base64 of RandomNumber(1-1000)
    }

    public function UniqueNumberId()
    {
        return rand(1,1000)."-".time()."-".rand(1,1000);
        // Basically This is Return RandomNumber(1-1000)+"-"+CurrentTimeInMilliSecond +"-"+RandomNumber(1-1000)
    }

}