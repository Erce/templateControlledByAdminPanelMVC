

 <?php 
 
        require_once 'Model/sliderPhotoModel.php';
        $slider = new SliderPhoto();
        $slider->setSliderPhotoList();
        $sliderPhotoList = $slider->getSliderPhotoList();
 
 ?>


            <div class="col-lg-2 col-md-2 col-sm-1"></div>
            <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
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
                  <!--<h2>Hoş Geldiniz!</h2>-->
                  <div>
                    <p class="slider-text"><?php echo $pageList[0]["SliderText"]; ?></p>
                  </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-1"></div>