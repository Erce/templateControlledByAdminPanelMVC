<?php
        
    require_once ('Model/pageSettingsModel.php');
    
    class PagesController {
        public function home() {
            $page = new PageModel("home");
            $pageList = $page->getPageList();
            require_once('View/pages/home.php');
        }

        public function about() {
            $page = new PageModel("about");
            $pageList = $page->getPageList();
            require_once ('View/pages/about.php');
        }

        public function products() {
            $page = new PageModel("products");
            $pageList = $page->getPageList();
            require_once ('Controller/productController.php');
        }

        public function references() {
            $page = new PageModel("references");
            $pageList = $page->getPageList();
            require_once ('View/pages/references.php');
        }

        public function contact() {
            $page = new PageModel("contact");
            $pageList = $page->getPageList();
            require_once ('View/pages/contact.php');
        }

        public function error() {
            $page = new PageModel("error");
            $pageList = $page->getPageList();
            require_once('View/pages/error.php');
        }
    }
?>