<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        require_once 'Model/productsModel.php';
        $category = isset($_GET['category']) ? $_GET['category'] : "";
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
        $productModel = new Products($category,$keyword);

        require_once 'Model/productCategoriesModel.php';
        $productCategories = new ProductCategories();
        $productCategoriesList = $productCategories->selectAllCategories();
        
        require_once 'Controller/admin/productController.php';
        $productController = new ProductController($productModel);

        if (isset($_GET['part'])) {
            $productController->{$_GET['part']}($_POST);
        }
   ?> 
    <div class="bg-content">
        <div class="container products-container">   
            <div class="product-edit-section">
                <div class="row">
                    <form method="post" action="?controller=pages&action=products&subpage=products&page=add&part=add" enctype="multipart/form-data">
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 upload-container">
                            <div class="">
                                <label>
                                Fotoğraf seç:
                                </label>
                                <div class="image-upload">
                                    <label for="file-input">
                                        <img class="img-responsive img-container-inside" id="image-preview" src="Public/images/image_add.png">
                                    </label>
                                    <input id="file-input" type="file" name="photo">
                                </div>
                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="image-upload-several">
                                            <label for="file-input1">
                                                <img class="img-responsive img-container-inside-other" id="image-preview1" src="Public/images/image_add.png">
                                            </label>
                                            <input class="file-input" id="file-input1" type="file" name="photo1">
                                        </div>
                                        <div class="image-upload-several">
                                            <label for="file-input2">
                                                <img class="img-responsive img-container-inside-other" id="image-preview2" src="Public/images/image_add.png">
                                            </label>
                                            <input class="file-input" id="file-input2" type="file" name="photo2">
                                        </div>
                                        <div class="image-upload-several">
                                            <label for="file-input3">
                                                <img class="img-responsive img-container-inside-other" id="image-preview3" src="Public/images/image_add.png">
                                            </label>
                                            <input class="file-input" id="file-input3" type="file" name="photo3">
                                        </div>
                                        <div class="image-upload-several">
                                            <label for="file-input4">
                                                <img class="img-responsive img-container-inside-other" id="image-preview4" src="Public/images/image_add.png">
                                            </label>
                                            <input class="file-input" id="file-input4" type="file" name="photo4">
                                        </div>
                                        <div class="image-upload-several">
                                            <label for="file-input5">
                                                <img class="img-responsive img-container-inside-other" id="image-preview5" src="Public/images/image_add.png">
                                            </label>
                                            <input class="file-input" id="file-input5" type="file" name="photo5">
                                        </div>
                                        <div class="image-upload-several">
                                            <label for="file-input6">
                                                <img class="img-responsive img-container-inside-other" id="image-preview6" src="Public/images/image_add.png">
                                            </label>
                                            <input class="file-input" id="file-input6" type="file" name="photo6">
                                        </div>
                                        <div class="image-upload-several">
                                            <label for="file-input7">
                                                <img class="img-responsive img-container-inside-other" id="image-preview7" src="Public/images/image_add.png">
                                            </label>
                                            <input class="file-input" id="file-input7" type="file" name="photo7">
                                        </div>
                                        <div class="image-upload-several">
                                            <label for="file-input8">
                                                <img class="img-responsive img-container-inside-other" id="image-preview8" src="Public/images/image_add.png">
                                            </label>
                                            <input class="file-input" id="file-input8" type="file" name="photo8">
                                        </div>
                                        <div class="image-upload-several">
                                            <label for="file-input9">
                                                <img class="img-responsive img-container-inside-other" id="image-preview9" src="Public/images/image_add.png">
                                            </label>
                                            <input class="file-input" id="file-input9" type="file" name="photo9">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">      
                                <label for="productTitle">Ürün Başlığı( title ):</label>
                                <input class="input-class form-control" type="text" name="productTitle" id="productTitle" value=""/>
                            </div>
                            <div class="form-group"> 
                                <label for="productName">Ürün Adı:</label>
                                <input class="input-class form-control" type="text" name="productName" id="productName" value=""/>
                            </div>
                            <div class="form-group"> 
                                <label for="productStock">Ürün Adedi:</label>
                                <input class="input-class form-control" type="text" name="productStock" id="productStock" value=""/>
                            </div>
                            <div class="form-group"> 
                                <label for="productPrice">Ürün Fiyatı:</label>
                                <input class="input-class form-control" type="text" name="productPrice" id="productPrice" value=""/>
                            </div>
                            <div class="form-group">  
                                <label for="productDescription">Sayfa Açıklaması ( description ):</label>
                                <input class="input-class form-control" type="text" name="productDescription" id="productDescription" value=""/>
                            </div>
                            <div class="form-group">    
                                <label for="productKeywords">Anahtar Kelimeler ( keywords ):</label>
                                <textarea class="input-class form-control" rows="3" type="text" name="productKeywords" id="productKeywords" value="" placeholder="Anahtar kelimeleri ; ile ayırın   Anahtar kelimedeki boşluk yerine - koyun"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="productCategory">Ürün Kategorisi:</label>
                                <select class="form-control" type="" id="productCategory" name="productCategory">
                                    <?php for ($i = 0; $i < sizeof($productCategoriesList); $i++) { ?>
                                        <option id="option<?php echo $productCategoriesList[$i]['Id']; ?>">
                                            <?php echo $productCategoriesList[$i]["ProductCategoryListName"];?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="productId" value="">
                            </div>
                            <br/>
                            <br/>
                            <input class="btn btn-default save-button update-product-submit" type="submit" name="upload" title="Add data to the Database" value="Kaydet" id="sliderSubmit"/>
                            <a href="?controller=pages&action=products&subpage=products" class="btn btn-default save-button">İptal</a>   
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>