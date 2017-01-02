    
    <?php
        require_once 'Model/pageSettingsModel.php';
        $page = new PageModel($action);
        $pageList = $page->getPageList();
    ?>

    <title><?php echo $pageList[0]['Title']; ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $pageList[0]['Description']; ?>">
    <meta name="keywords" content="<?php echo $pageList[0]['Keywords']; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php require_once 'Libs/csslibs.php'; ?>
    <!--
    <script src="js/jquery.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.kwicks-1.5.1.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/touchTouch.jquery.js"></script>
    <script src="js/bootstrap.js"></script>-->
    <!-- SmartMenus jQuery plugin -->
    <script>
        if ($(window).width() > 1024) {
            document.write("<" + "script src='Public/js/jquery.preloader.js'></" + "script>");
        }
    </script>
    <script>
        jQuery(window).load(function () {
            $x = $(window).width();
            if ($x > 1024) {
                jQuery("#content .row").preloader();
            }
            jQuery('.magnifier').touchTouch();
            jQuery('.spinner').animate({
                'opacity': 0
            }, 1000, 'easeOutCubic', function () {
                jQuery(this).css('display', 'none');
            });
        });
    </script>
    <!--<![endif]-->
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <link rel="stylesheet" href="css/docs.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
    <![endif]-->