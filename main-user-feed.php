<!DOCTYPE html>
<html lang="en">


<?php

use Classes\ActivityView;
use Classes\CategoryView;
use Classes\CommentView;
use Classes\EpisodeView;
use Classes\PagesView;
use Classes\PostStoryView;
use Classes\ProgressTrackView;
use Classes\RelationshipView;
use Classes\ResourceView;
use Classes\SeriesView;
use Classes\UserNotificationView;
use Classes\UserPostView;
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
$resourceObj = new ResourceView();
$commentObj = new CommentView();
$storyObj = new PostStoryView();
$pagesObj = new PagesView();
$activityObj = new ActivityView();
$notificationObj = new UserNotificationView();

$mySeriesList = [];
?>


<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Feed | nerdLibrary </title>
    <link rel="icon" type="image/png" href="assets/img/logo/logo.png"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="assets/css/min/fontisto/fontisto-brands.min.css" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/core.css">
</head>
<body>

<!-- Pageloader -->
<div class="pageloader"></div>
<div class="infraloader is-active"></div>
<div class="app-overlay"></div>
<?php

include "includes/frontEnd/main-navbar.php";

$allMyFriends = $relationObj->myFriendsShips($_SESSION["user_id"]);
$friendBirthday = $relationObj->myFriendsBirthdays($_SESSION["user_id"]);

//$friendBirthday =[];

$suggestedFriendships = $relationObj->suggestedFriendsShips($_SESSION["user_id"]);

$numberOfAllMyFriends = count($allMyFriends);
$allFeedPosts = $postObj->getMyFeedPosts($_SESSION["user_id"]);
$allStories = $storyObj->getUserFeedStories($_SESSION["user_id"]);
$allPages = $pagesObj->getSuggestionPages($_SESSION["user_id"]);
$friendsActivity = $activityObj->getFriendsActivity($_SESSION["user_id"]);

$friendsRequests =

$allStories = $allStories ?? [];
$allPages = $allPages ?? [];
$friendsActivity = is_bool($friendsActivity) ? [] : $friendsActivity;
if ($numberOfAllMyFriends > 6) {
    $numberOfAllMyFriends = 6;
}

?>

<div class="view-wrapper">

    <!-- Container -->
    <div id="main-feed" class="container">

        <!-- Content placeholders at page load -->
        <!-- this holds the animated content placeholders that show up before content -->
        <div id="shadow-dom" class="view-wrap">
            <div class="columns">

                <div class="column is-3">

                    <!-- Placeload element -->
                    <div class="placeload weather-widget-placeload">
                        <div class="header">
                            <div class="inner-wrap">
                                <div class="img loads"></div>
                                <div class="content-shape loads"></div>
                                <div class="content-shape loads"></div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="inner-wrap">
                                <div class="rect loads"></div>
                                <div class="content-shape loads"></div>
                                <div class="content-shape loads"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Placeload element -->
                    <div class="placeload list-placeload">
                        <div class="header">
                            <div class="content-shape loads"></div>
                        </div>
                        <div class="body">
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-6">

                    <!-- Placeload element -->
                    <div class="placeload compose-placeload">
                        <div class="header">
                            <div class="content-shape is-lg loads"></div>
                            <div class="content-shape is-lg loads"></div>
                            <div class="content-shape is-lg loads"></div>
                        </div>
                        <div class="body">
                            <div class="img loads"></div>
                            <div class="inner-wrap">
                                <div class="content-shape loads"></div>
                                <div class="content-shape loads"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Placeload element -->
                    <div class="placeload post-placeload">
                        <div class="header">
                            <div class="img loads"></div>
                            <div class="header-content">
                                <div class="content-shape loads"></div>
                                <div class="content-shape loads"></div>
                            </div>
                        </div>
                        <div class="image-placeholder loads"></div>
                        <div class="placeholder-footer">
                            <div class="footer-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Placeload element -->
                    <div class="placeload post-placeload">
                        <div class="header">
                            <div class="img loads"></div>
                            <div class="header-content">
                                <div class="content-shape loads"></div>
                                <div class="content-shape loads"></div>
                            </div>
                        </div>
                        <div class="image-placeholder loads"></div>
                        <div class="placeholder-footer">
                            <div class="footer-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Placeload element -->
                    <div class="placeload post-placeload">
                        <div class="header">
                            <div class="img loads"></div>
                            <div class="header-content">
                                <div class="content-shape loads"></div>
                                <div class="content-shape loads"></div>
                            </div>
                        </div>
                        <div class="image-placeholder loads"></div>
                        <div class="placeholder-footer">
                            <div class="footer-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Placeload element -->
                    <div class="placeload post-placeload">
                        <div class="header">
                            <div class="img loads"></div>
                            <div class="header-content">
                                <div class="content-shape loads"></div>
                                <div class="content-shape loads"></div>
                            </div>
                        </div>
                        <div class="image-placeholder loads"></div>
                        <div class="placeholder-footer">
                            <div class="footer-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-3">

                    <!-- Placeload element -->
                    <div class="placeload stories-placeload">
                        <div class="header">
                            <div class="content-shape loads"></div>
                        </div>
                        <div class="body">
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Placeload element -->
                    <div class="placeload mini-widget-placeload">
                        <div class="body">
                            <div class="inner-wrap">
                                <div class="img loads"></div>
                                <div class="content-shape loads"></div>
                                <div class="content-shape loads"></div>
                                <div class="content-shape loads"></div>
                                <div class="button-shape loads"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Placeload element -->
                    <div class="placeload list-placeload">
                        <div class="header">
                            <div class="content-shape loads"></div>
                        </div>
                        <div class="body">
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                            <div class="flex-block">
                                <div class="img loads"></div>
                                <div class="inner-wrap">
                                    <div class="content-shape loads"></div>
                                    <div class="content-shape loads"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Feed page main wrapper -->
        <div id="activity-feed" class="view-wrap true-dom is-hidden">
            <div class="columns">
                <!-- Left side column -->
                <div class="column is-3 is-hidden-mobile">
                    <!-- Weather widget -->
                    <!-- /partials/widgets/weather-widget.html -->
                    <div class="card is-weather-card has-background-image"
                         data-background="assets/img/illustrations/cards/weather-bg.svg">
                        <div class="card-heading">
                            <div class="dropdown is-spaced is-accent is-right dropdown-trigger is-light">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="map-pin"></i>
                                                <div class="media-content">
                                                    <h3>Change City</h3>
                                                    <small>Change the displayed city.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="rotate-ccw"></i>
                                                <div class="media-content">
                                                    <h3>Synchronize</h3>
                                                    <small>Synchronize with a weather source.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="settings"></i>
                                                <div class="media-content">
                                                    <h3>Settings</h3>
                                                    <small>Access widget settings.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="trash-2"></i>
                                                <div class="media-content">
                                                    <h3>Remove</h3>
                                                    <small>Removes this widget from your feed.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="temperature">
                                <span>71</span>
                            </div>
                            <div class="weather-icon">
                                <div>
                                    <i data-feather="sun"></i>
                                    <h4>Sunny</h4>
                                    <div class="details">
                                        <span>Real Feel: 78° </span>
                                        <span>Rain Chance: 5%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="previsions">
                                <div class="day">
                                    <span>Mon</span>
                                    <i data-feather="sun"></i>
                                    <span>69°</span>
                                </div>
                                <div class="day">
                                    <span>Tue</span>
                                    <i data-feather="cloud-lightning"></i>
                                    <span>74°</span>
                                </div>
                                <div class="day">
                                    <span>Wed</span>
                                    <i data-feather="cloud-lightning"></i>
                                    <span>73°</span>
                                </div>
                                <div class="day">
                                    <span>Thu</span>
                                    <i data-feather="sun"></i>
                                    <span>68°</span>
                                </div>
                                <div class="day">
                                    <span>Fri</span>
                                    <i data-feather="cloud-drizzle"></i>
                                    <span>55°</span>
                                </div>
                                <div class="day">
                                    <span>Sat</span>
                                    <i data-feather="cloud-rain"></i>
                                    <span>58°</span>
                                </div>
                                <div class="day">
                                    <span>Sun</span>
                                    <i data-feather="sun"></i>
                                    <span>64°</span>
                                </div>
                            </div>
                            <div class="current-date-location has-text-centered">
                                <span class="date"><?php echo date("l, jS Y") ?></span>
                                <span class="location"> <i data-feather="map-pin"></i> Harare, ZW</span>
                            </div>
                        </div>
                    </div>
                    <!-- Pages widget -->

                    <!-- /partials/widgets/recommended-pages-1-widget.html -->
                    <div class="card">
                        <div class="card-heading is-bordered">
                            <h4>Recommended Pages</h4>
                            <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="file-text"></i>
                                                <div class="media-content">
                                                    <h3>All Recommandations</h3>
                                                    <small>View all recommandations.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="settings"></i>
                                                <div class="media-content">
                                                    <h3>Settings</h3>
                                                    <small>Access widget settings.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="trash-2"></i>
                                                <div class="media-content">
                                                    <h3>Remove</h3>
                                                    <small>Removes this widget from your feed.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body no-padding">

                            <?php
                            foreach ($allPages as $page) {
                                $category = $categoriesObj->getCategory($page["page_category_id"]);
                                ?>
                                <!-- Recommended Page -->
                                <div class="page-block transition-block">

                                        <img src="https://via.placeholder.com/300x300"
                                             data-demo-src="/images/pages/<?php echo $page["page_icon"] ?>"
                                             data-page-popover="<?php echo $page["page_no"] ?>" alt="">
                                        <div class="page-meta">
                                            <a href="/pages/main">
                                            <span><?php echo $page["page_name"] ?></span>
                                            <span><?php echo $category["category_name"]; ?></span>
                                            </a>
                                        </div>


                                    <div class="add-page add-transition">
                                        <i data-page-id="<?php echo $page["page_id"]; ?>"
                                           data-feather="bookmark"></i>
                                    </div>
                                </div>

                            <?php } ?>

                            <!-- Recommended Page -->
                            <!--                            <div class="page-block transition-block">-->
                            <!--                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                     data-demo-src="assets/img/icons/logos/lonelydroid.svg" data-page-popover="1"-->
                            <!--                                     alt="">-->
                            <!--                                <div class="page-meta">-->
                            <!--                                    <span>Lonely Droid</span>-->
                            <!--                                    <span>Technology</span>-->
                            <!--                                </div>-->
                            <!--                                <div class="add-page add-transition">-->
                            <!--                                    <i data-feather="bookmark"></i>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!-- Recommended Page -->
                            <!--                            <div class="page-block transition-block">-->
                            <!--                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                     data-demo-src="assets/img/icons/logos/metamovies.svg" data-page-popover="2" alt="">-->
                            <!--                                <div class="page-meta">-->
                            <!--                                    <span>Meta Movies</span>-->
                            <!--                                    <span>Movies / Entertainment</span>-->
                            <!--                                </div>-->
                            <!--                                <div class="add-page add-transition">-->
                            <!--                                    <i data-feather="bookmark"></i>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!-- Recommended Page -->
                            <!--                            <div class="page-block transition-block">-->
                            <!--                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                     data-demo-src="assets/img/icons/logos/nuclearjs.svg" data-page-popover="3" alt="">-->
                            <!--                                <div class="page-meta">-->
                            <!--                                    <span>Nuclearjs</span>-->
                            <!--                                    <span>Technology</span>-->
                            <!--                                </div>-->
                            <!--                                <div class="add-page add-transition">-->
                            <!--                                    <i data-feather="bookmark"></i>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!-- Recommended Page -->
                            <!--                            <div class="page-block transition-block">-->
                            <!--                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                     data-demo-src="assets/img/icons/logos/slicer.svg" data-page-popover="4" alt="">-->
                            <!--                                <div class="page-meta">-->
                            <!--                                    <span>Slicer</span>-->
                            <!--                                    <span>Web / Design</span>-->
                            <!--                                </div>-->
                            <!--                                <div class="add-page add-transition">-->
                            <!--                                    <i data-feather="bookmark"></i>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                    <!-- Fake Ad -->
                    <!-- /partials/widgets/fake-add-widget.html -->
                    <div class="card is-ad">
                        <div class="card-body">
                            <img src="assets/img/ads/ninja-ad.svg" alt="">
                            <div class="ad-text">
                                Simple, pleasant, and productive.
                            </div>
                            <div class="ad-brand">
                                Ads Via NerdLibrary
                            </div>
                        </div>
                    </div>
                    <!-- Latest activities widget -->
                    <!-- /partials/widgets/latest-activity-1-widget.html -->
                    <div id="latest-activity-1" class="card">
                        <div class="card-heading is-bordered">
                            <h4>Latest activity</h4>
                            <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="list"></i>
                                                <div class="media-content">
                                                    <h3>All updates</h3>
                                                    <small>View my network's activity.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="settings"></i>
                                                <div class="media-content">
                                                    <h3>Settings</h3>
                                                    <small>Access widget settings.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="trash-2"></i>
                                                <div class="media-content">
                                                    <h3>Remove</h3>
                                                    <small>Removes this widget from your feed.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body no-padding">
                            <!-- Recommended Page -->
                            <?php
                            foreach ($friendsActivity as $activity) {
                                $friendDetails = $userObj->getUser($activity["login_activity_user_id"])[0];
                                $activeTime = $activity["login_activity_status"] == "active" ? "active" : $activity["logout_date"];

                                ?>
                                <div class="page-block">
                                    <img src="https://via.placeholder.com/300x300"
                                         data-demo-src="/images/profile-images/<?php echo $friendDetails["user_image"]; ?>"
                                         data-page-popover="<?php echo $friendDetails["user_no"]; ?>" alt="">
                                    <div class="page-meta">
                                        <span><?php echo $friendDetails["user_fullname"]; ?></span>
                                        <span><?php echo $activeTime; ?></span>
                                    </div>
                                    <div class="add-page">
                                        <i data-feather="eye"></i>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Recommended Page -->
                            <!--                            <div class="page-block">-->
                            <!--                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                     data-demo-src="assets/img/avatars/milly.jpg" alt="" data-user-popover="7">-->
                            <!--                                <div class="page-meta">-->
                            <!--                                    <span>Milly Augustine</span>-->
                            <!--                                    <span>5 hours ago</span>-->
                            <!--                                </div>-->
                            <!--                                <div class="add-page">-->
                            <!--                                    <i data-feather="eye"></i>-->
                            <!--                                </div>-->
                            <!--                            </div>-->

                            <!-- Recommended Page -->
                            <!--                            <div class="page-block">-->
                            <!--                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                     data-demo-src="assets/img/icons/logos/nuclearjs.svg" data-page-popover="3" alt="">-->
                            <!--                                <div class="page-meta">-->
                            <!--                                    <span>Nuclearjs</span>-->
                            <!--                                    <span>Yesterday</span>-->
                            <!--                                </div>-->
                            <!--                                <div class="add-page">-->
                            <!--                                    <i data-feather="eye"></i>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                </div>
                <!-- /Left side column -->

                <!-- Middle column -->
                <div id="posts-container" class="column is-6">

                    <!-- Publishing Area -->
                    <!-- /partials/pages/feed/compose-card.html -->
                    <div id="compose-card" class="card is-new-content">
                        <!-- Top tabs -->
                        <form id="post-compose-content" enctype="multipart/form-data" method="post" action="">
                            <div class="tabs-wrapper">
                                <div class="tabs is-boxed is-fullwidth">
                                    <ul>
                                        <li class="is-active">
                                            <a>
                                                <span class="icon is-small"><i data-feather="edit-3"></i></span>
                                                <span>Publish</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="modal-trigger" data-modal="albums-help-modal">
                                                <span class="icon is-small"><i data-feather="image"></i></span>
                                                <span>Albums</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="modal-trigger" data-modal="videos-help-modal">
                                                <span class="icon is-small"><i data-feather="video"></i></span>
                                                <span>Video</span>
                                            </a>
                                        </li>
                                        <!-- Close X button -->
                                        <li class="close-wrap">
                                            <span class="close-publish">
                                                    <i data-feather="x"></i>
                                                </span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Tab content -->
                                <div class="tab-content">
                                    <!-- Compose form -->
                                    <div class="compose">
                                        <div class="compose-form">
                                            <img src="https://via.placeholder.com/300x300"
                                                 data-demo-src="images/profile-images/<?php echo $_SESSION["image"]; ?>"
                                                 alt="">
                                            <div class="control">
                                                <textarea id="publish" class="textarea" rows="3"
                                                          placeholder="Write something about you..."></textarea>
                                            </div>
                                        </div>

                                        <div id="feed-upload" class="feed-upload">

                                        </div>

                                        <div id="options-summary" class="options-summary"></div>

                                        <div id="tag-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <!-- Tag friends suboption -->
                                            <div id="tag-list" class="tag-list"></div>
                                            <div class="control">
                                                <input id="users-autocpl" type="text" class="input"
                                                       placeholder="Who are you with?">
                                                <div class="icon">
                                                    <i data-feather="search"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Tag friends suboption -->

                                        <!-- Activities suboption -->
                                        <div id="activities-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <div id="activities-autocpl-wrapper" class="control has-margin">
                                                <input id="activities-autocpl" type="text" class="input"
                                                       placeholder="What are you doing right now?">
                                                <div class="icon">
                                                    <i data-feather="search"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>

                                            <!-- Mood suboption -->
                                            <div id="mood-autocpl-wrapper"
                                                 class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="mood-autocpl" type="text" class="input is-subactivity"
                                                           placeholder="How do you feel?">
                                                    <div class="input-block">
                                                        Feels
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Drinking suboption child -->
                                            <div id="drinking-autocpl-wrapper"
                                                 class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="drinking-autocpl" type="text"
                                                           class="input is-subactivity"
                                                           placeholder="What are you drinking?">
                                                    <div class="input-block">
                                                        Drinks
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Eating suboption child -->
                                            <div id="eating-autocpl-wrapper"
                                                 class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="eating-autocpl" type="text" class="input is-subactivity"
                                                           placeholder="What are you eating?">
                                                    <div class="input-block">
                                                        Eats
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reading suboption child -->
                                            <div id="reading-autocpl-wrapper"
                                                 class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="reading-autocpl" type="text" class="input is-subactivity"
                                                           placeholder="What are you reading?">
                                                    <div class="input-block">
                                                        Reads
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Watching suboption child -->
                                            <div id="watching-autocpl-wrapper"
                                                 class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="watching-autocpl" type="text"
                                                           class="input is-subactivity"
                                                           placeholder="What are you watching?">
                                                    <div class="input-block">
                                                        Watches
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Travel suboption child -->
                                            <div id="travel-autocpl-wrapper"
                                                 class="is-autocomplete is-activity is-hidden">
                                                <div class="control has-margin">
                                                    <input id="travel-autocpl" type="text" class="input is-subactivity"
                                                           placeholder="Where are you going?">
                                                    <div class="input-block">
                                                        Travels
                                                    </div>
                                                    <div class="close-icon is-subactivity">
                                                        <i data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /Activities suboption -->

                                        <!-- Location suboption -->
                                        <div id="location-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <div id="location-autocpl-wrapper"
                                                 class="control is-location-wrapper has-margin">
                                                <input id="location-autocpl" type="text" class="input"
                                                       placeholder="Where are you now?">
                                                <div class="icon">
                                                    <i data-feather="map-pin"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Link suboption -->
                                        <div id="link-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <div id="link-autocpl-wrapper"
                                                 class="control is-location-wrapper has-margin">
                                                <input id="link-autocpl" type="text" class="input"
                                                       placeholder="Enter the link URL">
                                                <div class="icon">
                                                    <i data-feather="link-2"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- GIF suboption -->
                                        <div id="gif-suboption" class="is-autocomplete is-suboption is-hidden">
                                            <div id="gif-autocpl-wrapper" class="control is-gif-wrapper has-margin">
                                                <input id="gif-autocpl" type="text" class="input"
                                                       placeholder="Search a GIF to add" autofocus>
                                                <div class="icon">
                                                    <i data-feather="search"></i>
                                                </div>
                                                <div class="close-icon is-main">
                                                    <i data-feather="x"></i>
                                                </div>
                                                <div class="gif-dropdown">
                                                    <div class="inner">
                                                        <div class="gif-block">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/1.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/2.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/3.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/4.gif" alt="">
                                                        </div>
                                                        <div class="gif-block">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/5.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/6.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/7.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/8.gif" alt="">
                                                        </div>
                                                        <div class="gif-block">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/9.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/10.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/11.gif" alt="">
                                                            <img src="https://via.placeholder.com/478x344"
                                                                 data-demo-src="assets/img/demo/gif/12.gif" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Compose form -->

                                    <!-- General extended options -->
                                    <div id="extended-options" class="compose-options is-hidden">
                                        <div class="columns is-multiline is-full">
                                            <!-- Upload action -->
                                            <div class="column is-6 is-narrower">
                                                <div class="compose-option is-centered">
                                                    <i data-feather="camera"></i>
                                                    <span>Photo/Video</span>
                                                    <input id="feed-upload-input-1" form="post-compose-content"
                                                           name="post-image" type="file" accept=".png, .jpg, .jpeg"
                                                           onchange="readURL(this)">
                                                </div>
                                            </div>
                                            <!-- Mood action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="extended-show-activities" class="compose-option is-centered">
                                                    <img src="assets/img/icons/emoji/emoji-1.svg" alt="">
                                                    <span>Mood/Activity</span>
                                                </div>
                                            </div>
                                            <!-- Tag friends action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="open-tag-suboption" class="compose-option is-centered">
                                                    <i data-feather="tag"></i>
                                                    <span>Tag friends</span>
                                                </div>
                                            </div>
                                            <!-- Post location action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="open-location-suboption" class="compose-option is-centered">
                                                    <i data-feather="map-pin"></i>
                                                    <span>Post location</span>
                                                </div>
                                            </div>
                                            <!-- Share link action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="open-link-suboption" class="compose-option is-centered">
                                                    <i data-feather="link-2"></i>
                                                    <span>Share link</span>
                                                </div>
                                            </div>
                                            <!-- Post GIF action -->
                                            <div class="column is-6 is-narrower">
                                                <div id="open-gif-suboption" class="compose-option is-centered">
                                                    <i data-feather="image"></i>
                                                    <span>Post GIF</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /General extended options -->

                                    <!-- General basic options -->
                                    <div id="basic-options" class="compose-options">
                                        <!-- Upload action -->
                                        <div class="compose-option">
                                            <i data-feather="camera"></i>
                                            <span>Media</span>
                                            <input id="feed-upload-input-2" form="post-compose-content"
                                                   name="post-image-2" type="file" accept=".png, .jpg, .jpeg"
                                                   onchange="readURL(this)">
                                        </div>
                                        <!-- Mood action -->
                                        <div id="show-activities" class="compose-option">
                                            <img src="assets/img/icons/emoji/emoji-1.svg" alt="">
                                            <span>Activity</span>
                                        </div>
                                        <!-- Expand action -->
                                        <div id="open-extended-options" class="compose-option">
                                            <i data-feather="more-horizontal"></i>
                                        </div>
                                    </div>
                                    <!-- /General basic options -->

                                    <!-- Hidden Options -->
                                    <div class="hidden-options">
                                        <div class="target-channels">
                                            <!-- Publication Channel -->
                                            <div class="channel">
                                                <div class="round-checkbox is-small">
                                                    <div>
                                                        <input type="checkbox" name="activity-feed-activated"
                                                               id="checkbox-1" checked>
                                                        <label for="checkbox-1"></label>
                                                    </div>
                                                </div>
                                                <div class="channel-icon">
                                                    <i data-feather="bell"></i>
                                                </div>
                                                <div class="channel-name">Activity Feed</div>
                                                <!-- Dropdown menu -->
                                                <div id="activity-dropdown"
                                                     class="dropdown is-spaced is-modern is-right is-neutral dropdown-trigger">
                                                    <div>
                                                        <button class="button" aria-haspopup="true">
                                                            <i class="main-icon" id="activity-main-icon"
                                                               data-feather="smile"></i>
                                                            <span id="activity-restriction-status">Friends</span>
                                                            <i class="caret" data-feather="chevron-down"></i>
                                                        </button>
                                                    </div>
                                                    <div class="dropdown-menu" role="menu">
                                                        <div class="dropdown-content">
                                                            <a data-replacement-icon='<svg id="activity-main-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>'
                                                               data-restriction-level="Public"
                                                               class="dropdown-item activity-restriction">
                                                                <div class="media">
                                                                    <i data-feather="globe"></i>
                                                                    <div class="media-content">
                                                                        <h3>Public</h3>
                                                                        <small>Anyone can see this publication.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a data-replacement-icon='<svg id="activity-main-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>'
                                                               data-restriction-level="Friends"
                                                               class="dropdown-item activity-restriction">
                                                                <div class="media">
                                                                    <i data-feather="users"></i>
                                                                    <div class="media-content">
                                                                        <h3>Friends</h3>
                                                                        <small>only friends can see this
                                                                            publication.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <!--                                                            <a class="dropdown-item">-->
                                                            <!--                                                                <div class="media">-->
                                                            <!--                                                                    <i data-feather="user"></i>-->
                                                            <!--                                                                    <div class="media-content">-->
                                                            <!--                                                                        <h3>Specific friends</h3>-->
                                                            <!--                                                                        <small>Don't show it to some friends.</small>-->
                                                            <!--                                                                    </div>-->
                                                            <!--                                                                </div>-->
                                                            <!--                                                            </a>-->
                                                            <hr class="dropdown-divider">
                                                            <a data-replacement-icon='<svg id="activity-main-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>'
                                                               data-restriction-level="Only me"
                                                               class="dropdown-item activity-restriction">
                                                                <div class="media">
                                                                    <i data-feather="lock"></i>
                                                                    <div class="media-content">
                                                                        <h3>Only me</h3>
                                                                        <small>Only me can see this publication.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Publication Channel -->
                                            <div class="channel">
                                                <div class="round-checkbox is-small">
                                                    <div>
                                                        <input disabled type="checkbox" name="post-story-activated"
                                                               id="checkbox-2">
                                                        <label for="checkbox-2"></label>
                                                    </div>
                                                </div>
                                                <div class="story-icon">
                                                    <div class="plus-icon">
                                                        <i data-feather="plus"></i>
                                                    </div>
                                                </div>

                                                <div class="channel-name">My Story</div>
                                                <!-- Dropdown menu -->
                                                <div class="dropdown is-spaced is-modern is-right is-neutral dropdown-trigger">
                                                    <div>
                                                        <button class="button" aria-haspopup="true">
                                                            <i id="story-main-icon" class="main-icon"
                                                               data-feather="smile"></i>
                                                            <span id="story-restriction-status">Friends</span>
                                                            <i class="caret" data-feather="chevron-down"></i>
                                                        </button>
                                                    </div>
                                                    <div class="dropdown-menu" role="menu">
                                                        <div class="dropdown-content">
                                                            <a data-replacement-story='<svg id="story-main-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>'
                                                               data-restriction-level="Public"
                                                               class="dropdown-item story-restriction">
                                                                <div class="media">
                                                                    <i data-feather="globe"></i>
                                                                    <div class="media-content">
                                                                        <h3>Public</h3>
                                                                        <small>Anyone can see this publication.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a data-replacement-story='<svg id="story-main-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>'
                                                               data-restriction-level="Friends"
                                                               class="dropdown-item story-restriction">
                                                                <div class="media">
                                                                    <i data-feather="users"></i>
                                                                    <div class="media-content">
                                                                        <h3>Friends</h3>
                                                                        <small>only friends can see this
                                                                            publication.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a data-replacement-story='<svg id="story-main-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>'
                                                               data-restriction-level="Friends-&-Contacts"
                                                               class="dropdown-item story-restriction">
                                                                <div class="media">
                                                                    <i data-feather="users"></i>
                                                                    <div class="media-content">
                                                                        <h3>Friends and contacts</h3>
                                                                        <small>Your friends and contacts.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Friends list -->
                                        <div class="friends-list is-hidden">
                                            <!-- Header -->
                                            <div class="list-header">
                                                <span>Send in a message</span>
                                                <div class="actions">
                                                    <a id="open-compose-search" href="javascript:void(0);"
                                                       class="search-trigger">
                                                        <i data-feather="search"></i>
                                                    </a>
                                                    <!-- Hidden filter input -->
                                                    <div id="compose-search" class="control is-hidden">
                                                        <input type="text" class="input" placeholder="Search People">
                                                        <span>
                                                                <i data-feather="search"></i>
                                                            </span>
                                                    </div>
                                                    <a href="javascript:void(0);" class="is-inverted modal-trigger"
                                                       data-modal="create-group-modal">Create group</a>
                                                </div>
                                            </div>
                                            <!-- List body -->
                                            <div class="list-body">
                                                <!-- TODO:: DO STUFF-->
                                                <?php

                                                for ($index = 0; $index < $numberOfAllMyFriends; $index++) {

                                                    if ($_SESSION["user_id"] == $allMyFriends[$index]["relation_user_id"]) {
                                                        $friend = $userObj->getUser($allMyFriends[$index]["relation_initiator_id"]);
                                                    } else {
                                                        $friend = $userObj->getUser($allMyFriends[$index]["relation_user_id"]);
                                                    }

                                                    ?>
                                                    <!-- Friend -->
                                                    <div class="friend-block">
                                                        <div class="round-checkbox is-small">
                                                            <div>
                                                                <input type="checkbox"
                                                                       id="checkbox-<?php echo $index ?>">
                                                                <label for="checkbox-<?php echo $index ?>"></label>
                                                            </div>
                                                        </div>
                                                        <img class="friend-avatar"
                                                             src="https://via.placeholder.com/300x300"
                                                             data-demo-src="/images/profile-images/<?php echo $friend[0]["user_image"] ?>"
                                                             alt="">
                                                        <div class="friend-name"><?php echo $friend[0]["user_fullname"]; ?></div>
                                                    </div>
                                                <?php } ?>

                                                <!-- Friend -->
                                                <!--                                                <div class="friend-block">-->
                                                <!--                                                    <div class="round-checkbox is-small">-->
                                                <!--                                                        <div>-->
                                                <!--                                                            <input type="checkbox" id="checkbox-4">-->
                                                <!--                                                            <label for="checkbox-4"></label>-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->
                                                <!--                                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">-->
                                                <!--                                                    <div class="friend-name">Daniel Wellington</div>-->
                                                <!--                                                </div>-->

                                                <!-- Friend -->
                                                <!--                                                <div class="friend-block">-->
                                                <!--                                                    <div class="round-checkbox is-small">-->
                                                <!--                                                        <div>-->
                                                <!--                                                            <input type="checkbox" id="checkbox-5">-->
                                                <!--                                                            <label for="checkbox-5"></label>-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->
                                                <!--                                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">-->
                                                <!--                                                    <div class="friend-name">Stella Bergmann</div>-->
                                                <!--                                                </div>-->
                                                <!-- Friend -->
                                                <!--                                                <div class="friend-block">-->
                                                <!--                                                    <div class="round-checkbox is-small">-->
                                                <!--                                                        <div>-->
                                                <!--                                                            <input type="checkbox" id="checkbox-6">-->
                                                <!--                                                            <label for="checkbox-6"></label>-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->
                                                <!--                                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">-->
                                                <!--                                                    <div class="friend-name">David Kim</div>-->
                                                <!--                                                </div>-->
                                                <!-- Friend -->
                                                <!--                                                <div class="friend-block">-->
                                                <!--                                                    <div class="round-checkbox is-small">-->
                                                <!--                                                        <div>-->
                                                <!--                                                            <input type="checkbox" id="checkbox-7">-->
                                                <!--                                                            <label for="checkbox-7"></label>-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->
                                                <!--                                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">-->
                                                <!--                                                    <div class="friend-name">Nelly Schwartz</div>-->
                                                <!--                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Footer buttons -->
                                    <div class="more-wrap">
                                        <!-- View more button -->
                                        <button id="show-compose-friends" type="button" class="button is-more"
                                                aria-haspopup="true">
                                            <i data-feather="more-vertical"></i>
                                            <span>View More</span>
                                        </button>
                                        <!-- Publish button -->
                                        <button id="publish-button" type="submit"
                                                class="button is-solid accent-button is-fullwidth is-disabled">
                                            Publish
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php

                    // HIGHLIGHT::USER POSTS
                    foreach ($allFeedPosts

                             as $feedPost) {

                        $postOwner = ($userObj->getUser($feedPost["post_owner_id"]))[0];
                        $allPostLikes = $resourceObj->getPostLikers($feedPost["post_id"]);
                        $postDate = new DateTime($feedPost['post_datetime']);
                        $postDate = $postDate->format("F d Y, H:m a");
                        $allTaggedUsers = explode(",", $feedPost["post_tags"]);
                        $postLikes = $resourceObj->getItemLikes($feedPost["post_id"]);
                        $postNumberOfComments = $commentObj->getNumberOfCommentsOfItem($feedPost["post_id"]);
                        $allRootPostComments = $commentObj->getAllItemRootComments($feedPost["post_id"]);
                        $isSimpleClassName = $feedPost["post_type"] == "text" ? "is-simple" : "";
                        $postText = $feedPost["post_text"] ?? "";
                        $postMood = $feedPost["post_mood"] !== "N/A" ? " is " . "<a href='' >" . $feedPost["post_mood"] . "</a>" : "";
                        $allPostLikes = $allPostLikes ?? [];
                        $taggedUsernames = "";
                        $userLikes = $resourceObj->isUserFavoriteItem($_SESSION["user_id"], $feedPost["post_id"]);

                        //                        HIGHLIGHT:: CHECK POST USER ID"S IN TERMS OF USER ID's
                        //                        FIXME::MAKE SURE user.json has Realistic values
                        for ($index = 0; $index < sizeof($allTaggedUsers) - 1; $index++) {

                            if ($allTaggedUsers[$index] != ',' || $allTaggedUsers[$index] != ' ') {

                                $taggedUserData = $userObj->getUser($allTaggedUsers[$index]);

                                if ($index == 1) {
                                    $taggedUsernames .= "<a href='/profile/main'" . $taggedUserData[0]["user_id"] . "' > @" . $taggedUserData[0]["user_fullname"] . "</a>, ";
                                } else if ($index == (sizeof($allTaggedUsers) - 2)) {
                                    $taggedUsernames .= " And <a href='/nerdLife/profile/main/" . $taggedUserData[0]['user_id'] . "' > @" . $taggedUserData[0]["user_fullname"] . "</a>";
                                } else if ($index == (sizeof($allTaggedUsers) - 3)) {
                                    $taggedUsernames .= "<a href='/profile/main'" . $taggedUserData[0]["user_id"] . "' > @" . $taggedUserData[0]["user_fullname"] . "</a> ";
                                } else {
                                    $taggedUsernames .= "<a href='/profile/main'" . $taggedUserData[0]["user_id"] . "' > @" . $taggedUserData[0]["user_fullname"] . "</a>, ";
                                }
                            }

                        }

                        ?>

                        <div class="card is-post <?php echo $isSimpleClassName ?>">
                            <!-- Main wrap -->
                            <div class="content-wrap">
                                <!-- Header -->
                                <div class="card-heading">
                                    <!-- User image -->
                                    <div class="user-block">
                                        <div class="image">
                                            <img src="https://via.placeholder.com/300x300"
                                                 data-demo-src="/images/profile-images/<?php echo $postOwner["user_image"]; ?>"
                                                 data-user-popover="<?php echo $postOwner["user_no"]; ?>"
                                                 alt="">
                                        </div>
                                        <div class="user-info">
                                            <a href="#"><?php echo $postOwner["user_fullname"]; ?></a>
                                            <span class="time"><?php echo $postDate; ?></span>
                                        </div>
                                    </div>
                                    <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                                    <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                        <div>
                                            <div class="button">
                                                <i data-feather="more-vertical"></i>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu" role="menu">
                                            <div class="dropdown-content">
                                                <a
                                                        data-bookmark-post-id="<?php echo $feedPost["post_id"]; ?>"
                                                        class="dropdown-item bookmark-post">
                                                    <div class="media">
                                                        <i data-feather="bookmark"></i>
                                                        <div class="media-content">
                                                            <h3>Bookmark</h3>
                                                            <small>Add this post to your bookmarks.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a data-subscribe-notifification-post-id="<?php echo $feedPost["post_id"]; ?>"
                                                   class="dropdown-item subscribe-notification-post">
                                                    <div class="media">
                                                        <i data-feather="bell"></i>
                                                        <div class="media-content">
                                                            <h3>Notify me</h3>
                                                            <small>Send me the updates.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <hr class="dropdown-divider">
                                                <a data-flag-post-id="<?php echo $feedPost["post_id"]; ?>"
                                                   class="dropdown-item flag-item">
                                                    <div class="media">
                                                        <i data-feather="flag"></i>
                                                        <div class="media-content">
                                                            <h3>Flag</h3>
                                                            <small>In case of inappropriate content.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Header -->

                                <!-- Post body -->
                                <div class="card-body">

                                    <!-- Post body text -->
                                    <div class="post-text">
                                        <p><?php
                                            echo $postText;
                                            echo $postMood;
                                            echo isset($taggedUsernames) ? " with " . $taggedUsernames : "";
                                            ?>
                                        <p>
                                    </div>

                                    <?php if (isset($feedPost["post_shared_link"]) && ($feedPost["post_type"] == "photo")) { ?>

                                        <div class="post-image">
                                            <a data-fancybox="<?php echo $feedPost["post_id"] ?>"
                                               data-lightbox-type="comments"
                                               data-thumb="/images/media/posts/<?php echo $feedPost["post_images"] ?>"
                                               href="https://via.placeholder.com/1600x900"
                                               data-demo-href="/images/media/posts/<?php echo $feedPost["post_images"] ?>">
                                                <img src="https://via.placeholder.com/1600x900"
                                                     data-demo-src="/images/media/posts/<?php echo $feedPost["post_images"] ?>"
                                                     alt="">
                                            </a>

                                            <div class="like-wrapper">
                                                <a href="javascript:void(0);"
                                                   data-item-id="<?php echo $feedPost["post_id"]; ?>"
                                                   data-item-owner="<?php echo $feedPost["post_owner_id"]; ?>"
                                                   class="like-button <?php echo $userLikes ? "is-active":  ""; ?>">
                                                    <i class="mdi mdi-heart not-liked bouncy"></i>
                                                    <i class="mdi mdi-heart is-liked bouncy"></i>
                                                    <span class="like-overlay"></span>
                                                </a>
                                            </div>

                                            <div class="fab-wrapper is-share">
                                                <a href="javascript:void(0);"
                                                   class="small-fab share-fab modal-trigger"
                                                   data-modal="share-modal">
                                                    <i data-feather="link-2"></i>
                                                </a>
                                            </div>

                                            <div class="fab-wrapper is-comment">
                                                <a href="javascript:void(0);" class="small-fab">
                                                    <i data-feather="message-circle"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <?php
                                    } else if (!empty(trim($feedPost["post_shared_link"])) && ($feedPost["post_type"] == "text")) {
                                        ?>
                                        <!--HIGHLIGHT::POST LINK PREVIEW-->
                                        <div class="post-link">

                                            <div
                                                    class="highlight-link"
                                                    id="post-link-id-<?php echo $feedPost["post_id"] ?>"
                                                    data-post-link-id="<?php echo $feedPost["post_id"] ?>"
                                                    data-shared-link="<?php echo $feedPost["post_shared_link"]; ?>"
                                                    onclick="initPreviewLink(this)">
                                            </div>

                                            <div class="like-wrapper">
                                                <a href="javascript:void(0);"
                                                   data-item-id="<?php echo $feedPost["post_id"]; ?>"
                                                   data-item-owner="<?php echo $feedPost["post_owner_id"]; ?>"
                                                   class="like-button <?php echo $userLikes ? "is-active":  ""; ?>">
                                                    <i class="mdi mdi-heart not-liked bouncy"></i>
                                                    <i class="mdi mdi-heart is-liked bouncy"></i>
                                                    <span class="like-overlay"></span>
                                                </a>
                                            </div>

                                            <div class="fab-wrapper is-share">
                                                <a href="javascript:void(0);"
                                                   class="small-fab share-fab modal-trigger"
                                                   data-modal="share-modal">
                                                    <i data-feather="link-2"></i>
                                                </a>
                                            </div>

                                            <div class="fab-wrapper is-comment">
                                                <a href="javascript:void(0);" class="small-fab">
                                                    <i data-feather="message-circle"></i>
                                                </a>
                                            </div>
                                            <!-- Post actions -->
                                        </div>
                                        <?php

                                    }

                                    if (($feedPost["post_type"] == "text") && empty(trim($feedPost["post_shared_link"]))) {
                                        //If Post is text based Post actions are supposed to be in their own position with a wrapper
                                        ?>
                                        <div class="post-actions">
                                            <!-- Post actions -->
                                            <!-- /partials/pages/feed/buttons/feed-post-actions.html -->
                                            <div class="like-wrapper">
                                                <a href="javascript:void(0);"
                                                   data-item-id="<?php echo $feedPost["post_id"]; ?>"
                                                   data-item-owner="<?php echo $feedPost["post_owner_id"]; ?>"
                                                   class="like-button <?php echo $userLikes ? "is-active":  ""; ?>">
                                                    <i class="mdi mdi-heart not-liked bouncy"></i>
                                                    <i class="mdi mdi-heart is-liked bouncy"></i>
                                                    <span class="like-overlay"></span>
                                                </a>
                                            </div>

                                            <div class="fab-wrapper is-share">
                                                <a href="javascript:void(0);"
                                                   class="small-fab share-fab modal-trigger"
                                                   data-modal="share-modal">
                                                    <i data-feather="link-2"></i>
                                                </a>
                                            </div>

                                            <div class="fab-wrapper is-comment">
                                                <a href="javascript:void(0);" class="small-fab">
                                                    <i data-feather="message-circle"></i>
                                                </a>
                                            </div>

                                        </div>

                                    <?php } ?>
                                </div>

                                <!-- /Post body -->


                                <!-- Post footer -->
                                <div class="card-footer">
                                    <!-- Followers -->

                                    <div class="likers-group">
                                        <?php
                                        $likeNamesArray = [];

                                        foreach ($allPostLikes as $liker) {
                                            $likeUser = $userObj->getUser($liker["user_id"])[0];
                                            array_push($liker[0], $likeNamesArray);

                                            isset($liker[1]) ? array_push($liker[1], $likeNamesArray) : 0;
                                            ?>
                                            <img src="https://via.placeholder.com/300x300"
                                                 data-demo-src="/images/profile-images/<?php echo $likeUser['user_image']; ?>"
                                                 data-user-popover="<?php echo $likeUser['user_no']; ?>"
                                                 alt="User Image">
                                        <?php } ?>
                                        <!--                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6" alt="">-->
                                    </div>
                                    <div class="likers-text">
                                        <p>
                                            <?php
                                            foreach ($likeNamesArray as $likeName) {
                                                $likeUserWIthNames = $userObj->getUser($liker["user_id"])[0];
                                                ?>
                                                <a href="/profile/main/<?php echo $likeUserWIthNames["user_id"]; ?>">
                                                    <?php echo $likeUserWIthNames["username"]; ?>
                                                </a>
                                            <?php } ?>
                                            <!--                                                        <a href="#">Elise</a>-->
                                        </p>
                                        <p> <?php echo empty($likeNamesArray) ? "" : "liked this"; ?></p>
                                    </div>

                                    <!-- Post statistics -->
                                    <div class="social-count">
                                        <div class="likes-count">
                                            <i data-feather="heart"></i>
                                            <span>
                                                <?php echo $postLikes; ?>
                                            </span>
                                        </div>
                                        <div class="shares-count">
                                            <i data-feather="link-2"></i>
                                            <span>
                                                0
                                            </span>
                                        </div>
                                        <div class="comments-count">
                                            <i data-feather="message-circle"></i>
                                            <span id="post-number-of-comments-<?php echo $feedPost["post_id"]; ?>">
                                                <?php
                                                echo $postNumberOfComments;
                                                ?>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Post footer -->
                            </div>
                            <!-- /Main wrap -->

                            <!-- Post #6 comments -->
                            <div class="comments-wrap is-hidden">
                                <!-- Header -->
                                <div class="comments-heading">
                                    <h4>
                                        Comments
                                        <small id="number-of-comments-<?php echo $feedPost["post_id"]; ?>"
                                               data-number-of-comments="<?php echo $postNumberOfComments; ?>">(<?php echo $postNumberOfComments; ?>
                                            )</small>
                                    </h4>
                                    <div class="close-comments">
                                        <i data-feather="x"></i>
                                    </div>
                                </div>
                                <!-- /Header -->
                                <div class="comments-body has-slimscroll">

                                    <?php if ($postNumberOfComments == 0) { ?>

                                        <!-- Comments body -->

                                        <div class="comments-placeholder empty-comment-placeholder add-other-comment-<?php echo $feedPost["post_id"]; ?>">
                                            <img src="assets/img/icons/feed/bubble.svg" alt="">
                                            <h3>Nothing in here yet</h3>
                                            <p>Be the first to post a comment.</p>
                                        </div>

                                    <?php } else {

                                        foreach ($allRootPostComments

                                                 as $postRootComment) {

                                            $postCommentLikes = $resourceObj->getItemLikes($postRootComment["comment_id"]);
                                            $postReplyComments = $commentObj->getAllReplyComments($feedPost["post_id"], $postRootComment["comment_id"]) ?? [];
                                            $postRootOwner = ($userObj->getUser($postRootComment["commentor_id"]))[0];
                                            $postReplyComments = is_bool($postReplyComments) ? [] : $postReplyComments;
                                            $hasUserLiked = $resourceObj->hasUserLikedItem($_SESSION["user_id"], $postRootComment["comment_id"]);

                                            ?>
                                            <div class="media is-comment add-other-comment-<?php echo $feedPost["post_id"]; ?>">

                                                <!-- User image -->
                                                <div class="media-left">
                                                    <div class="image">
                                                        <img src="https://via.placeholder.com/300x300"
                                                             data-demo-src="/images/profile-images/<?php echo $postRootOwner["user_image"]; ?>"
                                                             data-user-popover="<?php echo $postRootOwner["user_no"]; ?>"
                                                             alt="Commentor picture"/>
                                                    </div>
                                                </div>
                                                <!-- Media Content  -->
                                                <div class="media-content">

                                                    <a href="/profile/main/<?php echo $postRootComment["commentor_id"]; ?>">
                                                        <?php
                                                        echo $postRootOwner["user_fullname"];
                                                        ?>
                                                    </a>
                                                    <span class="time"><?php echo Utilities::elapsedTimeString($postRootComment["comment_date"]); ?></span>
                                                    <p>
                                                        <?php
                                                        echo $postRootComment["comment"];
                                                        ?>
                                                    </p>
                                                    <!-- Actions -->
                                                    <div class="controls">
                                                        <div class="like-count like-item <?php echo $hasUserLiked ? "liked" : "" ?>"
                                                             data-item-id="<?php echo $postRootComment["comment_id"]; ?>"
                                                             data-item-owner-id="<?php echo $postRootComment["commentor_id"]; ?>"
                                                        >
                                                            <i
                                                                    data-feather="thumbs-up">
                                                            </i>
                                                            <span id="like-count-<?php echo $postRootComment["comment_id"]; ?>"
                                                                  data-current-like-count="<?php echo $postCommentLikes ?>">
                                                            <?php
                                                            echo $postCommentLikes
                                                            ?>
                                                        </span>
                                                        </div>
                                                        <div class="reply">
                                                            <a
                                                                    class="reply-link"
                                                                    data-post-item-id="<?php echo $feedPost["post_id"]; ?>"
                                                                    data-comment-id="<?php echo $postRootComment["comment_id"]; ?>"
                                                                    data-comment-item-id="<?php echo $postRootComment["comment_id"]; ?>"
                                                            >
                                                                Reply
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <?php

                                                    foreach ($postReplyComments

                                                             as $replyComment) {
                                                        $commentorDetails = ($userObj->getUser($replyComment["commentor_id"]))[0];
                                                        $replyCommentLikes = $resourceObj->getItemLikes($replyComment["comment_id"]);

                                                        ?>
                                                        <div class="media is-comment">
                                                            <!-- User image -->
                                                            <div class="media-left">
                                                                <div class="image">
                                                                    <img src="https://via.placeholder.com/300x300"
                                                                         data-demo-src="/images/profile-images/<?php echo $commentorDetails["user_image"] ?>"
                                                                         data-user-popover="<?php echo $commentorDetails["user_no"]; ?>"
                                                                         alt="">
                                                                </div>
                                                            </div>
                                                            <!-- Content -->
                                                            <div class="media-content">
                                                                <a href="#"><?php echo $commentorDetails["user_fullname"]; ?></a>
                                                                <span class="time"><?php echo Utilities::elapsedTimeString($replyComment["comment_date"]); ?></span>
                                                                <p>
                                                                    <?php echo $replyComment["comment"]; ?>
                                                                </p>
                                                                <!-- Actions -->
                                                                <div class="controls">
                                                                    <div class="like-count">
                                                                        <i data-feather="thumbs-up"></i>
                                                                        <span>
                                                                        <?php
                                                                        echo $replyCommentLikes;
                                                                        ?>
                                                                    </span>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <a data-comment-reply-id="<?php echo $replyComment["comment_id"]; ?>">Reply</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Right side dropdown -->
                                                            <div class="media-right">
                                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                                                    <div>
                                                                        <div class="button">
                                                                            <i data-feather="more-vertical"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-menu" role="menu">
                                                                        <div class="dropdown-content">
                                                                            <?php if ($_SESSION["user_id"] == $replyComment["commentor_id"]) { ?>
                                                                                <a class="dropdown-item">
                                                                                    <div class="media">
                                                                                        <i data-feather="x"></i>
                                                                                        <div class="media-content">
                                                                                            <h3>Hide</h3>
                                                                                            <small>Hide this
                                                                                                comment.</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                                <div class="dropdown-divider"></div>
                                                                            <?php } ?>
                                                                            <a data-flagged-item-id="<?php echo $replyComment["comment_id"]; ?>"
                                                                               class="dropdown-item flag-item">
                                                                                <div class="media">
                                                                                    <i data-feather="flag"></i>
                                                                                    <div class="media-content">
                                                                                        <h3>Report</h3>
                                                                                        <small>Report this
                                                                                            comment.</small>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div id="reply-to-comment-<?php echo $postRootComment["comment_id"]; ?>"></div>
                                                </div>
                                                <!-- /Media Content  -->
                                                <!-- Media Right  -->
                                                <div class="media-right">
                                                    <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                                        <div>
                                                            <div class="button">
                                                                <i data-feather="more-vertical"></i>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-menu" role="menu">
                                                            <div class="dropdown-content">
                                                                <?php if ($_SESSION["user_id"] == $postRootComment["commentor_id"]) { ?>
                                                                    <a class="dropdown-item">
                                                                        <div class="media">
                                                                            <i data-feather="x"></i>
                                                                            <div class="media-content">
                                                                                <h3>Hide</h3>
                                                                                <small>Hide this comment.</small>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="dropdown-divider"></div>
                                                                <?php } ?>
                                                                <a href="#" class="dropdown-item">
                                                                    <div class="media">
                                                                        <i data-feather="flag"></i>
                                                                        <div class="media-content">
                                                                            <h3>Report</h3>
                                                                            <small>Report this comment.</small>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Media Right  -->
                                            </div>
                                            <?php
                                        }
                                        // Closing brace for Post Root

                                        ?>

                                        <?php

                                        //Closing brace for Post root comment
                                    }
                                    ?>
                                    <!-- Closing Tag for  -->
                                </div>
                                <!-- /Comments body -->

                                <!-- Comments footer -->
                                <div class="card-footer">
                                    <div class="media post-comment has-emojis">
                                        <!-- Textarea -->
                                        <div class="media-content">
                                            <div class="field">
                                                <p class="control">
                                                    <label for="post-comment-text-<?php echo $feedPost["post_id"]; ?>"></label>
                                                    <textarea
                                                            class="textarea comment-textarea post-comment-text-<?php echo $feedPost["post_id"]; ?>"
                                                            rows="5" placeholder="Write a comment..."></textarea>
                                                </p>
                                            </div>
                                            <!-- Additional actions -->
                                            <div class="actions">
                                                <div class="image is-32x32">
                                                    <img class="is-rounded"
                                                         src="https://via.placeholder.com/300x300"
                                                         data-demo-src="/images/profile-images/<?php echo $_SESSION["image"]; ?>"
                                                         data-user-popover="<?php echo $_SESSION["no"]; ?>"
                                                         alt="user image">
                                                </div>
                                                <div class="toolbar">
                                                    <div class="action is-auto">
                                                        <i data-feather="at-sign"></i>
                                                    </div>
                                                    <div class="action is-emoji">
                                                        <i data-feather="smile"></i>
                                                    </div>
                                                    <div class="action is-upload">
                                                        <i data-feather="camera"></i>

                                                        <!-- HIGHLIGHT:: REMOVE AN IMPLEMENT PICTURES BASED RESPONSES -->

                                                        <input disabled type="file">
                                                    </div>
                                                    <a data-post-item-id="<?php echo $feedPost["post_id"]; ?>"
                                                       data-post-owner-id="<?php echo $feedPost["post_owner_id"] ?>"
                                                       class="button is-solid primary-button add-comment-btn raised">Post
                                                        Comment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Comments footer -->
                            </div>
                            <!-- /Post #6 comments -->
                        </div>


                    <?php } ?>

                    <!-- Post 1 -->
                    <!-- /partials/pages/feed/posts/feed-post1.html -->
                    <!-- POST #1 -->
                    <div id="feed-post-1" class="card is-post">

                        <!-- Main wrap -->
                        <div class="content-wrap">

                            <!-- Post header -->
                            <div class="card-heading">

                                <!-- User meta -->
                                <div class="user-block">
                                    <div class="image">
                                        <img src="https://via.placeholder.com/300x300"
                                             data-demo-src="images/pages/logo.png" data-pages-popover="1" alt="">
                                    </div>
                                    <div class="user-info">
                                        <a href="#">nerdLibrary</a>
                                        <span class="time">July 26 2020, 01:03pm</span>
                                    </div>
                                </div>
                                <!-- Right side dropdown -->
                                <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                    <div>
                                        <div class="button">
                                            <i data-feather="more-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="bookmark"></i>
                                                    <div class="media-content">
                                                        <h3>Bookmark</h3>
                                                        <small>Add this post to your bookmarks.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="bell"></i>
                                                    <div class="media-content">
                                                        <h3>Notify me</h3>
                                                        <small>Send me the updates.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="flag"></i>
                                                    <div class="media-content">
                                                        <h3>Flag</h3>
                                                        <small>In case of inappropriate content.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Post header -->

                            <!-- Post body -->
                            <div class="card-body">
                                <!-- Post body text -->
                                <div class="post-text">
                                    <p>Welcome to NerdLibrary Feed Page by
                                        <a href="/pages/main">@NerdLibrary</a>
                                        Enjoy all the awesomeness NerdLibrary has
                                        to offer.
                                    </p>
                                </div>

                                <!-- Featured image -->
                                <div class="post-image">
                                    <a data-fancybox="post1" data-lightbox-type="comments"
                                       data-thumb="images/pages/logo.png"
                                       href="https://via.placeholder.com/1600x900"
                                       data-demo-href="images/pages/logo.png"
                                    >

                                        <img src="https://via.placeholder.com/1600x900"
                                             data-demo-src="images/pages/logo.png" alt="">
                                    </a>
                                    <!-- Action buttons -->

                                    <!-- /partials/pages/feed/buttons/feed-post-actions.html -->
                                    <div class="like-wrapper">
                                        <a href="javascript:void(0);" class="like-button">
                                            <i class="mdi mdi-heart not-liked bouncy"></i>
                                            <i class="mdi mdi-heart is-liked bouncy"></i>
                                            <span class="like-overlay"></span>
                                        </a>
                                    </div>

                                    <div class="fab-wrapper is-share">
                                        <a href="javascript:void(0);" class="small-fab share-fab modal-trigger"
                                           data-modal="share-modal">
                                            <i data-feather="link-2"></i>
                                        </a>
                                    </div>

                                    <div class="fab-wrapper is-comment">
                                        <a href="javascript:void(0);" class="small-fab">
                                            <i data-feather="message-circle"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Post body -->

                            <!-- Post footer -->
                            <div class="card-footer">
                                <!-- Followers avatars -->
                                <div class="likers-group">
                                    <img src="https://via.placeholder.com/300x300"
                                         data-demo-src="images/pages/logo.png" data-pages-popover="1" alt="">
                                
                                </div>
                                <!-- Followers text -->
                                <div class="likers-text">
                                    <p>
                                        <a href="#">Nerd</a>,
                                        <a href="#">Library</a>
                                    </p>
                                    <p>and 23 more liked this</p>
                                </div>
                                <!-- Post statistics -->
                                <div class="social-count">
                                    <div class="likes-count">
                                        <i data-feather="heart"></i>
                                        <span>-</span>
                                    </div>
                                    <div class="shares-count">
                                        <i data-feather="link-2"></i>
                                        <span>-</span>
                                    </div>
                                    <div class="comments-count">
                                        <i data-feather="message-circle"></i>
                                        <span>-</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /Post footer -->
                        </div>
                        <!-- /Main wrap -->

                        <!-- Post #1 Comments -->
                        <div class="comments-wrap is-hidden">
                            <!-- Header -->
                            <div class="comments-heading">
                                <h4>Comments
                                    <small>(8)</small>
                                </h4>
                                <div class="close-comments">
                                    <i data-feather="x"></i>
                                </div>
                            </div>
                            <!-- /Header -->

                            <!-- Comments body -->
                            <div class="comments-body has-slimscroll">

                                <!-- Comment -->
                                <div class="media is-comment">
                                    <!-- User image -->
                                    <div class="media-left">
                                        <div class="image">
                                            <img src="https://via.placeholder.com/300x300"
                                                 data-demo-src="images/pages/logo.png" data-pages-popover="1"
                                                 alt="">
                                        </div>
                                    </div>
                                    <!-- Content -->
                                    <div class="media-content">
                                        <a href="#">NerdLibrary</a>
                                        <span class="time">28 minutes ago</span>
                                        <p>We're so glad to have you herein nerdLibrary as part of our commuity.
                                        We have so much to share with you on the NerdLibrary page and here in your feed.
                                        Awesome Stuff is shared here so take advantage.</p>
                                        <!-- Actions -->
                                        <div class="controls">
                                            <div class="like-count">
                                                <i data-feather="thumbs-up"></i>
                                                <span>-</span>
                                            </div>
                                            <div class="reply">
                                                <a href="javascript:void(0);">Reply</a>
                                            </div>
                                            <div class="edit">
                                                <a href="javascript:void(0);">Edit</a>
                                            </div>
                                        </div>

                                        <!-- Nested Comment -->
                                        <div class="media is-comment">
                                            <!-- User image -->
                                            <div class="media-left">
                                                <div class="image">
                                                    <img src="https://via.placeholder.com/300x300"
                                                         data-demo-src="images/pages/logo.png"
                                                         data-user-popover="1" alt="">
                                                </div>
                                            </div>
                                            <!-- Content -->
                                            <div class="media-content">
                                                <a href="javascript:vois(0);">NerdlLibrary</a>
                                                <span class="time">15 minutes ago</span>
                                                <p>We're so glad to have you herein nerdLibrary as part of our commuity.
                                        We have so much to share with you on the NerdLibrary page and here in your feed.
                                        Awesome Stuff is shared here so take advantage.</p>
                                                <!-- Actions -->
                                                <div class="controls">
                                                    <div class="like-count">
                                                        <i data-feather="thumbs-up"></i>
                                                        <span>0</span>
                                                    </div>
                                                    <div class="reply">
                                                        <a href="javascript:void(0);">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Right side dropdown -->
                                            <div class="media-right">
                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                                    <div>
                                                        <div class="button">
                                                            <i data-feather="more-vertical"></i>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-menu" role="menu">
                                                        <div class="dropdown-content">
                                                            <a class="dropdown-item">
                                                                <div class="media">
                                                                    <i data-feather="x"></i>
                                                                    <div class="media-content">
                                                                        <h3>Hide</h3>
                                                                        <small>Hide this comment.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href="#" class="dropdown-item">
                                                                <div class="media">
                                                                    <i data-feather="flag"></i>
                                                                    <div class="media-content">
                                                                        <h3>Report</h3>
                                                                        <small>Report this comment.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Nested Comment -->
                                    </div>
                                    
                                    <!-- Right side dropdown -->
                                    <div class="media-right">
                                        <!-- /partials/pages/feed/dropdowns/comment-dropdown.html -->
                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                            <div>
                                                <div class="button">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="x"></i>
                                                            <div class="media-content">
                                                                <h3>Hide</h3>
                                                                <small>Hide this comment.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="flag"></i>
                                                            <div class="media-content">
                                                                <h3>Report</h3>
                                                                <small>Report this comment.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Comment -->
                            </div>
                            <!-- /Comments body -->

                            <!-- Comments footer -->
                            <div class="card-footer">
                                <div class="media post-comment has-emojis">
                                    <!-- Comment Textarea -->
                                    <div class="media-content">
                                        <div class="field">
                                            <p class="control">
                                                <textarea class="textarea comment-textarea" rows="5"
                                                          placeholder="Write a comment..."></textarea>
                                            </p>
                                        </div>
                                        <!-- Additional actions -->
                                        <div class="actions">
                                            <div class="image is-32x32">
                                                <img class="is-rounded" src="https://via.placeholder.com/300x300"
                                                     data-demo-src="images/pages/logo.png" data-user-popover="1"
                                                     alt="">
                                            </div>
                                            <div class="toolbar">
                                                <div class="action is-auto">
                                                    <i data-feather="at-sign"></i>
                                                </div>
                                                <div class="action is-emoji">
                                                    <i data-feather="smile"></i>
                                                </div>
                                                <div class="action is-upload">
                                                    <i data-feather="camera"></i>
                                                    <input type="file">
                                                </div>
                                                <a class="button is-solid primary-button raised">Post Comment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Comments footer -->
                        </div>
                        <!-- /Post #1 Comments -->
                    </div>
                    <!-- POST #1 -->

                    <!-- Load more posts -->
                    <div class=" load-more-wrap narrow-top has-text-centered">
                        <a href="javascript:void(0);" class="load-more-button">Load More</a>
                    </div>
                    <!-- /Load more posts -->

                </div>
                <!-- /Middle column -->

                <!-- Right side column -->
                <div class="column is-3">

                    <!-- Stories widget -->
                    <!-- /partials/widgets/stories-widget.html -->

                    <div class="card">
                        <div class="card-heading is-bordered">
                            <h4>Stories</h4>
                            <div class="dropdown is-spaced is-neutral is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="/stories" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="tv"></i>
                                                <div class="media-content">
                                                    <h3>Browse stories</h3>
                                                    <small>View all recent stories.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="/profile/settings" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="settings"></i>
                                                <div class="media-content">
                                                    <h3>Settings</h3>
                                                    <small>Access widget settings.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item remove-widget">
                                            <div class="media">
                                                <i data-feather="trash-2"></i>
                                                <div class="media-content">
                                                    <h3>Remove</h3>
                                                    <small>Removes this widget from your feed.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body no-padding">
                            <!-- Story block -->
                            <div class="story-block">
                                <a id="add-story-button" href="#" class="add-story">
                                    <i data-feather="plus"></i>
                                </a>
                                <div class="story-meta">
                                    <span>Add a new Story</span>
                                    <span>Share an image, a video or some text</span>
                                </div>
                            </div>
                            <?php

                            foreach ($allStories as $story) {

                                $storyOwner = ($userObj->getUser($story["story_owner_id"]))[0];
                                ?>

                                <!-- Story block -->
                                <div class="story-block">
                                    <div class="img-wrapper">
                                        <a href="javascript:void(0);" class="add-story">
                                            <img id="<?php echo $storyOwner["user_id"]; ?>"
                                                 src="https://via.placeholder.com/300x300" data-fancybox
                                                 href="/images/media/posts/<?php echo $story["story_media"] ?>"
                                                 data-demo-src="/images/profile-images/<?php echo $storyOwner["user_image"]; ?>"
                                                 alt="User image">
                                        </a>
                                    </div>
                                    <div class="story-meta">
                                        <span><?php echo $storyOwner["user_fullname"]; ?></span>
                                        <span><?php echo Utilities::elapsedTimeString($story["story_created_datetime"]); ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Birthday widget -->
                    <!-- /partials/widgets/birthday-widget.html -->
                    <div class="card is-birthday-card has-background-image"
                         data-background="assets/img/illustrations/cards/birthday-bg.svg">
                        <div class="card-heading">
                            <i data-feather="gift"></i>
                            <div class="dropdown is-spaced is-right dropdown-trigger is-light">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="clock"></i>
                                                <div class="media-content">
                                                    <h3>Remind me</h3>
                                                    <small>Remind me of this later today.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="message-circle"></i>
                                                <div class="media-content">
                                                    <h3>Message</h3>
                                                    <small>Send an automatic greeting message.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="trash-2"></i>
                                                <div class="media-content">
                                                    <h3>Remove</h3>
                                                    <small>Removes this widget from your feed.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            //                            print_r($friendBirthday);
                            foreach ($friendBirthday as $friend) {
                                $currentYearForBirthday = date("Y");

                                $currentYearBirthday = substr_replace($friend["user_dob"], $currentYearForBirthday, 0, 4);
                                $age = Utilities::elapsedTimeString($friend["user_dob"], $currentYearForBirthday, suffix: "");
                                $birthdayDate = new DateTime($currentYearBirthday);
                                $bornDate = new DateTime($friend["user_dob"]);
                                $stringDate = $birthdayDate->format("F");
                                $aage = date_diff($bornDate, $birthdayDate, true);

                                ?>
                                <div>
                                    <div class="birthday-avatar">
                                        <img src="https://via.placeholder.com/300x300"
                                             data-demo-src="/images/profile-images/<?php echo $friend["user_image"]; ?>"
                                             alt="User image">
                                        <div class="birthday-indicator">
                                            <?php echo $aage->y - 2; ?>
                                        </div>
                                    </div>
                                    <div class="birthday-content">
                                        <h4><?php echo (explode(" ", $friend["user_fullname"]))[0] ?>
                                            turns <?php echo $age . " " ?> <?php echo $currentYearBirthday == date("Y-m-d") ? "today" : " in " . $stringDate; ?> </h4>
                                        <p>Send your best wishes by leaving something on wall.</p>
                                        <button type="button" class="button light-button">Write Message</button>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--                    HIGHLIGHT::COME HERE-->
                    <!-- Suggested friends widget -->
                    <!-- /partials/widgets/suggested-friends-1-widget.html -->
                    <div class="card">
                        <div class="card-heading is-bordered">
                            <h4>Suggested Friends</h4>
                            <div class="dropdown is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="/friends/all" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="users"></i>
                                                <div class="media-content">
                                                    <h3>All Suggestions</h3>
                                                    <small>View all friend suggestions.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="/settings#friends" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="settings"></i>
                                                <div class="media-content">
                                                    <h3>Settings</h3>
                                                    <small>Access widget settings.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item remove-widget">
                                            <div class="media">
                                                <i data-feather="trash-2"></i>
                                                <div class="media-content">
                                                    <h3>Remove</h3>
                                                    <small>Removes this widget from your feed.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body no-padding">
                            <?php
                            foreach ($suggestedFriendships as $friendship) {
                                //Taking

                                $haveRelations = $relationObj->haveRelationshipYet($friendship["user_id"], $_SESSION["user_id"]);
                                //Only show the suggested people that the user doesn't already have a relationship with the user
                                if (!$haveRelations) {
                                    ;
                                    ?>
                                    <!-- Suggested friend -->
                                    <div class="add-friend-block transition-block">
                                        <img src="https://via.placeholder.com/300x300"
                                             data-demo-src="/images/profile-images/<?php echo $friendship["user_image"]; ?>"
                                             data-user-popover="<?php echo $friendship["user_no"]; ?>" alt="User image">
                                        <div class="page-meta">
                                            <span><?php echo $friendship["user_fullname"]; ?></span>
                                            <span><?php echo $friendship["user_country"]; ?></span>
                                        </div>
                                        <div data-user-id="<?php echo $friendship["user_id"]; ?>"
                                             class="add-friend add-transition">
                                            <i data-feather="user-plus"></i>
                                        </div>
                                    </div>

                                <?php }
                            } ?>
                        </div>
                    </div>
                    <!-- New job widget -->
                    <!-- /partials/widgets/new-job-widget.html -->
                    <div class="card is-new-job-card has-background-image"
                         data-background="assets/img/illustrations/cards/job-bg.svg">
                        <div class="card-heading">
                            <i data-feather="briefcase"></i>
                            <div class="dropdown is-spaced is-right dropdown-trigger is-light">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="clock"></i>
                                                <div class="media-content">
                                                    <h3>Remind me</h3>
                                                    <small>Remind me of this later today.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="message-circle"></i>
                                                <div class="media-content">
                                                    <h3>Message</h3>
                                                    <small>Send an automatic congratz message.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="trash-2"></i>
                                                <div class="media-content">
                                                    <h3>Remove</h3>
                                                    <small>Removes this widget from your feed.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="job-avatar">
                                    <img src="https://via.placeholder.com/300x300"
                                         data-demo-src="/assets/img/logo/logo.png" alt="">
                                </div>
                                <div class="job-content">
                                    <h4>NerdLibrary job opportunities!</h4>
                                    <p>Be on Alert on their site to get earliest job posts.</p>
                                    <button type="button" class="button light-button">Write Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Right side column -->
            </div>
        </div>
        <!-- /Feed page main wrapper -->
    </div>
    <!-- /Container -->

    <!-- Create group modal in compose card -->
    <!-- /partials/pages/feed/modals/create-group-modal.html -->
    <div id="create-group-modal" class="modal create-group-modal is-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>Create group</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <!-- Modal subheading -->
                <div class="subheading">
                    <!-- Group avatar -->
                    <div class="group-avatar">
                        <input id="group-avatar-upload" type="file">
                        <div class="add-photo">
                            <i data-feather="plus"></i>
                        </div>
                    </div>
                    <!-- Group name -->
                    <div class="control">
                        <input type="text" class="input" placeholder="Give the group a name">
                    </div>
                </div>
                <div class="card-body">
                    <div class="inner">
                        <div class="left-section">
                            <div class="search-subheader">
                                <div class="control">
                                    <input type="text" class="input" placeholder="Search for friends to add">
                                    <span class="icon">
                                                <i data-feather="search"></i>
                                            </span>
                                </div>
                            </div>
                            <div id="new-group-list" class="user-list has-slimscroll">

                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-1">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/dan.jpg" alt="">
                                    <div class="friend-name">Dan Walker</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-1">
                                            <label for="checkbox-group-1"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-2">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                                    <div class="friend-name">Daniel Wellington</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-2">
                                            <label for="checkbox-group-2"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-3">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/stella.jpg" alt="">
                                    <div class="friend-name">Stella Bergmann</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-3">
                                            <label for="checkbox-group-3"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-4">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/david.jpg" alt="">
                                    <div class="friend-name">David Kim</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-4">
                                            <label for="checkbox-group-4"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-5">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/nelly.png" alt="">
                                    <div class="friend-name">Nelly Schwartz</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-5">
                                            <label for="checkbox-group-5"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-6">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/elise.jpg" alt="">
                                    <div class="friend-name">Elise Walker</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-6">
                                            <label for="checkbox-group-6"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-7">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/bobby.jpg" alt="">
                                    <div class="friend-name">Bobby Brown</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-7">
                                            <label for="checkbox-group-7"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-8">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/lana.jpeg" alt="">
                                    <div class="friend-name">Lana Henrikssen</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-8">
                                            <label for="checkbox-group-8"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-9">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/gaelle.jpeg" alt="">
                                    <div class="friend-name">Gaelle Morris</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-9">
                                            <label for="checkbox-group-9"></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Friend -->
                                <div class="friend-block" data-ref="ref-10">
                                    <img class="friend-avatar" src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/mike.jpg" alt="">
                                    <div class="friend-name">Mike Lasalle</div>
                                    <div class="round-checkbox is-small">
                                        <div>
                                            <input type="checkbox" id="checkbox-group-10">
                                            <label for="checkbox-group-10"></label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="right-section has-slimscroll">
                            <div class="selected-count">
                                <span>Selected</span>
                                <span id="selected-friends-count">0</span>
                            </div>

                            <div id="selected-list" class="selected-list"></div>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="button is-solid grey-button close-modal">Cancel</button>
                    <button type="button" class="button is-solid accent-button close-modal">Create a Group</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Albums onboarding modal -->

    <!-- /partials/pages/feed/modals/albums-help-modal.html -->
    <div id="albums-help-modal" class="modal albums-help-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>Add Photos</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-block is-active">
                        <img src="assets/img/illustrations/cards/albums.svg" alt="">
                        <div class="help-text">
                            <h3>Manage your photos</h3>
                            <p>Lorem ipsum sit dolor amet is a dummy text used by the typography industry and the web
                                industry.</p>
                        </div>
                    </div>

                    <div class="content-block">
                        <img src="assets/img/illustrations/cards/upload.svg" alt="">
                        <div class="help-text">
                            <h3>Upload your photos</h3>
                            <p>Lorem ipsum sit dolor amet is a dummy text used by the typography industry and the web
                                industry.</p>
                        </div>
                    </div>

                    <div class="slide-dots">
                        <div class="dot is-active"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="action">
                        <button type="button" class="button is-solid accent-button next-modal raised"
                                data-modal="albums-modal">Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Album upload modal -->

    <!-- /partials/pages/feed/modals/albums-modal.html -->
    <div id="albums-modal" class="modal albums-modal is-xxl has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>New album</h3>
                    <div class="button is-solid accent-button fileinput-button">
                        <i class="mdi mdi-plus"></i>
                        Add pictures/videos
                    </div>

                    <!-- Close X button -->
                    <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="left-section">
                        <div class="album-form">
                            <div class="control">
                                <input type="text" class="input is-sm no-radius is-fade" placeholder="Album name">
                                <div class="icon">
                                    <i data-feather="camera"></i>
                                </div>
                            </div>
                            <div class="control">
                                <textarea class="textarea is-fade no-radius is-sm" rows="3"
                                          placeholder="describe your album ..."></textarea>
                            </div>
                            <div class="control">
                                <input type="text" class="input is-sm no-radius is-fade" placeholder="Place">
                                <div class="icon">
                                    <i data-feather="map-pin"></i>
                                </div>
                            </div>
                        </div>

                        <div id="album-date" class="album-date">
                            <div class="head">
                                <h4>Change the date</h4>
                                <button type="button" class="button is-solid dark-grey-button icon-button">
                                    <i data-feather="plus"></i>
                                </button>
                            </div>

                            <p>Set a date for your album. You can always change it later.</p>
                            <div class="control is-hidden">
                                <input id="album-datepicker" type="text" class="input is-sm is-fade"
                                       placeholder="Select a date">
                                <div class="icon">
                                    <i data-feather="calendar"></i>
                                </div>
                            </div>
                        </div>

                        <div id="tagged-in-album" class="tagged-in-album">
                            <div class="head">
                                <h4>Tag friends in this album</h4>
                                <button type="button" class="button is-solid dark-grey-button icon-button">
                                    <i data-feather="plus"></i>
                                </button>
                            </div>

                            <p>Tag friends in this album. Tagged friends can see photos they are tagged in.</p>
                            <div class="field is-autocomplete is-hidden">
                                <div class="control">
                                    <input id="create-album-friends-autocpl" type="text" class="input is-sm is-fade"
                                           placeholder="Search for friends">
                                    <div class="icon">
                                        <i data-feather="search"></i>
                                    </div>
                                </div>
                            </div>

                            <div id="album-tag-list" class="album-tag-list"></div>

                        </div>

                        <div class="shared-album">
                            <div class="head">
                                <h4>Allow friends to add photos</h4>
                                <div class="basic-checkbox">
                                    <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox"
                                           value="value1">
                                    <label for="styled-checkbox-1"></label>
                                </div>
                            </div>

                            <p>Tagged friends will be able to share content inside this album.</p>
                        </div>

                    </div>
                    <div class="right-section has-slimscroll">

                        <div class="modal-uploader">
                            <div id="actions" class="columns is-multiline no-mb">
                                <div class="column is-12">
                                        <span class="button has-icon is-solid grey-button fileinput-button">
                                                <i data-feather="plus"></i>
                                            </span>
                                    <button type="submit" class="button start is-hidden">
                                        <span>Upload</span>
                                    </button>
                                    <button type="reset" class="button is-solid grey-button cancel">
                                        <span>Clear all</span>
                                    </button>
                                    <span class="file-count">
                                                <span id="modal-uploader-file-count">0</span> file(s) selected
                                        </span>
                                </div>

                                <div class="column is-12 is-hidden">
                                    <!-- The global file processing state -->
                                    <div class="fileupload-process">
                                        <div id="total-progress" class="progress progress-striped active"
                                             role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;"
                                                 data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="columns is-multiline" id="previews">

                                <div id="template" class="column is-4 is-template">
                                    <div class="preview-box">
                                        <!-- This is used as the file preview template -->
                                        <div class="remove-button" data-dz-remove>
                                            <i class="mdi mdi-close"></i>
                                        </div>
                                        <div>
                                            <span class="preview"><img src="https://via.placeholder.com/120x120"
                                                                       data-dz-thumbnail alt=""/></span>
                                        </div>
                                        <div class="preview-body">
                                            <div class="item-meta">
                                                <div>
                                                    <p class="name" data-dz-name></p>
                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                </div>
                                                <small class="size" data-dz-size></small>
                                            </div>
                                            <div class="upload-item-progress">
                                                <div class="progress active" role="progressbar" aria-valuemin="0"
                                                     aria-valuemax="100" aria-valuenow="0">
                                                    <div class="progress-bar progress-bar-success"
                                                         data-dz-uploadprogress></div>
                                                </div>
                                            </div>
                                            <div class="upload-item-description">
                                                <div class="control">
                                                    <textarea class="textarea is-small is-fade no-radius" rows="4"
                                                              placeholder="Describe this photo ..."></textarea>
                                                </div>
                                            </div>
                                            <div class="upload-item-actions is-hidden">
                                                <button class="button start is-hidden">
                                                    <span>Start</span>
                                                </button>
                                                <button data-dz-remove class="button cancel is-hidden">
                                                    <span>Cancel</span>
                                                </button>
                                                <button data-dz-remove class="button delete is-hidden">
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <!-- Dropdown menu -->
                    <div class="dropdown is-up is-spaced is-modern is-neutral is-right dropdown-trigger">
                        <div>
                            <button class="button" aria-haspopup="true">
                                <i class="main-icon" data-feather="smile"></i>
                                <span>Friends</span>
                                <i class="caret" data-feather="chevron-down"></i>
                            </button>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="globe"></i>
                                        <div class="media-content">
                                            <h3>Public</h3>
                                            <small>Anyone can see this publication.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="users"></i>
                                        <div class="media-content">
                                            <h3>Friends</h3>
                                            <small>only friends can see this publication.</small>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="user"></i>
                                        <div class="media-content">
                                            <h3>Specific friends</h3>
                                            <small>Don't show it to some friends.</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item">
                                    <div class="media">
                                        <i data-feather="lock"></i>
                                        <div class="media-content">
                                            <h3>Only me</h3>
                                            <small>Only me can see this publication.</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="button is-solid accent-button close-modal">Create album</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Live video onboarding modal -->

    <!-- /partials/pages/feed/modals/videos-help-modal.html -->
    <div id="videos-help-modal" class="modal videos-help-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>Add Photos</h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="content-block is-active">
                        <img src="assets/img/illustrations/cards/videotrip.svg" alt="">
                        <div class="help-text">
                            <h3>Share live videos</h3>
                            <p>Lorem ipsum sit dolor amet is a dummy text used by the typography industry and the web
                                industry.</p>
                        </div>
                    </div>

                    <div class="content-block">
                        <img src="assets/img/illustrations/cards/videocall.svg" alt="">
                        <div class="help-text">
                            <h3>To build your audience</h3>
                            <p>Lorem ipsum sit dolor amet is a dummy text used by the typography industry and the web
                                industry.</p>
                        </div>
                    </div>

                    <div class="slide-dots">
                        <div class="dot is-active"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="action">
                        <button type="button" class="button is-solid accent-button next-modal raised"
                                data-modal="videos-modal">Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Live video modal -->

    <!-- /partials/pages/feed/modals/videos-modal.html -->
    <div id="videos-modal" class="modal videos-modal is-xxl has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3>Go live</h3>
                    <div id="stop-stream" class="button is-solid accent-button is-hidden" onclick="stopWebcam();">
                        <i class="mdi mdi-video-off"></i>
                        Stop stream
                    </div>
                    <div id="start-stream" class="button is-solid accent-button" onclick="startWebcam();">
                        <i class="mdi mdi-video"></i>
                        Start stream
                    </div>


                    <!-- Close X button -->
                    <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="inner">
                        <div class="left-section">
                            <div class="video-wrapper">
                                <div class="video-wrap">
                                    <div id="live-indicator" class="live is-vhidden">Live</div>
                                    <video id="video" width="400" height="240" controls autoplay></video>
                                </div>
                            </div>
                        </div>
                        <div class="right-section">
                            <div class="header">
                                <img src="https://via.placeholder.com/300x300"
                                     data-demo-src="assets/img/avatars/jenna.png" alt="">
                                <div class="user-meta">
                                    <span>Jenna Davis <small>is live</small></span>
                                    <span><small>right now</small></span>
                                </div>
                                <button type="button" class="button">Follow</button>
                                <div class="dropdown is-spaced is-right dropdown-trigger">
                                    <div>
                                        <div class="button">
                                            <i data-feather="more-vertical"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <div class="dropdown-item is-title">
                                                Who can see this ?
                                            </div>
                                            <a href="#" class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="globe"></i>
                                                    <div class="media-content">
                                                        <h3>Public</h3>
                                                        <small>Anyone can see this publication.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="users"></i>
                                                    <div class="media-content">
                                                        <h3>Friends</h3>
                                                        <small>only friends can see this publication.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-content">
                                                        <h3>Specific friends</h3>
                                                        <small>Don't show it to some friends.</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item">
                                                <div class="media">
                                                    <i data-feather="lock"></i>
                                                    <div class="media-content">
                                                        <h3>Only me</h3>
                                                        <small>Only me can see this publication.</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="inner-content">
                                <div class="control">
                                    <input type="text" class="input is-sm is-fade"
                                           placeholder="What is this live about?">
                                    <div class="icon">
                                        <i data-feather="activity"></i>
                                    </div>
                                </div>
                                <div class="live-stats">
                                    <div class="social-count">
                                        <div class="likes-count">
                                            <i data-feather="heart"></i>
                                            <span>0</span>
                                        </div>
                                        <div class="shares-count">
                                            <i data-feather="link-2"></i>
                                            <span>0</span>
                                        </div>
                                        <div class="comments-count">
                                            <i data-feather="message-circle"></i>
                                            <span>0</span>
                                        </div>
                                    </div>
                                    <div class="social-count ml-auto">
                                        <div class="views-count">
                                            <i data-feather="eye"></i>
                                            <span>0</span>
                                            <span class="views"><small>views</small></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="actions">
                                    <div class="action">
                                        <i data-feather="thumbs-up"></i>
                                        <span>Like</span>
                                    </div>
                                    <div class="action">
                                        <i data-feather="message-circle"></i>
                                        <span>Comment</span>
                                    </div>
                                    <div class="action">
                                        <i data-feather="link-2"></i>
                                        <span>Share</span>
                                    </div>
                                    <div class="dropdown is-spaced is-right dropdown-trigger">
                                        <div>
                                            <div class="avatar-button">
                                                <img src="https://via.placeholder.com/300x300"
                                                     data-demo-src="assets/img/avatars/jenna.png" alt="">
                                                <i data-feather="triangle"></i>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu has-margin" role="menu">
                                            <div class="dropdown-content">
                                                <a href="#" class="dropdown-item is-selected">
                                                    <div class="media">
                                                        <img src="https://via.placeholder.com/300x300"
                                                             data-demo-src="assets/img/avatars/jenna.png" alt="">
                                                        <div class="media-content">
                                                            <h3>Jenna Davis</h3>
                                                            <small>Interact as Jenna Davis.</small>
                                                        </div>
                                                        <div class="checkmark">
                                                            <i data-feather="check"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                                <hr class="dropdown-divider">
                                                <a href="#" class="dropdown-item">
                                                    <div class="media">
                                                        <img src="https://via.placeholder.com/478x344"
                                                             data-demo-src="assets/img/avatars/hanzo.svg" alt="">
                                                        <div class="media-content">
                                                            <h3>Css Ninja</h3>
                                                            <small>Interact as Css Ninja.</small>
                                                        </div>
                                                        <div class="checkmark">
                                                            <i data-feather="check"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs-wrapper">
                                <div class="tabs is-fullwidth">
                                    <ul>
                                        <li class="is-active">
                                            <a>Comments</a>
                                        </li>
                                        <li>
                                            <a>Upcoming</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content has-slimscroll">
                                    <div class="media is-comment">
                                        <figure class="media-left">
                                            <p class="image is-32x32">
                                                <img src="https://via.placeholder.com/300x300"
                                                     data-demo-src="assets/img/avatars/dan.jpg" alt=""
                                                     data-user-popover="1">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <div class="username">Dan Walker</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare
                                                magna
                                                eros.</p>
                                            <div class="comment-actions">
                                                <a href="javascript:void(0);" class="is-inverted">Like</a>
                                                <span>3h</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="media is-comment">
                                        <figure class="media-left">
                                            <p class="image is-32x32">
                                                <img src="https://via.placeholder.com/300x300"
                                                     data-demo-src="assets/img/avatars/david.jpg" alt=""
                                                     data-user-popover="4">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <div class="username">David Kim</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                                            <div class="comment-actions">
                                                <a href="javascript:void(0);" class="is-inverted">Like</a>
                                                <span>4h</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="media is-comment">
                                        <figure class="media-left">
                                            <p class="image is-32x32">
                                                <img src="https://via.placeholder.com/300x300"
                                                     data-demo-src="assets/img/avatars/rolf.jpg" alt=""
                                                     data-user-popover="17">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <div class="username">Rolf Krupp</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare
                                                magna
                                                eros. Consectetur adipiscing elit. Proin ornare magna eros.</p>
                                            <div class="comment-actions">
                                                <a href="javascript:void(0);" class="is-inverted">Like</a>
                                                <span>4h</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="comment-controls">
                                <div class="controls-inner">
                                    <img src="https://via.placeholder.com/300x300"
                                         data-demo-src="assets/img/avatars/jenna.png" alt="">
                                    <div class="control">
                                        <textarea class="textarea comment-textarea is-rounded" rows="1"></textarea>
                                        <button class="emoji-button">
                                            <i data-feather="smile"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <!-- Share from feed modal -->

    <!-- /partials/pages/feed/modals/share-modal.html -->
    <div id="share-modal" class="modal share-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <div class="dropdown is-primary share-dropdown">
                        <div>
                            <div class="button">
                                <i class="mdi mdi-format-float-left"></i> <span>Share in your feed</span> <i
                                        data-feather="chevron-down"></i>
                            </div>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-item" data-target-channel="feed">
                                    <div class="media">
                                        <i class="mdi mdi-format-float-left"></i>
                                        <div class="media-content">
                                            <h3>Share in your feed</h3>
                                            <small>Share this publication on your feed.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item" data-target-channel="friend">
                                    <div class="media">
                                        <i class="mdi mdi-account-heart"></i>
                                        <div class="media-content">
                                            <h3>Share in a friend's feed</h3>
                                            <small>Share this publication on a friend's feed.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item" data-target-channel="group">
                                    <div class="media">
                                        <i class="mdi mdi-account-group"></i>
                                        <div class="media-content">
                                            <h3>Share in a group</h3>
                                            <small>Share this publication in a group.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item" data-target-channel="page">
                                    <div class="media">
                                        <i class="mdi mdi-file-document-box"></i>
                                        <div class="media-content">
                                            <h3>Share in a page</h3>
                                            <small>Share this publication in a page.</small>
                                        </div>
                                    </div>
                                </div>
                                <hr class="dropdown-divider">
                                <div class="dropdown-item" data-target-channel="private-message">
                                    <div class="media">
                                        <i class="mdi mdi-email-plus"></i>
                                        <div class="media-content">
                                            <h3>Share in message</h3>
                                            <small>Share this publication in a private message.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Close X button -->
                    <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="share-inputs">
                    <div class="field is-autocomplete">
                        <div id="share-to-friend" class="control share-channel-control is-hidden">
                            <input id="share-with-friend" type="text"
                                   class="input is-sm no-radius share-input simple-users-autocpl"
                                   placeholder="Your friend's name">
                            <div class="input-heading">
                                Friend :
                            </div>
                        </div>
                    </div>

                    <div class="field is-autocomplete">
                        <div id="share-to-group" class="control share-channel-control is-hidden">
                            <input id="share-with-group" type="text"
                                   class="input is-sm no-radius share-input simple-groups-autocpl"
                                   placeholder="Your group's name">
                            <div class="input-heading">
                                Group :
                            </div>
                        </div>
                    </div>

                    <div id="share-to-page" class="control share-channel-control no-border is-hidden">
                        <div class="page-controls">
                            <div class="page-selection">

                                <div class="dropdown is-accent page-dropdown">
                                    <div>
                                        <div class="button page-selector">
                                            <img src="https://via.placeholder.com/150x150"
                                                 data-demo-src="assets/img/avatars/hanzo.svg" alt="">
                                            <span>Css Ninja</span> <i
                                                    data-feather="chevron-down"></i>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <div class="dropdown-item">
                                                <div class="media">
                                                    <img src="https://via.placeholder.com/150x150"
                                                         data-demo-src="assets/img/avatars/hanzo.svg" alt="">
                                                    <div class="media-content">
                                                        <h3>Css Ninja</h3>
                                                        <small>Share on Css Ninja.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="dropdown-item">
                                                <div class="media">
                                                    <img src="https://via.placeholder.com/150x150"
                                                         data-demo-src="assets/img/icons/logos/nuclearjs.svg" alt="">
                                                    <div class="media-content">
                                                        <h3>NuclearJs</h3>
                                                        <small>Share on NuclearJs.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="dropdown-item">
                                                <div class="media">
                                                    <img src="https://via.placeholder.com/150x150"
                                                         data-demo-src="assets/img/icons/logos/slicer.svg" alt="">
                                                    <div class="media-content">
                                                        <h3>Slicer</h3>
                                                        <small>Share on Slicer.</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="alias">
                                <img src="https://via.placeholder.com/150x150"
                                     data-demo-src="assets/img/avatars/jenna.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="field is-autocomplete">
                        <div id="share-to-private-message" class="control share-channel-control is-hidden">
                            <input id="share-with-private-message" type="text"
                                   class="input is-sm no-radius share-input simple-users-autocpl"
                                   placeholder="Message a friend">
                            <div class="input-heading">
                                To :
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="control">
                        <textarea class="textarea comment-textarea" rows="1"
                                  placeholder="Say something about this ..."></textarea>
                        <button class="emoji-button">
                            <i data-feather="smile"></i>
                        </button>
                    </div>
                    <div class="shared-publication">
                        <div class="featured-image">
                            <img id="share-modal-image" src="https://via.placeholder.com/1600x900"
                                 data-demo-src="assets/img/demo/unsplash/1.jpg" alt="">
                        </div>
                        <div class="publication-meta">
                            <div class="inner-flex">
                                <img id="share-modal-avatar" src="https://via.placeholder.com/300x300"
                                     data-demo-src="assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                                <p id="share-modal-text">Yesterday with <a href="#">@Karen Miller</a> and <a href="#">@Marvin
                                        Stemperd</a> at the
                                    <a href="#">#Rock'n'Rolla</a> concert in LA. Was totally fantastic! People were
                                    really
                                    excited about this one!
                                </p>
                            </div>
                            <div class="publication-footer">
                                <div class="stats">
                                    <div class="stat-block">
                                        <i class="mdi mdi-earth"></i>
                                        <small>Public</small>
                                    </div>
                                    <div class="stat-block">
                                        <i class="mdi mdi-eye"></i>
                                        <small>163 views</small>
                                    </div>
                                </div>
                                <div class="publication-origin">
                                    <small>Friendkit.io</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="bottom-share-inputs">

                    <div id="action-place" class="field is-autocomplete is-dropup is-hidden">
                        <div id="share-place" class="control share-bottom-channel-control">
                            <input type="text" class="input is-sm no-radius share-input simple-locations-autocpl"
                                   placeholder="Where are you?">
                            <div class="input-heading">
                                Location :
                            </div>
                        </div>
                    </div>

                    <div id="action-tag" class="field is-autocomplete is-dropup is-hidden">
                        <div id="share-tags" class="control share-bottom-channel-control">
                            <input id="share-friend-tags-autocpl" type="text" class="input is-sm no-radius share-input"
                                   placeholder="Who are you with">
                            <div class="input-heading">
                                Friends :
                            </div>
                        </div>
                        <div id="share-modal-tag-list" class="tag-list no-margin"></div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="action-wrap">
                        <div class="footer-action" data-target-action="tag">
                            <i class="mdi mdi-account-plus"></i>
                        </div>
                        <div class="footer-action" data-target-action="place">
                            <i class="mdi mdi-map-marker"></i>
                        </div>
                        <div class="footer-action dropdown is-spaced is-neutral dropdown-trigger is-up"
                             data-target-action="permissions">
                            <div>
                                <i class="mdi mdi-lock-clock"></i>
                            </div>
                            <div class="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <a href="#" class="dropdown-item">
                                        <div class="media">
                                            <i data-feather="globe"></i>
                                            <div class="media-content">
                                                <h3>Public</h3>
                                                <small>Anyone can see this publication.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item">
                                        <div class="media">
                                            <i data-feather="users"></i>
                                            <div class="media-content">
                                                <h3>Friends</h3>
                                                <small>only friends can see this publication.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item">
                                        <div class="media">
                                            <i data-feather="user"></i>
                                            <div class="media-content">
                                                <h3>Specific friends</h3>
                                                <small>Don't show it to some friends.</small>
                                            </div>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item">
                                        <div class="media">
                                            <i data-feather="lock"></i>
                                            <div class="media-content">
                                                <h3>Only me</h3>
                                                <small>Only me can see this publication.</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="button-wrap">
                        <button type="button" class="button is-solid dark-grey-button close-modal">Cancel</button>
                        <button type="button" class="button is-solid primary-button close-modal">Publish</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- No Stream modal -->

    <!-- /partials/pages/feed/modals/no-stream-modal.html -->
    <div id="no-stream-modal" class="modal no-stream-modal is-xsmall has-light-bg">
        <div class="modal-background"></div>
        <div class="modal-content">

            <div class="card">
                <div class="card-heading">
                    <h3></h3>
                    <!-- Close X button -->
                    <div class="close-wrap">
                            <span class="close-modal">
                                    <i data-feather="x"></i>
                                </span>
                    </div>
                </div>
                <div class="card-body has-text-centered">

                    <div class="image-wrap">
                        <img src="assets/img/illustrations/characters/no-stream.svg" alt="">
                    </div>

                    <h3>Streaming Disabled</h3>
                    <p>Streaming is not allowed from mobile web. Please use our mobile apps for mobile streaming.</p>

                    <div class="action">
                        <a href="index.php#demos-section" class="button is-solid accent-button raised is-fullwidth">Got
                            It</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Google places Lib -->

    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDRP6PxIu9AVlbHsbKqqxM1LnzCwD-ydok&amp;libraries=places"></script>
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

<?php include "includes/frontEnd/explore-menu.php"; ?>
<div id="end-tour-modal" class="modal end-tour-modal is-xsmall has-light-bg">
    <div class="modal-background"></div>
    <div class="modal-content">

        <div class="card">
            <div class="card-heading">
                <h3></h3>
                <!-- Close X button -->
                <div class="close-wrap">
                        <span class="close-modal">
                                <i data-feather="x"></i>
                            </span>
                </div>
            </div>
            <div class="card-body has-text-centered">

                <div class="image-wrap">
                    <img src="assets/img/logo/friendkit.svg" alt="">
                </div>

                <h3>That's all folks!</h3>
                <p>Thanks for taking the friendkit tour. There are still tons of other features for you to discover!</p>

                <div class="action">
                    <a href="index.php#demos-section"
                       class="button is-solid accent-button raised is-fullwidth">Explore</a>
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

<!-- Landing page js -->

<!-- Signup page js -->

<!-- Feed pages js -->
<script src="assets/js/feed.js"></script>

<script src="assets/js/webcam.js"></script>
<script src="assets/js/compose.js"></script>
<script src="assets/js/autocompletes.js"></script>
<script src="assets/js/resources.js"></script>


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


<!-- Mirrored from friendkit.cssninja.io/navbar-v1-feed.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 21:51:58 GMT -->
</html>