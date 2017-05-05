<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Model/loggerModel.php'; 


class DatabaseController{
    private $model;
    private $logger;
    
    public function __construct($model) {
        $this->model = $model;
        $this->logger = new Logger();
    }
    
    public function update() {
        try {
            $username = $_POST['username'];
            $password = $_POST["password"];
            $databaseName = $_POST["databaseName"];
            $hostIp = $_POST["hostIp"];

            $databseArray = array( "Username" => $username,
                                 "Password" => $password,
                                 "DatabaseName" => $databaseName,
                                 "HostIp" => $hostIp);
            $this->model->update($databseArray);
        } catch (Exception $exc) {
            $this->logger->setMessage("databaseController->update()");
        }
    }
}