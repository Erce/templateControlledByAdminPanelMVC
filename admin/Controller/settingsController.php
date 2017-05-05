<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if (isset($_GET['subpage'])) {
        $subpage = $_GET['subpage'];
        if($subpage == "sitesettings") {
            require_once 'View/pages/settings/siteSettings.php';
        }
        elseif ($subpage == "homepagesettings") {
            require_once 'View/pages/settings/homePageSettings.php';
        }
        elseif ($subpage == "aboutpagesettings") {
            require_once 'View/pages/settings/aboutPageSettings.php';
        }
        elseif ($subpage == "productspagesettings") {
            require_once 'View/pages/settings/productsPageSettings.php';
        }
        elseif ($subpage == "servicesspagesettings") {
            require_once 'View/pages/settings/servicesPageSettings.php';
        }
        elseif ($subpage == "referencespagesettings") {
            require_once 'View/pages/settings/referencesPageSettings.php';
        }
        elseif ($subpage == "gallerypagesettings") {
            require_once 'View/pages/settings/galleryPageSettings.php';
        }
        elseif ($subpage == "contactpagesettings") {
            require_once 'View/pages/settings/contactPageSettings.php';
        }
        elseif ($subpage == "sociallinkssettings") {
            require_once 'View/pages/settings/socialLinksSettings.php';
        }
    }