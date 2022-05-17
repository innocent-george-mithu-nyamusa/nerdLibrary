<?php

use Classes\EmailView;
use Classes\UserView;

include "../vendor/autoload.php";
session_start();

if(isset($_POST["verify_email"])) {

    $emailObj = new EmailView();
    $userObj = new UserView();

    if($emailObj->sendAccountVerificationEmail($_SESSION["userDetailFullName"], $_SESSION["userDetailEmail"], $_SESSION["user_id"]))
    {
        echo 1;
    }else {
        echo 0;
    }

}
