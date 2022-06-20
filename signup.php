<!DOCTYPE html>
<html lang="en">

<?php

session_start();


if (isset($_SESSION["authenticated"])) {
    header("Location: /");
}

?>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Sign Up | Nerd Library </title>
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

    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>

    <div class="signup-wrapper">
        <div class="fake-nav">
            <a href="index.php" class="logo">
                <img src="assets/img/logo/logo.png" alt="Nerd Library Logo">
                <!--            <img src="assets/img/logo/friendkit-bold.svg" width="112" height="28" alt="">-->
            </a>
        </div>

        <div class="process-bar-wrap">
            <div class="process-bar">
                <div class="progress-wrap">
                    <div class="track"></div>
                    <div class="bar"></div>
                    <div id="step-dot-1" class="dot is-first is-active is-current" data-step="0">
                        <i data-feather="smile"></i>
                    </div>
                    <div id="step-dot-2" class="dot is-second" data-step="25">
                        <i data-feather="user"></i>
                    </div>
                    <div id="step-dot-3" class="dot is-third" data-step="50">
                        <i data-feather="image"></i>
                    </div>
                    <div id="step-dot-4" class="dot is-fourth" data-step="75">
                        <i data-feather="lock"></i>
                    </div>
                    <div id="step-dot-5" class="dot is-fifth" data-step="100">
                        <i data-feather="flag"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="outer-panel">
            <div class="outer-panel-inner">
                <div class="process-title">
                    <h2 id="step-title-1" class="step-title is-active">Welcome, select an account type.</h2>
                    <h2 id="step-title-2" class="step-title">Tell us more about you.</h2>
                    <h2 id="step-title-3" class="step-title">Upload a profile picture.</h2>
                    <h2 id="step-title-4" class="step-title">Secure your account.</h2>
                    <h2 id="step-title-5" class="step-title">You're all set. Ready?</h2>
                </div>
                <div id="signup-panel-1" class="process-panel-wrap is-active">
                    <div class="columns mt-4">
                        <div class="column is-4">
                            <div class="account-type">
                                <div class="type-image">
                                    <img class="type-illustration" src="assets/img/illustrations/signup/type-1.svg" alt="">
                                    <img class="type-bg light-image" src="assets/img/illustrations/signup/type-1-bg.svg" alt="">
                                    <img class="type-bg dark-image" src="assets/img/illustrations/signup/type-1-bg-dark.svg" alt="">
                                </div>
                                <h3>Organization</h3>
                                <p>Create an organization account to take advantage of vast resources on this platform.</p>
                                <a class="button is-fullwidth process-button user-account-company" data-step="step-dot-2">
                                    Continue
                                </a>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="account-type">
                                <div class="type-image">
                                    <img class="type-illustration" src="assets/img/illustrations/signup/type-2.svg" alt="">
                                    <img class="type-bg light-image" src="assets/img/illustrations/signup/type-2-bg.svg" alt="">
                                    <img class="type-bg dark-image" src="assets/img/illustrations/signup/type-2-bg-dark.svg" alt="">
                                </div>
                                <h3>Lecturer/ Tutor </h3>
                                <p>Create a lecturer/tutor account following all guidelines given to the end for a
                                    successful registration.</p>
                                <a class="button is-fullwidth process-button user-account-lecturer" data-step="step-dot-2">
                                    Continue
                                </a>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div class="account-type">
                                <div class="type-image">
                                    <img class="type-illustration" src="assets/img/illustrations/signup/type-3.svg" alt="">
                                    <img class="type-bg light-image" src="assets/img/illustrations/signup/type-3-bg.svg" alt="">
                                    <img class="type-bg dark-image" src="assets/img/illustrations/signup/type-3-bg-dark.svg" alt="">
                                </div>
                                <h3> Student </h3>
                                <p>Create a your student account and immerse yourself with knowledge at your own pace.</p>
                                <a class="button is-fullwidth process-button user-account-student" data-step="step-dot-2">
                                    Continue
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="signup-panel-2" class="process-panel-wrap is-narrow">
                    <form action="" id="loginForm" method="post">
                        <div id="errorText" class="" role="alert" style="background-size: cover; display: none">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill"></use>
                            </svg>
                            <div id="errText" style="background-size: cover;">
                                Email Already taken
                            </div>
                        </div>

                        <div class="form-panel">

                            <div class="field">
                                <label>First Name</label>
                                <div class="control">
                                    <input type="text" class="input" id="user_firstname" name="user_firstname" placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="field">
                                <label>Last Name</label>
                                <div class="control">
                                    <input type="text" class="input" id="user_lastname" name="user_lastname" placeholder="Enter your last name" required>
                                </div>
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <div class="control">
                                    <input type="text" class="input" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" id="user_email" name="user_email" placeholder="Enter your email address" required>
                                </div>
                            </div>
                            <div class="field">
                                <label>Select Monthly Subscription Currency</label>
                                <div class="form-control">
                                    <select id="account-currency" class="input " name="currency">
                                        <option value="us">us</option>
                                        <option value="rtgs">rtgs</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field-body">
                                <label class="material-radio is-accent">
                                    <input id="account-type-1" type="radio" name="account-type" value="free" checked>
                                    <span class="dot"></span>
                                    <span class="radio-label">Free <br />(rtgs: 0 | us: 0)</span>
                                </label>
                                <label class="material-radio is-accent">
                                    <input id="account-type-2" type="radio" name="account-type" value="standard">
                                    <span class="dot"></span>
                                    <span class="radio-label">Standard<br />(rtgs: 200 | us: 3)</span>
                                </label>
                                <label class="material-radio is-accent">
                                    <input id="account-type-3" type="radio" name="account-type" value="premium">
                                    <span class="dot"></span>
                                    <span class="radio-label">Premium<br />(rtgs: 600 | us: 5)</span>
                                </label>
                            </div>

                            <div id='mail_success' class='success'>Your have registered successfully.</div>
                            <div id='mail_fail' class='error'>Sorry, error in registering .</div>
                        </div>
                    </form>
                    <div class="buttons">
                        <a class="button process-button" data-step="step-dot-1">Back</a>
                        <button type="submit" form="loginForm" class="button process-button is-next-2" data-step="step-dot-3">Next
                        </button>
                    </div>
                </div>

                <div id="signup-panel-3" class="process-panel-wrap is-narrow">
                    <div class="form-panel">
                        <div class="photo-upload">
                            <div class="preview">
                                <a class="upload-button">
                                    <i data-feather="plus"></i>
                                </a>
                                <img id="upload-preview" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/avatar-w.png" alt="">
                                <form id="profile-pic-dz" class="dropzone is-hidden" action="http://nerd-library.com/images/profile-images"></form>
                            </div>
                            <div class="limitation">
                                <small>Only images with a size lower than 3MB are allowed.</small>
                            </div>
                        </div>
                    </div>

                    <div class="buttons">
                        <a class="button process-button" data-step="step-dot-2">Back</a>
                        <a class="button process-button is-next" data-step="step-dot-4">Next</a>
                    </div>
                </div>

                <div id="signup-panel-4" class="process-panel-wrap is-narrow">
                    <form id="loginFormPassword" method="post" action="">
                        <div class="form-panel">
                            <div class="field">
                                <label>Password</label>
                                <div class="control">
                                    <input type="password" min="8" id="user_password" name="user_password" class="input" placeholder="Must have 8 characters, Uppercase and lowercase letters" required>
                                </div>
                            </div>
                            <div class="field">
                                <label>Repeat Password</label>
                                <div class="control">
                                    <input type="password" min="8" id="password_confirm" name="password_confirm" class="input" placeholder="Repeat your password " required>
                                </div>
                            </div>
                            <div class="field">
                                <label>Phone Number</label>
                                <div class="control">
                                    <input type="text" class="input" id="user_phone" name="user_phone" placeholder="Enter your phone number e.g +263 XXX XXX XXX" required>
                                </div>
                            </div>
                        </div>
                        <div id='mail_success' class='success'>Your have registered successfully.</div>
                        <div id='mail_fail' class='error'>Sorry, error in registering .</div>
                    </form>
                    <div class="buttons">
                        <a class="button process-button" data-step="step-dot-3">Back</a>
                        <button type="submit" form="loginFormPassword" class="button process-button is-next-4" data-step="step-dot-5">Next
                        </button>
                    </div>
                </div>

                <div id="signup-panel-5" class="process-panel-wrap is-narrow">
                    <div class="form-panel">
                        <img class="success-image" src="assets/img/illustrations/signup/mailbox.svg" alt="">
                        <div class="success-text">
                            <h3>Congratz, you successfully created your account.</h3>
                            <p> We just sent you a confirmation email. PLease confirm your account within 24 hours.</p>
                            <a id="signup-finish" class="button is-fullwidth">Proceed To NerdLibary</a>
                            <a id="pay-paynow" class="button is-fullwidth hidden">Pay My Subscription <span id="subscription-amount"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Edit Credit card Modal-->
        <div id="crop-modal" class="modal is-small crop-modal is-animated">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>Crop your picture</h3>
                        <div class="close-wrap">
                            <button class="close-modal" aria-label="close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                    </header>
                    <div class="modal-card-body">
                        <div id="cropper-wrapper" class="cropper-wrapper">
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

    <!-- Landing page js -->

    <!-- Signup page js -->
    <script src="assets/js/signup.js"></script>

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

    <!-- map page js -->

    <!-- elements page js -->


</body>


<!-- Mirrored from friendkit.cssninja.io/signup.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 21:50:25 GMT -->

</html>