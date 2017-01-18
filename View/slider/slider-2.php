
 
<?php 
 
        require_once 'Model/sliderPhotoModel.php';
        $slider = new SliderPhoto();
        $slider->setSliderPhotoList();
        $sliderPhotoList = $slider->getSliderPhotoList();
 
 ?>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                    <?php 
                        for ($i = 1; $i < count($sliderPhotoList); $i++) { ?>
                            <li data-target="#carousel-example" data-slide-to="<?php echo $i; ?>"></li>   
                    <?php
                        }
                    ?>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="uploads/<?php echo $sliderPhotoList[0]["Name"]; ?>" alt="...">
                            <div class="carousel-caption">
                                <h3></h3>
                            </div>
                        </div>
                    <?php 
                        for ($i = 1; $i < count($sliderPhotoList); $i++) { ?>
                            <div class="item">
                            <img src="uploads/<?php echo $sliderPhotoList[$i]["Name"]; ?>" alt="...">
                            <div class="carousel-caption">
                                <h3></h3>
                            </div>
                        </div> 
                    <?php
                        }
                    ?>
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
                <div class="block-slogan">
                  <!--<h2>Welcome!</h2>-->
                  <div>
                    <p><a href="#" class="link-1">Click here</a> for more info about this free website template created by TemplateMonster.com. This is a Bootstrap template that goes with several layout options (for desktop, tablet, smartphone landscape and portrait) to fit all popular screen resolutions. The PSD source files of this template are available for free for the registered members of TemplateMonster.com. Feel free to get them!</p>
                  </div>
                </div>
            </div>