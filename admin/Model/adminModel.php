<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'connection.php';
require_once 'Model/loggerModel.php'; 

class AdminModel {
    private $adminFlag = false;
    private $adminRow;
    private $logger;

    public function __construct() {
        $this->logger = new Logger();
    }
    
    public function getAdminFlag() {
        return $this->adminFlag;
    }
    
    public function check($adminArray) {
        try {
            $db = Db::getInstance();
            $query = sprintf("SELECT id FROM users WHERE username = '%s' AND password = '%s'",
                    $adminArray["UserName"],
                    $adminArray["Password"]);
            //Query the database
            $req = $db->prepare($query);
            //file_put_contents("log.txt", "req=".$req.PHP_EOL, FILE_APPEND);
            $req->execute();
            /* Allow access if a matching record was found, else deny access. */
            $row = $req->fetch();
            if (isset($row["id"])) {
                /* access granted */
                session_start();
                header("Cache-control: private");
                $_SESSION['user_is_loggedin'] = 1;

                if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == '1') {
                    $cookiehash = md5(sha1(username . user_ip));
                    setcookie("uname",$cookiehash,time()+3600*24*365,'/','.localhost');
                }
                else {
                    alert($_POST['rememberMe']);
                }

                $_SESSION["access"] = "granted";
                $_SESSION["userId"] = $row['id'];
                echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                //header('Location: index.php');
            } 
            else {
                /* access denied &#8211; redirect back to login */
                //
                echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
                //header("Location: admin.php");
            }

        } catch (Exception $exc) {
            $this->logger->setMessage("adminModel->check()");
        }
    }
    
    public function getAdmin($id) {
        try {
            $db = Db::getInstance();
            $query = "SELECT * FROM users WHERE id=".$id;
            $req = $db->prepare($query);
            $req->execute();
            $row=$req->fetch();
            $this->adminRow = array( "Id" => $row['id'],
                                            "UserName" => $row['username']); 
            return $this->adminRow;
              
        } catch (Exception $exc) {
            $this->logger->setMessage("adminModel->getAdmin()");
        }
    }
}