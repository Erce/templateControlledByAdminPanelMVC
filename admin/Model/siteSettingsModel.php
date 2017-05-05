<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Model/loggerModel.php'; 

class SiteSettingsModel {
    private $logger;
    private $siteSettingsRow = array();
    private $siteSettingsList = array();

    public function __construct() {
        $this->logger = new Logger();
    }
    
    public function setSiteSettingsList() {
        try {
            $db = Db::getInstance();
            $query = "SELECT * FROM template";
            $req = $db->prepare($query);
            $req->execute();
            while($row=$req->fetch()) {
                $this->siteSettingsRow = array( "Id" => $row['id'],
                                              "Name" => $row['name'],
                                              "NavbarColor" => $row['navbar_color'],
                                              "NavbarOpacity" => $row['navbar_opacity'],
                                              "Background" => $row['background'],
                                              "BackgroundColor" => $row['background_color'],
                                              "BackgroundOpacity" => $row['background_opacity'],
                                              "FontSize" => $row['font_size'],
                                              "FontFamily" => $row['font_family'],
                                              "FooterColor" => $row['footer_color'],
                                              "FooterOpacity" => $row['footer_opacity'],
                                              "FooterDescription" => $row['footer_description'],
                                              "LogoNavbar" => $row['logo_navbar'],
                                              "LogoFavicon" => $row['logo_favicon'],
                                              "IsOn" => $row['is_on']); 
                array_push($this->siteSettingsList, $this->siteSettingsRow);
            }   
        } catch (Exception $exc) {
            $this->logger->setMessage("siteSettingsModel->setSiteSettingsList()");
        }
    }
    
    public function getSiteSettingsList() {
        return $this->siteSettingsList;
    }
    
    public function getSiteSettingsWithId($id) {
        try {
            $db = Db::getInstance();
            $query = "SELECT * FROM template WHERE id=".$id;
            $req = $db->prepare($query);
            $req->execute();
            $row=$req->fetch();
            $this->siteSettingsRow = array( "Id" => $row['id'],
                                            "Name" => $row['name'],
                                            "NavbarColor" => $row['navbar_color'],
                                            "NavbarOpacity" => $row['navbar_opacity'],
                                            "Background" => $row['background'],
                                            "BackgroundColor" => $row['background_color'],
                                            "BackgroundOpacity" => $row['background_opacity'],
                                            "FontSize" => $row['font_size'],
                                            "FontFamily" => $row['font_family'],
                                            "FooterColor" => $row['footer_color'],
                                            "FooterOpacity" => $row['footer_opacity'],
                                            "FooterDescription" => $row['footer_description'],
                                            "LogoNavbar" => $row['logo_navbar'],
                                            "LogoFavicon" => $row['logo_favicon'],
                                            "IsOn" => $row['is_on']); 
            return $this->siteSettingsRow;
              
        } catch (Exception $exc) {
            $this->logger->setMessage("siteSettingsModel->getSiteSettingsWithId()");
        }
    }
    
    public function getSiteSettingsOn() {
        try {
            for ($i = 0; $i < count($this->siteSettingsList); $i++) {
                if ($this->siteSettingsList[$i]["IsOn"]) {
                    return $this->siteSettingsList[$i];
                }
            }
        } catch (Exception $exc) {
            $this->logger->setMessage("siteSettingsModel->getSiteSettingsOn()");
        }
    }
    
    public function update($siteSettingsArray) {
        try {
            $db = Db::getInstance();
            if ($siteSettingsArray['IsOn'] == 1) {
                $query = sprintf("UPDATE template SET is_on= CASE WHEN id ='%s' THEN 1 ELSE 0 END",
                            $siteSettingsArray['Id']);
                $req = $db->prepare($query);
                $req->execute();
            }
            move_uploaded_file($siteSettingsArray["TmpName"], $siteSettingsArray["Target"]);
            move_uploaded_file($siteSettingsArray["TmpNameFavicon"], $siteSettingsArray["TargetFavicon"]);
            move_uploaded_file($siteSettingsArray["TmpNameBackground"], $siteSettingsArray["TargetBackground"]);
            $query = sprintf("UPDATE template SET name='%s', navbar_color='%s', navbar_opacity='%s', background='%s', background_color='%s', background_opacity='%s',"
                                    ."font_size='%s', font_family='%s', footer_color='%s', footer_description='%s',"
                                    ."footer_opacity='%s', logo_navbar='%s', logo_favicon='%s', is_on='%s' WHERE id='%s'",
                                    $siteSettingsArray['Name'],
                                    $siteSettingsArray['NavbarColor'],
                                    $siteSettingsArray['NavbarOpacity'],
                                    $siteSettingsArray['ImgUrlBackground'],
                                    $siteSettingsArray['BackgroundColor'],
                                    $siteSettingsArray['BackgroundOpacity'],
                                    $siteSettingsArray['FontSize'],
                                    $siteSettingsArray['FontFamily'],
                                    $siteSettingsArray['FooterColor'],
                                    $siteSettingsArray['FooterDescription'],
                                    $siteSettingsArray['FooterOpacity'],
                                    $siteSettingsArray['LogoNavbar'],
                                    $siteSettingsArray['LogoFavicon'],
                                    $siteSettingsArray['IsOn'],
                                    $siteSettingsArray['Id']);
            $req = $db->prepare($query);
            $req->execute();
        } catch (Exception $exc) {
            $this->logger->setMessage("siteSettingsModel->update()");
        }
    }
    
    public function getAdmin($id) {
        try {
            $db = Db::getInstance();
            $query = "SELECT * FROM users WHERE id=".$id;
            $req = $db->prepare($query);
            $req->execute();
            $row=$req->fetch();
            $this->siteSettingsRow = array( "Id" => $row['id'],
                                            "UserName" => $row['username']); 
            return $this->siteSettingsRow;
              
        } catch (Exception $exc) {
            $this->logger->setMessage("siteSettingsModel->getAdmin()");
        }
    }

    public function updateadmin($adminArray) {
        try {
            $db = Db::getInstance();
            if ($adminArray['Password'] != sha1("")) {
                $query = sprintf("UPDATE users SET username='%s', password='%s' WHERE id='%s'",
                                    $adminArray['UserName'],
                                    $adminArray['Password'],
                                    $adminArray['Id']);
            }else {
                $query = sprintf("UPDATE users SET username='%s' WHERE id='%s'",
                                    $adminArray['UserName'],
                                    $adminArray['Id']); 
            }
            $req = $db->prepare($query);
            $req->execute();
        } catch (Exception $exc) {
            $this->logger->setMessage("siteSettingsModel->updateAdmin()");
        }
    }


    public function add() {
        
    }
    
    public function delete() {
        
    }
}