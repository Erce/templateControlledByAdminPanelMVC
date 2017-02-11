
 
<?php 
 
        require_once 'Model/sliderPhotoModel.php';
        $slider = new SliderPhoto();
        $slider->setSliderPhotoList();
        $sliderPhotoList = $slider->getSliderPhotoList();
 
 ?>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slider-2">
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
                            <img class="carousel-image" src="uploads/<?php echo $sliderPhotoList[0]["Name"]; ?>" alt="...">
                            <div class="carousel-caption">
                                <h3></h3>
                            </div>
                        </div>
                    <?php 
                        for ($i = 1; $i < count($sliderPhotoList); $i++) { ?>
                            <div class="item">
                            <img class="carousel-image" src="uploads/<?php echo $sliderPhotoList[$i]["Name"]; ?>" alt="...">
                            <div class="carousel-caption">
                                <h3></h3>
                            </div>
                        </div> 
                    <?php
                        }
                    ?>
                        </div>
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
                    <p class="slider-text"><?php echo $pageList[0]["SliderText"]; ?></p>
                  </div>
                </div>