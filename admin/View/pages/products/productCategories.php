<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


        require_once 'Model/productCategoriesModel.php';
        $productCategoriesModel = new ProductCategories();
        $productCategoriesList = $productCategoriesModel->selectAllCategories();
        require_once 'Controller/admin/productCategoriesController.php';
        $productCategoriesController = new ProductCategoriesController($productCategoriesModel);

        if (isset($_GET['part']) || isset($_POST['part'])) {                     
            $productCategoriesController->{$_GET['part']}($_POST);
            //$productCategoriesList = $productCategoriesModel->selectAllCategories();
        }
        
        
        /*if(isset($_POST['part']) || isset($_GET['part'])){
            file_put_contents("log.txt", "product categories page in if post".$_POST['id'].PHP_EOL, FILE_APPEND);
            $productCategoriesController->delete();
        }*/
        
        //file_put_contents("log.txt", "productCategoriesChild->catch->   ".$_POST['parent_id'].PHP_EOL, FILE_APPEND);
        //$productCategoriesController->selectAllChilds();//print_r($productCategoryChildList);
        //$productCategoryChildList = $productCategoriesModel->productCategoryChildList;

        
        ?>
        <script type="text/javascript">var productCategoryList =<?php echo json_encode($productCategoriesList); ?>;</script>
        <form id="firstform" method="post" action="" enctype="multipart/form-data">
            <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6 container-left">
                <div class="row first-row">
                    <div class="col-md-12 col-xs-18">
                        <h4>YENİ EKLE</h4>
                    </div>
                </div>
                <div class="row second-row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">   
                        <div class="row" id="records-title">
                            <div class="col-md-5 col-xs-5"></div>
                            <div class="col-md-2 col-xs-2"><h2></h2></div>
                            <div class="col-md-5 col-xs-5"></div>
                        </div>
                        <div id="records" class="message-div">
                            <div class="form-group" id="productCategorySelect">
                                <label for="productCategoryParent">Ürün Üst Kategorisi:</label>
                                <input class="input-class form-control" type="text" name="productCategoryParent" id="productCategoryParent" value="" placeholder="Ana kategori oluşturmak için boş bırakın"/>
                                <input type="hidden" name="productCategoryParentId" id='productCategoryParentId' value="">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="productCategoryName">Kategori Adı:</label>
                                <input class="input-class form-control" type="text" name="productCategoryName" id="productCategoryName" value=""/>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="productCategoryDescription">Kategori Liste Adı:</label>
                                <input class="input-class form-control" type="text" name="productCategoryListName" id="productCategoryDescription" value=""/>                      
                            </div>
                            <br>
                            <input class="btn btn-default save-button update-slider-submit" type="submit" name="upload" title="Add data to the Database" value="Kaydet" id="sliderSubmit"/>
                            <a href="?controller=pages&action=products&subpage=productcategories" class="btn btn-default save-button">İptal</a>                               
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </form>
        <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6 container-right">
            <div class="row first-row">
                <div class="col-md-12 col-xs-18">
                    <h4>ÖNIZLEME</h4>
                </div>
            </div>
            <div class="row second-row">
                <div class="col-md-1"></div>
                <div class="col-md-10">   
                    <div class="row" id="records-title">
                        <div class="col-md-5 col-xs-5"></div>
                        <div class="col-md-2 col-xs-2"><h2></h2></div>
                        <div class="col-md-5 col-xs-5"></div>
                    </div>
                    <div id="records" class="message-div">
                        <div class="categoryList" onload="categoryList();">
                            <?php 
                            function child($id,$productCategoriesList,$add) {
                                for ($index1 = 0; $index1 < count($productCategoriesList); $index1++) {
                                    if($id == $productCategoriesList[$index1]["ProductCategoryParentId"]) {
                                        echo "<a href='?controller=pages&action=products&subpage=productcategories&page=edit&product_category_id=".$productCategoriesList[$index1]["ProductCategoryId"]."' id='productCategoryRow".$productCategoriesList[$index1]["ProductCategoryId"]."'>"
                                                ."<div class='row vertical-align products-page-row product-categories-row product-categories-light'>"
                                                    . "<div class='col-lg-9 col-md-8 col-sm-9 col-xs-10'>"
                                                        . "<h4>".$add.$productCategoriesList[$index1]["ProductCategoryListName"]."</h4>"
                                                    . "</div>"
                                                    . "<div class='col-lg-3 col-md-4 col-sm-3 col-xs-2'>"
                                                        . "<img class='img-responsive product-category-delete-icon' id='productCategory".$productCategoriesList[$index1]["ProductCategoryId"]."' src='Public/images/delete.ico' height='45px' width='45px' onclick='deleteProductCategoryRow(this); return false'>"
                                                        . "<img class='img-responsive product-category-add-icon' id='productCategory".$productCategoriesList[$index1]["ProductCategoryId"]."' src='Public/images/plus-icon.png' height='45px' width='45px' onclick='addProductCategoryRow(this); return false'>"
                                                    ."</div>"
                                                . "</div>"
                                            ."</a>";
                                        child($productCategoriesList[$index1]["ProductCategoryId"],$productCategoriesList, $add." + ");
                                    }
                                }
                            }


                            for ($index = 0; $index < count($productCategoriesList); $index++) {
                                if ($productCategoriesList[$index]["ProductCategoryParentId"] == "") {
                                    echo
                                        "<a href='?controller=pages&action=products&subpage=productcategories&page=edit&product_category_id=".$productCategoriesList[$index]["ProductCategoryId"]."' id='productCategoryRow".$productCategoriesList[$index]["ProductCategoryId"]."'>"
                                            ."<div class='row vertical-align products-page-row product-categories-row product-categories-dark'>"
                                                . "<div class='col-lg-9 col-md-8 col-sm-8 col-xs-10'>"
                                                    . "<h3>".$productCategoriesList[$index]["ProductCategoryListName"]."</h3>"
                                                . "</div>"
                                                . "<div class='col-lg-3 col-md-4 col-sm-2 col-xs-2'>"
                                                    . "<img class='img-responsive product-category-delete-icon' id='productCategory".$productCategoriesList[$index]["ProductCategoryId"]."' src='Public/images/delete.ico' height='45px' width='45px' onclick='deleteProductCategoryRow(this); return false'>"
                                                    . "<img class='img-responsive product-category-add-icon' id='productCategory".$productCategoriesList[$index]["ProductCategoryId"]."' src='Public/images/plus-icon.png' height='45px' width='45px' onclick='addProductCategoryRow(this); return false'>"
                                                ."</div>"
                                            . "</div>"
                                        ."</a>";
                                    child($productCategoriesList[$index]["ProductCategoryId"],$productCategoriesList,"");   
                                }
                            }
                            ?>
                        </div>                                   
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>