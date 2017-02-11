<?php

    require_once 'connection.php';

    define('INCLUDE_CHECK',true);
    session_start();
    if (isset($_SESSION["access"]) && $_SESSION["access"] == "granted"){
        echo "<script type='text/javascript'> window.location = 'index.php'; </script>";
        //header("Location: index.php");
    }

    require_once 'Model/databaseModel.php';
    $databaseModel = new DatabaseModel();

    require_once 'Controller/admin/databaseController.php';
    $databaseController = new DatabaseController($databaseModel);
    if (isset($_GET['part'])) {
        if($_GET['part'] == 'update') {
            $databaseController->{$_GET['part']}($_POST);
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>       
        <title></title>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="Public/css/bootstrap.css" rel="stylesheet">
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="Public/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>       
        <div class="container fill-login">
            <div class="row">
                <div class="col-md-2 col-xs-1 col-xsl-1 col-lg-2"></div>
                <div class="col-md-8 col-xs-10 col-xsl-10 col-lg-8"><div id="message-div" class="message-div"></div></div>
                <div class="col-md-2 col-xs-1 col-xsl-1 col-lg-2"></div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-1 col-xsl-1 col-lg-4"><p class="text-muted"></p></div>
                <div class="col-md-4 col-xs-10 col-xsl-10 col-lg-4" id='login-form'>
                    <div class='row'>
                        <div class="col-lg-1 col-sm-1 col-md-1"></div>
                        <div class="col-lg-10 col-sm-10 col-md-10 col-xs-12 form-title">
                            <h2 class="header-title centered vcenter">Veritabanı Paneli</h2>
                        </div>
                        <div class="col-lg-1 col-sm-1 col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="form-container">
                            <form class="form-horizontal" id="form" action="?part=update" method="post" accept-charset='UTF-8'>
                                <div class="form-group form">
                                    <div class="col-md-12">
                                        <label class="sr-only" for="username"></label>
                                        <input class="input-class form-control" type="text" name="username" id="username" placeholder="Veritabanı Kullanıcı Adı">
                                    </div>
                                </div>
                                <div class="form-group form">
                                    <div class="col-md-12">
                                        <label class="sr-only" for="password"></label>
                                        <input class="input-class form-control" type="password" name="password" id="password" placeholder="Veritabanı Şifresi">
                                    </div>
                                </div>
                                <div class="form-group form">
                                    <div class="col-md-12">
                                        <label class="sr-only" for="databaseName"></label>
                                        <input class="input-class form-control" type="text" name="databaseName" id="databaseName" placeholder="Veritabanı Adı">
                                    </div>
                                </div>
                                <div class="form-group form">
                                    <div class="col-md-12">
                                        <label class="sr-only" for="hostIp"></label>
                                        <input class="input-class form-control" type="text" name="hostIp" id="hostIp" placeholder="Host Ip">
                                    </div>
                                </div>
                                <div class="form-group form">
                                    <div class="col-md-3 col-xs-2"></div>
                                    <div class="col-md-6 col-xs-8" id="button-add">
                                        <button type="submit" value="CHECK" class="btn btn-default login" name="submit" id="submit">Giriş</button>
                                    </div>
                                    <div class="col-md-3 col-xs-2"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-1 col-xsl-1 col-lg-4"><p class="text-muted"></p></div>
            </div>
        </div>          
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>');</script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        <script type="text/javascript" src="../bootstrap.min.js"></script>
    </body>
</html>

    <?php  ?>