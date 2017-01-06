<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    
class SocialLinks {
    private $googlePlus;
    private $facebook;
    private $twitter;
    private $socialLinksList = array();
    private $socialLinksRow = array();
    
    public function __construct() {

    }
    
    public function setSocialLinksList() {
        try {
            $db = Db::getInstance();
            $query = "SELECT * FROM sociallinks";
            $req = $db->prepare($query);
            $req->execute();
            while($row=$req->fetch()) {
                $this->socialLinksRow = array( "Id" => $row['id'],
                                              "Name" => $row['name'],
                                              "Url" => $row['url']); 
                array_push($this->socialLinksList, $this->socialLinksRow);
            }   
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function getSocialLinksList() {
        return $this->socialLinksList;
    }

    public function addSocialLinks($socialLinksArray) {    
        $db = Db::getInstance();
        for($i=0; $i<sizeof($socialLinksArray); $i++) {
            $query = "INSERT INTO sociallinks (name,url) VALUES ('".$socialLinksArray[$i]['Name']."', '".$socialLinksArray[$i]['Url']."')";
            $req = $db->prepare($query);
            $req->execute();
        }
        header("Location: ".$root."index.php?controller=pages&action=settings&subpage=sociallinksettings");
    }
    
    public function updateSocialLinks($socialLinksArray) {
        $db = Db::getInstance();
        for($i=0; $i<sizeof($socialLinksArray); $i++) {
            $query = sprintf("UPDATE sociallinks SET url='%s' WHERE name='%s'",
                            $socialLinksArray[$i]['Url'],
                            $socialLinksArray[$i]['Name']);
            $req = $db->prepare($query);
            $req->execute();
        }
    }
    
    public function deleteSocialLinks($id) {
        header("Location: index.php?controller=pages&action=settings&subpage=sociallinksettings");
    }
    
}