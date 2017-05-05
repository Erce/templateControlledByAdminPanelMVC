<?php

    require_once 'Model/loggerModel.php'; 
    class PagesController {
        public function home() {
            require_once('View/pages/home.php');
        }

        public function settings() {
            require_once ('Controller/settingsController.php');
        }
        
        public function applications() {
            require_once ('Controller/applicationsController.php');
        }
        
        public function statistics() {
            require_once ('Controller/statisticsController.php');
        }
        
        public function slider() {
            require_once ('Controller/sliderController.php');
        }

        public function products() {
            require_once ('Controller/productPagesController.php');
        }

        public function references() {
            file_put_contents("log.txt", "references.php->-1".PHP_EOL, FILE_APPEND);
            require_once ('Controller/referencePagesController.php');
        }

        public function announcements() {
            require_once ('View/pages/announcements.php');
        }
        
        public function contact() {
            require_once ('Controller/contactController.php');
        }

        public function error() {
            require_once('View/pages/error.php');
        }
    }
?>

