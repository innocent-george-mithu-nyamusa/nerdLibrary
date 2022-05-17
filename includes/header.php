<?php

use Classes\Utilities;

include "vendor/autoload.php";
$utilities = new Utilities();

?>
<header id="masthead-pro">
    <div class="container">

        <h1><a href="index.php"><img src="images/logo.png" alt="Logo"></a></h1>

        <nav id="site-navigation-pro">
            <ul class="sf-menu">
                <li class="normal-item-pro current-menu-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="normal-item-pro">
                    <a href="dashboard-home.php">New Releases</a>
                </li>
                <li class="normal-item-pro">
                    <a href="signup-step1.php">Pricing Plans</a>
                </li>
                <li class="normal-item-pro">
                    <a href="faqs.php">FAQs</a>
                </li>
            </ul>
        </nav>
        <?php if($utilities::isLoggedIn()){ ?>
        <button class="btn btn-header-pro noselect" data-toggle="modal" data-target="#LoginModal" role="button">Sign
            In
            </button>
            <?php }else { ?>
            <a href="includes/logout.php" class="btn btn-header-pro noselect" role="button">Logout
            </a>
        <?php } ?>


        <div id="mobile-bars-icon-pro" class="noselect"><i class="fas fa-bars"></i></div>

        <div class="clearfix"></div>
    </div><!-- close .container -->

    <nav id="mobile-navigation-pro">
        <?php session_start()?>
        <ul id="mobile-menu-pro">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="dashboard-home.php">New Releases</a>
                <!-- Mobile Sub-Menu Example >
                <ul>
                    <li class="normal-item-pro">
                        <a href="#!">Sub-menu item 1</a>
                    </li>
                    <li class="normal-item-pro">
                        <a href="#!">Sub-menu item 2</a>
                    </li>
                    <li class="normal-item-pro">
                        <a href="#!">Sub-menu item 3</a>
                    </li>
                </ul>
                < End Mobile Sub-Menu Example -->
            </li>
            <li>
                <a href="signup-step1.php">Pricing Plans</a>
            </li>
            <li>
                <a href="faqs.php">FAQs</a>
            </li>
        </ul>
        <div class="clearfix"></div>

        <?php if(!$utilities::isLoggedIn()){

            ?>
        <button class="btn btn-mobile-pro btn-green-pro noselect" data-toggle="modal" data-target="#LoginModal"
                role="button">Sign In
        </button>
        <?php } else {
            echo "toolsie slide logged in";
            ?>
            <a class="btn btn-mobile-pro btn-green-pro noselect" href="includes/logout.php"
                    role="button">Logout
            </a>
        <?php } ?>

    </nav>
</header>