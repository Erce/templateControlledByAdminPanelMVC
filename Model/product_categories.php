<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ProductCategories {
    private $productCategoryList = array();
    private $productCategoryRow = array();
    private $productCategoryId;
    private $productCategoryName;
    private $productCategoryListName;
    
    public function __construct() {
        $this->setProductCategoryList(); 
    }
    
    public function setProductCategoryList() {
        //require_once 'connection.php';
        $db = Db::getInstance();
        $req = $db->prepare("SELECT * FROM product_categories");
        $req->execute();
        while($row = $req->fetch()) {
            if(isset($row['id'])) { $this->productCategoryId = $row['id'];}
            if(isset($row['category_list_name'])) { $this->productCategoryListName = $row['category_list_name'];}
            if(isset($row['category_name'])) { $this->productCategoryName = $row['category_name'];}
            $this->productCategoryRow = array(  "ProductCategoryId" => $this->productCategoryId,
                                                "ProductCategoryListName" => $this->productCategoryListName, 
                                                "ProductCategoryName" => $this->productCategoryName);
            array_push($this->productCategoryList, $this->productCategoryRow);
        }
    }

    public function getProductCategoryList() {
        return $this->productCategoryList;
    }
    
}