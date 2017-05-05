<?php
    require_once 'Model/loggerModel.php';
    try {
        define('INCLUDE_CHECK',true);
        $this->logger = new Logger();

        require '../../connection.php';
        /* get the incoming ID and password hash */
        $user = $_POST["username"];
        $pass = sha1($_POST["password"]);

        $db = Db::getInstance();
        $query = sprintf("SELECT id FROM users WHERE username = '%s' AND password = '%s'",
                mysql_real_escape_string($user),
                mysql_real_escape_string($pass));
        //Query the database
        $req = $db->prepare($query);
        $req->execute();

        /* Allow access if a matching record was found, else deny access. */
        if ($row = $req->fetch()) {
        /* access granted */
        session_start();
        header("Cache-control: private");
        $_SESSION['user_is_loggedin'] = 1;

        if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == '1') {
            $cookiehash = md5(sha1(username . user_ip));
            setcookie("uname",$cookiehash,time()+3600*24*365,'/','.localhost');
        }
        else {
            alert($_POST['rememberMe']);
        }

        $_SESSION["access"] = "granted";
        $_SESSION["userId"] = $row['id'];
            echo "<script type='text/javascript'> document.location = '../../admin.php'; </script>";
            //header('Location: ../../index.php');
        } 
        else {
            /* access denied &#8211; redirect back to login */
            echo "<script type='text/javascript'> document.location = '../../admin.php'; </script>";
            //header("Location: ../../admin.php");
        }
    } catch (Exception $exc) {
        $this->logger->setMessage("validateController->()");
    }

    