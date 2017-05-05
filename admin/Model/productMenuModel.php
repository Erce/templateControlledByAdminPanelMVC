<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once ('Model/product_categories.php');
    $productCategories = new ProductCategories();
    $productCategoriesList = $productCategories->getProductCategoryList();

    
    for ($i = 0; $i < count($productCategoriesList); $i++) { ?>
        <li><a href="?controller=pages&action=products&category=<?php echo $productCategoriesList[$i]["ProductCategoryName"];?>"><?php echo $productCategoriesList[$i]["ProductCategoryListName"];?></a></li>
    <?php } ?>    
    