    
    <?php 
        require_once 'Model/socialLinksModel.php';
        $socialLinksModel = new SocialLinks();
        $socialLinksModel->setSocialLinksList();
        $socialLinksList = $socialLinksModel->getSocialLinksList();
    ?>
    <footer class="footer">
        <div class="container" style="height: 100%;">
            <div class="footer-row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer-logo vcenter">
                    <img class="img-responsive" src="uploads/<?php echo $logoNavbar; ?>">
                </div>
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 text-center footer-info vcenter">
                    <p class='footer-text'>
                        <?php echo $footerDescription; ?>
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 footer-social vcenter">
                    <ul class="list-social pull-right">
                        <li><a id="facebook" href="<?php for ($index = 0; $index < count($socialLinksList); $index++) {
                                                                if($socialLinksList[$index]["Name"] == "Facebook"){echo "http://".$socialLinksList[$index]["Url"];}
                                                        } ?>"><div class="icon-1"></div></a></li>
                        <!--<li><a href="#"><div class="icon-2"></div></a></li>-->
                        <li><a id="twitter" href="<?php for ($index = 0; $index < count($socialLinksList); $index++) {
                                                                if($socialLinksList[$index]["Name"] == "Twitter"){echo "http://".$socialLinksList[$index]["Url"];}
                                                        } ?>"><div class="icon-3"></div></a></li>
                        <li><a id="skype" href="<?php for ($index = 0; $index < count($socialLinksList); $index++) {
                                                                if($socialLinksList[$index]["Name"] == "Skype"){echo "http://".$socialLinksList[$index]["Url"];}
                                                        } ?>"><div class="icon-4"></div></a></li>
                        <li><a id="contact" href="?controller=pages&action=contact"><div class="icon-5"></div></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>