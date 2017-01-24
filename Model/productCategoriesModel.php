<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Model/loggerModel.php'; 
class ProductCategories {
    private $productCategoryList = array();
    private $productCategoryRow = array();
    private $productCategoryId;
    private $productCategoryName;
    private $productCategoryListName;
    private $productCategoryParentId;
    private $productCategoryChildRow = array();
    public $productCategoryChildList = array();


    public function __construct() {
        //$this->setProductCategoryList(); 
        $this->logger = new Logger();
    }
    
    public function setProductCategoryList() {
        try {
            //require_once 'connection.php';
            $db = Db::getInstance();
            $req = $db->prepare("SELECT * FROM product_categories");
            $req->execute();
            while($row = $req->fetch()) {
                if(isset($row['id'])) { $this->productCategoryId = $row['id'];}
                if(isset($row['category_list_name'])) { $this->productCategoryListName = $row['category_list_name'];}
                if(isset($row['category_name'])) { $this->productCategoryName = $row['category_name'];}
                if(isset($row['parent_id'])) { $this->productCategoryParentId = $row['parent_id'];}
                $this->productCategoryRow = array(  "ProductCategoryId" => $this->productCategoryId,
                                                    "ProductCategoryListName" => $this->productCategoryListName, 
                                                    "ProductCategoryName" => $this->productCategoryName,
                                                    "ProductCategoryParentId" => $this->productCategoryParentId);
                array_push($this->productCategoryList, $this->productCategoryRow);
            }
        } catch (Exception $exc) {
            $this->logger->setMessage("productCategoriesModel->setProductCategoryList()");
        }
    }

    public function getProductCategoryList() {
        return $this->productCategoryList;
    }
    
    public function selectAllCategories () {
        try {
            $db = Db::getInstance();
            $req = $db->prepare("SELECT * FROM product_categories");
            $req->execute();
            while($row = $req->fetch()) {
                if(isset($row['id'])) { $this->productCategoryId = $row['id'];}
                if(isset($row['category_list_name'])) { $this->productCategoryListName = $row['category_list_name'];}
                if(isset($row['category_name'])) { $this->productCategoryName = $row['category_name'];}
                if(isset($row['parent_id'])) { $this->productCategoryParentId = $row['parent_id'];}
                $this->productCategoryRow = array(  "ProductCategoryId" => $this->productCategoryId,
                                                    "ProductCategoryListName" => $this->productCategoryListName, 
                                                    "ProductCategoryName" => $this->productCategoryName,
                                                    "ProductCategoryParentId" => $this->productCategoryParentId);
                array_push($this->productCategoryList, $this->productCategoryRow);
            }

            return $this->productCategoryList;
        } catch (Exception $exc) {
            $this->logger->setMessage("productCategoriesModel->selectAllCategories()");
        }
    }    
    
    public function selectAllChilds() {
        try {
            $this->productCategoryChildList = array();
            $db = Db::getInstance();
            $req = $db->prepare("SELECT * FROM product_categories WHERE parent_id IS NOT NULL");
            $req->execute();
            while($row = $req->fetch()) {
                if(isset($row['id'])) { $this->productCategoryId = $row['id'];}
                if(isset($row['category_list_name'])) { $this->productCategoryListName = $row['category_list_name'];}
                if(isset($row['category_name'])) { $this->productCategoryName = $row['category_name'];}
                if(isset($row['parent_id'])) { $this->productCategoryParentId = $row['parent_id'];}
                $this->productCategoryChildRow = array(  "ProductCategoryId" => $this->productCategoryId,
                                                    "ProductCategoryListName" => $this->productCategoryListName, 
                                                    "ProductCategoryName" => $this->productCategoryName,
                                                    "ProductCategoryParentId" => $this->productCategoryParentId);
                array_push($this->productCategoryChildList, $this->productCategoryChildRow);
            }
            return $this->productCategoryChildList;
        } catch (Exception $exc) {
            $this->logger->setMessage("productCategoriesModel->selectAllChilds()");
        }
    }

    public function selectChilds($parentId) {
        try {
            $this->productCategoryChildList = array();
            $db = Db::getInstance();
            $req = $db->prepare("SELECT * FROM product_categories WHERE parent_id=".$parentId);
            $req->execute();
            while($row = $req->fetch()) {
                if(isset($row['id'])) { $this->productCategoryId = $row['id'];}
                if(isset($row['category_list_name'])) { $this->productCategoryListName = $row['category_list_name'];}
                if(isset($row['category_name'])) { $this->productCategoryName = $row['category_name'];}
                if(isset($row['parent_id'])) { $this->productCategoryParentId = $row['parent_id'];}
                $this->productCategoryChildRow = array(  "ProductCategoryId" => $this->productCategoryId,
                                                        "ProductCategoryListName" => $this->productCategoryListName, 
                                                        "ProductCategoryName" => $this->productCategoryName,
                                                        "ProductCategoryParentId" => $this->productCategoryParentId);
                array_push($this->productCategoryChildList, $this->productCategoryChildRow);
            }
            return $this->productCategoryChildList;
        } catch (Exception $exc) {
            $this->logger->setMessage("productCategoriesModel->selectChilds()");
        }
    }
    
    public function add() {
        
    }
    
    public function update() {
        
    }
    
    public function delete() {
        
    }
}