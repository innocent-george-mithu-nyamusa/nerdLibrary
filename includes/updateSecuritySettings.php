<?php

use Classes\NotificationSettingsView;
use Classes\UserSettingsView;
use Classes\UserView;

session_start();

include "../vendor/autoload.php";

$userObj = new UserView();
$userSettingsObj = new UserSettingsView();
$notificationSettingObj = new NotificationSettingsView();

if(isset($_POST["oldPassword"])) {

    if(!empty($_POST["password"])) {
        $updatePassword = $userObj->updatePassword($_POST["oldPassword"], $_POST["password"], $_SESSION["user_id"]);
    }

    if(!empty($_POST["enable-2-factor-auth"])) {
        $userSettingsObj->enable2FactorAuth($_SESSION["user_id"]);
    }

    echo 1;
}

if(isset($_POST["settingPublicProfileValue"])) {
    echo "Setting Value in receipt file is : ". $_POST["settingPublicProfileValue"];

    echo $userSettingsObj->updatePublicProfileSetting($_SESSION["user_id"], $_POST["settingPublicProfileValue"]);
}

if(isset($_POST["settingAllowPublicPostsValue"])) {
    echo $userSettingsObj->updatePublicPostsSetting($_SESSION["user_id"], $_POST["settingAllowPublicPostsValue"]);
}

if(isset($_POST["settingAllowPublicFriendListValue"])) {
    echo $userSettingsObj->updatePublicFriendList($_SESSION["user_id"], $_POST["settingAllowPublicFriendListValue"]);
}

if(isset($_POST["settingAllowTagVerificationValue"])) {
    echo $userSettingsObj->updateTagVerificationSetting($_SESSION["user_id"], $_POST["settingAllowTagVerificationValue"]);
}

if(isset($_POST["settingProfileIndexedValue"])) {
    echo $userSettingsObj->updateProfileIndexSearchEngine($_SESSION["user_id"], $_POST["settingProfileIndexedValue"]);
}

//if(isset($_POST["settingProfileIndexedValue"])) {
//    echo $userSettingsObj->updateProfileIndexSearchEngine($_SESSION["user_id"], $_POST["settingProfileIndexedValue"]);
//}

if(isset($_POST["settingAutoPlayValue"])) {
    echo $userSettingsObj->updateVideoAutoplay($_SESSION["user_id"], $_POST["settingAutoPlayValue"]);
}

if(isset($_POST["notificationSettingEnable"])) {
    echo $notificationSettingObj->reEnabledNotifications($_SESSION["user_id"], $_POST["notificationSettingEnable"]);
}

if(isset($_POST["notificationSettingComment"])) {
    echo $notificationSettingObj->enableNotificationComments($_SESSION["user_id"], $_POST["notificationSettingComment"]);
}

if(isset($_POST["notificationSettingFollower"])) {
    echo $notificationSettingObj->enableNotificationComments($_SESSION["user_id"], $_POST["notificationSettingFollower"]);
}

if(isset($_POST["notificationSettingFriendRequest"])) {
    echo $notificationSettingObj->enableNotificationComments($_SESSION["user_id"], $_POST["notificationSettingFriendRequest"]);
}

if(isset($_POST["notificationSettingMessage"])) {
    echo $notificationSettingObj->enableNotificationComments($_SESSION["user_id"], $_POST["notificationSettingMessage"]);
}

if(isset($_POST["notificationSettingPayment"])) {
    echo $notificationSettingObj->enableNotificationComments($_SESSION["user_id"], $_POST["notificationSettingPayment"]);
}

if(isset($_POST["notificationSettingSound"])) {
    echo $notificationSettingObj->enableNotificationComments($_SESSION["user_id"], $_POST["notificationSettingSound"]);
}
