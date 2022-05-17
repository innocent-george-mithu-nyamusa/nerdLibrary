<!DOCTYPE html>
<html lang="en">

<?php
include "vendor/autoload.php";

use Classes\UserView;

$verification = false;

if (
    isset($_GET["channel"]) && ($_GET["channel"] == "email") && isset($_GET["purpose"]) && $_GET["purpose"] == "password_reset" && isset($_GET["verificationToken"])
) {

    $userObj = new UserView();
    if ($userObj->checkValidityPasswordVerificationCode($_GET["verificationToken"])) {
        $verification = true;
    }

} else {
    header("Location: login.php");
}
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <title> Password Reset Update | NerdLibrary </title>
    <link rel="icon" type="image/png" href="assets/img/logo/logo.png" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
</head>
<body>

    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <div class="signup-wrapper">

        <!--Fake navigation-->
        <div class="fake-nav">
            <a href="index.php" class="logo">
                <img class="light-image" src="assets/img/logo/logo.png" alt="Nerd Library Logo">
                <img class="dark-image" src="assets/img/logo/logo.png" alt="Nerd Library Logo">
<!--                <img class="light-image" src="assets/img/logo/friendkit-bold.svg" width="112" height="28" alt="">-->
<!--                <img class="dark-image" src="assets/img/logo/friendkit-white.svg" width="112" height="28" alt="">-->
            </a>
        </div>

        <div class="container">
            <!--Container-->
            <div class="login-container is-centered">
                <div class="columns is-vcentered">
                    <div class="column">

                        <h2 class="form-title has-text-centered">Welcome Back</h2>
                        <h3 class="form-subtitle has-text-centered">Enter your credentials to sign in.</h3>

                        <div class="login-form">

                            <div class="form-panel">
                                <div class="field">
                                    <label>New Password</label>
                                    <div class="control">
                                        <input type="password" id="new_password" name="new_password" class="input" placeholder="Enter your password">
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Confirm Password</label>
                                    <div class="control">
                                        <input type="password" id="confirm_password" name="confirm_password" class="input" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="field is-flex has-text-centered">
                                    <?php
                                    if(!$verification) {
                                    ?>
                                        <div id='mail_fail' style="display: block;" class='error text-center' >Validation invalid. Either token has expired or Invalid!.</div>
                                    <?php
                                    }
                                    ?>

                                    <div id='mail_success' class='success text-center'>Password Reset successfully. Proceed to login.</div>
                                    <div id='mail_fail' class='error text-center' >Password Reset Failed!.</div>

                                </div>

                            </div>

                            <div class="buttons">
                                <a id="password_update_button" class="button is-solid primary-button is-fullwidth raised">Update Password</a>
                            </div>

                            <div class="account-link has-text-centered">
                                <a href="signup.php">Don't have an account? Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Concatenated js plugins and jQuery -->
    <script src="assets/js/app.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="assets/data/tipuedrop_content.js"></script>

    <!-- Core js -->
    <script src="assets/js/global.js"></script>

    <!-- Navigation options js -->
    <script src="assets/js/navbar-v1.js"></script>
    <script src="assets/js/navbar-v2.js"></script>
    <script src="assets/js/navbar-mobile.js"></script>
    <script src="assets/js/navbar-options.js"></script>
    <script src="assets/js/sidebar-v1.js"></script>

    <!-- Core instance js -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/chat.js"></script>
    <script src="assets/js/touch.js"></script>
    <script src="assets/js/tour.js"></script>

    <!-- Components js -->
    <script src="assets/js/explorer.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/modal-uploader.js"></script>
    <script src="assets/js/popovers-users.js"></script>
    <script src="assets/js/popovers-pages.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/password-reset.js" ></script>
</body>


<!-- Mirrored from friendkit.cssninja.io/login-boxed.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 22:00:23 GMT -->
</html>