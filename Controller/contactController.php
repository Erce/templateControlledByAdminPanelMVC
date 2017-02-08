<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['email']) && isset($_POST['captcha'])) {
    file_put_contents("log.txt",  $_POST["contactEmail"], FILE_APPEND);
    $email_to = $_POST["contactEmail"];
    //$this->logger->setMessage("contactController->()".$pageList[0]["ContactEmail"]);
    $email_subject = "Form Info";

    session_start();
    if($_POST['captcha'] != $_SESSION['digit']) die("Sorry, the CAPTCHA code entered was incorrect!");
    session_destroy();
    
    if(!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['email']) || !isset($_POST['companyName']) || !isset($_POST['phoneNumber']) || !isset($_POST['captcha'])) {
        died('There are empty areas in the form. Please fill them.');       
    }

    $firstName = $_POST['firstName']; //Getting elements from inputs in form by POST
    $lastName = $_POST['lastName']; //Getting elements from inputs in form by POST
    $email = $_POST['email'];   //Getting elements from inputs in form by POST
    $companyName = $_POST['companyName'];   //Getting elements from inputs in form by POST
    $phoneNumber = $_POST['phoneNumber'];   //Getting elements from inputs in form by POST

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/'; //checking if input email is textually valid
    if(!preg_match($email_exp,$email)) {    //checking if input email is textually valid
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
 
    if(strlen($error_message) > 0) {
      died($error_message);
      echo 'false';
    }
 
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($firstName)."\n";
    $email_message .= "Last Name: ".clean_string($lastName)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Company Name: ".clean_string($companyName)."\n";
    $email_message .= "Phone Number: ".clean_string($phoneNumber)."\n";
 
    $headers = 'From: '.$email."\r\n".
 
    'Reply-To: '.$email."\r\n" .
 
    'X-Mailer: PHP/' . phpversion();
 
    if (mail($email_to, $email_subject, $email_message, $headers)) {
        echo 'true';
    }
    else {
        echo 'false';
    }
}
else
{
    echo 'false';
}