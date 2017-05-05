<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


        if(isset($_GET['page']) && $_GET['page'] == "add") {
            require_once 'View/pages/references/referenceAdd.php';
        }
        elseif(isset($_GET['page']) && $_GET['page'] == "edit") {
            require_once 'View/pages/references/referenceEdit.php';
        }
        else {
            file_put_contents("log.txt", "references.php->0".PHP_EOL, FILE_APPEND);
            require_once 'View/pages/references/references.php';
        }