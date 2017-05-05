<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    file_put_contents("log.txt", "references.php->-1".PHP_EOL, FILE_APPEND);
    require_once 'Model/referencesModel.php';
    $category = isset($_GET['category']) ? $_GET['category'] : "";
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $references = new ReferencesModel($category,$keyword);
    $references->setPaging(8);
    file_put_contents("log.txt", "references.php->0".PHP_EOL, FILE_APPEND);
    $references->setReferencesList();
    $referencesList = $references->getReferencesList();
    $link = (($keyword != "") ? '&keywords='.$keyword : ("".(($category != "") ? '&category='.$category : "")));
    file_put_contents("log.txt", "references.php->1".PHP_EOL, FILE_APPEND);
    require_once 'Controller/admin/referencesController.php';
    $referencesController = new ReferencesController($references);
    file_put_contents("log.txt", "references.php->2".PHP_EOL, FILE_APPEND);
    if(isset($_POST['part']) || isset($_GET['part'])){
        file_put_contents("log.txt", "product page in if post".$_POST['id'].PHP_EOL, FILE_APPEND);
        $referencesController->delete();
    }
    file_put_contents("log.txt", "references.php->3".PHP_EOL, FILE_APPEND);
   ?> 
    <div class="bg-content">
        <div class="container products-container">   
            <div class="product-section">
                <div class="row button-div">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">                                   
                            <?php 
                                try {
                                    // The "back" link
                                    $prevlink = ($references->page > 1) ? '<a class="page-arrows" href="?controller=pages&action=references&page=1" title="First page">&laquo;</a> <a class="page-arrows" href="?controller=pages&action=references'.$link.'&page=' . ($references->page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="page-arrows disabled">&laquo;</span> <span class="page-arrows disabled">&lsaquo;</span>';

                                    // The "forward" link
                                    $nextlink = ($references->page < $references->pages) ? '<a class="page-arrows" href="?controller=pages&action=references'.$link.'&page=' . ($references->page + 1) . '" title="Next page">&rsaquo;</a> <a class="page-arrows" href="?controller=pages&action=references&page=' . $references->pages . '" title="Last page">&raquo;</a>' : '<span class="page-arrows disabled">&rsaquo;</span> <span class="page-arrows disabled">&raquo;</span>';

                                    // Display the paging information
                                    echo '<div class="page-arrow-text vertical-align" id="paging"><div class="col-lg-1 col-md-2 col-sm-2 col-xs-3"><p class=" left-arrows">', $prevlink, '</p></div> <div class="col-lg-5 col-md-7 col-sm-8 col-xs-8"><p>', $references->pages, ' sayfadan ', $references->page, '. gösteriliyor, ', $references->start, '-', $references->end, ' toplam ', $references->total, ' sonuç </p></div><div class="col-lg-1 col-md-2 col-sm-2 col-xs-3"><p class="right-arrows">', $nextlink, ' </p></div></div>';

                                } catch (Exception $exc) {
                                    echo $exc->getTraceAsString();
                                }
                            ?>                           
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                            <a href="?controller=pages&action=references&page=add" id="add-slider">
                                <img class="img-responsive product-add-icon" src="Public/images/plus-icon.png" height="45px" width="45px">       
                            </a>
                        </div>
                    </div>
                </div>
                <?php for($i = 0; $i <  sizeof($referencesList); $i++) { ?>
                <a href="?controller=pages&action=references&page=edit&referencelistpage=<?php if(isset($_GET['page'])){echo $_GET['page'];}else{echo "1";} ?>&reference_id=<?php echo $referencesList[$i]["Id"]; ?>" id="referencesRow<?php echo $referencesList[$i]["Id"] ?>">
                    <div class="row vertical-align products-page-row <?php if($i % 2 == 0) {echo "products-page-row-light";}else{echo "products-page-row-dark";} ?>">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 product-page-row-img-container">
                            <div class="item-image">
                                <img class="img-responsive img-container-inside" id="myImg<?php echo $referencesList[$i]["Id"]; ?>" src="../uploads/<?php echo $referencesList[$i]["ImgUrl"]; ?>">
                            </div>
                        </div><!--
                        --><div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                            <div class="row item-content">
                                <div class="item-text">
                                    <h4><?php echo $referencesList[$i]["Title"]; ?></h4>
                                </div>
                            </div>
                        </div><!--
                        --><div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                            <div class="row item-content">
                                <div class="item-text">
                                    <h5><?php echo $referencesList[$i]["Name"]; ?></h5>
                                </div>
                            </div>
                        </div><!--
                        --><div class="col-lg-5 col-md-4"><!--
                        --></div><!--
                        --><div class="col-lg-1 col-md-2 col-sm-3 col-xs-2" id="reference-delete-icon">
                            <img class="img-responsive product-delete-icon" id="references<?php echo $referencesList[$i]['Id'];?>" src="Public/images/delete.ico" height="45px" width="45px" onclick="deleteReferenceRow(this); return false">
                        </div>
                    </div>
                </a>
                <?php } ?>
            </div> 
        </div>
    </div>