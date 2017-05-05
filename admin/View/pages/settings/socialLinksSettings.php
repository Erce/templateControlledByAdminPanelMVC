<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'Model/socialLinksModel.php';
    $socialLinks = new SocialLinks();
    $socialLinks->setSocialLinksList();
    $socialLinksList = $socialLinks->getSocialLinksList();
    require_once 'Controller/admin/socialLinksController.php';
    $socialLinksController = new SocialLinksController($socialLinks);

    if (isset($_GET['part'])) {
        $socialLinksController->{$_GET['part']}($_POST);
    }

?>

        <div class="container admin-main-container">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
                <div class="col-xs-18 col-md-10 col-sm-10 col-lg-10 container-title">
                    <div class="row first-row">
                        <div class="col-md-12 col-xs-18">
                            <h3>SOSYAL LİNK AYARLARI</h3>
                        </div>
                    </div>
                    <div class="row second-row">
                        <div class="col-lg-3 col-md-3 col-sm-2"></div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">   
                            <div class="row" id="records-title">
                                <div class="col-md-5 col-xs-5"></div>
                                <div class="col-md-2 col-xs-2"><h2></h2></div>
                                <div class="col-md-5 col-xs-5"></div>
                            </div>
                            <div id="records" class="message-div">
                                <form method="post" action="?controller=pages&action=settings&subpage=sociallinkssettings&part=update" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="twitter">Twitter:</label>
                                        <input class="input-class form-control" type="text" name="twitter" id="twitter" value="<?php echo $socialLinksList["Twitter"];?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook:</label>
                                        <input class="input-class form-control" type="text" name="facebook" id="facebook" value="<?php echo $socialLinksList["Facebook"];?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="skype">Skype:</label>
                                        <input class="input-class form-control" type="text" name="skype" id="skype" value="<?php echo $socialLinksList["Skype"];?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube">Youtube:</label>
                                        <input class="input-class form-control" type="text" name="youtube" id="youtube" value="<?php echo $socialLinksList["Youtube"];?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="rss">RSS:</label>
                                        <input class="input-class form-control" type="text" name="rss" id="rss" value=""/>
                                    </div>
                                    <br/>
                                    <br/>
                                    <input class="btn btn-default save-button" TYPE="submit" name="upload" title="Add data to the Database" value="Kaydet"/>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-2"></div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 col-lg-1"></div>
            </div>
        </div> 