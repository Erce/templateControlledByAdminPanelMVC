<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'Model/productsModel.php';
    $products = new Products("","");
    $productList = $products->getProduct($_GET['product_id']);
    
    require_once 'Model/photoModel.php';
    $photos = new PhotoModel();
    $photoList = $photos->getPhotoList($_GET['product_id']);
    
    
?>
    <div class="bg-content">
        <div class="container product-section">
            <div class="row button-div">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-9 col-md-8 col-sm-9 col-xs-6">
                        <h1 class="product-title"><?php echo $productList["Title"]; ?></h1>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-3 col-xs-6">        
                        <a class="keywords-button btn btn-default" href="?controller=pages&action=products">Diğer Ürünleri Göster</a>
                    </div>
                </div>
            </div>
            <div class="row product-page-row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 product-image text-center">
                    <img class="img-responsive img-container-inside" id="myImg<?php echo $productList["Id"] ?>" src="uploads/<?php echo $productList["ImgUrl"]; ?>">
                    <div class="text-center">
                        <?php for ($i = 0; $i < count($photoList); $i++) { ?>
                        <div class="photo-img-container" style="float: left; height: 25%; width: 24%;">
                            <div class="item-image">
                                <img class="img-responsive img-container-inside" id="myImgPhoto<?php echo $photoList[$i]["Id"] ?>" src="uploads/<?php echo $photoList[$i]["ImgUrl"]; ?>">
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
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
                            $keywordsArray = preg_replace('/\s+/', '', $productList["Keywords"]);
                            $keywordsArray = split(";", $keywordsArray);
                            
                            for ($i = 0; $i < count($keywordsArray); $i++) {
                                if ($keywordsArray[$i] != "") {
                                    $keywordShow = str_replace('-', ' ', $keywordsArray[$i]);
                                    echo '<a class="keywords-button btn btn-default" href="?controller=pages&action=products&keyword='.$keywordsArray[$i].'">'.$keywordShow.'</a>';
                                }
                            }?>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <h3 class="other-products-text">Diğer Ürünlerimiz</h3>
                    <div class="other-products">
                        <?php $randomProductList = $products->randomProductList(8); ?>
                        <?php for ($i = 0; $i < 8; $i++) { ?>
                                <a href="?controller=pages&action=products&product_id=<?php echo $randomProductList[$i]["Id"] ?>">
                                    <div class="other-products-container vcenter">
                                        <div class="col-lg-5 col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-thumbnail" src="uploads/<?php echo $randomProductList[$i]["ImgUrl"]; ?>" height="60px" width="100%">
                                        </div>
                                        <div class="col-lg-7 col-md-8 col-sm-8 col-xs-8">
                                            <h4 class="other-products-text-title"><?php echo $randomProductList[$i]["Title"]; ?></h4>
                                            <h5 class="other-products-text-name"><?php echo $randomProductList[$i]["Name"]; ?></h5>
                                        </div>
                                    </div>
                                </a>
                        <?php } ?>
                    </div>
                </div>
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