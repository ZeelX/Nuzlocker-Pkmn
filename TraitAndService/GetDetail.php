<?php

class GetDetail
{

    public static function recupDetail(string $url) :array
    {
        $var= file_get_contents($url);
        return json_decode($var, true);

    }

}