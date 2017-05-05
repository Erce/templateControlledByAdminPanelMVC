<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
    require_once 'Controller/admin/logoffController.php';
    $logoffcontroller = new LogoffController();
    if (isset($_GET['action']) && $_GET['action'] == 'logoff') {
        $logoffcontroller->{$_GET['action']}();
    }

?>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?controller=pages&action=home">Ana Sayfa</a>
              </div>
              <div class="collapse navbar-collapse navbar-ex1-collapse">
                <!--<ul class="nav navbar-nav navbar-right" id="mobile-ul">
                    <li class=""><a class="language-a" href="index.php"><img class="" src="images/language/turkish.png" class="img-responsive" height="20px" width="20px"/></a></li>
                    <li class=""><a class="language-a" href="index_En.php"><img class="" src="images/language/english.png" class="img-responsive" height="20px" width="20px"/></a></li>    
                </ul>-->
                <ul class="nav navbar-nav navbar-right">
                    <!--<li class="active">
                        <a class="page-scroll" href="#summary">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>-->
                    <li>
                        <a href="#">Ayarlar <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?controller=pages&action=settings&subpage=sitesettings">Site Ayarları</a></li>
                            <li>
                                <a href="#">Sayfa Ayarları <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?controller=pages&action=settings&subpage=homepagesettings">Anasayfa</a></li>
                                    <li><a href="?controller=pages&action=settings&subpage=aboutpagesettings">Hakkımızda</a></li>
                                    <li><a href="?controller=pages&action=settings&subpage=productspagesettings">Ürünler</a></li>
                                    <li><a href="?controller=pages&action=settings&subpage=servicespagesettings">Hizmetler</a></li>
                                    <li><a href="?controller=pages&action=settings&subpage=referencespagesettings">Referanslar</a></li>
                                    <!--<li><a href="?controller=pages&action=settings&subpage=gallerypagesettings">Galeri</a></li>-->
                                    <li><a href="?controller=pages&action=settings&subpage=contactpagesettings">İletişim</a></li>
                                </ul>
                            </li>
                            <li><a href="?controller=pages&action=settings&subpage=sociallinkssettings">Sosyal Linkler</a></li>
                            <li>
                                <a href="#">Bakım ve Onarım <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#database">Veritabanı Bakımı</a></li>
                                    <li><a href="#checkupdates">Güncellemeleri Kontrol Et</a></li>
                                </ul>
                            </li>
                            <li><a href="#move">Hareket Dökümü</a></li>
                            <li><a href="#file-manager">File Manager</a></li>
                        </ul>
                    </li>
                    <!--<li>
                        <a href="#">Uygulamalar <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?controller=pages&action=applications&subpage=note">Notlar</a></li>
                            <li><a href="?controller=pages&action=applications&subpage=calendar">Takvim</a></li>
                        </ul>
                    </li>-->
                    <li>
                        <a class="page-scroll" href="#statistics">İstatistik <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?controller=pages&action=statistics&subpage=idadresses">IP Adresleri</a></li>
                            <li><a href="?controller=pages&action=statistics&subpage=references">Referanslar</a></li>
                            <li><a href="?controller=pages&action=statistics&subpage=activevisitors">Aktif Ziyaretçiler</a></li>
                            <li><a href="?controller=pages&action=statistics&subpage=dailydatas">Günlük Veriler</a></li>
                            <li><a href="?controller=pages&action=statistics&subpage=graphicpresentation">Grafiksel Sunum</a></li>
                        </ul>
                    </li>
                    <li><a class="page-scroll" href="?controller=pages&action=slider">Slider</a></li>
                    <li>
                        <a class="page-scroll" href="#products">Ürünler<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?controller=pages&action=products&subpage=products">Ürünler</a></li>
                            <li><a href="?controller=pages&action=products&subpage=productcategories">Ürün Kategorileri</a></li>
                            <li><a href="?controller=pages&action=products&subpage=productcomments">Ürün Yorumları</a></li>
                        </ul>
                    </li>
                    <li><a class="page-scroll" href="?controller=pages&action=references">Referanslar</a></li>
                    <!--<li><a class="page-scroll" href="?controller=pages&action=announcements">Duyurular</a></li>-->
                    <li>
                        <a class="page-scroll" href="#contact">İletişim<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?controller=pages&action=contact&subpage=inbox">Gelen Kutusu</a></li>
                            <li><a href="?controller=pages&action=contact&subpage=sentbox">Gönderilenler</a></li>
                            <li><a href="?controller=pages&action=contact&subpage=newemail">Yeni İleti Oluştur</a></li>
                        </ul>
                    </li>
                    <li>                
                        <form class="form-logoff" action="?" method="GET">
                            <button type="submit" value="logoff" class="btn btn-default logoff" name="action" id="logoff"><img class="img-responsive logoff-image" src="Public/images/logoff.png" height="18px" width="18px"></button>
                        </form>
                    </li>
                </ul>
              </div>
            </div>
        </nav>