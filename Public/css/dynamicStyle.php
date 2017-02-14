<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Model/siteSettingsModel.php';
file_put_contents("log.txt", "before template model".PHP_EOL, FILE_APPEND);
$siteSettings = new SiteSettingsModel();
$siteSettings->setSiteSettingsList();
$template = $siteSettings->getSiteSettingsOn();

$navbarColor = $template["NavbarColor"];
$navbarOpacity = $template["NavbarOpacity"];
$footerColor = $template["FooterColor"];
$footerOpacity = $template["FooterOpacity"];
$footerDescription = $template["FooterDescription"];
$background = $template["Background"];
$backgroundColor = $template["BackgroundColor"];
$fontFamily = $template["FontFamily"];
$fontSize = $template["FontSize"];
$logoNavbar = $template["LogoNavbar"];
$logoFavicon = $template["LogoFavicon"];


?>
<link rel="icon" href="uploads/<?php echo $logoFavicon; ?>" type="image/x-icon">
<link rel="shortcut icon" href="uploads/<?php echo $logoFavicon; ?>" type="image/x-icon">
<style type="text/css">
    body {
        background: url(uploads/<?php echo $background;?>) 50% 50%;
        background-color: <?php echo $backgroundColor; ?>; 
        background-size: cover;
        font-size: <?php echo $fontSize."pt"; ?>; 
        font-family: <?php echo $fontFamily; ?>; 
    }
    
    nav,.nav,.navbar,.navbar-default {
        background-color: <?php echo $navbarColor; ?>;
        opacity: <?php echo $navbarOpacity; ?>;
    }
    
    .footer {
        background-color: <?php echo $footerColor; ?>;
        opacity: <?php echo $footerOpacity; ?>;
    }
    
</style>