<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class PhotoModel {
        private $title;
        private $description;
        private $date;
        private $name;
        private $id;
        
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

            require_once 'connect.php';
            //echo "<script>alert('$id');</script>";
            $query = sprintf("SELECT * FROM sliderphotos WHERE id=%s",
                    mysql_real_escape_string($id));

            //Writes the information to the database
            $retval = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($retval);
            $this->setId($id);
            $this->setTitle($row['title']);
            $this->setDescription($row['description']);
            $this->setDateToDb($row['date']);
            $this->setName($row['name']);
            //Tells you if its all ok
            //header("Location: ./slider.php");
        }    
        
        public function updatePhoto($photoArray) {
            echo "<script>alert(".$photoArray['Name'].");</script>";
            echo "<script>alert(".$photoArray['Title'].");</script>";
            //For setting uploads directory
            $path = '../uploads';
            if ( !is_dir($path)) {
                mkdir($path);
            }
            //Writes the photo to the server
            require_once '../connect.php';
            file_put_contents("log.txt", "photoModel -> before if old photo name".PHP_EOL, FILE_APPEND);
            file_put_contents("log.txt", "photoModel -> if old photo name ->".$photoArray["OldPhotoName"].PHP_EOL, FILE_APPEND);
            file_put_contents("log.txt", "photoModel -> if old photo name ->".$photoArray["Title"].PHP_EOL, FILE_APPEND);
            file_put_contents("log.txt", "photoModel -> if old photo name ->".$photoArray["Name"].PHP_EOL, FILE_APPEND);
            file_put_contents("log.txt", "photoModel -> if old photo name ->".$photoArray["Id"].PHP_EOL, FILE_APPEND);
            file_put_contents("log.txt", "photoModel -> if old photo name ->".$photoArray["Date"].PHP_EOL, FILE_APPEND);
            file_put_contents("log.txt", "photoModel -> if old photo name ->".$photoArray["Description"].PHP_EOL, FILE_APPEND);
            if($photoArray["OldPhotoName"] != $photoArray['Name'])
            {     
                file_put_contents("log.txt", "photoModel -> in if old photo name".PHP_EOL, FILE_APPEND);
                if(move_uploaded_file($photoArray["TmpName"], $photoArray["Target"])) { 
                    file_put_contents("log.txt", "photoModel -> in if move uploaded file".PHP_EOL, FILE_APPEND);
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
    }
