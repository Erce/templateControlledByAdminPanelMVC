<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 *          
 */
    try {
        require_once 'Model/productsModel.php';
        $category = isset($_GET['category']) ? $_GET['category'] : "";
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
        $product = new Products($category,$keyword);
        $product->setPaging(16);
        $product->setProductList();
        $productList = $product->getProductList();
        $link = (($keyword != "") ? '&keyword='.$keyword : ("".(($category != "") ? '&category='.$category : "")));
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }


?>
    
    <div class="bg-content">
        <?php if (isset($productList[0])) : ?>
        <div class="container products-container">   
            <div class="product-section">
                <div class="row button-div">
                        <div class="col-lg-9 col-md-8 col-sm-9 col-xs-12">
                            <?php 
                                try {
                                    // The "back" link
                                    $prevlink = ($product->page > 1) ? '<a class="page-arrows" href="?controller=pages&action=products&page=1" title="First page">&laquo;</a> <a class="page-arrows" href="?controller=pages&action=products'.$link.'&page=' . ($product->page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="page-arrows disabled">&laquo;</span> <span class="page-arrows disabled">&lsaquo;</span>';

                                    // The "forward" link
                                    $nextlink = ($product->page < $product->pages) ? '<a class="page-arrows" href="?controller=pages&action=products'.$link.'&page=' . ($product->page + 1) . '" title="Next page">&rsaquo;</a> <a class="page-arrows" href="?controller=pages&action=products&page=' . $product->pages . '" title="Last page">&raquo;</a>' : '<span class="page-arrows disabled">&rsaquo;</span> <span class="page-arrows disabled">&raquo;</span>';

                                    // Display the paging information
                                    echo '<div class="page-arrow-text vertical-align" id="paging"><div class="col-lg-1 col-md-2 col-sm-2 col-xs-3"><p class=" left-arrows">', $prevlink, '</p></div> <div class="col-lg-5 col-md-7 col-sm-8 col-xs-8"><p>', $product->pages, ' sayfadan ', $product->page, '. gösteriliyor, ', $product->start, '-', $product->end, ' toplam ', $product->total, ' sonuç </p></div><div class="col-lg-1 col-md-2 col-sm-2 col-xs-3"><p class="right-arrows">', $nextlink, ' </p></div></div>';

                                } catch (Exception $exc) {
                                    echo $exc->getTraceAsString();
                                }
                            ?>                           
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
                            <a class="keywords-button btn btn-default" href="?controller=pages&action=products">Diğer Ürünleri Göster</a>
                        </div>
                </div>
                <?php for($i = 0; $i <  sizeof($productList); $i++) { ?>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 references-page-img-container">
                    <a href="?controller=pages&action=products&product_id=<?php echo $productList[$i]["Id"] ?>">
                        <div class="product-img-container">
                            <div class="item-image">
                                <img class="img-responsive img-container-inside" id="myImg<?php echo $productList[$i]["Id"] ?>" src="uploads/<?php echo $productList[$i]["ImgUrl"]; ?>"/>
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
        <?php
        else :
            require_once('View/pages/error.php');
        
        endif; ?>
    </div>
