<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

            file_put_contents("log.txt", "editphoto before require".PHP_EOL, FILE_APPEND);
            require_once 'Model/sliderPhotoModel.php';
            file_put_contents("log.txt", "editphoto after require".PHP_EOL, FILE_APPEND);
            $photoModel = new SliderPhoto();
            file_put_contents("log.txt", "editphoto after new obj".PHP_EOL, FILE_APPEND);
            $photoModel->editPhoto($_GET['id']);
            file_put_contents("log.txt", "editphoto after edit photo".PHP_EOL, FILE_APPEND);
            require_once 'Controller/admin/sliderPhotoController.php';
            $sliderPhotoController = new SliderPhotoController($photoModel);

            if (isset($_GET['part'])) {                     
                $sliderPhotoController->{$_GET['part']}($_POST);
                $photoModel->editPhoto($_GET['id']);
            }


        ?>

        <form id="secondform" method="post" action="?controller=pages&action=slider&page=edit&id=<?php echo $photoModel->getId();?>&part=update" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label for="photoTitle">Başlık:</label>
                                <input class="input-class form-control" type="text" name="photoTitle" id="photoTitle" value="<?php echo $photoModel->getTitle(); ?>"/>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="photoDescription">Açıklama:</label>
                                <input class="input-class form-control" type="text" name="photoDescription" id="photoDescription" value="<?php echo $photoModel->getDescription(); ?>"/>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="photoDescription">Sıra:</label>
                                <input class="input-class form-control" type="text" name="date" value="<?php echo $photoModel->getDateFromDb(); ?>">
                                <input type="hidden" name="id" value="<?php echo $photoModel->getId(); ?>">
                            </div>
                            <br>
                            <input class="btn btn-default save-button update-slider-submit" type="submit" name="upload" title="Add data to the Database" value="Kaydet" id="sliderSubmit"/>
                            <a href="?controller=pages&action=slider" class="btn btn-default save-button">İptal</a>                               
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
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
                            <p>
                            Fotoğraf seç:
                            </p>
                            <div class="image-upload">
                                <label for="file-input">
                                    <img id="image-preview" class="img-responsive logoff-image" src="../uploads/<?php echo $photoModel->getName(); ?>">
                                </label>
                                <input id="file-input" type="file" name="photo">
                                <input type="hidden" name="oldPhotoName" value='<?php echo $photoModel->getName(); ?>'>
                            </div>                                    
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </form>