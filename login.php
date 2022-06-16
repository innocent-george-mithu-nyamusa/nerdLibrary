<!DOCTYPE html>
<html lang="en">
<!---->
<?php
include "vendor/autoload.php";
session_start();
//if(isset($_SESSION["authenticated"]) || isset($_SESSION["nerdLibrary_auth"])){
//    header("Location: index.php");
//}
//$handler = new \Classes\Session\MysqlSessionHandler();
//
//session_set_save_handler($handler);

if (isset($_SESSION['authenticated'])) {
    header("Location: index.php");
}

//
?>

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Login | NerdLibrary </title>
    <link rel="icon" type="image/png" href="assets/img/logo/logo.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
</head>

<body class="is-white">

    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <div class="login-wrapper">

        <!-- Main Wrapper -->
        <div class="login-wrapper columns is-gapless">
            <!--Left Side (Desktop Only)-->
            <div class="column is-6 is-hidden-mobile hero-banner">
                <div class="hero is-fullheight is-login">
                    <div class="hero-body">
                        <div class="container">
                            <div class="left-caption">
                                <h2>Join an Exciting Learning Experience.</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Right Side-->
            <div class="column is-6">
                <div class="hero form-hero is-fullheight">
                    <!--Logo-->
                    <div class="logo-wrap">
                        <div class="wrap-inner">
                            <img src="assets/img/logo/logo.png" height="832" width="1026" alt="">
                            <!--                            <img src="assets/img/logo/friendkit-white.svg" alt="">-->
                        </div>
                    </div>
                    <!--Login Form-->
                    <div class="hero-body">
                        <div class="form-wrapper">
                            <!--Avatar-->
                            <div class="avatar">
                                <div class="badge">
                                    <i data-feather="check"></i>
                                </div>
                                <img src="https://placehold.it/128x128" data-demo-src="assets/img/avatars/avatar-w.png" alt="">
                            </div>
                            <form id="loginForm">
                                <div class="login-form">
                                    <div id='mail_success' class='success'>Login successful ...</div>
                                    <div id='mail_fail' class='error'>
                                        <ul>
                                            <li>● Login Failed. Either password or Email Is Wrong.</li>
                                            <li>● Forgot your password? <a href="forgot-password.php">Reset Your Password</a></li>
                                        </ul>
                                    </div>
                                    <br />
                                    <div class="field">
                                        <div class="control">
                                            <input id="user_email" class="input email-input" name="user_email" type="text" placeholder="email@nerdlibary.com">
                                            <div class="input-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <input class="input password-input" id="user_password" name="user_password" type="password" placeholder="●●●●●●●">
                                            <div class="input-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-flex" style="justify-content: space-between;">
                                        <div class="switch-block is-flex">
                                            <label class="f-switch">
                                                <input type="checkbox" class="is-switch" name="user_remember">
                                                <i></i>
                                            </label>
                                            <div class="meta">
                                                Remember me?
                                            </div>
                                        </div>
                                        <div class="has-text-centered">
                                            <a href="forgot-password.php">Forgot password?</a>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <button type="submit" name="user_login" id="loginBtn" class="button is-solid primary-button raised is-rounded is-fullwidth">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                            </form>

                        </div>
                        <div class="section forgot-password">
                            <!--                            TODO::Change Route-->
                            <div class="has-text-centered">
                                Don't have an account <a href="signup.php">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Concatenated js plugins and jQuery -->
    <script src="assets/js/app.js"></script>

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
    <script src="assets/js/login.js"></script>

</body>

</html>