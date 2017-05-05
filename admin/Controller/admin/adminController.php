<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Model/loggerModel.php';
class AdminController {
    private $model;
    private $logger;
    
    public function __construct($model) {
        $this->model = $model;
        $this->logger = new Logger();
    }
    
    public function check() {
        try {
            //This is the directory where images will be saved
            $id = isset($_SESSION['userId']) ? $_SESSION['userId'] : "";
            $username = $_POST['username'];
            $pass = sha1($_POST["password"]);

            $adminArray = array( "Id" => $id,
                                 "UserName" => $username,
                                 "Password" => $pass);
            $this->model->check($adminArray);
        } catch (Exception $exc) {
            $this->logger->setMessage("adminController->check()");
        }
    }
}