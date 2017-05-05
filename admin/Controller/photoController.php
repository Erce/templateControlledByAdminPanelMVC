<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'Model/loggerModel.php';
    try {
        echo "<script>alert(asdfasdfasdfasdfasdf);</script>";
        require_once '../Model/photoModel.php';
        $photo = new photo();
        $logger = new Logger();
        $oldPhotoName = $photo->getName();
        echo $oldPhotoName;
        //This is the directory where images will be saved
        $target = "../uploads/";
        $target = $target . basename( $_FILES['photo']['name']);
        $pic=($_FILES['photo']['name']);
        $name = $_FILES['photo']['name'];
        $tmpName = $_FILES['photo']['tmp_name'];
        $title = $_POST['photoTitle'];
        $description = $_POST['photoDescription'];
        $date = $_POST['date'];
        $id = $_POST['id'];
        $photoArray = array( "Target" => $target,
                             "Pic" => $pic,
                             "Name" => $name,
                             "TmpName" => $tmpName,
                             "Title" => $title,
                             "Description" => $description,
                             "Date" => $date,
                             "Id" => $id,   
                             "OldPhotoName" => $oldPhotoName);

        $photo->updatePhoto($photoArray);
    }
    catch (Exception $e) {
        $this->logger->setMessage("photoController->()");
    }
 
