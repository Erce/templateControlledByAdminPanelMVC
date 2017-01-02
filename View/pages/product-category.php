<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'model/products.php';
    $products = new Products();
    $products->setProductList(isset($_GET['category']), isset($_GET['keyword']));
    $productList = $products->getProductList();
?>

        
        <div class="bg-content">
            <div class="container references-container">   
                <div class="product-section">
                    <div class="row button-div">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-9 col-md-8 col-sm-9"></div>
                            <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
                                <button class="all-products-button">Diğer Ürünleri Göster</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 references-page-img-container product-category">
                        <div class="item-image">
                            <img class="img-responsive img-container-inside" id="myImg" src="">
                        </div>
                        <div class="row item-content">
                            <div class="item-text">
                                <h4><?php echo $productList[0][2];?></h4>
                                <h5><?php echo $productList[0][3];?></h5>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>