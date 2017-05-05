<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Model/loggerInterface.php';
class Logger implements LoggerInterface{
    public function __construct() {
        
    }
    
    public function setMessage($functionName) {
        $date = date("m.d.y H:i:s");
        $message = $date." ".$functionName." ".PHP_EOL;
        file_put_contents("log.txt", $message, FILE_APPEND);
    }
}