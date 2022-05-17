<?php

use Classes\UserView;

session_start();

include "../vendor/autoload.php";


$userObj = new UserView();

if(isset($_POST)) {

echo $userObj->updateGeneralUserDetails(
    $_SESSION["user_id"],
    $_POST["full-name"],
    $_POST["email"],
    $_POST["city"],
    $_POST["country"],
    $_POST["address"],
    $_POST["username"],
    $_POST["backup-email"]
) ? 1: 0 ;

}
