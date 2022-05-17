<?php

use Classes\PhotoView;
use Classes\UserView;
use Classes\Utilities;

include "../vendor/autoload.php";

session_start();

$userObj = new UserView();
$photoObj = new PhotoView();


$user = $userObj->getUser($_SESSION["user_id"]);


if(isset($_POST)) {

    if($user[0]["user_image"] !== "avatar-w.png") {
        Utilities::deletePhoto($user[0]["user_image"], "profile_image");
    }

    $image = Utilities::uploadPhoto($_FILES["profile_image"]["name"],
        $_FILES["profile_image"]["tmp_name"], "profile_image");

    if($image) {
       $userObj->updateUserProfileImage($_SESSION["user_id"], $image);
       $photoObj->addNewPicture($image, $_SESSION["user_id"]);
       $_SESSION["image"] = $image;
    }

}
