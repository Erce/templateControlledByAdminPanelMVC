<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Model/loggerModel.php';
class ReferencesController {
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
            $id = $_POST['productId'];
            $title = $_POST['productTitle'];
            $name = $_POST['productName'];
            $keywords = $_POST['productKeywords'];
            $description = $_POST['productDescription'];
            //$category = $_POST['productCategory'];

            $referencesArray = array( "Id" => $id,
                                   "Title" => $title,
                                   "Name" => $name,
                                   "TmpName" => $tmpName,
                                   "Target" => $target,
                                   "ImgUrl" => $imgurl,
                                   "Keywords" => $keywords,
                                   "Description" => $description);
                                   //"Category" => $category);
            $this->model->update($referencesArray);
        }
        catch (Exception $e) {
            $this->logger->setMessage("referencesController->update()");
        }
    }
    
    public function add() {
        try {
            //This is the directory where images will be saved
            $target = "../uploads/";
            $target = $target . basename( $_FILES['photo']['name']);
            echo $target;
            //This gets all the other information from the form
            $title = isset($_POST['productTitle']) ? $_POST['productTitle'] : "";
            $name = isset($_POST['productName']) ? $_POST['productName'] : "";
            $pic=($_FILES['photo']['name']);
            $imgurl = $_FILES['photo']['name'];
            $tmpName = $_FILES['photo']['tmp_name'];
            $keywords = isset($_POST['productKeywords']) ? $_POST['productKeywords'] : "";
            $description = isset($_POST['productDescription']) ? $_POST['productDescription'] : "";
            ///$category = isset($_POST['productCategory']) ? $_POST['productCategory'] : "";

            $referencesArray = array(   "Title" => $title,
                                        "Name" => $name,
                                        "TmpName" => $tmpName,
                                        "Target" => $target,
                                        "ImgUrl" => $imgurl,
                                        "Keywords" => $keywords,
                                        "Description" => $description);

            $this->model->add($referencesArray);
        }
        catch (Exception $e) {
           $this->logger->setMessage("referencesController->add()");
        }
    }
    
    public function delete() {
        $this->model->delete($_POST['id']);
    }
    
}