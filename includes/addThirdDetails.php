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
use Classes\Utilities;


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
    $utilityObj = new Utilities();

    //Upload user photo
    $userImage = Utilities::uploadPhoto($_FILES["user_image"]["name"], $_FILES["user_image"]["tmp_name"], "profile_image");
//    echo "data in here";

    //check if photo has been submitted sucessfully
    if(is_bool($userImage)) {
        $userImage = "avatar-w.png";
    }

    //extract values from the post request array
    $accountType = $_POST["accountType"];
    $firstname = $_POST["user_firstname"];
    $lastname = $_POST["user_lastname"];
    $phone = $_POST["user_phone"];
    $email = $_POST["user_email"];
    $password = $_POST["user_password"];
    $subscriptionType = $_POST["accountSubscriptionType"];
    $accountCurrency = $_POST["user_account_currency"];

    //concat the firstname and lastname to make a full name
    $fullname = $firstname . " " . $lastname;

    // add user account
    if ($signUpObj->createUser($firstname, $fullname, $phone, $email, $password, $accountCurrency)) {


        //Sign up user
        $userId = $signUpObj->getUserId($email);
        $userObj->updateUserProfileImage($userId, $userImage);

        // create application for lecturer or student account
        if ($accountType == "lecturer") {
            $applicationObj->createApplication($userId, "lecturer");
        } elseif ($accountType == "organization") {
            $applicationObj->createApplication($userId, "organization");
        }

        //initiate default settings for user
        $settingsObj->initiateSettings($userId);
        $notificationSettingsObj->enableNotificationSettings($userId);
        $emailObj->sendAccountVerificationEmail($fullname, $email, $userId);
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

