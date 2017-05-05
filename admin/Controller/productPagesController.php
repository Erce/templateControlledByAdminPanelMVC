<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if (isset($_GET['subpage'])) {
        $subpage = $_GET['subpage'];
        if($subpage == "products") {
            if(isset($_GET['page']) && $_GET['page'] == "add") {
                require_once 'View/pages/products/productAdd.php';
            }
            elseif(isset($_GET['page']) && $_GET['page'] == "edit") {
                require_once 'View/pages/products/productEdit.php';
            }
            else {
                require_once 'View/pages/products/products.php';
            }
        }
        elseif ($subpage == "productcategories") {
            require_once 'View/pages/products/productCategories.php';
        }
        elseif ($subpage == "productcomments") {
            require_once 'View/pages/products/productComments.php';
        }
    }