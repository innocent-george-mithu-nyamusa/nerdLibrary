<!DOCTYPE html>
<html lang="en">
<?php

//TODO:: GET COUNTRIES>JSON
use Classes\ActivityView;
use Classes\CategoryView;
use Classes\EpisodeView;
use Classes\NotificationSettingsView;
use Classes\UserPostView;
use Classes\ProgressTrackView;
use Classes\RelationshipView;
use Classes\SeriesView;
use Classes\UserSettingsView;
use Classes\UserView;
use Classes\Utilities;

include "vendor/autoload.php";

$utilityObj = new Utilities();
$userObj = new UserView();
$episodeObj = new EpisodeView();
$seriesObj = new SeriesView();
$categoriesObj = new CategoryView();
$postObj = new UserPostView();
$relationObj = new RelationshipView();
$progressObj = new ProgressTrackView();
$settingsObj = new UserSettingsView();
$notificationsObj = new NotificationSettingsView();
$activityObj = new ActivityView();

?>

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Settings | NerdLibrary </title>
    <link rel="icon" type="image/png" href="/assets/img/logo/logo.png"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/core.css">
</head>

<body>

<div class="pageloader"></div>
<div class="infraloader is-active"></div>
<div class="app-overlay"></div>

<?php

include "includes/frontEnd/main-navbar.php";
$currentUser = $userObj->getUser($_SESSION["user_id"]);
$userSettings = $settingsObj->getUserSettings($_SESSION["user_id"]);
$userNotificationSettings = $notificationsObj->getUserNotificationSettings($_SESSION["user_id"]);
?>

<div class="view-wrapper is-full">
    <div class="settings-sidebar is-active">
        <div class="settings-sidebar-inner">
            <div class="user-block">
                <a class="close-settings-sidebar is-hidden">
                    <i data-feather="x"></i>
                </a>
                <div class="avatar-wrap">
                    <img src="https://via.placeholder.com/150x150"
                         data-demo-src="/images/profile-images/<?php echo $_SESSION["image"]; ?>"
                         data-user-popover="89" alt="stuff about stuff">

                    <div class="badge">
                        <i data-feather="check"></i>
                    </div>
                </div>
                <h4><?php echo $_SESSION["user_fullname"]; ?></h4>
                <!--                    TODO::FIX -->
                <p><?php echo $currentUser[0]["user_country"] ?>, <?php echo $currentUser[0]["user_town"] ?></p>
            </div>
            <div class="user-menu">
                <div class="user-menu-inner has-slimscroll">
                    <div class="menu-block">
                        <ul>
                            <li id="general-list-tag" data-section="general" class="is-active">
                                <a>
                                    <!--                                        TODO::COME HERE-->
                                    <i data-feather="settings"></i>
                                    <span>General</span>
                                </a>
                            </li>
                            <li data-section="security">
                                <a>
                                    <i data-feather="shield"></i>
                                    <span>Security</span>
                                </a>
                            </li>
                            <li data-section="personal">
                                <a>
                                    <i data-feather="alert-triangle"></i>
                                    <span>Account</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="separator"></div>
                    <div class="menu-block">
                        <ul>
                            <li data-section="privacy">
                                <a>
                                    <i data-feather="lock"></i>
                                    <span>Privacy</span>
                                </a>
                            </li>
                            <li data-section="preferences">
                                <a>
                                    <i data-feather="sliders"></i>
                                    <span>Preferences</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="separator"></div>
                    <div class="menu-block">
                        <ul>
                            <li data-section="notifications">
                                <a>
                                    <i data-feather="bell"></i>
                                    <span>Notifications</span>
                                </a>
                            </li>
                            <li data-section="support">
                                <a>
                                    <i data-feather="life-buoy"></i>
                                    <span>Help</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="settings-wrapper">

        <!-- /partials/settings/sections/general-settings.html -->
        <div id="general-settings" class="settings-section is-active">
            <form action="" id="general-settings-form" method="post">
                <div class="settings-panel">

                    <div class="title-wrap">
                        <a class="mobile-sidebar-trigger">
                            <i data-feather="menu"></i>
                        </a>
                        <h2>General Settings</h2>
                    </div>

                    <div class="settings-form-wrapper">
                        <div class="settings-form">
                            <div class="columns is-multiline">

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Full Name</label>
                                        <div class="control has-icon">
                                            <input type="text" name="full-name" class="input is-fade"
                                                   value="<?php echo $currentUser[0]["user_fullname"]; ?>" required>
                                            <div class="form-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Email</label>
                                        <div class="control has-icon">
                                            <input type="text" name="email" class="input is-fade"
                                                   value="<?php echo $currentUser[0]["user_email"]; ?>" required>
                                            <div class="form-icon">
                                                <i data-feather="mail"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Username</label>
                                        <div class="control has-icon">
                                            <input type="text" name="username" class="input is-fade"
                                                   value="<?php echo $currentUser[0]["username"]; ?>" required>
                                            <div class="form-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Backup Email</label>
                                        <div class="control has-icon">
                                            <input type="text" name="backup-email" class="input is-fade"
                                                   value="<?php echo $currentUser[0]["user_backup_email"]; ?>" required>
                                            <div class="form-icon">
                                                <i data-feather="mail"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-12">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>Address</label>
                                        <div class="control">
                                            <textarea type="text" name="address" class="textarea is-fade" rows="1"
                                                      placeholder="Fill in your address..." required>
                                                <?php
                                                echo $currentUser[0]["user_address"]
                                                ?>

                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-12">
                                    <!--Field-->
                                    <div class="form-text">
                                        <p>Be sure to fill out your location settings. This will help us suggest you
                                            relevant friends and places you could like.</p>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group">
                                        <label>City</label>
                                        <div class="control has-icon">
                                            <input type="text" name="city" class="input is-fade"
                                                   value="<?php echo $currentUser[0]["user_town"]; ?>" required>
                                            <div class="form-icon">
                                                <i data-feather="map-pin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-6">
                                    <!--Field-->
                                    <div class="field field-group is-autocomplete">
                                        <label>Country</label>
                                        <div class="control has-icon">
                                            <input id="country-autocpl" name="country" type="text" class="input is-fade"
                                                   value="<?php echo $currentUser[0]["user_country"]; ?>" required>
                                            <div class="form-icon">
                                                <i data-feather="globe"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="column is-12">
                                    <div class="buttons">
                                        <button type="submit" id="save-general-settings"
                                                class="button is-solid accent-button form-button">Save Changes
                                        </button>
                                        <a id="advanced-option-button" data-section="advanced"
                                           class="button is-light form-button">Advanced</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="illustration">
                            <img class="light-image" src="assets/img/illustrations/settings/1.svg" alt="">
                            <img class="dark-image" src="assets/img/illustrations/settings/1-dark.svg" alt="">
                            <p>If you'd like to learn more about general settings, you can read about it in the <a>user
                                    guide</a>.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- /partials/settings/sections/general-settings.html -->
        <div id="advanced-settings" class="settings-section">
            <form action="" method="post" id="advanced-settings-form">
                <div class="settings-panel">

                <div class="title-wrap">
                    <a class="mobile-sidebar-trigger">
                        <i data-feather="menu"></i>
                    </a>
                    <h2>Advanced Settings</h2>
                </div>

                <div class="settings-form-wrapper">
                    <div class="settings-form">
                        <div class="columns is-multiline">

                            <div class="column is-6">
                                <!--Field-->
                                <div class="field field-group">
                                    <label>Phone Number</label>
                                    <div class="control has-icon">
                                        <input type="text" name="phone" class="input is-fade"
                                               value="<?php echo $currentUser[0]["user_phone"]; ?>">
                                        <div class="form-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="field field-group">
                                    <label>LinkedIn</label>
                                    <div class="control has-icon">
                                        <input type="text" name="linkedIn" class="input is-fade"
                                               value="<?php echo $currentUser[0]["user_linkedIn"]; ?>">
                                        <div class="form-icon">
                                            <i data-feather="mail"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-6">
                                <!--Field-->
                                <div class="field field-group">
                                    <label>Date of Birth</label>
                                    <div class="control has-icon">
                                        <input type="date" name="dob" class="input is-fade"
                                               value="<?php echo $currentUser[0]["user_dob"]; ?>">
                                        <div class="form-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>

                                <!--Field-->
                                <div class="field field-group">
                                    <label>Facebook</label>
                                    <div class="control has-icon">
                                        <input type="text" name="facebook" class="input is-fade"
                                               value="<?php echo $currentUser[0]["user_facebook"]; ?>">
                                        <div class="form-icon">
                                            <i data-feather="mail"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-12">

                                <!--Field-->
                                <div class="field field-group">
                                    <label>Biography</label>
                                    <div class="control">
                                            <textarea type="text" name="bio" class="textarea is-fade" rows="1"
                                                      placeholder="">
                                                <?php
                                                echo $currentUser[0]["user_bio"];
                                                ?>
                                            </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-12">

                                <!--Field-->
                                <div class="form-text">
                                    <p>Be sure to fill out your additional location settings. This will help us suggest
                                        you relevant friends and places you could like.</p>
                                </div>
                            </div>

                            <div class="column is-6">

                                <!--Field-->
                                <div class="field field-group">
                                    <label>Status</label>
                                    <div class="control has-icon">
                                        <input type="text" name="user-floor" class="input is-fade"
                                               value="<?php echo $currentUser[0]["user_status"] ? "verified" : "not verified"; ?>" readonly>
                                        <div class="form-icon">
                                            <i data-feather="map-pin"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-6">
                                <!--Field-->
                                <div class="field field-group is-autocomplete">
                                    <label>Account Type</label>
                                    <div class="control has-icon">
                                        <input type="text" name="user-building" class="input is-fade"
                                               value="<?php echo $currentUser[0]["user_role"] ? "Student": "Lecturer" ?>" readonly>
                                        <div class="form-icon">
                                            <i data-feather="globe"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-12">
                                <div class="buttons">
                                    <button id="save-advanced-settings" class="button is-solid accent-button form-button">Save Changes</button>
                                    <button id="back-to-general" class="button is-light form-button">General</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="illustration">
                        <img class="light-image" src="assets/img/illustrations/settings/1.svg" alt="">
                        <img class="dark-image" src="assets/img/illustrations/settings/1-dark.svg" alt="">
                        <p>If you'd like to learn more about general settings, you can read about it in the <a>user
                                guide</a>.</p>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <!-- /partials/settings/sections/security-settings.html -->
        <div id="security-settings" class="settings-section">
            <form id="security-form" method="post" action="">
                <div class="settings-panel">

                <div class="title-wrap">
                    <a class="mobile-sidebar-trigger">
                        <i data-feather="menu"></i>
                    </a>
                    <h2>Security</h2>
                </div>

                <div class="settings-form-wrapper">
                    <div class="settings-form">
                        <div class="columns is-multiline">
                            <div class="column is-12">
                                <!--Field-->
                                <div class="field field-group">
                                    <label>Current Password</label>
                                    <div class="control has-icon">
                                        <input type="password" name="oldPassword" class="input is-fade" value="<?php echo $currentUser[0]["user_password"]; ?>" readonly>
                                        <div class="form-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-6">
                                <!--Field-->
                                <div class="field field-group">
                                    <label>New Password</label>
                                    <div class="control password-control has-icon has-validation">
                                        <input id="password" name="password" type="password" class="input is-fade">
                                        <div class="form-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                        <div class="error-icon">
                                            <i data-feather="x"></i>
                                        </div>
                                        <div class="success-icon">
                                            <i data-feather="check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-6">
                                <!--Field-->
                                <div class="field field-group">
                                    <label>Repeat Password</label>
                                    <div class="control password-control has-icon has-validation">
                                        <input id="confirm-password" type="password" class="input is-fade">
                                        <div class="form-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                        <div class="error-icon">
                                            <i data-feather="x"></i>
                                        </div>
                                        <div class="success-icon">
                                            <i data-feather="check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-12">
                                <!--Field-->
                                <div class="form-text">
                                    <p>You can enable 2 factor authentication anytime to improve your account privacy
                                        and security.</p>
                                </div>
                            </div>

                            <div class="column is-6">
                                <!--Field-->
                                <div class="field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input name="enable-2-factor-auth" id="two-factor-auth" type="checkbox" class="is-switch is-success">
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Enable 2 factor auth</h4>
                                            <p>This will send an additional code to your phone number.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-6">
                                <!--Field-->
                                <div class="field field-group">
                                    <label>Phone Number</label>
                                    <div class="control phone-control has-icon has-validation">
                                        <input id="phone-number" name="phone-number" type="text" class="input is-fade" placeholder="+263773141650" value="" required>
                                        <div class="form-icon">
                                            <i data-feather="smartphone"></i>
                                        </div>
                                        <div class="error-icon">
                                            <i data-feather="x"></i>
                                        </div>
                                        <div class="success-icon">
                                            <i data-feather="check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-12">
                                <div class="buttons">
                                    <button type="submit" id="save-button" class="button is-solid accent-button form-button">Save Changes</button>
                                    <button  disabled class="button is-light form-button">Advanced</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="illustration">
                        <img src="assets/img/illustrations/settings/2.svg" alt="">
                        <p>If you'd like to learn more about security settings, you can read about it in the <a>user
                                guide</a>.</p>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <!-- /partials/settings/sections/personal-settings.html -->
        <div id="personal-settings" class="settings-section">
            <div class="settings-panel">

                <div class="title-wrap">
                    <a class="mobile-sidebar-trigger">
                        <i data-feather="menu"></i>
                    </a>
                    <h2>Personal</h2>
                </div>

                <div class="settings-form-wrapper">
                    <div class="settings-form">
                        <div class="columns is-multiline flex-portrait">
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        <h4>Personal Info</h4>
                                        <p>Access your personal info</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="clock"></i>
                                        </div>
                                        <h4>History</h4>
                                        <p>Access private history</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="download-cloud"></i>
                                        </div>
                                        <h4>Download</h4>
                                        <p>Download your data</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="codepen"></i>
                                        </div>
                                        <h4>Connected Apps</h4>
                                        <p>Manage connected apps</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="credit-card"></i>
                                        </div>
                                        <h4>Payment Info</h4>
                                        <p>Manage payment info</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="hexagon"></i>
                                        </div>
                                        <h4>Billing</h4>
                                        <p>Subscription & Billing</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="github"></i>
                                        </div>
                                        <h4>Integrations</h4>
                                        <p>Manage integrations</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="shopping-cart"></i>
                                        </div>
                                        <h4>Shop Settings</h4>
<!--                                        <p>Manage your store</p>-->
                                        <p>Shopping Preferences</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="database"></i>
                                        </div>
                                        <h4>System Settings</h4>
                                        <p>Manage preferences</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="illustration">
                        <img class="light-image" src="assets/img/illustrations/settings/3.svg" alt="">
                        <img class="dark-image" src="assets/img/illustrations/settings/3-dark.svg" alt="">
                        <p>If you'd like to learn more about account settings, you can read about it in the <a>user
                                guide</a>.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- /partials/settings/sections/privacy-settings.html -->
        <div id="privacy-settings" class="settings-section">
            <div class="settings-panel">

                <div class="title-wrap">
                    <a class="mobile-sidebar-trigger">
                        <i data-feather="menu"></i>
                    </a>
                    <h2>Privacy Settings</h2>
                </div>

                <div class="settings-form-wrapper">
                    <div class="settings-form">
                        <div class="columns is-multiline">
                            <div class="column is-8">
                                <!--Field-->
                                <div class="field spaced-field">
                                    <div class="switch-block">
                                        <label class="f-switch">
                                            <input id="setting-allow-public-profile" data-setting-value="<?php echo $userSettings["setting_public_profile"]; ?>" type="checkbox" class="is-switch" <?php echo $userSettings["setting_public_profile"] ? "checked": ""; ?> >
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Public Profile</h4>
                                            <p>Enable to make your profile viewable by anyone.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="field spaced-field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="setting-allow-public-posts" data-setting-value="<?php echo $userSettings["setting_public_posts"]; ?>" class="is-switch" <?php echo $userSettings["setting_public_posts"] ? "checked": ""; ?>>
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Public Posts</h4>
                                            <p>Enable to make your posts viewable by anyone.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="field spaced-field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="setting-tag-verification" data-setting-value="<?php echo $userSettings["setting_tag_verification"]; ?>" class="is-switch" <?php echo $userSettings["setting_tag_verification"] ? "checked": ""; ?>>
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Free Tagging</h4>
                                            <p>Enable to disable tags verification before publish.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="field spaced-field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="setting-public-friend-list" data-setting-value="<?php echo $userSettings["setting_public_friend_list"]; ?>" class="is-switch" <?php echo $userSettings["setting_public_friend_list"] ? "checked": ""; ?>>
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Public List</h4>
                                            <p>Enable to make your friend list viewable by anyone.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="setting-profile-indexed" data-setting-value="<?php echo $userSettings["setting_profile_indexable_by_search_engines"]; ?>" class="is-switch" <?php echo $userSettings["setting_profile_indexable_by_search_engines"] ? "checked": ""; ?>>
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>SEO</h4>
                                            <p>Enable to make your profile indexable by search engines.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="illustration">
                        <img class="light-image" src="assets/img/illustrations/settings/4.svg" alt="">
                        <img class="dark-image" src="assets/img/illustrations/settings/4-dark.svg" alt="">
                        <p>If you'd like to learn more about privacy settings, you can read about it in the <a>user
                                guide</a>.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- /partials/settings/sections/preferences-settings.html -->
        <div id="preferences-settings" class="settings-section">
            <div class="settings-panel">

                <div class="title-wrap">
                    <a class="mobile-sidebar-trigger">
                        <i data-feather="menu"></i>
                    </a>
                    <h2>Preferences</h2>
                </div>

                <div class="settings-form-wrapper">
                    <div class="settings-form">
                        <div class="columns is-multiline flex-portrait">
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="monitor"></i>
                                        </div>
                                        <h4>Devices</h4>
                                        <p>Manage all connected devices</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="codesandbox"></i>
                                        </div>
                                        <h4>Skills Communications</h4>
                                        <p>Skills Communication</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="box"></i>
                                        </div>
                                        <h4>Personal Communication</h4>
                                        <p>Updates & Reminders</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="search"></i>
                                        </div>
                                        <h4>Search</h4>
                                        <p>Search settings</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="cloud-snow"></i>
                                        </div>
                                        <h4>Storage Settings</h4>
                                        <p>Manage storage</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="cpu"></i>
                                        </div>
                                        <h4>Cache</h4>
                                        <p>Cache settings</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="gift"></i>
                                        </div>
                                        <h4>Reedeem</h4>
                                        <p>Reedeem your points</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="command"></i>
                                        </div>
                                        <h4>Shortcuts</h4>
                                        <p>manage shortcuts</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="layout"></i>
                                        </div>
                                        <h4>Layout</h4>
                                        <p>Layout settings</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="illustration">
                        <img class="light-image" src="assets/img/illustrations/settings/5.svg" alt="">
                        <img class="dark-image" src="assets/img/illustrations/settings/5-dark.svg" alt="">
                        <p>If you'd like to learn more about preferences settings, you can read about it in the <a>user
                                guide</a>.</p>
                    </div>
                </div>

            </div>
        </div>

<!--        //NOTFIFCATION SETTINGS HERE TODO::-->
        <!-- /partials/settings/sections/notifications-settings.html -->
        <div id="notifications-settings" class="settings-section">
            <div class="settings-panel">

                <div class="title-wrap">
                    <a class="mobile-sidebar-trigger">
                        <i data-feather="menu"></i>
                    </a>
                    <h2>Notifications</h2>
                </div>

                <div class="settings-form-wrapper">
                    <div class="settings-form">
                        <div class="columns is-multiline">
                            <div class="column is-8">

                                <div class="sub-heading">
                                    <h3>General notifications</h3>
                                </div>

                                <!--Field-->
                                <div class="field spaced-field">
                                    <div class="switch-block">
                                        <label class="f-switch">
                                            <input type="checkbox" id="notification-setting-enable" data-setting-value="<?php echo $userNotificationSettings["notification_enabled"]; ?>" class="is-switch" <?php echo $userNotificationSettings["notification_enabled"] ? "checked": ""; ?> >
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Notifications</h4>
                                            <p>Enable to activate notifications.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="field spaced-field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="notification-setting-sound" data-setting-value="<?php echo $userNotificationSettings["notification_sound"]; ?>" class="is-switch" <?php echo $userNotificationSettings["notification_sound"] ? "checked": ""; ?> >
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Sounds</h4>
                                            <p>Enable to play a sound on new notification.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="sub-heading">
                                    <h3>Social notifications</h3>
                                </div>

                                <!--Field-->
                                <div class="field spaced-field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="notification-setting-friend-request"  data-setting-value="<?php echo $userNotificationSettings["notification_friend_request"] ?>" class="is-switch" <?php echo $userNotificationSettings["notification_friend_request"] ? "checked": ""; ?>>
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Friend Request</h4>
                                            <p>Enable to receive friend request notifications.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="notification-setting-comment" data-setting-value="<?php echo $userNotificationSettings["notification_comment"]; ?>" class="is-switch" <?php echo $userNotificationSettings["notification_comment"] ? "checked": ""; ?>>
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>New Comment</h4>
                                            <p>Enable to receive new comment notifications.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="sub-heading">
                                    <h3>Chat notifications</h3>
                                </div>

                                <!--Field-->
                                <div class="field spaced-field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="notification-setting-message" data-setting-value="<?php echo $userNotificationSettings["notification_message"] ?>" class="is-switch"  <?php echo $userNotificationSettings["notification_message"] ? "checked": ""; ?>>
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>New Message</h4>
                                            <p>Enable to receive new message notifications.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Field-->
                                <div class="field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="notification-setting-follower" data-setting-value="<?php echo $userNotificationSettings["notification_follower"] ?>" class="is-switch" <?php echo $userNotificationSettings["notification_follower"] ? "checked": ""; ?>>
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Follows And Relations</h4>
                                            <p>Enable to receive new relationship/follow notifications.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="sub-heading">
                                    <h3>Payment notifications</h3>
                                </div>

                                <!--Field-->
                                <div class="field spaced-field">
                                    <div class="switch-block">
                                        <label class="f-switch is-accent">
                                            <input type="checkbox" id="notification-setting-payment" data-setting-value="<?php echo $userNotificationSettings["notification_payment"] ?>" class="is-switch" <?php echo $userNotificationSettings["notification_payment"] ? "checked": ""; ?>>
                                            <i></i>
                                        </label>
                                        <div class="meta">
                                            <h4>Payment Status</h4>
                                            <p>Enable to receive a notification on payment status change.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="illustration">
                        <img src="assets/img/illustrations/settings/6.svg" alt="">
                        <p>If you'd like to learn more about notifications settings, you can read about it in the <a>user
                                guide</a>.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- /partials/settings/sections/support-settings.html -->
        <div id="support-settings" class="settings-section">
            <div class="settings-panel">

                <div class="title-wrap">
                    <a class="mobile-sidebar-trigger">
                        <i data-feather="menu"></i>
                    </a>
                    <h2>Assistance</h2>
                </div>

                <div class="settings-form-wrapper">
                    <div class="settings-form">
                        <div class="columns is-multiline flex-portrait">
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="book-open"></i>
                                        </div>
                                        <h4>User Guide</h4>
                                        <p>Learn more about the app</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="mail"></i>
                                        </div>
                                        <h4>Message</h4>
                                        <p>Contact the support team</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="message-circle"></i>
                                        </div>
                                        <h4>Chat</h4>
                                        <p>Chat with support</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="slash"></i>
                                        </div>
                                        <h4>Blocked Users</h4>
                                        <p>Manage blocked users</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="archive"></i>
                                        </div>
                                        <h4>Archives</h4>
                                        <p>Manage archives</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="flag"></i>
                                        </div>
                                        <h4>Report</h4>
                                        <p>Report offenses</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="award"></i>
                                        </div>
                                        <h4>Rewards</h4>
                                        <p>See your rewards</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="check-circle"></i>
                                        </div>
                                        <h4>Partners</h4>
                                        <p>Partner Programs</p>
                                    </div>
                                </a>
                            </div>
                            <!--link-->
                            <div class="column is-4">
                                <a class="setting-sublink">
                                    <div class="link-content">
                                        <div class="link-icon">
                                            <i data-feather="briefcase"></i>
                                        </div>
                                        <h4>Sponsors</h4>
                                        <p>Sponsor programs</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="illustration">
                        <img class="light-image" src="assets/img/illustrations/settings/7.svg" alt="">
                        <img class="dark-image" src="assets/img/illustrations/settings/7-dark.svg" alt="">
                        <p>If you'd like to learn more about support, you can read about it in the <a>user guide</a>.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="chat-wrapper">
    <div class="chat-inner">

        <!-- Chat top navigation -->
        <div class="chat-nav">
            <div class="nav-start">
                <div class="recipient-block">
                    <div class="avatar-container">
                        <img class="user-avatar" src="https://via.placeholder.com/300x300"
                             data-demo-src="assets/img/avatars/dan.jpg" alt="">
                    </div>
                    <div class="username">
                        <span>Dan Walker</span>
                        <span><i data-feather="star"></i> <span>| Online</span></span>
                    </div>
                </div>
            </div>
            <div class="nav-end">

                <!-- Settings icon dropdown -->
                <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                    <div>
                        <a class="chat-nav-item is-icon">
                            <i data-feather="settings"></i>
                        </a>
                    </div>
                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <i data-feather="message-square"></i>
                                    <div class="media-content">
                                        <h3>Details</h3>
                                        <small>View this conversation's details.</small>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="media">
                                    <i data-feather="settings"></i>
                                    <div class="media-content">
                                        <h3>Preferences</h3>
                                        <small>Define your preferences.</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item">
                                <div class="media">
                                    <i data-feather="bell"></i>
                                    <div class="media-content">
                                        <h3>Notifications</h3>
                                        <small>Set notifications settings.</small>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="media">
                                    <i data-feather="bell-off"></i>
                                    <div class="media-content">
                                        <h3>Silence</h3>
                                        <small>Disable notifications.</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item">
                                <div class="media">
                                    <i data-feather="box"></i>
                                    <div class="media-content">
                                        <h3>Archive</h3>
                                        <small>Archive this conversation.</small>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="media">
                                    <i data-feather="trash-2"></i>
                                    <div class="media-content">
                                        <h3>Delete</h3>
                                        <small>Delete this conversation.</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="chat-search">
                    <div class="control has-icon">
                        <input type="text" class="input" placeholder="Search messages">
                        <div class="form-icon">
                            <i data-feather="search"></i>
                        </div>
                    </div>
                </div>
                <a class="chat-nav-item is-icon is-hidden-mobile">
                    <i data-feather="at-sign"></i>
                </a>
                <a class="chat-nav-item is-icon is-hidden-mobile">
                    <i data-feather="star"></i>
                </a>

                <!-- More dropdown -->
                <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                    <div>
                        <a class="chat-nav-item is-icon no-margin">
                            <i data-feather="more-vertical"></i>
                        </a>
                    </div>
                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <i data-feather="file-text"></i>
                                    <div class="media-content">
                                        <h3>Files</h3>
                                        <small>View all your files.</small>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="media">
                                    <i data-feather="users"></i>
                                    <div class="media-content">
                                        <h3>Users</h3>
                                        <small>View all users you're talking to.</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item">
                                <div class="media">
                                    <i data-feather="gift"></i>
                                    <div class="media-content">
                                        <h3>Daily bonus</h3>
                                        <small>Get your daily bonus.</small>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="media">
                                    <i data-feather="download-cloud"></i>
                                    <div class="media-content">
                                        <h3>Downloads</h3>
                                        <small>See all your downloads.</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item">
                                <div class="media">
                                    <i data-feather="life-buoy"></i>
                                    <div class="media-content">
                                        <h3>Support</h3>
                                        <small>Reach our support team.</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="chat-nav-item is-icon close-chat">
                    <i data-feather="x"></i>
                </a>
            </div>
        </div>
        <!-- Chat sidebar -->
        <div id="chat-sidebar" class="users-sidebar">
            <!-- Header -->
            <div class="header-item">
                <img class="light-image" src="assets/img/logo/friendkit-bold.svg" alt="">
                <img class="dark-image" src="assets/img/logo/friendkit-white.svg" alt="">
            </div>
            <!-- User list -->
            <div class="conversations-list has-slimscroll-xs">
                <!-- User -->
                <div class="user-item is-active" data-chat-user="dan" data-full-name="Dan Walker" data-status="Online">
                    <div class="avatar-container">
                        <img class="user-avatar" src="https://via.placeholder.com/300x300"
                             data-demo-src="assets/img/avatars/dan.jpg" alt="">
                        <div class="user-status is-online"></div>
                    </div>
                </div>
                <!-- User -->
                <div class="user-item" data-chat-user="stella" data-full-name="Stella Bergmann" data-status="Busy">
                    <div class="avatar-container">
                        <img class="user-avatar" src="https://via.placeholder.com/300x300"
                             data-demo-src="assets/img/avatars/stella.jpg" alt="">
                        <div class="user-status is-busy"></div>
                    </div>
                </div>
                <!-- User -->
                <div class="user-item" data-chat-user="daniel" data-full-name="Daniel Wellington" data-status="Away">
                    <div class="avatar-container">
                        <img class="user-avatar" src="https://via.placeholder.com/300x300"
                             data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                        <div class="user-status is-away"></div>
                    </div>
                </div>
                <!-- User -->
                <div class="user-item" data-chat-user="david" data-full-name="David Kim" data-status="Busy">
                    <div class="avatar-container">
                        <img class="user-avatar" src="https://via.placeholder.com/300x300"
                             data-demo-src="assets/img/avatars/david.jpg" alt="">
                        <div class="user-status is-busy"></div>
                    </div>
                </div>
                <!-- User -->
                <div class="user-item" data-chat-user="edward" data-full-name="Edward Mayers" data-status="Online">
                    <div class="avatar-container">
                        <img class="user-avatar" src="https://via.placeholder.com/300x300"
                             data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="user-status is-online"></div>
                    </div>
                </div>
                <!-- User -->
                <div class="user-item" data-chat-user="elise" data-full-name="Elise Walker" data-status="Away">
                    <div class="avatar-container">
                        <img class="user-avatar" src="https://via.placeholder.com/300x300"
                             data-demo-src="assets/img/avatars/elise.jpg" alt="">
                        <div class="user-status is-away"></div>
                    </div>
                </div>
                <!-- User -->
                <div class="user-item" data-chat-user="nelly" data-full-name="Nelly Schwartz" data-status="Busy">
                    <div class="avatar-container">
                        <img class="user-avatar" src="https://via.placeholder.com/300x300"
                             data-demo-src="assets/img/avatars/nelly.png" alt="">
                        <div class="user-status is-busy"></div>
                    </div>
                </div>
                <!-- User -->
                <div class="user-item" data-chat-user="milly" data-full-name="Milly Augustine" data-status="Busy">
                    <div class="avatar-container">
                        <img class="user-avatar" src="https://via.placeholder.com/300x300"
                             data-demo-src="assets/img/avatars/milly.jpg" alt="">
                        <div class="user-status is-busy"></div>
                    </div>
                </div>
            </div>
            <!-- Add Conversation -->
            <div class="footer-item">
                <div class="add-button modal-trigger" data-modal="add-conversation-modal"><i data-feather="user"></i>
                </div>
            </div>
        </div>

        <!-- Chat body -->
        <div id="chat-body" class="chat-body is-opened">
            <!-- Conversation with Dan -->
            <div id="dan-conversation" class="chat-body-inner has-slimscroll">
                <div class="date-divider">
                    <hr class="date-divider-line">
                    <span class="date-divider-text">Today</span>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                    <div class="message-block">
                        <span>8:03am</span>
                        <div class="message-text">Hi Jenna! I made a new design, and i wanted to show it to you.</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                    <div class="message-block">
                        <span>8:03am</span>
                        <div class="message-text">It's quite clean and it's inspired from Bulkit.</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>8:12am</span>
                        <div class="message-text">Oh really??! I want to see that.</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                    <div class="message-block">
                        <span>8:13am</span>
                        <div class="message-text">FYI it was done in less than a day.</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>8:17am</span>
                        <div class="message-text">Great to hear it. Just send me the PSD files so i can have a look at
                            it.
                        </div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>8:18am</span>
                        <div class="message-text">And if you have a prototype, you can also send me the link to it.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Conversation with Stella -->
            <div id="stella-conversation" class="chat-body-inner has-slimscroll is-hidden">
                <div class="date-divider">
                    <hr class="date-divider-line">
                    <span class="date-divider-text">Today</span>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>10:34am</span>
                        <div class="message-text">Hey Stella! Aren't we supposed to go the theatre after work?.</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>10:37am</span>
                        <div class="message-text">Just remembered it.</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">
                    <div class="message-block">
                        <span>11:22am</span>
                        <div class="message-text">Yeah you always do that, forget about everything.</div>
                    </div>
                </div>
            </div>
            <!-- Conversation with Daniel -->
            <div id="daniel-conversation" class="chat-body-inner has-slimscroll is-hidden">
                <div class="date-divider">
                    <hr class="date-divider-line">
                    <span class="date-divider-text">Yesterday</span>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>3:24pm</span>
                        <div class="message-text">Daniel, Amanda told me about your issue, how can I help?</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                    <div class="message-block">
                        <span>3:42pm</span>
                        <div class="message-text">Hey Jenna, thanks for answering so quickly. Iam stuck, i need a car.
                        </div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                    <div class="message-block">
                        <span>3:43pm</span>
                        <div class="message-text">Can i borrow your car for a quick ride to San Fransisco? Iam running
                            behind and
                            there' no train in sight.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Conversation with David -->
            <div id="david-conversation" class="chat-body-inner has-slimscroll is-hidden">
                <div class="date-divider">
                    <hr class="date-divider-line">
                    <span class="date-divider-text">Today</span>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>12:34pm</span>
                        <div class="message-text">Damn you! Why would you even implement this in the game?.</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>12:32pm</span>
                        <div class="message-text">I just HATE aliens.</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                    <div class="message-block">
                        <span>13:09pm</span>
                        <div class="message-text">C'mon, you just gotta learn the tricks. You can't expect aliens to
                            behave like
                            humans. I mean that's how the mechanics are.
                        </div>
                    </div>
                </div>
                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                    <div class="message-block">
                        <span>13:11pm</span>
                        <div class="message-text">I checked the replay and for example, you always get supply blocked.
                            That's not
                            the right thing to do.
                        </div>
                    </div>
                </div>
                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>13:12pm</span>
                        <div class="message-text">I know but i struggle when i have to decide what to make from
                            larvas.
                        </div>
                    </div>
                </div>
                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                    <div class="message-block">
                        <span>13:17pm</span>
                        <div class="message-text">Join me in game, i'll show you.</div>
                    </div>
                </div>
            </div>
            <!-- Conversation with Edward -->
            <div id="edward-conversation" class="chat-body-inner has-slimscroll">
                <div class="date-divider">
                    <hr class="date-divider-line">
                    <span class="date-divider-text">Monday</span>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg"
                         alt="">
                    <div class="message-block">
                        <span>4:55pm</span>
                        <div class="message-text">Hey Jenna, what's up?</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg"
                         alt="">
                    <div class="message-block">
                        <span>4:56pm</span>
                        <div class="message-text">Iam coming to LA tomorrow. Interested in having lunch?</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>5:21pm</span>
                        <div class="message-text">Hey mate, it's been a while. Sure I would love to.</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg"
                         alt="">
                    <div class="message-block">
                        <span>5:27pm</span>
                        <div class="message-text">Ok. Let's say i pick you up at 12:30 at work, works?</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>5:43pm</span>
                        <div class="message-text">Yup, that works great.</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>5:44pm</span>
                        <div class="message-text">And yeah, don't forget to bring some of my favourite cheese cake.
                        </div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg"
                         alt="">
                    <div class="message-block">
                        <span>5:27pm</span>
                        <div class="message-text">No worries</div>
                    </div>
                </div>
            </div>
            <!-- Conversation with Edward -->
            <div id="elise-conversation" class="chat-body-inner has-slimscroll is-hidden">
                <div class="date-divider">
                    <hr class="date-divider-line">
                    <span class="date-divider-text">September 28</span>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>11:53am</span>
                        <div class="message-text">Elise, i forgot my folder at your place yesterday.</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>11:53am</span>
                        <div class="message-text">I need it badly, it's work stuff.</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="">
                    <div class="message-block">
                        <span>12:19pm</span>
                        <div class="message-text">Yeah i noticed. I'll drop it in half an hour at your office.</div>
                    </div>
                </div>
            </div>
            <!-- Conversation with Nelly -->
            <div id="nelly-conversation" class="chat-body-inner has-slimscroll is-hidden">
                <div class="date-divider">
                    <hr class="date-divider-line">
                    <span class="date-divider-text">September 17</span>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>8:22pm</span>
                        <div class="message-text">So you watched the movie?</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>8:22pm</span>
                        <div class="message-text">Was it scary?</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">
                    <div class="message-block">
                        <span>9:03pm</span>
                        <div class="message-text">It was so frightening, i felt my heart was about to blow inside my
                            chest.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Conversation with Milly -->
            <div id="milly-conversation" class="chat-body-inner has-slimscroll">
                <div class="date-divider">
                    <hr class="date-divider-line">
                    <span class="date-divider-text">Today</span>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                    <div class="message-block">
                        <span>2:01pm</span>
                        <div class="message-text">Hello Jenna, did you read my proposal?</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                    <div class="message-block">
                        <span>2:01pm</span>
                        <div class="message-text">Didn't hear from you since i sent it.</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>2:02pm</span>
                        <div class="message-text">Hello Milly, Iam really sorry, Iam so busy recently, but i had the
                            time to read
                            it.
                        </div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                    <div class="message-block">
                        <span>2:04pm</span>
                        <div class="message-text">And what did you think about it?</div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>2:05pm</span>
                        <div class="message-text">Actually it's quite good, there might be some small changes but
                            overall it's
                            great.
                        </div>
                    </div>
                </div>

                <div class="chat-message is-sent">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                    <div class="message-block">
                        <span>2:07pm</span>
                        <div class="message-text">I think that i can give it to my boss at this stage.</div>
                    </div>
                </div>

                <div class="chat-message is-received">
                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
                    <div class="message-block">
                        <span>2:09pm</span>
                        <div class="message-text">Crossing fingers then</div>
                    </div>
                </div>
            </div>
            <!-- Compose message area -->
            <div class="chat-action">
                <div class="chat-action-inner">
                    <div class="control">
                        <textarea class="textarea comment-textarea" rows="1"></textarea>
                        <div class="dropdown compose-dropdown is-spaced is-accent is-up dropdown-trigger">
                            <div>
                                <div class="add-button">
                                    <div class="button-inner">
                                        <i data-feather="plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <a href="#" class="dropdown-item">
                                        <div class="media">
                                            <i data-feather="code"></i>
                                            <div class="media-content">
                                                <h3>Code snippet</h3>
                                                <small>Add and paste a code snippet.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item">
                                        <div class="media">
                                            <i data-feather="file-text"></i>
                                            <div class="media-content">
                                                <h3>Note</h3>
                                                <small>Add and paste a note.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item">
                                        <div class="media">
                                            <i data-feather="server"></i>
                                            <div class="media-content">
                                                <h3>Remote file</h3>
                                                <small>Add a file from a remote drive.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item">
                                        <div class="media">
                                            <i data-feather="monitor"></i>
                                            <div class="media-content">
                                                <h3>Local file</h3>
                                                <small>Add a file from your computer.</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="chat-panel" class="chat-panel is-opened">
            <div class="panel-inner">
                <div class="panel-header">
                    <h3>Details</h3>
                    <div class="panel-close">
                        <i data-feather="x"></i>
                    </div>
                </div>

                <!-- Dan details -->
                <div id="dan-details" class="panel-body is-user-details">
                    <div class="panel-body-inner">

                        <div class="subheader">
                            <div class="action-icon">
                                <i class="mdi mdi-video"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-camera"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-microphone"></i>
                            </div>
                            <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                <div>
                                    <div class="action-icon">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="user"></i>
                                                <div class="media-content">
                                                    <h3>View profile</h3>
                                                    <small>View this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="mail"></i>
                                                <div class="media-content">
                                                    <h3>Send message</h3>
                                                    <small>Send a message to the user's inbox.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="share-2"></i>
                                                <div class="media-content">
                                                    <h3>Share profile</h3>
                                                    <small>Share this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="x"></i>
                                                <div class="media-content">
                                                    <h3>Block user</h3>
                                                    <small>Block this user permanently.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="details-avatar">
                            <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg"
                                 alt="">
                            <div class="call-me">
                                <i class="mdi mdi-phone"></i>
                            </div>
                        </div>

                        <div class="user-meta has-text-centered">
                            <h3>Dan Walker</h3>
                            <h4>IOS Developer</h4>
                        </div>

                        <div class="user-badges">
                            <div class="hexagon is-red">
                                <div>
                                    <i class="mdi mdi-heart"></i>
                                </div>
                            </div>
                            <div class="hexagon is-green">
                                <div>
                                    <i class="mdi mdi-dog"></i>
                                </div>
                            </div>
                            <div class="hexagon is-accent">
                                <div>
                                    <i class="mdi mdi-flash"></i>
                                </div>
                            </div>
                            <div class="hexagon is-blue">
                                <div>
                                    <i class="mdi mdi-briefcase"></i>
                                </div>
                            </div>
                        </div>

                        <div class="user-about">
                            <label>About Me</label>
                            <div class="about-block">
                                <i class="mdi mdi-domain"></i>
                                <div class="about-text">
                                    <span>Works at</span>
                                    <span><a class="is-inverted" href="#">WebSmash Inc.</a></span>
                                </div>
                            </div>
                            <div class="about-block">
                                <i class="mdi mdi-school"></i>
                                <div class="about-text">
                                    <span>Studied at</span>
                                    <span><a class="is-inverted" href="#">Riverdale University</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Stella details -->
                <div id="stella-details" class="panel-body is-user-details is-hidden">
                    <div class="panel-body-inner">

                        <div class="subheader">
                            <div class="action-icon">
                                <i class="mdi mdi-video"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-camera"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-microphone"></i>
                            </div>
                            <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                <div>
                                    <div class="action-icon">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="user"></i>
                                                <div class="media-content">
                                                    <h3>View profile</h3>
                                                    <small>View this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="mail"></i>
                                                <div class="media-content">
                                                    <h3>Send message</h3>
                                                    <small>Send a message to the user's inbox.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="share-2"></i>
                                                <div class="media-content">
                                                    <h3>Share profile</h3>
                                                    <small>Share this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="x"></i>
                                                <div class="media-content">
                                                    <h3>Block user</h3>
                                                    <small>Block this user permanently.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="details-avatar">
                            <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg"
                                 alt="">
                            <div class="call-me">
                                <i class="mdi mdi-phone"></i>
                            </div>
                        </div>

                        <div class="user-meta has-text-centered">
                            <h3>Stella Bergmann</h3>
                            <h4>Shop Owner</h4>
                        </div>

                        <div class="user-badges">
                            <div class="hexagon is-purple">
                                <div>
                                    <i class="mdi mdi-bomb"></i>
                                </div>
                            </div>
                            <div class="hexagon is-red">
                                <div>
                                    <i class="mdi mdi-check-decagram"></i>
                                </div>
                            </div>
                            <div class="hexagon is-accent">
                                <div>
                                    <i class="mdi mdi-flash"></i>
                                </div>
                            </div>
                        </div>

                        <div class="user-about">
                            <label>About Me</label>
                            <div class="about-block">
                                <i class="mdi mdi-domain"></i>
                                <div class="about-text">
                                    <span>Works at</span>
                                    <span><a class="is-inverted" href="#">Trending Fashions</a></span>
                                </div>
                            </div>
                            <div class="about-block">
                                <i class="mdi mdi-map-marker"></i>
                                <div class="about-text">
                                    <span>From</span>
                                    <span><a class="is-inverted" href="#">Oklahoma City</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Daniel details -->
                <div id="daniel-details" class="panel-body is-user-details is-hidden">
                    <div class="panel-body-inner">

                        <div class="subheader">
                            <div class="action-icon">
                                <i class="mdi mdi-video"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-camera"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-microphone"></i>
                            </div>
                            <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                <div>
                                    <div class="action-icon">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="user"></i>
                                                <div class="media-content">
                                                    <h3>View profile</h3>
                                                    <small>View this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="mail"></i>
                                                <div class="media-content">
                                                    <h3>Send message</h3>
                                                    <small>Send a message to the user's inbox.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="share-2"></i>
                                                <div class="media-content">
                                                    <h3>Share profile</h3>
                                                    <small>Share this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="x"></i>
                                                <div class="media-content">
                                                    <h3>Block user</h3>
                                                    <small>Block this user permanently.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="details-avatar">
                            <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg"
                                 alt="">
                            <div class="call-me">
                                <i class="mdi mdi-phone"></i>
                            </div>
                        </div>

                        <div class="user-meta has-text-centered">
                            <h3>Daniel Wellington</h3>
                            <h4>Senior Executive</h4>
                        </div>

                        <div class="user-badges">
                            <div class="hexagon is-accent">
                                <div>
                                    <i class="mdi mdi-google-cardboard"></i>
                                </div>
                            </div>
                            <div class="hexagon is-blue">
                                <div>
                                    <i class="mdi mdi-pizza"></i>
                                </div>
                            </div>
                            <div class="hexagon is-accent">
                                <div>
                                    <i class="mdi mdi-linux"></i>
                                </div>
                            </div>
                            <div class="hexagon is-red">
                                <div>
                                    <i class="mdi mdi-puzzle"></i>
                                </div>
                            </div>
                        </div>

                        <div class="user-about">
                            <label>About Me</label>
                            <div class="about-block">
                                <i class="mdi mdi-domain"></i>
                                <div class="about-text">
                                    <span>Works at</span>
                                    <span><a class="is-inverted" href="#">Peelman & Sons</a></span>
                                </div>
                            </div>
                            <div class="about-block">
                                <i class="mdi mdi-map-marker"></i>
                                <div class="about-text">
                                    <span>From</span>
                                    <span><a class="is-inverted" href="#">Los Angeles</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- David details -->
                <div id="david-details" class="panel-body is-user-details is-hidden">
                    <div class="panel-body-inner">

                        <div class="subheader">
                            <div class="action-icon">
                                <i class="mdi mdi-video"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-camera"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-microphone"></i>
                            </div>
                            <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                <div>
                                    <div class="action-icon">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="user"></i>
                                                <div class="media-content">
                                                    <h3>View profile</h3>
                                                    <small>View this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="mail"></i>
                                                <div class="media-content">
                                                    <h3>Send message</h3>
                                                    <small>Send a message to the user's inbox.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="share-2"></i>
                                                <div class="media-content">
                                                    <h3>Share profile</h3>
                                                    <small>Share this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="x"></i>
                                                <div class="media-content">
                                                    <h3>Block user</h3>
                                                    <small>Block this user permanently.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="details-avatar">
                            <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg"
                                 alt="">
                            <div class="call-me">
                                <i class="mdi mdi-phone"></i>
                            </div>
                        </div>

                        <div class="user-meta has-text-centered">
                            <h3>David Kim</h3>
                            <h4>Senior Developer</h4>
                        </div>

                        <div class="user-badges">
                            <div class="hexagon is-red">
                                <div>
                                    <i class="mdi mdi-heart"></i>
                                </div>
                            </div>
                            <div class="hexagon is-green">
                                <div>
                                    <i class="mdi mdi-dog"></i>
                                </div>
                            </div>
                            <div class="hexagon is-accent">
                                <div>
                                    <i class="mdi mdi-flash"></i>
                                </div>
                            </div>
                            <div class="hexagon is-blue">
                                <div>
                                    <i class="mdi mdi-briefcase"></i>
                                </div>
                            </div>
                        </div>

                        <div class="user-about">
                            <label>About Me</label>
                            <div class="about-block">
                                <i class="mdi mdi-domain"></i>
                                <div class="about-text">
                                    <span>Works at</span>
                                    <span><a class="is-inverted" href="#">Frost Entertainment</a></span>
                                </div>
                            </div>
                            <div class="about-block">
                                <i class="mdi mdi-map-marker"></i>
                                <div class="about-text">
                                    <span>From</span>
                                    <span><a class="is-inverted" href="#">Chicago</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Edward details -->
                <div id="edward-details" class="panel-body is-user-details is-hidden">
                    <div class="panel-body-inner">

                        <div class="subheader">
                            <div class="action-icon">
                                <i class="mdi mdi-video"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-camera"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-microphone"></i>
                            </div>
                            <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                <div>
                                    <div class="action-icon">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="user"></i>
                                                <div class="media-content">
                                                    <h3>View profile</h3>
                                                    <small>View this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="mail"></i>
                                                <div class="media-content">
                                                    <h3>Send message</h3>
                                                    <small>Send a message to the user's inbox.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="share-2"></i>
                                                <div class="media-content">
                                                    <h3>Share profile</h3>
                                                    <small>Share this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="x"></i>
                                                <div class="media-content">
                                                    <h3>Block user</h3>
                                                    <small>Block this user permanently.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="details-avatar">
                            <img src="https://via.placeholder.com/300x300"
                                 data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                            <div class="call-me">
                                <i class="mdi mdi-phone"></i>
                            </div>
                        </div>

                        <div class="user-meta has-text-centered">
                            <h3>Edward Mayers</h3>
                            <h4>Financial analyst</h4>
                        </div>

                        <div class="user-badges">
                            <div class="hexagon is-red">
                                <div>
                                    <i class="mdi mdi-heart"></i>
                                </div>
                            </div>
                            <div class="hexagon is-green">
                                <div>
                                    <i class="mdi mdi-dog"></i>
                                </div>
                            </div>
                            <div class="hexagon is-accent">
                                <div>
                                    <i class="mdi mdi-flash"></i>
                                </div>
                            </div>
                        </div>

                        <div class="user-about">
                            <label>About Me</label>
                            <div class="about-block">
                                <i class="mdi mdi-domain"></i>
                                <div class="about-text">
                                    <span>Works at</span>
                                    <span><a class="is-inverted" href="#">Brettmann Bank</a></span>
                                </div>
                            </div>
                            <div class="about-block">
                                <i class="mdi mdi-map-marker"></i>
                                <div class="about-text">
                                    <span>From</span>
                                    <span><a class="is-inverted" href="#">Santa Fe</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Elise details -->
                <div id="elise-details" class="panel-body is-user-details is-hidden">
                    <div class="panel-body-inner">

                        <div class="subheader">
                            <div class="action-icon">
                                <i class="mdi mdi-video"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-camera"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-microphone"></i>
                            </div>
                            <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                <div>
                                    <div class="action-icon">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="user"></i>
                                                <div class="media-content">
                                                    <h3>View profile</h3>
                                                    <small>View this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="mail"></i>
                                                <div class="media-content">
                                                    <h3>Send message</h3>
                                                    <small>Send a message to the user's inbox.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="share-2"></i>
                                                <div class="media-content">
                                                    <h3>Share profile</h3>
                                                    <small>Share this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="x"></i>
                                                <div class="media-content">
                                                    <h3>Block user</h3>
                                                    <small>Block this user permanently.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="details-avatar">
                            <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg"
                                 alt="">
                            <div class="call-me">
                                <i class="mdi mdi-phone"></i>
                            </div>
                        </div>

                        <div class="user-meta has-text-centered">
                            <h3>Elise Walker</h3>
                            <h4>Social influencer</h4>
                        </div>

                        <div class="user-badges">
                            <div class="hexagon is-red">
                                <div>
                                    <i class="mdi mdi-heart"></i>
                                </div>
                            </div>
                            <div class="hexagon is-accent">
                                <div>
                                    <i class="mdi mdi-flash"></i>
                                </div>
                            </div>
                        </div>

                        <div class="user-about">
                            <label>About Me</label>
                            <div class="about-block">
                                <i class="mdi mdi-domain"></i>
                                <div class="about-text">
                                    <span>Works at</span>
                                    <span><a class="is-inverted" href="#">Social Media</a></span>
                                </div>
                            </div>
                            <div class="about-block">
                                <i class="mdi mdi-map-marker"></i>
                                <div class="about-text">
                                    <span>From</span>
                                    <span><a class="is-inverted" href="#">London</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Nelly details -->
                <div id="nelly-details" class="panel-body is-user-details is-hidden">
                    <div class="panel-body-inner">

                        <div class="subheader">
                            <div class="action-icon">
                                <i class="mdi mdi-video"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-camera"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-microphone"></i>
                            </div>
                            <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                <div>
                                    <div class="action-icon">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="user"></i>
                                                <div class="media-content">
                                                    <h3>View profile</h3>
                                                    <small>View this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="mail"></i>
                                                <div class="media-content">
                                                    <h3>Send message</h3>
                                                    <small>Send a message to the user's inbox.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="share-2"></i>
                                                <div class="media-content">
                                                    <h3>Share profile</h3>
                                                    <small>Share this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="x"></i>
                                                <div class="media-content">
                                                    <h3>Block user</h3>
                                                    <small>Block this user permanently.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="details-avatar">
                            <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png"
                                 alt="">
                            <div class="call-me">
                                <i class="mdi mdi-phone"></i>
                            </div>
                        </div>

                        <div class="user-meta has-text-centered">
                            <h3>Nelly Schwartz</h3>
                            <h4>HR Manager</h4>
                        </div>

                        <div class="user-badges">
                            <div class="hexagon is-red">
                                <div>
                                    <i class="mdi mdi-heart"></i>
                                </div>
                            </div>
                            <div class="hexagon is-green">
                                <div>
                                    <i class="mdi mdi-dog"></i>
                                </div>
                            </div>
                            <div class="hexagon is-accent">
                                <div>
                                    <i class="mdi mdi-flash"></i>
                                </div>
                            </div>
                            <div class="hexagon is-blue">
                                <div>
                                    <i class="mdi mdi-briefcase"></i>
                                </div>
                            </div>
                        </div>

                        <div class="user-about">
                            <label>About Me</label>
                            <div class="about-block">
                                <i class="mdi mdi-domain"></i>
                                <div class="about-text">
                                    <span>Works at</span>
                                    <span><a class="is-inverted" href="#">Carrefour</a></span>
                                </div>
                            </div>
                            <div class="about-block">
                                <i class="mdi mdi-map-marker"></i>
                                <div class="about-text">
                                    <span>From</span>
                                    <span><a class="is-inverted" href="#">Melbourne</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Milly details -->
                <div id="milly-details" class="panel-body is-user-details is-hidden">
                    <div class="panel-body-inner">

                        <div class="subheader">
                            <div class="action-icon">
                                <i class="mdi mdi-video"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-camera"></i>
                            </div>
                            <div class="action-icon">
                                <i class="mdi mdi-microphone"></i>
                            </div>
                            <div class="dropdown details-dropdown is-spaced is-neutral is-right dropdown-trigger ml-auto">
                                <div>
                                    <div class="action-icon">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="user"></i>
                                                <div class="media-content">
                                                    <h3>View profile</h3>
                                                    <small>View this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="mail"></i>
                                                <div class="media-content">
                                                    <h3>Send message</h3>
                                                    <small>Send a message to the user's inbox.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="share-2"></i>
                                                <div class="media-content">
                                                    <h3>Share profile</h3>
                                                    <small>Share this user's profile.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="x"></i>
                                                <div class="media-content">
                                                    <h3>Block user</h3>
                                                    <small>Block this user permanently.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="details-avatar">
                            <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg"
                                 alt="">
                            <div class="call-me">
                                <i class="mdi mdi-phone"></i>
                            </div>
                        </div>

                        <div class="user-meta has-text-centered">
                            <h3>Milly Augustine</h3>
                            <h4>Sales Manager</h4>
                        </div>

                        <div class="user-badges">
                            <div class="hexagon is-red">
                                <div>
                                    <i class="mdi mdi-heart"></i>
                                </div>
                            </div>
                            <div class="hexagon is-green">
                                <div>
                                    <i class="mdi mdi-dog"></i>
                                </div>
                            </div>
                            <div class="hexagon is-accent">
                                <div>
                                    <i class="mdi mdi-flash"></i>
                                </div>
                            </div>
                            <div class="hexagon is-blue">
                                <div>
                                    <i class="mdi mdi-briefcase"></i>
                                </div>
                            </div>
                        </div>

                        <div class="user-about">
                            <label>About Me</label>
                            <div class="about-block">
                                <i class="mdi mdi-domain"></i>
                                <div class="about-text">
                                    <span>Works at</span>
                                    <span><a class="is-inverted" href="#">Salesforce</a></span>
                                </div>
                            </div>
                            <div class="about-block">
                                <i class="mdi mdi-map-marker"></i>
                                <div class="about-text">
                                    <span>From</span>
                                    <span><a class="is-inverted" href="#">Seattle</a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="add-conversation-modal" class="modal add-conversation-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                <h3>New Conversation</h3>
                <!-- Close X button -->
                <div class="close-wrap">
                        <span class="close-modal">
                            <i data-feather="x"></i>
                        </span>
                </div>
            </div>
            <div class="card-body">

                <img src="assets/img/icons/chat/bubbles.svg" alt="">

                <div class="field is-autocomplete">
                    <div class="control has-icon">
                        <input type="text" class="input simple-users-autocpl" placeholder="Search a user">
                        <div class="form-icon">
                            <i data-feather="search"></i>
                        </div>
                    </div>
                </div>

                <div class="help-text">
                    Select a user to start a new conversation. You'll be able to add other users later.
                </div>

                <div class="action has-text-centered">
                    <button type="button" class="button is-solid accent-button raised">Start conversation</button>
                </div>
            </div>
        </div>
    </div>
</div>
<<?php
include "includes/frontEnd/explore-menu.php";
?>
<!-- Concatenated js plugins and jQuery -->
<script src="/assets/js/app.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="/assets/data/tipuedrop_content.js"></script>

<!-- Core js -->
<script src="/assets/js/global.js"></script>

<!-- Navigation options js -->
<script src="/assets/js/navbar-v1.js"></script>
<script src="/assets/js/navbar-v2.js"></script>
<script src="/assets/js/navbar-mobile.js"></script>
<script src="/assets/js/navbar-options.js"></script>
<script src="/assets/js/sidebar-v1.js"></script>

<!-- Core instance js -->
<script src="/assets/js/main.js"></script>
<script src="/assets/js/chat.js"></script>
<script src="/assets/js/touch.js"></script>
<script src="/assets/js/tour.js"></script>

<!-- Components js -->
<script src="/assets/js/explorer.js"></script>
<script src="/assets/js/widgets.js"></script>
<script src="/assets/js/modal-uploader.js"></script>
<script src="/assets/js/popovers-users.js"></script>
<script src="/assets/js/popovers-pages.js"></script>
<script src="/assets/js/lightbox.js"></script>

<!-- Landing page js -->

<!-- Signup page js -->

<!-- Feed pages js -->

<!-- profile js -->

<!-- stories js -->

<!-- friends js -->

<!-- questions js -->

<!-- video js -->

<!-- events js -->

<!-- news js -->

<!-- shop js -->

<!-- inbox js -->

<!-- settings js -->
<script src="/assets/js/settings.js"></script>

<!-- map page js -->

<!-- elements page js -->
</body>


<!-- Mirrored from friendkit.cssninja.io/user-settings.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 21:59:44 GMT -->
</html>