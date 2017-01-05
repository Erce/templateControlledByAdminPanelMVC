<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'Model/productsModel.php';
    $products = new Products("","");
    $productList = $products->getProduct($_GET['product_id']);
?>
    <div class="bg-content">
        <div class="container product-section">
            <div class="row button-div">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-9 col-md-8 col-sm-9">
                        <h1 class="product-title"><?php echo $productList["Title"]; ?></h1>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">        
                        <a href="?controller=pages&action=products"><button class="all-products-button">Diğer Ürünleri Göster</button></a>
                    </div>
                </div>
            </div>
            <div class="row product-page-row">
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-5 col-md-7 col-sm-8 col-xs-12 product-image">
                    <img class="img-responsive img-container-inside" id="myImg<?php echo $productList["Id"] ?>" src="uploads/<?php echo $productList["ImgUrl"]; ?>">
                </div>
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 product-info">
                    <form>
                        <div class="form-group">
                            <h3 class="product-text"><?php echo $productList["Name"]; ?></h3>
                        </div>
                        <div class="form-group">
                            <h5 class="product-text"><?php echo $productList["Description"]; ?></h5>
                        </div>
                        <div class="form-group">
                            <h4 class="product-text">Anahtar Kelimeler</h4>
                            <?php 
                            $keywordsArray = str_replace(' ', '', $productList["Keywords"]);
                            $keywordsArray = split(";", $keywordsArray);
                                for ($i = 0; $i < count($keywordsArray); $i++) {
                                    if ($keywordsArray[$i] != "") {
                                        echo '<a class="keywords-button btn btn-default" href="?controller=pages&action=products&keyword='.$keywordsArray[$i].'">'.$keywordsArray[$i].'</a>';
                                    }
                            }?>
                        </div>
                    </form>
                </div>
                <div class="col-lg-1 col-md-1"></div>
            </div>
        </div> 
        <div id="myModal" class="modal">
            <!-- The Close Button -->
            <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="img01">

            <!-- Modal Caption (Image Text) -->
            <div id="caption"></div>
        </div>
    </div>