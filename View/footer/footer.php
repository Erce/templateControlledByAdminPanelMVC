    
    <?php 
        require_once 'Model/socialLinksModel.php';
        $socialLinksModel = new SocialLinks();
        $socialLinksModel->setSocialLinksList();
        $socialLinksList = $socialLinksModel->getSocialLinksList();
    ?>
    <footer class="footer">
        <div class="container" style="height: 100%;">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-right">
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
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 footer-info">
                    <a href="http://www.ercecanbalcioglu.com/">ercecanbalcioglu.com</a>
                    <p>ercecanbalcioglu.comercecanbalcioglu.come</p>
                    <p>.comercecanbalcioglu.comercecanbalcioglu.</p>
                </div>
            </div>
        </div>
    </footer>