<?php

function formatAddress($string) {
    $address=str_replace(" ","+", $string);
    $string = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address."&key=AIzaSyBs_ZcZOLSIUTmHjuq4DA6H-CeFtXIXlZQ");
    $json = json_decode($string, true);
    $formatAddress=$json['results'][0]['formatted_address'];
    if (!isset($formatAddress)) {
        $formatAddress=$string;
    }
    return $formatAddress;
}

function getLatLong($string) {
    $address=str_replace(" ","+", $string);
    $string = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address."&key=AIzaSyBs_ZcZOLSIUTmHjuq4DA6H-CeFtXIXlZQ");
    $json = json_decode($string, true);
    $lat=$json['results'][0]['geometry']['location']['lat'];
    $lng=$json['results'][0]['geometry']['location']['lng'];    
    if (!(isset($lat)&&isset($lng))) {
        $lat=0;
        $lng=0;
    }
    return ['lat'=>$lat, 'lng'=>$lng];
}

?>