<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if (isset($_GET['subpage'])) {
        $subpage = $_GET['subpage'];
        if($subpage == "ipadresses") {
            require_once 'View/pages/statistics/ipAdresses.php';
        }
        elseif ($subpage == "references") {
            require_once 'View/pages/statistics/references.php';
        }
        elseif ($subpage == "activevisitors") {
            require_once 'View/pages/statistics/activeVisitors.php';
        }
        elseif ($subpage == "dailydatas") {
            require_once 'View/pages/statistics/dailyDatas.php';
        }
        elseif ($subpage == "graphicpresentation") {
            require_once 'View/pages/statistics/graphicPresentation.php';
        }
    }