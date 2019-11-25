<?php
namespace Osln\Weather;


class CurlRequest
{
    public function fetch($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        echo $json;
        $error = curl_error($ch);
        echo $error;
        curl_close($ch);
        $decoded = json_decode($json, true);
        return $decoded;
    }

    public function fetchMultiple($urls)
    {
        $ch = curl_init($urlFinal);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);
        curl_close($ch);
        $decoded = json_decode($json, true);
        return $decoded;
    }
}
