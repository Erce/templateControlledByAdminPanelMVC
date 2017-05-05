<?php     
    require_once('connection.php');
    
    define('INCLUDE_CHECK',true);
    session_start();
    if ($_SESSION["access"] == "granted"){
        if (isset($_GET['controller']) && isset($_GET['action'])) {
            $controller = $_GET['controller'];
            $action     = $_GET['action'];

        } else {
            $controller = 'pages';
            $action     = 'home';
        }
        require_once('View/layout.php');
    }
    else {
        echo "<script type='text/javascript'> window.location = 'admin.php'; </script>";
        //header("Location: admin.php");
    }

