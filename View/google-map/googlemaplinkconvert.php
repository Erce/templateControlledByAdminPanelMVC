<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function getLatLong() {
    $zoom = 15;
    $type = 'ROADMAP';
    $address = "Ayvalı Cad. No:126/A Etlik/ANKARA";
    $url = "https://www.google.com.tr/maps/place/Etlik,+Ayval%C4%B1+Cd.+No:126,+06010+Ke%C3%A7i%C3%B6ren%2FAnkara/@39.9796749,32.8206548,16.75z/data=!4m5!3m4!1s0x14d34c11028fad91:0xf3b8520e023156b9!8m2!3d39.979953!4d32.823118";
    //$match ;
    //preg_match('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $url, $match );
    //$lat = $response_a->results[0]->geometry->location->lat;
    //echo "<br />";
    //$long = $response_a->results[0]->geometry->location->lng;
    //$arr = array( "Lat" => $lat, "Long" => $long);
    return $url;
}
