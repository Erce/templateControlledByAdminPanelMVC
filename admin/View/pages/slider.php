<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'Model/sliderPhotoModel.php';
    $sliderPhotoModel = new SliderPhoto();
    require_once 'Controller/admin/sliderPhotoController.php';
    $sliderPhotoController = new SliderPhotoController($sliderPhotoModel);
    
    if(isset($_POST['part']) || isset($_GET['part'])){
        file_put_contents("log.txt", "product page in if post".$_POST['id'].PHP_EOL, FILE_APPEND);
        $sliderPhotoController->delete($_POST['id']);
    }
?>

        <div class="container-fluid admin-main-container">
            <!--<div class="col-lg-1 col-sm-1 col-md-1"></div>-->
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 slider-container">
                <div class="row first-row">
                    <div class="col-md-2 col-xs-2 col-xsl-12">
                        <h4>SLIDER</h4>
                    </div>
                    <div class="col-md-10 col-xs-10 col-xsl-4">
                        <a href="?controller=pages&action=slider&page=add" id="add-slider">
                            <img class="img-responsive add-slider-icon" src="Public/images/plus-icon.png" height="45px" width="45px">       
                        </a>
                        <img class="img-responsive delete-slider-icon" src="Public/images/delete.ico" height="45px" width="45px">
                        <img class="img-responsive edit-slider-icon" src="Public/images/edit.png" height="45px" width="45px">
                        <!--<img class="img-responsive right-slider-icon" src="Public/images/right-arrow.png" height="45px" width="45px">
                        <img class="img-responsive left-slider-icon" src="Public/images/left-arrow.png" height="45px" width="45px">-->
                    </div>
                </div>
                <div class="row second-row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                        <div class="row" id="records-title">
                            <div class="col-md-5 col-xs-5"></div>
                            <div class="col-md-2 col-xs-2"><h2></h2></div>
                            <div class="col-md-5 col-xs-5"></div>
                        </div>
                        <div id="records" class="message-div">
                            <?php require_once 'View/pages/slider/sliderPhotoList.php'; ?>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
        