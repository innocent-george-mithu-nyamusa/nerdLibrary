<?php

use Classes\ResourceView;

session_start();

include "../vendor/autoload.php";

if(isset($_POST)) {
    $resourceObj = new ResourceView();


    if(isset($_POST)) {


        if(isset($_POST["drama"])) {

            if ($_POST["drama"] == "liked") {
                $check = $resourceObj->hasUserReacted($_SESSION["user_id"], "ec2784277165023b65cc373e6c3c1d69");
                if ($check > 0) {
                    $resourceObj->updateFavorite(true, "ec2784277165023b65cc373e6c3c1d69", $_SESSION["user_id"]);
                } else {

                    $resourceObj->createResource("ec2784277165023b65cc373e6c3c1d69", $_SESSION["user_id"]);
                    $resourceObj->updateFavorite(true, "ec2784277165023b65cc373e6c3c1d69", $_SESSION["user_id"]);
                }
            } elseif ($_POST["drama"] == "unliked") {
                $resourceObj->updateFavorite(0, "ec2784277165023b65cc373e6c3c1d69", $_SESSION["user_id"]);

            }
            unset($check);
        }


        if(isset($_POST["comedy"])) {

            if ($_POST["comedy"] == "liked") {
                $check = $resourceObj->hasUserReacted($_SESSION["user_id"], "dc2e8d7c0c5a5b184702899ae4640a46");
                if ($check > 0) {
                    $resourceObj->updateFavorite(true, "dc2e8d7c0c5a5b184702899ae4640a46", $_SESSION["user_id"]);


                } else {
                    $resourceObj->createResource("dc2e8d7c0c5a5b184702899ae4640a46", $_SESSION["user_id"]);
                    $resourceObj->updateFavorite(true, "dc2e8d7c0c5a5b184702899ae4640a46", $_SESSION["user_id"]);

                }
                unset($check);
            } elseif ($_POST["comedy"] == "unliked") {
                $resourceObj->updateFavorite(0, "dc2e8d7c0c5a5b184702899ae4640a46", $_SESSION["user_id"]);
            }
        }

        if(isset($_POST["action"])) {

            if ($_POST["action"] === "liked") {
                $check = $resourceObj->hasUserReacted($_SESSION["user_id"], "55abb9ab5c3782935db9d405ca63cd57");
                if ($check > 0) {
                    $resourceObj->updateFavorite(true, "55abb9ab5c3782935db9d405ca63cd57", $_SESSION["user_id"]);
                } else {
                    $resourceObj->createResource("55abb9ab5c3782935db9d405ca63cd57", $_SESSION["user_id"]);
                    $resourceObj->updateFavorite(true, "55abb9ab5c3782935db9d405ca63cd57", $_SESSION["user_id"]);
                }
                unset($check);
            } elseif ($_POST["action"] === "unliked") {
                $resourceObj->updateFavorite(0, "55abb9ab5c3782935db9d405ca63cd57", $_SESSION["user_id"]);

            }
        }

        if(isset($_POST["romance"])) {

            if ($_POST["romance"] === "liked") {
                $check = $resourceObj->hasUserReacted($_SESSION["user_id"], "6752d96e38550a783e3e25c96a23ff8c");
                if ($check > 0) {
                    $resourceObj->updateFavorite(true, "6752d96e38550a783e3e25c96a23ff8c", $_SESSION["user_id"]);

                } else {
                    $resourceObj->createResource("6752d96e38550a783e3e25c96a23ff8c", $_SESSION["user_id"]);
                    $resourceObj->updateFavorite(true, "6752d96e38550a783e3e25c96a23ff8c", $_SESSION["user_id"]);
                }

            } elseif ($_POST["romance"] === "unliked") {
                $resourceObj->updateFavorite(0,"6752d96e38550a783e3e25c96a23ff8c", $_SESSION["user_id"]);

            }
        }



    }
}