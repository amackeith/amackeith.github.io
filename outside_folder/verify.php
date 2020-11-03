<?php
        $captcha;
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the captcha form.</h2>';
          exit;
        }
        $secretKey = "mysitesecrekey";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You cannot access this page directly</h2>';
        } else {
          echo '<meta http-equiv="refresh" content="1; url=https://www.engsig.com/wp-page-with-emails/">';
        }
?>