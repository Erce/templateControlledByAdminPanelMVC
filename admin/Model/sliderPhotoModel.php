<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Model/photoModel.php';
require_once 'Model/loggerModel.php';

class SliderPhoto extends PhotoModel {
    private $logger;
    private $sliderPhotoRow = array();
    private $sliderPhotoList = array();
    private $sliderPhotoId;
    private $sliderPhotoName;
    private $sliderPhotoTitle;
    private $sliderPhotoDescription;
    private $sliderPhotoDate;
    
    public function __construct() {
        $this->logger = new Logger();
    }
    
    public function setSliderPhotoList() {
        try {
            $db = Db::getInstance();
            $query = sprintf("SELECT * FROM sliderphotos ORDER BY date");
            $req = $db->prepare($query);
            $req->execute();

            while($row = $req->fetch()) {
                if(isset($row['id'])) { $this->sliderPhotoId = $row['id'];}
                if(isset($row['name'])) { $this->sliderPhotoName = $row['name'];}
                $this->sliderPhotoRow = array( "Id" => $this->sliderPhotoId,
                                               "Name" => $this->sliderPhotoName);
                array_push($this->sliderPhotoList, $this->sliderPhotoRow);
            }
        } catch (Exception $exc) {
            $this->logger->setMessage("sliderPhotoModel->setSliderPhotoList()");
        }
    }
    
    public function getSliderPhotoList() {
        return $this->sliderPhotoList;
    }
    
    public function getSlider($id) {
        try {
            $db = Db::getInstance();
            $this->query = "SELECT * FROM sliderphotos WHERE id='".$id."'";
            $this->req = $db->prepare($this->query);
            $this->req->execute();
            $row = $this->req->fetch();
            if(isset($row['id'])) { $this->sliderPhotoId = $row['id'];}
            if(isset($row['title'])) { $this->sliderPhotoTitle = $row['title'];}
            if(isset($row['name'])) { $this->sliderPhotoName = $row['name'];}
            if(isset($row['description'])) { $this->sliderPhotoDescription = $row['description'];}
            if(isset($row['date'])) { $this->sliderPhotoDate = $row['date'];}
            $this->sliderPhotoRow = array( "Id" => $this->sliderPhotoId,
                                       "Title" => $this->sliderPhotoTitle,
                                       "Name" => $this->sliderPhotoName, 
                                       "ImgUrl" => $this->sliderPhotoName,
                                       "Description" => $this->sliderPhotoDescription, 
                                       "Date" => $this->sliderPhotoDate);
            return $this->sliderPhotoRow;
        } catch (Exception $exc) {
            $this->logger->setMessage("sliderPhotoModel->getSlider()");
        }
    }


    public function update($photoArray) {
        try {
            //For setting uploads directory
            $path = '../uploads/';
            if ( !is_dir($path)) {
                mkdir($path);
            }
            //Writes the photo to the server
            move_uploaded_file($photoArray["TmpName"], $photoArray["Target"]);
            $db = Db::getInstance();
            $query = sprintf("UPDATE sliderphotos SET name='%s', title='%s', description='%s', date='%s' WHERE id='%s'",
                        $photoArray['ImgUrl'],
                        $photoArray['Title'],
                        $photoArray['Description'],
                        $photoArray['Date'],
                        $photoArray['Id']);
            $req = $db->prepare($query);
            $req->execute();
            //mysql_query($query) or die(mysql_error());
            echo "The file ". basename( $photoArray['ImgUrl']). " has been uploaded, and your information has been added to the directory";

        } catch (Exception $exc) {
            $this->logger->setMessage("sliderPhotoModel->update()");
        }
    }
    
    public function add($photoArray) {
        try {
            //For setting uploads directory
            $path = '../uploads/';
            if ( !is_dir($path)) {
                mkdir($path);
            }
            //Writes the photo to the server
            move_uploaded_file($photoArray["TmpName"], $photoArray["Target"]);
            $db = Db::getInstance();
            $query = sprintf("INSERT INTO sliderphotos (name, title, description, date)"
                            . "VALUES ('%s', '%s', '%s', '%s')",
                            $photoArray['ImgUrl'],
                            $photoArray['Title'],
                            $photoArray['Description'],
                            $photoArray['Date']);
            $req = $db->prepare($query);
            $req->execute();
            //mysql_query($query) or die(mysql_error());
            echo "The file ". basename( $photoArray['ImgUrl']). " has been uploaded, and your information has been added to the directory";
        } catch (Exception $exc) {
            $this->logger->setMessage("sliderPhotoModel->add()");
        }
    }
    
    public function delete($id) {
        try {
            // Connects to your Database
            $db = Db::getInstance();
            $slider = $this->getSlider($id);
            //Writes the information to the database
            $query = sprintf("DELETE FROM sliderphotos WHERE id='%s'", $id);
            $req = $db->prepare($query);
            $req->execute();

            $path = "../uploads/";
            $file = $path.$slider['ImgUrl'];
            if (file_exists($file)) {
                unlink($file);
            } 
        } catch (Exception $exc) {
            $this->logger->setMessage("sliderPhotoModel->delete()");
        }
    }
}