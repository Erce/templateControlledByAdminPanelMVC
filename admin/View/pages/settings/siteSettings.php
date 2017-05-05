<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    require_once 'Model/siteSettingsModel.php';
    $siteSettingsModel = new SiteSettingsModel();
    $siteSettingsModel->setSiteSettingsList();
    $siteSettingsList = $siteSettingsModel->getSiteSettingsList();
    $admin = $siteSettingsModel->getAdmin($_SESSION['userId']);
    require_once 'Controller/admin/siteSettingsController.php';
    $siteSettingsController = new SiteSettingsController($siteSettingsModel);
    //print_r($siteSettingsList);
    if (isset($_GET['part'])) {
        if($_GET['part'] == 'update') {
            $siteSettingsController->{$_GET['part']}($_POST);
            $template = $siteSettingsModel->getSiteSettingsWithId($_POST['templateId']);
            for ($i = 0; $i < count($siteSettingsList); $i++) {
                if($siteSettingsList[$i]['IsOn'] == 1) {
                    $siteSettingsList[$i]['IsOn'] = 0;
                }
                if($siteSettingsList[$i]['Id'] == $_POST['templateId']) {
                    $siteSettingsList[$i] = $template;
                }
            }
        }
        else {
            $siteSettingsController->{$_GET['part']}($_POST);
            $admin = $siteSettingsModel->getAdmin($_SESSION['userId']);
        }
    }

?>

        <div class="container admin-main-container">
            <div class="row">
                <!--<div class="col-lg-1 col-sm-1 col-md-1"></div>-->
                <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6 container-left">
                    <div class="row first-row">
                        <div class="col-md-12 col-xs-18">
                            <h4>GENEL AYARLAR</h4>
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
                                <form method="post" action="?controller=pages&action=settings&subpage=sitesettings&part=updateadmin" enctype="multipart/form-data">
                                    <br>
                                    <p>
                                    Panel Kullanıcı Adı:
                                    </p>
                                    <input class="input-class form-control" type="text" name="userName" value="<?php echo $admin["UserName"]; ?>"/>
                                    <br/>
                                    <p>
                                    Panel Şifresi:
                                    </p>
                                    <input class="input-class form-control" type="password" name="password" placeholder="Yeni Şifre"/>
                                    <br/>
                                    <p>
                                    Telefon Numaranız:
                                    </p>
                                    <input class="input-class form-control" type="text" name="phoneNumber">
                                    <br/>
                                    <p>
                                    Panel Dili: <input type="radio" name="panelLanguage" value="turkish"> Turkish
                                    <input type="radio" name="panelLanguage" value="english"> English<br/><br/>
                                    </p>
                                    <input class="btn btn-default save-button site-settings-submit" TYPE="submit" name="upload" title="Add data to the Database" value="Kaydet"/>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6 container-right">
                    <div class="row first-row">
                        <div class="col-md-12 col-xs-18">
                            <h4>GÖRSEL AYARLAR</h4>
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
                                <form method="post" action="?controller=pages&action=settings&subpage=sitesettings&part=update" enctype="multipart/form-data">       
                                    <div class="form-group">
                                        <label for="templateName">Tasarım Adı:</label>
                                        <select class="form-control" type="" id="template" name="template">
                                            <?php for ($i = 0; $i < sizeof($siteSettingsList); $i++) { ?>
                                            <option id="option<?php echo $siteSettingsList[$i]['Id']; ?>" <?php if ($siteSettingsList[$i]['IsOn'] == "1") {echo "selected";}?>>
                                                    <?php echo $siteSettingsList[$i]["Name"];?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <input type='hidden' name="templateId" id='templateId' value='<?php ?>'>
                                    </div>
                                    <div class="form-group">
                                        <label for="isOn">Aktif tasarım:</label>
                                        <input type='checkbox' name="isOn" id='isOn' value="1">
                                    </div>
                                    <div class="image-upload">
                                        <div class='row'>
                                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                                                <label for="file-input">
                                                    <p>
                                                        Ana Logo seç:
                                                    </p>
                                                    <img class="img-responsive logoff-image" id="image-preview" src="Public/images/Add_image_icon.svg" height="40%" width="40%">
                                                </label>
                                                <input id="file-input" type="file" name="photo">
                                                <input type="hidden" name="oldPhotoName" id="oldPhotoName" value=''>
                                            </div>
                                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                                                <label for="file-input-favicon">
                                                    <p>
                                                        Sayfa icon seç:
                                                    </p>
                                                    <img class="img-responsive logoff-image" id="image-preview-favicon" src="Public/images/Add_image_icon.svg" height="40%" width="40%">
                                                </label>
                                                <input id="file-input-favicon" type="file" name="photoFavicon">
                                                <input type="hidden" name="oldPhotoNameFavicon" id="oldPhotoNameFavicon" value=''>
                                            </div>
                                        </div>
                                    </div><br><br>
                                    <!--<div class="form-group">
                                        <p>
                                        Değiştirmek istediğiniz logoyu seçiniz:
                                        <input type="radio" name="logo" value="mainLogo"> Ana Logo
                                        <input type="radio" name="logo" value="subLogo"> Alt Logo
                                        </p>
                                    </div>-->
                                    <div class="form-group">
                                        <label for="templateName">Tasarım Adı</label>
                                        <input class="input-class form-control" type="text" name="templateName" id="templateName" value="<?php ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="templateNavbarColor">Menu Rengi</label>
                                        <input class="input-class form-control" type="text" name="templateNavbarColor" id="templateNavbarColor" value="<?php ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <div class='row'>
                                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                                                <label for="templateNavbarOpacity">Menu Saydamlığı</label>
                                                <input class="input-class" type="range" name="templateNavbarOpacity" id="templateNavbarOpacity" min="0" max="1" step="0.1" value="1"/>
                                            </div>
                                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                                                <label for="rangeText"></label>
                                                <input class="input-class form-control" type="text" name="templateNavbarOpacityRangeText" id="templateNavbarOpacityRangeText" value="<?php ?>" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="image-upload">
                                            <label for="file-input-background">
                                                <p>
                                                    Arka plan resmi seç:
                                                </p>
                                                <img class="img-responsive logoff-image" id="image-preview-background" src="Public/images/Add_image_icon.svg" height="40%" width="40%">
                                            </label>
                                            <input id="file-input-background" type="file" name="photoBackground">
                                            <input type="hidden" name="oldPhotoNameBackground" id="oldPhotoNameBackground" value=''>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="templateBodyBackgroundColor">Tasarım Arka Plan Rengi</label>
                                        <input class="input-class form-control" type="text" name="templateBodyBackgroundColor" id="templateBodyBackgroundColor" value="<?php ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="templateFooterColor">Footer Rengi</label>
                                        <input class="input-class form-control" type="text" name="templateFooterColor" id="templateFooterColor" value="<?php ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <div class='row'>
                                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                                                <label for="templateFooterOpacity">Footer Saydamlığı</label>
                                                <input class="input-class" type="range" name="templateFooterOpacity" id="templateFooterOpacity" min="0" max="1" step="0.1" value="1"/>
                                            </div>
                                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                                                <label for="templateFooterOpacityRangeText"></label>
                                                <input class="input-class form-control" type="text" name="templateFooterOpacityRangeText" id="templateFooterOpacityRangeText" value="<?php ?>" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="templateFooterDescription">Footer Yazısı</label>
                                        <textarea class="input-class form-control widgEditor" rows="3" type="text"  resize="none" name="templateFooterDescription" id="templateFooterDescription"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="templateFontFamily">Tasarım yazı tipi</label>
                                        <input class="input-class form-control" type="text" name="templateFontFamily" id="templateFontFamily" value="<?php ?>"/>
                                    </div>
                                    <div class="form-group"><div class='row'>
                                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                                                <label for="templateFontSize">Tasarım yazı boyu</label>
                                                <input class="input-class" type="range" name="templateFontSize" id="templateFontSize" min="5" max="50" step="1" value="10"/>
                                            </div>
                                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
                                                <label for="templateFontSizeRangeText"></label>
                                                <input class="input-class form-control" type="text" name="templateFontSizeRangeText" id="templateFontSizeRangeText" value="<?php ?>" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <input class="btn btn-default save-button" TYPE="submit" name="upload" title="Add data to the Database" value="Kaydet"/>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <!--<div class="col-lg-1 col-sm-1 col-md-1"></div>-->
            </div>
        </div>
        <script type="text/javascript">var jArray =<?php echo json_encode($siteSettingsList); ?>;</script>