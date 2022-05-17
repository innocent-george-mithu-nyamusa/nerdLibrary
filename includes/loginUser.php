<?php

use Classes\ActivityView;
use Classes\LoginView;
use Classes\Session\AutoLogin;
use Classes\Session\MysqlSessionHandler;

include "../vendor/autoload.php";

//$handler = new MysqlSessionHandler();

$activityObj = new ActivityView();
//session_set_save_handler($handler);

session_start();

if(isset($_POST["user_password"])) {

    $loginObj = new LoginView($_POST["user_password"], $_POST["user_email"]);
//
    if($loginObj->loginStatus()) {
          $activityObj->updateLoginActivity($_SESSION["user_id"]);
//
//        if(isset($_POST["user_remember"])) {
//
//            $autologin = new AutoLogin();
//
//            $autologin->persistentLogin();
//
//        }
       echo 1;
    }else {
        echo 0;
    }
}
