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

    if($user[0]["user_profile_image_cover"] !== "default_background_cover.jpeg") {
        Utilities::deletePhoto($user[0]["user_profile_image_cover"], "profile_image_cover");
    }

    $image = Utilities::uploadPhoto($_FILES["cover_image"]["name"],
        $_FILES["cover_image"]["tmp_name"], "profile_image_cover");

    if($image) {
       $userObj->updateUserCoverImage($_SESSION["user_id"], $image);
       $photoObj->addNewPicture($image, $_SESSION["user_id"]);
    }

//    echo "success";
}
