<!DOCTYPE html>
<html lang="en">
<?php

include "vendor/autoload.php";
session_start();
?>

<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Home | NerdLibrary</title>
    <link rel="icon" type="image/png" href="assets/img/logo/logo.png"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/core.css">
</head>

<body class="is-white">

<!-- Pageloader -->
<div class="pageloader"></div>
<div class="infraloader is-active"></div>
<div class="navbar navbar-v1 is-inline-flex is-transparent no-shadow no-background is-landing is-hidden-mobile">
    <div class="container is-desktop">
        <div class="navbar-brand">
            <a href="index.php" class="navbar-item">
                <img class="logo" src="assets/img/logo/logo.png" alt="">
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <div class="navbar-item">
                    <a href="explore">Explore Courses</a>
                </div>
                <div class="navbar-item">
                    <a href="shop">Store</a>
                </div>
                <div class="navbar-item">
                    <a href="#" target="_blank">Docs</a>
                </div>
            </div>
            <?php if (!isset($_SESSION["authenticated"])) { ?>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="navbar-item">
                            <a href="login_account">
                                Login
                            </a>
                        </div>
                        <a id="signup-button" href="signup.php" class="button is-cta is-solid primary-button raised">
                            Sign Up
                        </a>
                    </div>
                </div>
            <?php } else { ?>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="navbar-item">
                            <a href="logout_account">
                                Logout
                            </a>
                        </div>
                        <a id="signup-button" href="profile/overview" class="button is-cta is-solid primary-button raised">
                            My Account
                        </a>
                    </div>
                </div>
           <?php } ?>
        </div>
    </div>
</div>

<nav class="navbar mobile-navbar is-landing is-hidden-desktop" aria-label="main navigation">
    <!-- Brand -->
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img class="dark-mobile-logo" src="assets/img/logo/logo.png" alt="">
<!--            <img class="light-mobile-logo" src="assets/img/logo/logo.png" alt="">-->
        </a>

        <!-- Mobile menu toggler icon -->
        <div class="navbar-burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Navbar mobile menu -->
    <div class="navbar-menu">
        <!-- Account -->
        <?php if (isset($_SESSION["authenticated"])) { ?>
        <div class="navbar-item has-dropdown">
            <div class="navbar-link">
                <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/avatar-w.png" alt="">
                <span class="is-heading">Guest</span>
            </div>
            <?php } ?>

            <!-- Mobile Dropdown -->
            <div class="navbar-dropdown">
                <a href="explore.php" class="navbar-item">Explore Courses</a>
                <a href="#" class="navbar-item">Store</a>
                <a href="https://docs.friendkit.cssninja.io/" class="navbar-item">Docs</a>
                <?php if (!isset($_SESSION["authenticated"])) { ?>

                <a href="login.php" class="navbar-item">Login</a>
                <a href="signup.php" class="button is-fullwidth is-solid accent-button">Sign Up</a>

                <?php } else { ?>
                    <a href="logout.php" class="navbar-item">Logout</a>
                    <a href="user-profile-overview.php" class="button is-fullwidth is-solid accent-button">My Account</a>
               <?php  } ?>
            </div>
        </div>
    </div>
</nav>

<div class="landing-wrapper">

    <div id="friendkit-demo-landing" class="hero is-fullheight landing-hero-wrapper">
        <div id="particles-js"></div>
        <div class="hero-body">
            <div class="container is-desktop">
                <div class="columns landing-caption is-vcentered">
                    <div class="column is-7">
                        <img src="assets/img/illustrations/characters/friends.svg" alt="">
                    </div>
                    <div class="column is-5">
                        <h2>Nerd Library</h2>
                        <h3>Absolutely autonomous Education</h3>
                        <div class="buttons">

                            <?php if (isset($_SESSION["role"])) { ?>
                            <?php if ($_SESSION["role"] === "lecturer") { ?>
                            <a href="" class="button">My Courses</a>
                            <?php } elseif ($_SESSION["role"] === "student") { ?>
                            <a href="explore" class="button">Start Learning</a>
                            <?php
                            } elseif($_SESSION["role"]=="admin") {
                                ?>
                            <a href="admin" class="button">Go To Admin</a>
                            <?php
                            } elseif ($_SESSION["role"] === "organization") { ?>
                            <a href="explore" class="button">Start Learning</a>
                            <?php } else {?>
                            <a href="explore" class="button">Start Learning</a>
                            <?php }
                            }else {
                                ?>
                                <a href="explore" class="button">Visit BookStore</a>
                            <?php
                            }
                            ?>
                            <button id="tour-start" class="button is-hidden-mobile">Take The Tour</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="landing-start" class="section landing-wrapper">
        <div class="container is-desktop">
<!--            <div class="made-with">-->
<!--                <div id="made-with-bulma" class="made-block">-->
<!--                    <div class="block-icon is-box-reveal">-->
<!--                        <img src="assets/img/icons/logos/bulma.svg" alt="">-->
<!--                    </div>-->
<!--                    <div class="block-title">-->
<!--                        <h3>Bulma 0.9.3</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="made-block">-->
<!--                    <div class="block-icon is-box-reveal">-->
<!--                        <img src="assets/img/icons/logos/gulp.svg" alt="">-->
<!--                    </div>-->
<!--                    <div class="block-title">-->
<!--                        <h3>Gulp</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="made-block">-->
<!--                    <div class="block-icon is-box-reveal">-->
<!--                        <img src="assets/img/icons/logos/sass.svg" alt="">-->
<!--                    </div>-->
<!--                    <div class="block-title">-->
<!--                        <h3>Sass</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="made-block">-->
<!--                    <div class="block-icon is-box-reveal">-->
<!--                        <img src="assets/img/icons/logos/html5.svg" alt="">-->
<!--                    </div>-->
<!--                    <div class="block-title">-->
<!--                        <h3>Html5</h3>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <div class="screen-wrapper">
                <img id="made-for-social-too" src="assets/img/screenshots/hero.png" alt="">
            </div>
        </div>
    </div>

    <div class="section landing-wrapper icons-section">
        <div class="container is-desktop">
            <div id="icon-features" class="columns">
                <div class="column is-hidden-mobile"></div>
                <div class="column is-3">
                    <div  class="landing-icon-box">
                        <img id="practical-based-learning" src="assets/img/icons/landing/code.svg" alt="">
                        <h3>Practical Learning</h3>
                        <p>We believe in practical based learning </p>
                    </div>
                </div>
                <div class="column is-3">
                    <div id="realtime-tests" class="landing-icon-box">
                        <img src="assets/img/icons/landing/pages.svg" alt="">
                        <h3>Monitored Tests</h3>
                        <p>Integrity in your tests</p>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="landing-icon-box">
                        <img src="assets/img/icons/landing/draw.svg" alt="">
                        <h3>Illustrations </h3>
                        <p>Our Approach is see waht you are Learning</p>
                    </div>
                </div>
                <div class="column is-hidden-mobile"></div>
            </div>
            <div class="columns">
                <div class="column is-hidden-mobile"></div>
                <div class="column is-3">
                    <div id="ask-lecturers" class="landing-icon-box">
                        <img src="assets/img/icons/landing/interactions.svg" alt="">
                        <h3>Live Interactions</h3>
                        <p>Face to Face has an impact to improve learning experience</p>
                    </div>
                </div>
                <div  class="column is-3">
                    <div id="responsive-design" class="landing-icon-box">
                        <img src="assets/img/icons/landing/responsive.svg" alt="">
                        <h3>Responsive design</h3>
                        <p>Tailor Made Learning experience on any Device</p>
                    </div>
                </div>
                <div class="column is-3">
                    <div id="relevant-information" class="landing-icon-box">
                        <img src="assets/img/icons/landing/updates.svg" alt="">
                        <h3>Relevant Learning</h3>
                        <p>Always up to date with cutting edge innovations, skills and knowledge</p>
                    </div>
                </div>
                <div class="column is-hidden-mobile"></div>
            </div>
            <div class="columns">
                <div class="column is-hidden-mobile"></div>
                <div class="column is-3">
                    <div class="landing-icon-box">
                        <img src="assets/img/icons/landing/modern.svg" alt="">
                        <h3>Modern Learning Expirience</h3>
                        <p>Following the latest learning trends</p>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="landing-icon-box">
                        <img src="assets/img/icons/landing/elements.svg" alt="">
                        <h3>Free Opportunities</h3>
                        <p>Because we love our customers</p>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="landing-icon-box">
                        <img src="assets/img/icons/landing/illustrations.svg" alt="">
                        <h3>Custom Learning Time</h3>
                        <p>Complete your learning Curve at own pace</p>
                    </div>
                </div>
                <div class="column is-hidden-mobile"></div>
            </div>
            <div class="columns">
                <div class="column is-hidden-mobile"></div>
                <div class="column is-3">
                    <div  class="landing-icon-box">
                        <img src="assets/img/icons/landing/support.svg" alt="">
                        <h3>Live Tutoring</h3>
                        <p>Via video, audio and live chat</p>
                    </div>
                </div>
                <div class="column is-3">
                    <div id="live-support" class="landing-icon-box">
                        <img src="assets/img/icons/landing/plugin.svg" alt="">
                        <h3>Customer Support</h3>
                        <p>Via live chat, email and support forum</p>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="landing-icon-box">
                        <img src="assets/img/icons/landing/docs.svg" alt="">
                        <h3>Detailed Documentation</h3>
                        <p>To quickly get you started</p>
                    </div>
                </div>
                <div class="column is-hidden-mobile"></div>
            </div>
        </div>
    </div>

<!--    TODO::ADD TOUR-->
    <div id="knowledge-challenges" class="section side-feature is-grey">
        <div  class="container is-desktop">
            <div class="columns is-vcentered">
                <div class="column is-5 is-offset-1">
                    <h3>Knowledge Based Challenges </h3>
                    <p>A place where we can share our learning experiences, study tips, and building challenges
                        with knowledge acquired.</p>
                </div>
                <div class="column is-5">
                    <img src="assets/img/illustrations/ui/components-block.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div id="information-update" class="section side-feature">
        <div class="container is-desktop">
            <div class="columns is-vcentered">
                <div class="column is-6 is-hidden-mobile">
                    <div class="screen-wrapper is-spaced has-plant">
                        <img class="plant plant-1" src="assets/img/illustrations/plants/1.svg" alt="">
                        <img src="assets/img/screenshots/stories-main.png" alt="">
                    </div>
                </div>
                <div class="column is-5 is-offset-1">
                    <h3>Creative Ways To Stay Updated </h3>
                    <p>We have devised a whole new look to get you into a learning mood while experiencing a sort of social atmosphere.
                        We want to take away the boring rigid feel of a </p>
                </div>
                <div class="column is-6 is-hidden-desktop">
                    <div class="screen-wrapper is-spaced has-plant">
                        <img class="plant plant-1" src="assets/img/illustrations/plants/1.svg" alt="">
                        <img src="assets/img/screenshots/stories-main.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="custom-profile" class="section side-feature is-grey">
        <div class="container is-desktop">
            <div class="columns is-vcentered">
                <div class="column is-5 is-offset-1">
                    <h3>Make you feel at home </h3>
                    <p>We have gone out of our way in making sure you have your own tailor made experience on this platform.
                        Your identity as a person matters to us, that is why we have made an effort to make sure its as customized for you as possible...</p>
                </div>
                <div class="column is-6">
                    <div class="screen-wrapper is-spaced has-plant">
                        <img class="plant plant-2" src="assets/img/illustrations/plants/2.svg" alt="">
                        <img src="assets/img/screenshots/profile-main.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="cater-everyone" class="section side-feature">
        <div class="container is-desktop">
            <div class="columns is-vcentered">
                <div class="column is-6 is-hidden-mobile">
                    <div class="screen-wrapper is-spaced has-plant">
                        <img class="plant plant-1" src="assets/img/illustrations/plants/1.svg" alt="">
                        <img src="assets/img/screenshots/signup.png" alt="">
                    </div>
                </div>
                <div class="column is-5 is-offset-1">
                    <h3>We Cater For Everyone </h3>
                    <p>Whether you're an individual learner, a tutor , a lecturer or an Organization.
                        Your identity as a person matters to us, that is why we have made an effort to make sure its as customized for you as possible...</p>
                </div>
                <div class="column is-6 is-hidden-desktop">
                    <div class="screen-wrapper is-spaced has-plant">
                        <img class="plant plant-1" src="assets/img/illustrations/plants/1.svg" alt="">
                        <img src="assets/img/screenshots/signup.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--    <div id="demos-section" class="section demos-wrapper">-->
<!--        <div class="container is-desktop">-->
<!--            <div class="header-logo">-->
<!--                <img src="assets/img/logo/friendkit-white.svg" alt="">-->
<!--            </div>-->
<!--            <div class="demos-title has-text-centered">-->
<!--                <h3>Prebuilt pages to start with</h3>-->
<!--            </div>-->

<!--            <div class="demos-list">-->
<!----><!--                <div class="demo-section">-->
<!--                    <div class="demo-section-title">-->
<!--                        <img src="assets/img/icons/layouts/layout-navbar.svg" alt="">-->
<!--                        <div class="title-meta">-->
<!--                            <h3>Navbar v1 Layout</h3>-->
<!--                            <p>With a top navigation</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="columns is-multiline">-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed page-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->

<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed page-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed2.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed page-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-sidebar.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed2-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed page-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-v1b.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed-posts-double.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 2x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-posts-double.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed-posts-double-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 2x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-posts-double.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed-posts-triple.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 3x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-posts-triple.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed-posts-triple-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 3x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-posts-triple.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed-profile.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-profile.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed-profile-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-profile.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed-slider.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed slider-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-slider.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/feed-slider-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed slider-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-feed-slider.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/stories-main.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Stories-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-stories-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/stories-main-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Stories-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-stories-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/stories-story.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Story post-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-stories-story.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/stories-story-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Story post-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-stories-story.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-groups.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Groups-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="explore.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-groups-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Groups-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="explore.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-minimal.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile minimal-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-minimal.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-minimal-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile minimal-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-minimal.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-main.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile main-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-main-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile main-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-about.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile about-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-about-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile about-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-friends.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile friends-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-friends.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-friends-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile friends-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-friends.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-photos.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/profile-photos-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-profile-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/ecommerce-products.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Products-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-ecommerce-products.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/ecommerce-products-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Products-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-ecommerce-products.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/ecommerce-cart.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Cart-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-ecommerce-cart.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/ecommerce-cart-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Cart-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-ecommerce-cart.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/ecommerce-checkout.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Checkout-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-ecommerce-checkout.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/ecommerce-checkout-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Checkout-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-ecommerce-checkout.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/ecommerce-payment.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Payment-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-ecommerce-payment.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/ecommerce-payment-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Payment-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-ecommerce-payment.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/options-friends.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Friends List-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-friends-grid-v1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/options-friends-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Friends List-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-friends-grid-v1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/pages-main.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Page profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-pages-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/pages-main-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Page profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-pages-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/pages-about.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Page about-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-pages-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/pages-about-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Page about-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-pages-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/pages-community.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Community-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-pages-community.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/pages-community-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Community-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-pages-community.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/pages-photos.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Page photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-pages-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/pages-photos-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Page photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-pages-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/videos-home.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-videos-home.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/videos-home-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-videos-home.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/videos-home-v2.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-videos-home-v2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/videos-home-v2-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-videos-home-v2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/videos-player.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Video Player-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-videos-player.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/videos-player-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Video Player-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-videos-player.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-home.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions home-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-home.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-home-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions home-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-home.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-categories.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions categories-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-categories.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-categories-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions categories-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-categories.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-single.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions single-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-single.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-single-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions single-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-single.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-stats.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions stats-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-stats.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-stats-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions stats-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-stats.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-settings.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions settings-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-settings.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/questions-settings-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Questions settings-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-questions-settings.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/events.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Events-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-events.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/events-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Events-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-events.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/event.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Event-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-event.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/event-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Event-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-event.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/news.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            News-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-news.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/news-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            News-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-news.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/settings.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Settings-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-settings-v1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/settings-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Settings-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-settings-v1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-map-1.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-map-1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-map-1-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-map-1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-map-2.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-map-2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-map-2-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-map-2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-empty-placeholder.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholder-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-empty-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-empty-placeholder-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholder-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-empty-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-alert-placeholder.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Alert-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-alert-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v1-alert-placeholder-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Alert-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-alert-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="demo-section">-->
<!--                    <div class="demo-section-title">-->
<!--                        <img src="assets/img/icons/layouts/layout-navbar.svg" alt="">-->
<!--                        <div class="title-meta">-->
<!--                            <h3>Navbar v2 Layout</h3>-->
<!--                            <p>With a top navigation</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="columns is-multiline">-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed-sidebar.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 2x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed-sidebar.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed-sidebar-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed-sidebar.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed-posts-double.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 2x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed-posts-double.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed-posts-double-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 2x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed-posts-double.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed-posts-triple.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 3x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed-posts-triple.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed-posts-triple-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 3x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed-posts-triple.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed-slider.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed Slider-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed-slider.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-feed-slider-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Feed Slider-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-feed-slider.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-stories-main.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Stories-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-stories-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-stories-main-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Stories-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-stories-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-stories-story.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Story-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-stories-story.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-stories-story-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Story-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-stories-story.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-groups.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Groups-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-groups.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-groups-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Groups-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-groups.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-minimal.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Minimal Profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-minimal.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-minimal-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Minimal Profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-minimal.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-main.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-main-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-about.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            About-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-about-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            About-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-friends.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Friends-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-friends.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-friends-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Friends-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-friends.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-photos.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-profile-photos-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-profile-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-ecommerce-products.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Products-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-ecommerce-products.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-ecommerce-products-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Products-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-ecommerce-products.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-ecommerce-cart.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Cart-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-ecommerce-cart.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-ecommerce-cart-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Cart-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-ecommerce-cart.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-ecommerce-checkout.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Checkout-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-ecommerce-checkout.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-ecommerce-checkout-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Checkout-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-ecommerce-checkout.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-ecommerce-payment.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Payment-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-ecommerce-payment.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-ecommerce-payment-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Payment-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-ecommerce-payment.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-pages-main.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Public Page-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-pages-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-pages-main-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Public Page-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-pages-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-pages-about.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            About-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-pages-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-pages-about-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            About-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-pages-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-pages-community.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Community-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-pages-community.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-pages-community-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Community-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-pages-community.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-pages-photos.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-pages-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-pages-photos-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-pages-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-videos-home.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-videos-home.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-videos-home-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-videos-home.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-videos-home-v2.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-videos-home-v2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-videos-home-v2-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-videos-home-v2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-videos-player.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Player-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-videos-player.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-videos-player-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Player-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-videos-player.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-map-1.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-map-1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-map-1-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-map-1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-map-2.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-map-2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-map-2-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-map-2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-empty-placeholder.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholder-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-empty-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-empty-placeholder-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholder-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-empty-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-alert-placeholder.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Alert-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v2-alert-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/navbar-v2-alert-placeholder-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Alert-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v2-alert-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="demo-section">-->
<!--                    <div class="demo-section-title">-->
<!--                        <img src="assets/img/icons/layouts/layout-sidebar.svg" alt="">-->
<!--                        <div class="title-meta">-->
<!--                            <h3>Sidebar v1 Layout</h3>-->
<!--                            <p>With a side navigation</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="columns is-multiline">-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-feed.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Main Feed-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-feed.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-feed-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Main Feed-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-feed.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-feed-posts-double.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 2x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-feed-posts-double.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-feed-posts-double-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 2x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-feed-posts-double.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-feed-posts-triple.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 3x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-feed-posts-triple.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-feed-posts-triple-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Posts feed 3x-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-feed-posts-triple.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-stories-main.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Stories Feed-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-stories-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-stories-main-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Stories Feed-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-stories-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-stories-story.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Story Post-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-stories-story.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-stories-story-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Story Post-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-stories-story.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-groups.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Groups-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-groups.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-groups-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Groups-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-groups.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-main.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile Feed-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-main-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile Feed-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-about.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile About-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-about-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile About-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-friends.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile Friends-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-friends.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-friends-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile Friends-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-friends.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-photos.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile Photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-photos-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile Photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-minimal.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-minimal.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-profile-minimal-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Profile-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-profile-minimal.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-ecommerce-products.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Products-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-ecommerce-products.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-ecommerce-products-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Products-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-ecommerce-products.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-ecommerce-cart.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Cart-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-ecommerce-cart.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-ecommerce-cart-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Cart-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-ecommerce-cart.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-ecommerce-checkout.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Checkout-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-ecommerce-checkout.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-ecommerce-checkout-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Checkout-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-ecommerce-checkout.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-ecommerce-payment.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Payment-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-ecommerce-payment.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-ecommerce-payment-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Payment-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-ecommerce-payment.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-pages-main.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Public Page-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-pages-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-pages-main-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Public Page-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-pages-main.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-pages-about.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            About-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-pages-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-pages-about-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            About-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-pages-about.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-pages-community.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Community-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-pages-community.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-pages-community-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Community-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-pages-community.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-pages-photos.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-pages-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-pages-photos-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Photos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-pages-photos.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-videos-home.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-videos-home.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-videos-home-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-videos-home.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-videos-home-v2.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos V2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-videos-home-v2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-videos-home-v2-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Videos V2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-videos-home-v2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-videos-player.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Player-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-videos-player.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-videos-player-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Player-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-videos-player.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-map-1.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-map-1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-map-1-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Map v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-map-1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-settings-v1.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Settings-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-settings-v1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-settings-v1-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Settings-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-settings-v1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-empty-placeholder.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholder-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-empty-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-empty-placeholder-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholder-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-empty-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-alert-placeholder.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Alert-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="sidebar-v1-alert-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/sidebar-v1-alert-placeholder-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Alert-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="sidebar-v1-alert-placeholder.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="demo-section">-->
<!--                    <div class="demo-section-title">-->
<!--                        <img src="assets/img/icons/layouts/layout-sidebar.svg" alt="">-->
<!--                        <div class="title-meta">-->
<!--                            <h3>Dashboard Layout</h3>-->
<!--                            <p>Creator dashboard</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="columns is-multiline">-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/dashboard-home.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Creator Dashboard-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="dashboard-home.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/dashboard-home-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Creator Dashboard-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="dashboard-home.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/dashboard-posts.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Dashboard Posts-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="dashboard-posts.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/dashboard-posts-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Dashboard Posts-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="dashboard-posts.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/dashboard-videos.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Dashboard videos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="dashboard-videos.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/dashboard-videos-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Dashboard videos-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="dashboard-videos.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="demo-section">-->
<!--                    <div class="demo-section-title">-->
<!--                        <img src="assets/img/icons/layouts/layout-special.svg" alt="">-->
<!--                        <div class="title-meta">-->
<!--                            <h3>Special Layouts</h3>-->
<!--                            <p>Unique pages and layouts</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="columns is-multiline">-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/messages-inbox.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Inbox-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="inbox.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/messages-inbox-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Inbox-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="inbox.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/messages-chat.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Chat-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="chat.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/messages-chat-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Chat-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="chat.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/login.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Login v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="login.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/login-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Login v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="login.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/login2.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Login v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="login-minimal.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/login2-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Login v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="login-minimal.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/login-boxed.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Login v3-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="login-boxed.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/login-boxed-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Login v3-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="login-boxed.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/signup.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Signup v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="signup.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/signup-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Signup v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="signup.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/signup-v2.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Signup v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="signup-v2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/signup-v2-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Signup v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="signup-v2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/elements.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Elements-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="elements.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/error-404.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Error 404-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="error-404.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <span class="new-tag">New</span>-->
<!--                                <img data-src="assets/img/screenshots/error-404-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Error 404-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="error-404.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/elements-dark.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Elements-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="elements.php">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="demo-section">-->
<!--                    <div class="demo-section-title">-->
<!--                        <img src="assets/img/icons/layouts/layout-special.svg" alt="">-->
<!--                        <div class="title-meta">-->
<!--                            <h3>Placeholders</h3>-->
<!--                            <p>Layout placeholders examples</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="columns is-multiline">-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/placeholders-feed.png" alt="" data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholders v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-placeholders-feed.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/placeholders-feed-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholders v1-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-placeholders-feed.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/placeholders-questions-1.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholders v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-placeholders-questions-1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/placeholders-questions-1-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholders v2-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-placeholders-questions-1.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/placeholders-questions-2.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholders v3-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-placeholders-questions-2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/placeholders-questions-2-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholders v3-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-placeholders-questions-2.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/placeholders-questions-3.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholders v4-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="light">-->
<!--                                            <a class="is-dm" href="navbar-v1-placeholders-questions-3.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="column is-4 has-text-centered">-->
<!--                            <figure class="demo-wrapper">-->
<!--                                <img data-src="assets/img/screenshots/placeholders-questions-3-dark.png" alt=""-->
<!--                                     data-lazy-load/>-->
<!--                                <div class="circle-overlay"></div>-->
<!--                                <div class="demo-info has-text-centered">-->
<!--                                    <div class="wrapper">-->
<!--                                        <div class="demo-title">-->
<!--                                            Placeholders v4-->
<!--                                        </div>-->
<!--                                        <div class="demo-link" data-theme="dark">-->
<!--                                            <a class="is-dm" href="navbar-v1-placeholders-questions-3.html">Go to-->
<!--                                                demo <i data-feather="chevron-right"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<!--    <div id="buy" class="section cta-wrapper">-->
<!--        <div class="container is-desktop">-->
<!--            <div class="header-logo">-->
<!--                <img src="assets/img/logo/friendkit-white.svg" alt="">-->
<!--            </div>-->
<!--            <div class="cta-title">-->
<!--                <h3>Exclusively on Envato Market</h3>-->
<!--                <a href="https://1.envato.market/c/1288816/275988/4415?subId1=shop&amp;subId2=banner&amp;subId3=https%3A%2F%2Fthemeforest.net%2Fitem%2Ffriendkit-social-media-ui-kit%2F24621825&amp;u=https%3A%2F%2Fthemeforest.net%2Fitem%2Ffriendkit-social-media-ui-kit%2F24621825"-->
<!--                   target="_blank" class="custom-button is-single-reveal">-->
<!--                    <img src="assets/img/icons/explore/envato.svg" alt="">-->
<!--                    <span>Get It Now</span>-->
<!--                </a>-->
<!--            </div>-->
<!--            <img class="people-img" src="assets/img/illustrations/characters/friends2.svg" alt="">-->
<!--        </div>-->
<!--    </div>-->

    <footer class="footer-light-medium">
        <div class="container is-desktop">
            <div class="footer-head">
                <div class="head-text">
                    <h3>Ready to get started?</h3>
                    <p>Create your free account now</p>
                </div>
                <div class="head-action">
                    <div class="buttons">
                        <a href="signup.php"
                           target="_blank" class="button is-solid primary-button raised action-button">Create Account</a>
                        <a class="button chat-button">Login account</a>
                    </div>
                </div>
            </div>
            <div class="columns footer-body">
                <!-- Column -->
                <div class="column is-4">
                    <div class="pt-10 pb-10">
                        <img class="small-footer-logo" src="assets/img/logo/logo.png" alt="">
                        <div class="footer-description">
                            Nerd Library is your tech-savvy autonomous and self-driven education platform.
                            This is a hub where content creators and learners interact.
                        </div>
                    </div>
                    <div>
<!--                            <span class="moto">Designed and coded with <i data-feather="heart"></i> by CSS-->
<!--                                Ninja.</span>-->
                        <div class="social-links">
                            <a href="#">
                                <span class="icon"><i data-feather="facebook"></i></span>
                            </a>
                            <a href="#">
                                <span class="icon"><i data-feather="twitter"></i></span>
                            </a>
                            <a href="#">
                                <span class="icon"><i data-feather="instagram"></i></span>
                            </a>
                            <a href="#">
                                <span class="icon"><i data-feather="linkedin"></i></span>
                            </a>
                            <a href="#">
                                <span class="icon"><i data-feather="youtube"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="column is-6 is-offset-2">
                    <div class="columns">
                        <!-- Column -->
                        <div class="column">
                            <ul class="footer-column">
                                <li class="column-header">
                                    Nerd Library
                                </li>
                                <li class="column-item"><a href="#">Home</a></li>
                                <li class="column-item"><a href="#">Membership</a></li>
                                <li class="column-item"><a href="#">Get started</a></li>
                                <li class="column-item"><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <!-- Column -->
                        <div class="column">
                            <ul class="footer-column">
                                <li class="column-header">
                                    Help
                                </li>
                                <li class="column-item"><a href="#">Learning</a></li>
                                <li class="column-item"><a href="#">Support center</a></li>
                                <li class="column-item"><a href="#">Frequent questions</a></li>
                                <li class="column-item"><a href="#">Schedule a demo</a></li>
                            </ul>
                        </div>
                        <!-- Column -->
                        <div class="column">
                            <ul class="footer-column">
                                <li class="column-header">
                                    Terms
                                </li>
                                <li class="column-item"><a href="#">Terms of Service</a></li>
                                <li class="column-item"><a href="#">Privacy policy</a></li>
                                <li class="column-item"><a href="#">SaaS services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright has-text-centered">
<!--                TODO::FIX NERD LIBRARY ROUTE-->
                <p>&copy; 2019-<?php echo date("Y"); ?> | <a href="#">Nerd Library</a> | All Rights Reserved.</p>
            </div>
        </div>
    </footer>
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

<!-- Landing page js -->
<script src="assets/js/landing.js"></script>

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

<!-- map page js -->

<!-- elements page js -->
</body>


<!-- Mirrored from friendkit.cssninja.io/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 21:49:38 GMT -->
</html>