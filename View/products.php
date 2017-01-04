<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Model/productsModel.php';
$products = new Products("","");
$products->setPaging();
$products->setProductList();
$productList = $products->getProductList();


?>

    <div class="product-section">
        <div class="row button-div">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-9 col-md-8 col-sm-9"></div>
                <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
                    <a href="?controller=pages&action=products"><button class="all-products-button">Diğer Ürünleri Göster</button></a>
                </div>
            </div>
        </div>
        <?php for($i = 0; $i < sizeof($productList); $i++) { ?>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 main-page-products-img-container">
            <a href="?controller=pages&action=products&product_id=<?php echo $productList[$i]["Id"] ?>">
            <div class="item-image">
                <img class="img-responsive img-container-inside" id="myImg<?php echo $productList[$i]["Id"] ?>" src="uploads/<?php echo $productList[$i]["ImgUrl"]; ?>">
            </div>
            <div class="row item-content">
                <div class="item-text">
                    <h4><?php echo $productList[$i]["Name"]; ?></h4>
                    <h5>Caption Text2</h5>
                </div>
            </div>
            </a>
        </div>
        <?php } ?>
    </div> 
        