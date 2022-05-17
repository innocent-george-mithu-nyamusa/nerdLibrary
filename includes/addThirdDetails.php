<?php

use Classes\ActivityView;
use Classes\ApplicationView;
use Classes\EmailView;
use Classes\LoginView;
use Classes\NotificationSettingsView;
use Classes\SignUpView;
use Classes\UserSettingsView;
use Classes\UserSubscriptionView;
use Classes\UserView;


include "../vendor/autoload.php";

session_start();

if (isset($_POST["accountType"])) {

    $signUpObj = new SignUpView();
    $applicationObj = new ApplicationView();
    $subscriptionObj = new UserSubscriptionView();
    $activityObj = new ActivityView();
    $userObj = new UserView();
    $emailObj = new EmailView();
    $settingsObj = new UserSettingsView();
    $notificationSettingsObj = new NotificationSettingsView();
    $utilityObj = new \Classes\Utilities();


    $userImage = \Classes\Utilities::uploadPhoto($_FILES["user_image"]["name"], $_FILES["user_image"]["tmp_name"], "profile_image");
//    echo "data in here";

    if(is_bool($userImage)) {
        $userImage = "avatar-w.png";
    }

    $accountType = $_POST["accountType"];
    $firstname = $_POST["user_firstname"];
    $lastname = $_POST["user_lastname"];
    $phone = $_POST["user_phone"];
    $email = $_POST["user_email"];
    $password = $_POST["user_password"];
    $subscriptionType = $_POST["accountSubscriptionType"];
    $accountCurrency = $_POST["user_account_currency"];

        $fullname = $firstname . " " . $lastname;

    if ($signUpObj->createUser($firstname, $fullname, $phone, $email, $password, $accountCurrency)) {
//        echo "created account";
        $userId = $signUpObj->getUserId($email);

        $userObj->updateUserProfileImage($userId, $userImage);

//        echo $userId;
        if ($accountType == "lecturer") {
            $applicationObj->createApplication($userId, "lecturer");
        } elseif ($accountType == "organization") {
            $applicationObj->createApplication($userId, "organization");
        }

        $settingsObj->initiateSettings($userId);
        $notificationSettingsObj->enableNotificationSettings($userId);
//        $emailObj->sendAccountVerificationEmail($fullname, $email, $userId);
//        echo "we here";


        $subscriptionObj->createUserSubscription($accountCurrency, $subscriptionType, $userId, $userId);
        $loginObj = new LoginView($_POST["user_password"], $_POST["user_email"]);

        if($loginObj->loginStatus()){
            $activityObj->createUserLoggedInActivity($userId);
            echo $utilityObj->userPaymentLink($accountCurrency);
        }
    }

    unset($_POST);
}

