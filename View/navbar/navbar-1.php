    

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="col-lg-1 col-md-2 col-sm-2 col-xs-1"></div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="?controller=pages&action=home" class="navbar-brand"><img class="img-responsive" alt="" src="uploads/<?php echo $logoNavbar; ?>"></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="col-lg-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-8 col-md-6 col-sm-8 col-xs-10">
                    <ul class="nav navbar-nav navbar-right">
                      <li class="active"><a href="?controller=pages&action=home">Ana Sayfa</a></li>
                      <li>
                            <a href="?controller=pages&action=products">Ürünler<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <?php require_once 'Model/product-menu.php'; ?>
                            </ul>
                      </li>
                      <li><a href="?controller=pages&action=references">Referanslar</a></li>
                      <li><a href="?controller=pages&action=about">Hakkımızda</a></li>
                      <li><a href="?controller=pages&action=contact">İletişim</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>