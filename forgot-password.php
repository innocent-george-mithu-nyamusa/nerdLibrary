<!DOCTYPE html>
<html lang="en">



<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title> Forgot Password| NerdLibrary</title>
    <link rel="icon" type="image/png" href="assets/img/logo/logo.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
</head>

<body>

    <!-- Pageloader -->
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
                        <h2 class="form-title has-text-centered">Forgot Password </h2>
                        <h3 class="form-subtitle has-text-centered">Enter your email to reset your email.</h3>
                        <div class="login-form">
                            <div class="form-panel">
                                <div class="field">
                                    <label>Email</label>
                                    <div class="control">
                                        <input id="reset-email" type="text" name="reset-email" class="input" placeholder="Enter your existing email address">
                                    </div>
                                </div>
                                <div class="field is-flex has-text-centered">
                                    <div id='mail_success' class='success'>Password Reset Email Sent. Click the url in your email to reset your password.</div>
                                    <div id='mail_fail' class='error'>Sorry, Failed to send Password Reset Email Try Again.</div>
                                </div>
                            </div>
                            <div class="buttons">
                                <a id="reset-button" class="button is-solid primary-button is-fullwidth raised">Reset Your Account Password </a>
                            </div>
                            <div class="account-link has-text-centered">
                                Don't have an account? <a href="signup.php"> Sign Up </a>
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