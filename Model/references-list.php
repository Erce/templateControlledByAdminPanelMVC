<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Model/loggerModel.php'; 
class References {
        private $logger;
        private $productList = array();
        private $productRow = array();
        private $productId;
        private $productTitle;
        private $productName;
        private $productImgUrl;
        private $productKeywords;
        private $productDescription;
    
        public function __construct() {
            $this->logger = new Logger();
        }
        
        public function setReferencesList() {
            try {
               $db = Db::getInstance();
                $req = $db->prepare("SELECT * FROM products");
                $req->execute();
                while($row = $req->fetch()) {
                    if(isset($row['id'])) { $this->productId = $row['id'];}
                    if(isset($row['title'])) { $this->productTitle = $row['title'];}
                    if(isset($row['name'])) { $this->productName = $row['name'];}
                    if(isset($row['imgurl'])) { $this->productImgUrl = $row['imgurl'];}
                    if(isset($row['keywords'])) { $this->productKeywords = $row['keywords'];}
                    if(isset($row['description'])) { $this->productDescription = $row['description'];}
                    $this->productRow = array($row['id'], $row['title'], $row['name'], $row['imgurl'], $row['keywords'], $row['description']);
                    array_push($this->productList, $this->productRow);
                } 
            } catch (Exception $exc) {
                $this->logger->setMessage("reference-list->setReferenceList()");
            }
        }
    
        public function getReferencesList() {
            return $this->productList;
        }
}