<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    if (isset($_GET['subpage'])) {
        $subpage = $_GET['subpage'];
        if($subpage == "inbox") {
            require_once 'View/pages/contact/inbox.php';
        }
        elseif ($subpage == "sentbox") {
            require_once 'View/pages/contact/sentbox.php';
        }
        elseif ($subpage == "newemail") {
            require_once 'View/pages/contact/newemail.php';
        }
    }