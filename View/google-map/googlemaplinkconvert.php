<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function getLatLong($link) {
    $zoom = 15;
    $type = 'ROADMAP';
    $address = "";
    $url = $link;
    //$match ;
    //preg_match('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $url, $match );
    //$lat = $response_a->results[0]->geometry->location->lat;
    //echo "<br />";
    //$long = $response_a->results[0]->geometry->location->lng;
    //$arr = array( "Lat" => $lat, "Long" => $long);
    return $url;
}
