  <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

try {
    require_once 'Model/loggerModel.php';
    require_once ('Model/productCategoriesModel.php');
    $productCategoriesModel = new ProductCategories();
    $productCategoriesList = $productCategoriesModel->selectAllCategories();
    $logger = new Logger();
    function child($id,$productCategoriesList,$add) {
        $parentFlag=0;
        for ($i = 0; $i < count($productCategoriesList); $i++) {
            if($productCategoriesList[$i]["ProductCategoryParentId"] == $id) {
                for ($j = 0; $j < count($productCategoriesList); $j++) {
                    if ($productCategoriesList[$i]["ProductCategoryId"] == $productCategoriesList[$j]["ProductCategoryParentId"]) {
                        $parentFlag=1;
                    }
                }               
            }
        }
        
        for ($i = 0; $i < count($productCategoriesList); $i++) {
            if($id == $productCategoriesList[$i]["ProductCategoryParentId"]) {
                ?> <li><a href="?controller=pages&action=products&category=<?php echo $productCategoriesList[$i]["ProductCategoryName"];?>"><?php echo $productCategoriesList[$i]["ProductCategoryListName"]; if($parentFlag == 1) {?><span class="caret"></span><?php } ?></a>
                    <?php //echo "<div class='product-categories-row product-categories-light'><h4> +  ".$add.$productCategoriesList[$index1]["ProductCategoryListName"]."</h4></div>";
                if($parentFlag == 1) {?> <ul class="dropdown-menu"> <?php }
                    child($productCategoriesList[$i]["ProductCategoryId"],$productCategoriesList, $add." + ");
                if($parentFlag == 1) {?> </ul> <?php $parentFlag=0; }
                ?> </li> <?php
            }
        }
    }
    
    
    for ($i = 0; $i < count($productCategoriesList); $i++) { 
        if ($productCategoriesList[$i]["ProductCategoryParentId"] == "") {
        ?>
        <li><a href="?controller=pages&action=products&category=<?php echo $productCategoriesList[$i]["ProductCategoryName"];?>"><?php echo $productCategoriesList[$i]["ProductCategoryListName"];?><span class="caret"></span></a>
            <ul class="dropdown-menu">
            <?php child($productCategoriesList[$i]["ProductCategoryId"],$productCategoriesList,"");  ?>
            </ul>
        </li> <?php
        }
    }
} catch (Exception $exc) {
    $this->logger->setMessage("product-menu->()");
}


    
        
        
        

