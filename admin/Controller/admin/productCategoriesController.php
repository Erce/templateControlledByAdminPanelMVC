<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Model/loggerModel.php';
class ProductCategoriesController {
    private $model;
    private $logger;
    
    public function __construct($model) {
        $this->model = $model;
        $this->logger = new Logger();
    }
    
    public function update() {
        try {
            $id = $_POST['productCategoryId'];
            $listName = $_POST['productCategoryListName'];
            $name = $_POST['productCategoryName'];
            $parentId = $_POST['productCategoryParentId'];

            $productCategoryArray = array(  "Id" => $id,
                                            "ListName" => $listName,
                                            "Name" => $name,
                                            "ParentId" => $parentId);

            $this->model->update($productCategoryArray);
        }
        catch (Exception $e) {
           $this->logger->setMessage("productCategoriesController->update()");
        }
    }
    
    public function add() {
        try {
            //$id = $_POST['productCategoryId'];
            $listName = $_POST['productCategoryListName'];
            $name = $_POST['productCategoryName'];
            $parentId = $_POST['productCategoryParentId'];
            $productCategoryArray = array("ProductCategoryListName" => $listName,
                                            "ProductCategoryName" => $name,
                                            "ProductCategoryParentId" => $parentId);


            $this->model->add($productCategoryArray);
        }
         catch (Exception $e) {
            $this->logger->setMessage("productCategoriesController->add()");
         }
    }
    
    public function delete() {
        $this->model->delete($_POST['id']);
    }
    
    public function selectAllChilds() {
        $this->model->selectAllChilds();
    }
    
    public function selectChilds() {
        $this->model->selectChilds($_POST['parent_id']);
    }
}