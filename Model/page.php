<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Page {
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
       
    public function __construct($pageName) {
        $this->setPage($pageName);
    }
    
    public function setPage($pageName) {
        $db = Db::getInstance();
        $req = $db->prepare("SELECT * FROM pages where name='$pageName'");
        $req->execute() or die();
        while($row = $req->fetch()) {
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
            $this->pageRow = array( "Id" => $this->pageId,
                                    "Name" => $this->name,
                                    "Logourl" => $this->logourl,
                                    "Title" => $this->title,
                                    "Navbar" => $this->navbar,
                                    "Navbar_color" => $this->navbar_color,
                                    "Navbar_opacity" => $this->navbar_opacity,
                                    "Slider" => $this->slider,
                                    "Slider_opacity" => $this->slider_opacity,
                                    "Footer" => $this->footer,
                                    "Footer_color" => $this->footer_color,
                                    "Footer_opacity" => $this->footer_opacity,
                                    "Description" => $this->description,
                                    "Keywords" => $this->keywords);
            
            array_push($this->pageList, $this->pageRow);
        }
    }
    
    public function getPageList() {
        return $this->pageList;
    }
}