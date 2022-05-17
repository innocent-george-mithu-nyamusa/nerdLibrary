<?php


use Classes\Session\AutoLogin;

include "vendor/autoload.php";

if(isset($_SESSION["authenticated"]) || isset($_SESSION["nerdLibrary_auth"])){

}else {
    $autoLogin = new AutoLogin();
    $autoLogin->checkCredentials();

    if(!isset($_SESSION["nerdLibrary_auth"])){
        header("Location: login.php");
    }

}

