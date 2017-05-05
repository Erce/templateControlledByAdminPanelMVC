<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Model/loggerModel.php';
class LogoffController {
    
    public function logoff() {
        try {
            $_SESSION = array();
            session_destroy();
            echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
            exit;   
        } catch (Exception $exc) {
            $logger = new Logger();
            $logger->setMessage("logoffController->logoff()");
        }
    }
}