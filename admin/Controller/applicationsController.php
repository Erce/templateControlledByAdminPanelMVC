<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if (isset($_GET['subpage'])) {
        $subpage = $_GET['subpage'];
        if($subpage == "note") {
            require_once 'View/pages/applications/note.php';
        }
        elseif ($subpage == "calendar") {
            require_once 'View/pages/applications/calendar.php';
        }
    }