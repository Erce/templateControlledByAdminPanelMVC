  <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

try {
    require_once ('Model/productCategoriesModel.php');
    $productCategoriesModel = new ProductCategories();
    $productCategoriesList = $productCategoriesModel->selectAllCategories();

    function child($id,$productCategoriesList,$add) {
        for ($i = 0; $i < count($productCategoriesList); $i++) {
            if($id == $productCategoriesList[$i]["ProductCategoryParentId"]) {
                ?> <li><a href="?controller=pages&action=products&category=<?php echo $productCategoriesList[$i]["ProductCategoryName"];?>"><?php echo $productCategoriesList[$i]["ProductCategoryListName"];?></a>
                    <?php //echo "<div class='product-categories-row product-categories-light'><h4> +  ".$add.$productCategoriesList[$index1]["ProductCategoryListName"]."</h4></div>";
                child($productCategoriesList[$i]["ProductCategoryId"],$productCategoriesList, $add." + ");
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
    echo $exc->getTraceAsString();
}


    
        
        
        

