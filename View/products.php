<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Model/productsModel.php';
$products = new Products("","");
$products->setPaging(8);
$products->setProductList();
$productList = $products->getProductList();


?>
<div class="products-container">  
    <div class="container product-section">
        <div class="button-div">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-9 col-md-8 col-sm-9"></div>
                <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
                    <a class="keywords-button btn btn-default" href="?controller=pages&action=products">Diğer Ürünleri Göster</a>
                </div>
            </div>
        </div>
        <div class='row-product-show'>
            <?php for($i = 0; $i < sizeof($productList); $i++) { ?>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 main-page-products-img-container">
                <a href="?controller=pages&action=products&product_id=<?php echo $productList[$i]["Id"] ?>">
                <div class="product-img-container">
                    <div class="item-image">
                        <img class="img-responsive img-container-inside" id="myImg<?php echo $productList[$i]["Id"] ?>" src="uploads/<?php echo $productList[$i]["ImgUrl"]; ?>">
                    </div>
                    <div class="row item-content">
                        <div class="item-text">
                            <h4 class="product-img-container-title"><?php if ($productList[$i]["Title"] != "") {echo $productList[$i]["Title"];} else {echo "Resim Başlığı";}  ?></h4>
                            <h5 class="product-img-container-name"><?php if ($productList[$i]["Name"] != "") {echo $productList[$i]["Name"];} else {echo "Resim Adı";} ?></h5>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div> 
</div>  