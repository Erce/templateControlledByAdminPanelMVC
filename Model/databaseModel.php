<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Model/loggerModel.php'; 


class DatabaseModel {
    private $databaseUsername;
    private $databasePassword;
    private $databaseIp;
    private $databaseName;


    public function __construct() {
        $this->logger = new Logger();
    }
    
    public function setDatabaseInfo() {
        $xmlFile = simplexml_load_file("config.xml") or die("Error: Cannot find file name config.xml");
        $this->databaseUsername = $xmlFile->username;
        $this->databasePassword = $xmlFile->password;
        $this->databaseName = $xmlFile->databasename;
        $this->databaseIp = $xmlFile->hostIp;
    }

    public function getDatabaseInfo() {
        $databaseInfo = array("Username" => $this->databaseUsername,
                              "Password" => $this->databasePassword,
                              "DatabaseName" => $this->databaseName,
                              "DatabaseIp" => $this->databaseIp);
        return $databaseInfo;
    }

    public function update($databaseArray) {
        $xmlFile = simplexml_load_file("config.xml") or die("Error: Cannot find file name config.xml");
        $xmlFile->username = $databaseArray["Username"];
        $xmlFile->password = $databaseArray["Password"];
        $xmlFile->databasename = $databaseArray["DatabaseName"];
        $xmlFile->hostIp = $databaseArray["HostIp"];
        $xmlFile->asXML("config.xml");
    }
    
    public function add() {
        
    }
}