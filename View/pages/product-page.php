<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'Model/products.php';
    $products = new Products("","");
    $productList = $products->getProduct($_GET['product_id']);
?>
    <div class="bg-content">
        <div class="container-fluid product-section">
            <div class="row button-div">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-9 col-md-8 col-sm-9">
                        <?php echo $productList[0]["Title"]; ?>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-5 col-md-7 col-sm-8 col-xs-12">
                    <img class="img-responsive img-container-inside" id="myImg<?php echo $productList[0]["Id"] ?>" src="uploads/<?php echo $productList[0]["ImgUrl"]; ?>">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                </div>
                <div class="col-lg-2 col-md-2"></div>
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