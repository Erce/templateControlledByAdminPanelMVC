<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        file_put_contents("log.txt", "view references before req".PHP_EOL, FILE_APPEND);
        require_once 'Model/referencesModel.php';
        $references = new ReferencesModel("","");
        $references->setPaging(20);
        $references->setReferencesList();
        $referencesList = $references->getReferencesList();
        file_put_contents("log.txt", "view references after get list=".$referencesList[0]["Name"].PHP_EOL, FILE_APPEND);
?>

        <div class="bg-content">
            <div class="container references-container">   
                <div class="references-section">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-9 col-md-8 col-sm-9"></div>
                            <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
                                <!--<button class="all-products-button">Diğer Ürünleri Göster</button>-->
                            </div>
                        </div>
                    </div>
                    
                    <?php for($i = 0; $i <  sizeof($referencesList); $i++) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 references-page-img-container">
                        <div class="item-image">
                            <img class="img-responsive img-container-inside" id="myImg<?php echo $referencesList[$i]["Id"] ?>" src="uploads/<?php echo $referencesList[$i]["ImgUrl"]; ?>">
                        </div>
                        <div class="row item-content">
                            <div class="item-text">
                                <h4><?php echo $referencesList[$i]["Name"]; ?></h4>
                                <h5>Caption Text2</h5>
                            </div>
                        </div>
                    </div>   
                    <?php } ?>
                </div> 
            </div>
        </div>

        <div id="myModal" class="modal">
            <!-- The Close Button -->
            <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="img01">

            <!-- Modal Caption (Image Text) -->
            <div id="caption"></div>
        </div>