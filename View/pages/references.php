<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        file_put_contents("log.txt", "view references before req".PHP_EOL, FILE_APPEND);
        require_once 'Model/references-list.php';
        $product = new References();
        $product->setReferencesList();
        $productList = $product->getReferencesList();
        file_put_contents("log.txt", "view references after get list=".$productList[0][2].PHP_EOL, FILE_APPEND);
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
                    
                    <?php for($i = 0; $i <  sizeof($productList); $i++) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 references-page-img-container">
                        <div class="item-image">
                            <img class="img-responsive img-container-inside" id="myImg<?php echo $productList[$i][0] ?>" src="uploads/<?php echo $productList[$i][3]; ?>">
                        </div>
                        <div class="row item-content">
                            <div class="item-text">
                                <h4><?php echo $productList[$i][2]; ?></h4>
                                <h5>Caption Text2</h5>
                            </div>
                        </div>
                    </div>   
                    <?php } ?>
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