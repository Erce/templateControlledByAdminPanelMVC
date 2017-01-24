<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'Model/loggerModel.php'; 
    
    class PhotoModel {
        private $logger;
        private $title;
        private $description;
        private $date;
        private $name;
        private $id;
        private $imgurl;
        private $productId;
        public $photoRow = array();
        public $photoList = array();
        
        public function __construct() {
            $this->logger = new Logger();
        }
        
        private function setId($id) { 
            $this->id = $id;
        }

        private function setTitle($title) {
            $this->title = $title;
        }

        private function setDescription($description) {
            $this->description = $description;
        }

        private function setDateToDb($date) {
            $this->date = $date;
        }

        private function setName($name) {
            $this->name = $name;
        }
        
        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getDateFromDb() {
            return $this->date;
        }

        public function getName() {
            return $this->name;
        }
        
        public function editPhoto($id) {
            try {
                $db = Db::getInstance();
                $query = sprintf("SELECT * FROM sliderphotos WHERE id=%s",$id);
                $req = $db->prepare($query);
                $req->execute();
                //Writes the information to the database
                //$retval = mysql_query($query) or die(mysql_error());
                $row = $req->fetch();//mysql_fetch_array($retval);
                $this->setId($id);
                $this->setTitle($row['title']);
                $this->setDescription($row['description']);
                $this->setDateToDb($row['date']);
                $this->setName($row['name']);

            } catch (Exception $exc) {
                $this->logger->setMessage("photoModel->editPhoto()");
            }
        }    
        
        public function updatePhoto($photoArray) {
            //For setting uploads directory
            $path = '../uploads';
            if ( !is_dir($path)) {
                mkdir($path);
            }
            //Writes the photo to the server
            require_once '../connect.php';
            if($photoArray["OldPhotoName"] != $photoArray['Name'])
            {     
                if(move_uploaded_file($photoArray["TmpName"], $photoArray["Target"])) { 
                    $query = sprintf("UPDATE sliderphotos SET name='%s', title='%s', description='%s', date='%s' WHERE id='%s'",
                        mysql_real_escape_string($photoArray['Name']),
                        mysql_real_escape_string($photoArray['Title']),
                        mysql_real_escape_string($photoArray['Description']),
                        mysql_real_escape_string($photoArray['Date']),
                        mysql_real_escape_string($photoArray['Id']));
                    mysql_query($query) or die(mysql_error());
                    header("Location: ../index.php?controller=pages&action=slider");
                    echo "The file ". basename( $photoArray['Name']). " has been uploaded, and your information has been added to the directory";
                }
                else {
                //Gives and error if its not
                echo "Sorry, there was a problem uploading your file.";
                }
            }
            else {      
                $query = sprintf("UPDATE sliderphotos SET title='%s', description='%s', date='%s' WHERE id='%s'",
                                    mysql_real_escape_string($photoArray['Title']),
                                    mysql_real_escape_string($photoArray['Description']),
                                    mysql_real_escape_string($photoArray['Date']),
                                    mysql_real_escape_string($photoArray['Id']));

                //Writes the information to the database
                mysql_query($query) or die(mysql_error());
                //Tells you if its all ok
                header("Location: ../index.php?controller=pages&action=slider");        
            }
        }
        
        public function getPhotoList($productId) {
            try {
                $db = Db::getInstance();
                $query = sprintf("SELECT * FROM photos WHERE product_id='%s'", $productId);
                $req = $db->prepare($query);
                $req->execute();

                while($row = $req->fetch()) {
                    if(isset($row['id'])) { $this->id = $row['id'];}
                    if(isset($row['name'])) { $this->name = $row['name'];}
                    if(isset($row['imgurl'])) { $this->imgurl = $row['imgurl'];}
                    if(isset($row['product_id'])) { $this->productId = $row['product_id'];}
                    $this->photoRow = array( "Id" => $this->id,
                                             "Name" => $this->name,
                                             "ImgUrl" => $this->imgurl,
                                             "ProductId" => $this->productId);
                    array_push($this->photoList, $this->photoRow);
                }

                return $this->photoList;
            } catch (Exception $exc) {
                $this->logger->setMessage("photoModel->getPhotoList()");
            }
        }
        
        public function update($photoList, $productId) {
            //For setting uploads directory
            $path = '../uploads';
            if ( !is_dir($path)) {
                mkdir($path);
            }
            
            $this->delete($productId);
            $this->add($photoList, $productId);
        }

        public function add($photoList, $productId) {
            try {
                $db = Db::getInstance();
                for ($i = 0; $i < count($photoList); $i++) {
                    if(move_uploaded_file($photoList[$i]["TmpName"], $photoList[$i]["Target"])) { 
                        $query = "INSERT INTO photos (name,imgurl,product_id) VALUES"
                                        . " ('".$photoList[$i]["ProductName"]."','".$photoList[$i]["ImgUrl"]."','".$productId."')" or die(file_put_contents("log.txt", "in mysql query".mysql_error().PHP_EOL, FILE_APPEND));

                        $req = $db->prepare($query);
                        $req->execute();
                        echo "The file ". basename( $photoList[$i]['ImgUrl']). " has been uploaded, and your information has been added to the directory";
                    }
                    else {
                    }
                }   
            } catch (Exception $exc) {
                $this->logger->setMessage("photoModel->add()");
            }
        }

        public function delete($productId) {
            try {
                $db = Db::getInstance();
                $query = sprintf("DELETE FROM photos WHERE product_id='%s'", $productId);
                $req = $db->prepare($query);
                $req->execute();
            } catch (Exception $exc) {
                $this->logger->setMessage("photoModel->delete()");
            }
        }
    }
