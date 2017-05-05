<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'Model/pageSettingsModel.php';
    $subpage = $_GET['subpage'];
    $pageName = substr($subpage, 0, count($subpage) - 13);
    $pageModel = new PageModel($pageName);
    $pageModel->setPage($pageName);
    $pageSettings = $pageModel->getPageRow();
    require_once 'Controller/admin/pageSettingsController.php';
    $pageSettingsController = new PageSettingsController($pageModel);

    
    if (isset($_GET['part'])) {
        $pageSettingsController->{$_GET['part']}($_POST);
        $pageModel->setPage($pageName);
        $pageSettings = $pageModel->getPageRow();
    }
?>

        <div class="container admin-main-container">
            <div class="col-lg-2 col-md-2 col-sm-1"></div>
            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 main-container">
                <div class="row first-row">
                    <div class="col-md-12 col-xs-18">
                        <h4>ANA SAYFA AYARLARI</h4>
                    </div>
                </div>
                <div class="row second-row">
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">   
                        <div class="row" id="records-title">
                            <div class="col-md-5 col-xs-5"></div>
                            <div class="col-md-2 col-xs-2"><h2></h2></div>
                            <div class="col-md-5 col-xs-5"></div>
                        </div>
                        <div id="records" class="message-div">
                            <form method="post" action="?controller=pages&action=settings&subpage=homepagesettings&part=update" enctype="multipart/form-data">
                                <div class="form-group">
                                        <input type="hidden" name="pageId" id="pageId" value="<?php echo $pageSettings["Id"];?>">
                                        <label for="pageName">Sayfa Adı:</label>
                                        <input class="input-class form-control" type="text" name="pageName" id="pageName" value="<?php echo $pageSettings["Name"]; ?>" readonly="readonly"/>
                                </div>
                                <div class="form-group">
                                        <label for="pageTitle">Sayfa Başlığı:</label>
                                        <input class="input-class form-control" type="text" name="pageTitle" id="pageTitle" value="<?php echo $pageSettings["Title"]; ?>"/>
                                </div>
                                <div class="form-group">
                                        <label for="pageNavbar">Menu:</label>
                                        <input class="input-class form-control" type="text" name="pageNavbar" id="pageNavbar" value="<?php echo $pageSettings["Navbar"]; ?>" readonly="readonly"/>
                                </div>
                                <div class="form-group">
                                        <label for="pageNavbarColor">Menu Rengi:</label>
                                        <input class="input-class form-control" type="text" name="pageNavbarColor" id="pageNavbarColor" value="<?php echo $pageSettings["NavbarColor"]; ?>" readonly="readonly"/>
                                </div>
                                <div class="form-group">
                                        <label for="pageNavbarOpacity">Menu Saydamlığı:</label>
                                        <input class="input-class form-control" type="text" name="pageNavbarOpacity" id="pageNavbarOpacity" value="<?php echo $pageSettings["NavbarOpacity"]; ?>" readonly="readonly"/>
                                </div>
                                <div class="form-group">
                                        <label for="pageSlider">Slider:</label>
                                        <input class="input-class form-control" type="text" name="pageSlider" id="pageSlider" value="<?php echo $pageSettings["Slider"]; ?>"/>
                                </div>
                                <div class="form-group">
                                        <label for="pageFooter">Footer:</label>
                                        <input class="input-class form-control" type="text" name="pageFooter" id="pageFooter" value="<?php echo $pageSettings["Footer"]; ?>" readonly="readonly"/>
                                </div>
                                <div class="form-group">
                                        <label for="pageFooterColor">Footer Color:</label>
                                        <input class="input-class form-control" type="text" name="pageFooterColor" id="pageFooterColor" value="<?php echo $pageSettings["FooterColor"]; ?>" readonly="readonly"/>
                                </div>
                                <div class="form-group">
                                        <label for="pageFooterOpacity">Footer Opacity:</label>
                                        <input class="input-class form-control" type="text" name="pageFooterOpacity" id="pageFooterOpacity" value="<?php echo $pageSettings["FooterOpacity"]; ?>" readonly="readonly"/>
                                </div>
                                <div class="form-group">
                                    <label for="pageDescription">Açıklama ( description ):</label>
                                    <input class="input-class form-control" type="text" name="pageDescription" id="pageDescription" value="<?php echo $pageSettings["Description"]; ?>"/>
                                </div>
                                <div class="form-group">    
                                    <label for="pageKeywords">Anahtar Kelimeler ( keywords ):</label>
                                    <textarea class="input-class form-control" rows="3" type="text"  resize="none" name="pageKeywords" id="pageKeywords"><?php echo $pageSettings["Keywords"]; ?></textarea>
                                </div>
                                <div class="form-group">    
                                    <label for="sliderText">Slider Yazısı: </label>
                                    <textarea class="input-class form-control widgEditor" type="text" resize="both" name="sliderText" id="sliderText"><?php echo $pageSettings["SliderText"]; ?></textarea>
                                </div>
                                <br/>
                                <br/>
                                <input class="btn btn-default save-button" TYPE="submit" name="upload" title="Add data to the Database" value="Kaydet"/>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1"></div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-1"></div>          
        </div> 