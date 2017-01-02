<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Model/photoModel.php';

class SliderPhoto extends PhotoModel {
    private $sliderPhotoRow = array();
    private $sliderPhotoList = array();
    private $sliderPhotoId;
    private $sliderPhotoName;
    
    public function setSliderPhotoList() {
        $db = Db::getInstance();
        $query = sprintf("SELECT * FROM sliderphotos");
        $req = $db->prepare($query);
        $req->execute();

        while($row = $req->fetch()) {
            if(isset($row['id'])) { $this->sliderPhotoId = $row['id'];}
            if(isset($row['name'])) { $this->sliderPhotoName = $row['name'];}
            $this->sliderPhotoRow = array( "Id" => $this->sliderPhotoId,
                                           "Name" => $this->sliderPhotoName);
            array_push($this->sliderPhotoList, $this->sliderPhotoRow);
        }
    }
    
    public function getSliderPhotoList() {
        return $this->sliderPhotoList;
    }
    
    public function update($photoArray) {
        //For setting uploads directory
        $path = 'uploads/';
        if ( !is_dir($path)) {
            mkdir($path);
        }
        //Writes the photo to the server
        move_uploaded_file($photoArray["TmpName"], $photoArray["Target"]);
        $db = Db::getInstance();
        $query = sprintf("UPDATE sliderphotos SET name='%s', title='%s', description='%s', date='%s' WHERE id='%s'",
                    mysql_real_escape_string($photoArray['ImgUrl']),
                    mysql_real_escape_string($photoArray['Title']),
                    mysql_real_escape_string($photoArray['Description']),
                    mysql_real_escape_string($photoArray['Date']),
                    mysql_real_escape_string($photoArray['Id']));
        $req = $db->prepare($query);
        $req->execute();
        //mysql_query($query) or die(mysql_error());
        echo "The file ". basename( $photoArray['ImgUrl']). " has been uploaded, and your information has been added to the directory";
                
    }
    
    public function add($photoArray) {
        //For setting uploads directory
        $path = 'uploads/';
        if ( !is_dir($path)) {
            mkdir($path);
        }
        //Writes the photo to the server
        move_uploaded_file($photoArray["TmpName"], $photoArray["Target"]);
        $db = Db::getInstance();
        $query = sprintf("INSERT INTO sliderphotos (name, title, description, date)"
                        . "VALUES ('%s', '%s', '%s', '%s')",
                        mysql_real_escape_string($photoArray['ImgUrl']),
                        mysql_real_escape_string($photoArray['Title']),
                        mysql_real_escape_string($photoArray['Description']),
                        mysql_real_escape_string($photoArray['Date']));
        $req = $db->prepare($query);
        $req->execute();
        //mysql_query($query) or die(mysql_error());
        echo "The file ". basename( $photoArray['ImgUrl']). " has been uploaded, and your information has been added to the directory";
                
    }
}