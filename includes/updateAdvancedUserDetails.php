<?php

use Classes\UserView;

session_start();

include "../vendor/autoload.php";


$userObj = new UserView();

if(isset($_POST)) {

    echo $userObj->updateAdvancedDetails(
        $_POST["dob"],
        $_POST["phone"],
        $_POST["bio"],
        $_POST["linkedIn"],
        $_POST["facebook"],
        $_SESSION["user_id"]
    ) ? 1: 0;

}
