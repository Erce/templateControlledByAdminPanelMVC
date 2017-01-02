<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 *          
 */

    require_once 'Model/productsModel.php';
    $category = isset($_GET['category']) ? $_GET['category'] : "";
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $product = new Products($category,$keyword);
    $product->setPaging();
    $product->setProductList();
    $productList = $product->getProductList();
    $link = (($keyword != "") ? '&keywords='.$keyword : ("".(($category != "") ? '&category='.$category : "")));
?>

    <div class="bg-content">
        <div class="container references-container">   
            <div class="product-section">
                <div class="row button-div">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-9 col-md-8 col-sm-9 col-xs-12">                                   
                            <?php 
                                try {
                                    // The "back" link
                                    $prevlink = ($product->page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?controller=pages&action=products'.$link.'&page=' . ($product->page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

                                    // The "forward" link
                                    $nextlink = ($product->page < $product->pages) ? '<a href="?controller=pages&action=products'.$link.'&page=' . ($product->page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $product->pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

                                    // Display the paging information
                                    echo '<div id="paging"><p>', $prevlink, ' Page ', $product->page, ' of ', $product->pages, ' pages, displaying ', $product->start, '-', $product->end, ' of ', $product->total, ' results ', $nextlink, ' </p></div>';

                                } catch (Exception $exc) {
                                    echo $exc->getTraceAsString();
                                }
                            ?>                           
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
                            <button class="all-products-button">Diğer Ürünleri Göster</button>
                        </div>
                    </div>
                </div>
                <?php for($i = 0; $i <  sizeof($productList); $i++) { ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 references-page-img-container">
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
        </div>
    </div>