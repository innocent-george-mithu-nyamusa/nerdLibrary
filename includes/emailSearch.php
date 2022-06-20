<?php


use Classes\UserView;

include "../vendor/autoload.php";


if(isset($_POST["email"])) {

    $userObj = new UserView();
    $emailExists = $userObj->checkEmail($_POST["email"]);
    if($emailExists){
        echo 1;
    }
}