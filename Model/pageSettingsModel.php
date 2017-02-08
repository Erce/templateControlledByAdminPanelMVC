<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Model/loggerModel.php'; 

class PageModel {
    private $logger;
    private $pageList = array();
    private $pageRow = array();
    private $pageId;
    private $name;
    private $logourl;
    private $title;
    private $navbar;
    private $navbar_color;
    private $navbar_opacity;
    private $slider;
    private $slider_opacity; 
    private $body;
    private $footer;
    private $footer_color;
    private $footer_opacity;
    private $description;
    private $keywords;
    private $template_id;
    private $page_text;
    private $slider_text;
    private $contact_email;


    public function __construct($pageName) {
        $this->setPage($pageName);
        $this->logger = new Logger();
    }
    
    public function setPage($pageName) {
        try {
            $db = Db::getInstance();
            $req = $db->prepare("SELECT * FROM pages where name='$pageName'");
            $req->execute() or die();
            $row = $req->fetch();
            if(isset($row['id'])) { $this->pageId = $row['id'];}
            if(isset($row['name'])) { $this->name = $row['name'];}
            if(isset($row['logourl'])) { $this->logourl = $row['logourl'];}
            if(isset($row['title'])) { $this->title = $row['title'];}
            if(isset($row['navbar'])) { $this->navbar = $row['navbar'];}
            if(isset($row['navbar_color'])) { $this->navbar_color = $row['navbar_color'];}
            if(isset($row['navbar_opacity'])) { $this->navbar_opacity = $row['navbar_opacity'];}
            if(isset($row['slider'])) { $this->slider = $row['slider'];}
            if(isset($row['slider_opacity'])) { $this->slider_opacity = $row['slider_opacity'];}
            if(isset($row['footer'])) { $this->footer = $row['footer'];}
            if(isset($row['footer_color'])) { $this->footer_color = $row['footer_color'];}
            if(isset($row['footer_opacity'])) { $this->footer_opacity = $row['footer_opacity'];}
            if(isset($row['description'])) { $this->description = $row['description'];}
            if(isset($row['keywords'])) { $this->keywords = $row['keywords'];}
            if(isset($row['page_text'])) { $this->page_text = $row['page_text'];}
            if(isset($row['slider_text'])) { $this->slider_text = $row['slider_text'];}
            if(isset($row['contact_email'])) { $this->contact_email = $row['contact_email'];}
            
            $this->pageRow = array( "Id" => $this->pageId,
                                    "Name" => $this->name,
                                    "ImgUrl" => $this->logourl,
                                    "Title" => $this->title,
                                    "Navbar" => $this->navbar,
                                    "NavbarColor" => $this->navbar_color,
                                    "NavbarOpacity" => $this->navbar_opacity,
                                    "Slider" => $this->slider,
                                    "SliderOpacity" => $this->slider_opacity,
                                    "Footer" => $this->footer,
                                    "FooterColor" => $this->footer_color,
                                    "FooterOpacity" => $this->footer_opacity,
                                    "Description" => $this->description,
                                    "Keywords" => $this->keywords,
                                    "PageText" => $this->page_text,
                                    "SliderText" => $this->slider_text,
                                    "ContactEmail" => $this->contact_email);

            array_push($this->pageList, $this->pageRow);
        } catch (Exception $exc) {
            $this->logger->setMessage("pageSettingsModel->setPage()");
        }
    }
    
    public function getPageRow() {
        return $this->pageRow;
    }


    public function getPageList() {
        return $this->pageList;
    }
    
    public function update($pageSettingsArray) {
        try {
            $db = Db::getInstance();
            
            move_uploaded_file($pageSettingsArray["TmpName"], $pageSettingsArray["Target"]);
            
            $query = sprintf("UPDATE pages SET logourl='%s', title='%s', navbar='%s', navbar_color='%s', navbar_opacity='%s', slider='%s',"
                                    . " footer='%s',"
                                    . " footer_color='%s',"
                                    . " footer_opacity='%s',"
                                    . " description='%s',"
                                    . " keywords='%s',"
                                    . " page_text='%s',"
                                    . " slider_text='%s'"
                                    . " WHERE id='%s'",
                        $pageSettingsArray['ImgUrl'],
                        $pageSettingsArray['Title'],
                        $pageSettingsArray['Navbar'],
                        $pageSettingsArray['NavbarColor'],
                        $pageSettingsArray['NavbarOpacity'],
                        $pageSettingsArray['Slider'],
                        $pageSettingsArray['Footer'],
                        $pageSettingsArray['FooterColor'],
                        $pageSettingsArray['FooterOpacity'],
                        $pageSettingsArray['Description'],
                        $pageSettingsArray['Keywords'],
                        $pageSettingsArray['PageText'],
                        $pageSettingsArray['SliderText'],
                        $pageSettingsArray['Id']);
            $req = $db->prepare($query);
            $req->execute();
        } catch (Exception $exc) {
            $this->logger->setMessage("pageSettingsModel->update()");
        }
    }
}