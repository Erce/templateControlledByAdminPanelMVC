<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Model/loggerModel.php';
class SiteSettingsController {
    private $model;
    private $logger;
    
    public function __construct($model) {
        $this->model = $model;
        $this->logger = new Logger();
    }
    
    public function update() {
        try {
            //This is the directory where images will be saved
            $target = "../uploads/";
            $target = $target . basename( $_FILES['photo']['name']);
            $pic=($_FILES['photo']['name']);
            $imgurl = $_FILES['photo']['name'];
            if($imgurl == "") {
                $imgurl = $_POST['oldPhotoName'];
            }
            $tmpName = $_FILES['photo']['tmp_name'];
            $targetFavicon = $target . basename( $_FILES['photoFavicon']['name']);
            $imgurlFavicon = $_FILES['photoFavicon']['name'];
            if($imgurlFavicon == "") {
                $imgurlFavicon = $_POST['oldPhotoNameFavicon'];
            }
            $tmpNameFavicon = $_FILES['photoFavicon']['tmp_name'];
            
            $id = $_POST['templateId'];
            $name = $_POST['templateName'];
            
            $targetBackground = $target . basename( $_FILES['photoBackground']['name']);
            $imgurlBackground = $_FILES['photoBackground']['name'];
            if($imgurlBackground == "") {
                $imgurlBackground = $_POST['oldPhotoNameBackground'];
            }
            $tmpNameBackground = $_FILES['photoBackground']['tmp_name'];
            
            $navbarColor = $_POST['templateNavbarColor'];
            $navbarOpacity = $_POST['templateNavbarOpacity'];
            //$bodyBackground = $_POST['templateBodyBackground'];
            $bodyBackgroundColor = $_POST['templateBodyBackgroundColor'];
            $footerColor = $_POST['templateFooterColor'];
            $footerOpacity = $_POST['templateFooterOpacity'];
            $footerDescription = $_POST['templateFooterDescription'];
            $fontFamily = $_POST['templateFontFamily'];
            $fontSize = $_POST['templateFontSize'];
            $isOn = isset($_POST['isOn']) ? $_POST['isOn'] : "0";
            $siteSettingsArray = array( "Id" => $id,
                                        "Name" => $name,
                                        "TmpName" => $tmpName,
                                        "Target" => $target,
                                        "ImgUrl" => $imgurl,
                                        "TmpNameFavicon" => $tmpNameFavicon,
                                        "TargetFavicon" => $targetFavicon,
                                        "ImgUrlFavicon" => $imgurlFavicon,
                                        "TmpNameBackground" => $tmpNameBackground,
                                        "TargetBackground" => $targetBackground,
                                        "ImgUrlBackground" => $imgurlBackground,
                                        "NavbarColor" => $navbarColor,
                                        "NavbarOpacity" => $navbarOpacity,
                                        "Background" => $imgurlBackground,
                                        "BackgroundColor" => $bodyBackgroundColor,
                                        "BackgroundOpacity" => "",
                                        "FontSize" => $fontSize,
                                        "FontFamily" => $fontFamily,
                                        "FooterColor" => $footerColor,
                                        "FooterOpacity" => $footerOpacity,
                                        "FooterDescription" => $footerDescription,
                                        "LogoNavbar" => $imgurl,
                                        "LogoFavicon" => $imgurlFavicon,
                                        "IsOn" => $isOn);

            $this->model->update($siteSettingsArray);
        } catch (Exception $exc) {
            $this->logger->setMessage("siteSettingsController->update()");
        }
    }
    
    public function updateadmin() {
        try {
            $id = $_SESSION['userId'];
            $username = $_POST['userName'];
            $pass = sha1($_POST["password"]);

            $adminSettingsArray = array( "Id" => $id,
                                         "UserName" => $username,
                                         "Password" => $pass);

            $this->model->updateadmin($adminSettingsArray);
        } catch (Exception $exc) {
            $this->logger->setMessage("siteSettingsController->updateAdmin()");
        }
    }


    public function add() {
        
    }
    
    public function delete() {
        
    }
    
}