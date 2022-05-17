<?php

use Classes\ActivityView;
use Classes\RelationshipView;
use Classes\ResourceView;

use Classes\SubscriptionRequestView;
use Classes\UserNotificationView;


include "../vendor/autoload.php";

$activityObj = new ActivityView();
$resourceObj = new ResourceView();
$relationObj = new RelationshipView();
$userNotificationObj = new UserNotificationView();
$subscriptionRequestObj = new SubscriptionRequestView();

session_start();

$followCreationResult = false;

if (isset($_POST["unFollowUser"])) {

    if ($_POST["unFollowUser"] != $_SESSION["user_id"]) {

        $activityObj->createActivity("unfollowed Another User", "follow", $_POST["unFollowUser"], $_SESSION["user_id"]);

        if (!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["unFollowUser"])) {
            $followCreationResult = $resourceObj->createResource($_POST["unFollowUser"], $_SESSION["user_id"]);
        }

        echo $followCreationResult;
        $resourceObj->updateUnFollow();

        echo 1;

    }

}


if (isset($_POST["followUser"])) {

    if ($_POST["followUser"] != $_SESSION["user_id"]) {

        $activityObj->createActivity("followed Another User", "unfollow", $_POST["followUser"], $_SESSION["user_id"]);

        if (!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["followUser"])) {
            $followCreationResult = $resourceObj->createResource($_POST["followUser"], $_SESSION["user_id"]);
        }
        $resourceObj->updateFollow();

        echo 1;
    }
}


if (isset($_POST["friendUser"])) {

    if ($_POST["friendUser"] != $_SESSION["user_id"]) {

        $activityObj->createActivity("Send Friend invite", "invite", $_POST["friendUser"], $_SESSION["user_id"]);

        if (!$relationObj->friendsYet($_SESSION["user_id"], $_POST["friendUser"])) {
            $relationshipStatus = $relationObj->createRelation($_SESSION["user_id"],"friends", $_POST["friendUser"]);
        }

        echo 1;
    }

}


if (isset($_POST["unFriendUser"])) {

    if ($_POST["unFriendUser"] != $_SESSION["user_id"]) {

        $activityObj->createActivity("Unfriended A user", "unfriend", $_POST["unFriendUser"], $_SESSION["user_id"]);

        if ($relationObj->friendsYet($_SESSION["user_id"], $_POST["unFriendUser"])) {
            $relationObj->cancelFriendship();
        }

        echo 1;
    }

}

if(isset($_POST["resourceComment"])) {



    if($_POST["likedState"] == "false") {

    $activityObj->createActivity("Liked a comment ", "like", $_POST["itemId"], $_SESSION["user_id"]);

    if(!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["itemId"])){
        $followCreationResult = $resourceObj->createResource($_POST["itemId"], $_SESSION["user_id"]);
    }

    echo $resourceObj->updateLikes($_SESSION["user_id"], $_POST["itemId"]);

    }else if ($_POST["likedState"] == "true"){

        $activityObj->createActivity("Unliked a comment", "unlike", $_POST["itemId"], $_SESSION["user_id"]);
        $userNotificationObj->createUserNotification($_POST["postOwner"], $_POST["itemId"], "comment", "owner");

        if(!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["itemId"])){

            $followCreationResult = $resourceObj->createResource($_POST["itemId"], $_SESSION["user_id"]);
        }

        $resourceObj->updateUnLikes($_SESSION["user_id"], $_POST["itemId"]);
        echo 2;
    }
}

if(isset($_POST["resourceFavorite"])) {

    if($_POST["favoriteState"] == "false") {

    $activityObj->createActivity("Unfavorite post", "favorite", $_POST["itemId"], $_SESSION["user_id"]);

    if(!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["itemId"])){
        $followCreationResult = $resourceObj->createResource($_POST["itemId"], $_SESSION["user_id"]);
    }

    echo $resourceObj->updateFavorite(0, $_POST["itemId"], $_SESSION["user_id"]);

    }else if ($_POST["favoriteState"] == "true"){

        $activityObj->createActivity("favorite a post", "favorite", $_POST["itemId"], $_SESSION["user_id"]);
        $userNotificationObj->createUserNotification($_POST["itemOwner"], $_POST["itemId"], "favorite", "owner");

        if(!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["itemId"])){
            $followCreationResult = $resourceObj->createResource($_POST["itemId"], $_SESSION["user_id"]);
        }

        $resourceObj->updateFavorite(1,$_POST["itemId"], $_SESSION["user_id"]);
        echo 2;
    }
}


if(isset($_POST["sendInvite"])) {

    if($relationObj->createRelation($_SESSION["user_id"],"friends", $_POST["userId"])){
        $relationId = $relationObj->getRelationIdResult();
        $userNotificationObj->createUserNotification($_SESSION["user_id"], $relationId, notificationType: "follow", userNotified: "followed");
    }
    echo 1;
}

if(isset($_POST["episodeLikeState"])) {

    switch($_POST["episodeLikeState"]) {

        case "like":
            $activityObj->createActivity("liked an episode", "like", $_POST["itemId"], $_SESSION["user_id"]);

            $userNotificationObj->createUserNotification($_POST["itemOwner"], $_POST["itemId"], "like", "owner");

            if(!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["itemId"])){
                $followCreationResult = $resourceObj->createResource($_POST["itemId"], $_SESSION["user_id"]);
            }


            $resourceObj->updateLikes($_SESSION["user_id"], $_POST["itemId"]);
            echo 1;
            break;

        case "dislike":
            $activityObj->createActivity("dislike a post", "unlike", $_POST["itemId"], $_SESSION["user_id"]);
            $userNotificationObj->createUserNotification($_POST["itemOwner"], $_POST["itemId"], "favorite", "owner");

            if(!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["itemId"])){
                $followCreationResult = $resourceObj->createResource($_POST["itemId"], $_SESSION["user_id"]);
            }

            $resourceObj->updateUnLikes($_SESSION["user_id"], $_POST["itemId"]);
            echo 2;
            break;

        case "watch-later":
            $activityObj->createActivity("watch later", "watch-later", $_POST["itemId"], $_SESSION["user_id"]);

            if(!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["itemId"])){
                $followCreationResult = $resourceObj->createResource($_POST["itemId"], $_SESSION["user_id"]);
            }

            $resourceObj->watchLater($_POST["itemId"], $_SESSION["user_id"]);
            echo 1;
            break;

        case "favorite":

            $activityObj->createActivity("Favorite episode", "favorite", $_POST["itemId"], $_SESSION["user_id"]);

            if(!$resourceObj->hasUserReacted($_SESSION["user_id"], $_POST["itemId"])){
                $followCreationResult = $resourceObj->createResource($_POST["itemId"], $_SESSION["user_id"]);
            }
            $resourceObj->updateFavorite(1, $_POST["itemId"], $_SESSION["user_id"]);
            echo 1;
            break;
    }
}

if(isset($_POST["addSubscription"])) {

    $activityObj->createActivity("Updated subscriptions", "subscription", $_SESSION["user_id"], $_SESSION["user_id"]);
    $userNotificationObj->createUserNotification($_SESSION["user_id"], $_SESSION["user_id"], "subscription-request", "personal");
    $subscriptionRequestObj->createSubscriptionRequest($_SESSION["user_id"], $_SESSION["subscription"]);

    echo 1;

}





