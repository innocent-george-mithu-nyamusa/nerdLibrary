<?php

use Classes\UserView;

include "vendor/autoload.php";

$userObj = new UserView();

$verified =  false;

if (isset($_GET["t"])) {
    //Get the base 64 string ad decode it.
    //Now expand and separate each query string into an array.

    $queryString = explode("&", base64_decode($_GET["t"]));

    $channel = $queryString[0];
    $userId = $queryString[1];
    $purpose = $queryString[2];
    $verificationCode = explode("=", $queryString[3])[1];

    print_r($queryString);

    if (($channel == "channel=email") && ($purpose == "purpose=account_verification") && isset($verificationCode) && isset($userId)) {

        // print_r($userId);
        $id = explode("=", $userId)[1];
        // print_r($id);
        $verified = $userObj->verifyAccount($id, $verificationCode);

        echo "verified " . $verified;
    }
} else {
    header("Location: /");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Account Verification | NerdLibrary </title>
    <link rel="icon" type="image/png" href="assets/img/logo/logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/core.css">
</head>

<body>

    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>

    <div class="error-container">
        <div class="error-wrapper">
            <div class="error-inner has-text-centered">

                <?php if (isset($verified) && $verified) { ?>


                    <div class="bg-number dark-inverted">
                        Success
                    </div>
                    <!-- <img class="light-image" src="assets/img/illustrations/placeholders/3.svg" alt="" /> -->
                    <img class="dark-image" src="assets/img/illustrations/placeholders/welcome.svg" alt="" />
                    <h3 class="dark-inverted">
                        Verification Successful
                    </h3>
                    <p>
                        Successfully verifed your account please proceed to login.
                    </p>
                    <div class="button-wrap">
                        <a href="/login_account" class="button h-button is-primary is-elevated">login</a>
                    </div>

                <?php } elseif (isset($verified) && !$verified) { ?>

                    <div class="bg-number dark-inverted">
                        Failed
                    </div>
                    <!-- <img class="light-image" src="assets/img/illustrations/placeholders/3.svg" alt="" /> -->
                    <img class="dark-image" src="assets/img/illustrations/placeholders/3.svg" alt="" />
                    <h3 class="dark-inverted">
                        Verification Failed
                    </h3>
                    <p>
                        Account verification failed. Your link has expired. Please retry.
                    </p>
                    <div class="button-wrap">
                        <a href="/verify" class="button h-button is-primary is-elevated">retry</a>
                    </div>
                <?php } ?>

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

</body>

</html>