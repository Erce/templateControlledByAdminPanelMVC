<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if(isset($_GET['page'])) {
        if ($_GET['page'] == 'add') {
            require_once 'View/pages/slider/addPhoto.php';
        }
        elseif ($_GET['page'] == 'edit') {
            require_once 'View/pages/slider/editPhoto.php';
        } 
    }
    else {
        require_once 'View/pages/slider.php';
    }
    