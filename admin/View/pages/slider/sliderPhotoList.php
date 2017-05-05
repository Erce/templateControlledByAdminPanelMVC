<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        require_once 'Model/sliderPhotoModel.php';
        $slider = new SliderPhoto();
        $slider->setSliderPhotoList();
        $sliderPhotoList = $slider->getSliderPhotoList();
        
        for ($i = 0; $i < count($sliderPhotoList); $i++) {
            echo "<div class='col-lg-2 col-md-3 col-sm-4 col-xs-6 sliderphotopadding' id='sliderphotodiv".$sliderPhotoList[$i]['Id']."'>".
                    "<div class='sliderphotobox' id='sliderphoto".$sliderPhotoList[$i]['Id']."'>".
                        "<div class='item-image'>".
                            "<img class='img-responsive img-container-inside' src='../uploads/".$sliderPhotoList[$i]['Name']."'>".
                        "</div>".
                    "</div>".
                 "</div>";    
        }