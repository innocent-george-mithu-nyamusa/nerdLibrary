<!DOCTYPE html>
<html lang="en">

<?php

use Classes\ActivityView;
use Classes\CategoryView;
use Classes\EpisodeView;
use Classes\PhotoView;
use Classes\UserPostView;
use Classes\ProgressTrackView;
use Classes\RelationshipView;
use Classes\SeriesView;
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
$activityObj = new ActivityView();
$photoObj = new PhotoView();


$mySeriesList = [];
?>

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> My Profile | NerdLibrary </title>
    <link rel="icon" type="image/png" href="/assets/img/logo/logo.png"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="assets/css/min/fontisto/fontisto-brands.min.css" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/core.css">
</head>
<body>

<!-- Pageloader -->
<div class="pageloader"></div>
<div class="infraloader is-active"></div>
<div class="app-overlay"></div>

<?php
include "includes/frontEnd/main-navbar.php";

if (!$utilityObj::isLoggedIn()) {
    header("Location: /");
}

$user = $userObj->getUser($_SESSION["user_id"]);
$allFriendShips = $relationObj->myFriendsShips($_SESSION["user_id"]);
$numberOfFriendInvitations = $relationObj->numberOfFriendInvitations($user[0]["user_id"]);
$allMyPhotos = $photoObj->getPhotos($user[0]["user_id"]);
$allMyVideoEpisodes = $episodeObj->allViewedEpisodes($user[0]["user_id"]) ?? [];

if(is_null($allFriendShips)) {
    $allFriendShips = [];
}

if ($_SESSION["role"] == 'user') {
    $mySeriesList = $seriesObj->myLearningSeries($_SESSION["user_id"]);
    $educationSeries = $seriesObj->myEducationSeries($_SESSION["user_id"]);
} else {
    $mySeriesList = $seriesObj->mySeries($_SESSION["user_id"]);
    $educationSeries = $seriesObj->myEducationSeries($_SESSION["user_id"]);
}

if (is_null($mySeriesList)) {
    $mySeriesList = [];
}

if(is_null($educationSeries)) {
    $educationSeries = [];
}


?>
<div class="view-wrapper">

    <!-- Container -->
    <div class="container is-custom">

        <!-- Profile page main wrapper -->
        <div id="profile-about" class="view-wrap is-headless">
            <?php include "includes/frontEnd/account-header.php"; ?>
            <div class="column">

                <!-- About sections -->
                <div class="profile-about side-menu">
                    <div class="left-menu">
                        <div class="left-menu-inner">
                            <div class="menu-item is-active" data-content="overview-content">
                                <div class="menu-icon">
                                    <i class="mdi mdi-progress-check"></i>
                                    <span>Overview</span>
                                </div>
                            </div>
                            <div class="menu-item" data-content="personal-content">
                                <div class="menu-icon">
                                    <i class="mdi mdi-apps"></i>
                                    <span>Personal Info</span>
                                </div>
                            </div>
                            <div class="menu-item" data-content="education-content">
                                <div class="menu-icon">
                                    <i class="mdi mdi-school"></i>
                                    <span>Education</span>
                                </div>
                            </div>
                            <div class="menu-item" data-content="job-content">
                                <div class="menu-icon">
                                    <i class="mdi mdi-briefcase-plus"></i>
                                    <span>Journey</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-content">
                        <div id="overview-content" class="content-section is-active">
                            <div class="columns">

                                <?php if (empty($mySeriesList)) { ?>
                                    <div class="column">
                                        <div class="about-summary">
                                            <div class="content">
                                                <h3><?php echo $_SESSION["role"] == "user" ? "No enrolled courses yet" : "No created courses created yet "; ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>

                                    <div class="column">
                                        <!-- Work block -->
                                        <?php
                                        foreach ($mySeriesList as $series) {

                                            $categorySeries = $categoriesObj->getCategory($series["series_category_id"]);
                                            ?>

                                            <div class="flex-block">
                                                <img src="https://via.placeholder.com/400x400"
                                                     data-demo-src="/images/series/<?php echo $series["series_image"]; ?>"
                                                     alt="" data-page-popover="4">
                                                <div class="flex-block-meta">
                                                    <span><?php echo $categorySeries["category_name"]; ?> <a><?php echo $series["series_name"]; ?></a></span>
                                                    <a href="/course-track/<?php echo $series["series_id"]; ?>"
                                                       class="action-link"><?php echo $_SESSION["role"] == "user" ? "You enrolled in this Course" : "You created this course"; ?></a>
                                                </div>
                                                <a href="/course-track/<?php echo $series["series_id"]; ?>" class="go-button">
                                                    <i data-feather="arrow-right"></i>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>

                                <?php } ?>
                                <div class="column">
                                    <div class="about-summary">
                                        <div class="content">
                                            <h3>About Me</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliter homines,
                                                aliter philosophos loqui putas oportere? Duo
                                                enim genera quae erant, fecit tria. Iubet igitur nos Pythius Apollo
                                                noscere nosmet ipsos. Hoc simile tandem est?
                                            </p>
                                            <p>Eam tum adesse, cum dolor omnis absit; Duo Reges: constructio
                                                interrete. </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--                            TODO:: FIX EDUCATION TO ADD COURSES GIVEN BY USER OR THE COURSES THEY TAKING -->
                        <div id="education-content" class="content-section">

                            <div id="education-glider" class="slider-timeline about-glider">
                                <?php

                                foreach ($educationSeries as $edSeries) {
                                    $seriesOwner = $userObj->getUser($edSeries["series_owner"]);
                                    $category = $categoriesObj->getCategory($edSeries["series_category_id"]);

                                    try {
                                        $episodeDate = new DateTime($edSeries["series_date"]);
                                        $episodeDate = $episodeDate->format("M Y");

                                    } catch (Exception $e) {
                                        echo "Failed to add date";
                                    }
                                    ?>
                                    <!--Timeline Item-->
                                    <div class="timeline-item">
                                        <div class="image-container">
                                            <img src="https://via.placeholder.com/800x600" alt=""
                                                 data-demo-src="/images/covers/<?php echo $edSeries["series_small_square_image"]; ?>">
                                            <div class="logo-container">
                                                <img src="https://via.placeholder.com/150x150" alt=""
                                                     data-demo-src="/images/profile-images/<?php echo $seriesOwner[0]["user_image"]; ?>"
                                                     data-page-popover="6">
                                            </div>
                                        </div>

                                        <h3>
                                            <?php
                                            echo $category["category_name"];
                                            ?></h3>
                                        <p><?php echo $edSeries["series_name"]; ?></p>
                                        <div class="more">
                                            <p><?php echo Utilities::truncate($edSeries["series_description_1"],70)?>.</p>
                                        </div>
                                        <div class="date">
                                            <?php echo $episodeDate; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <div id="slider-dots-education-glider" class="dots"></div>
                        </div>

                        <div id="job-content" class="content-section">
                            <!-- Timeline section -->
                            <div id="jobs-glider" class="slider-timeline about-glider">

                                <?php

                                foreach ($allMyVideoEpisodes as $videoEpisode){
                                    $series =  $seriesObj->getSeries($videoEpisode["episode_series_id"]);
                                    $episodeLecturer = $userObj->getUser($series["series_owner"])[0];
                                    $category = $categoriesObj->getCategory($videoEpisode["series_category_id"]);

                                    try {
                                        $episodeDate = new DateTime($edSeries["episode_premiered_date"]);
                                        $episodeDate = $episodeDate->format("M Y");

                                    } catch (Exception $e) {
                                        echo "Failed to add episode date";
                                    }
                                ?>
                                <!--Timeline Item-->
                                <div class="timeline-item">
                                    <div class="image-container">
                                        <img src="https://via.placeholder.com/800x600" alt=""
                                             data-demo-src="/images/covers/<?php echo $videoEpisode["episode_small_art_cover"]; ?>">
                                        <div class="logo-container">
                                            <img src="https://via.placeholder.com/150x150" alt=""
                                                 data-demo-src="/images/profile-images/<?php echo $episodeLecturer["user_image"]; ?>"
                                                 data-page-popover="<?php echo $episodeLecturer["user_no"]; ?>">
                                        </div>
                                    </div>
                                    <h3><?php echo $category["category_name"]; ?></h3>
                                    <p><?php echo $videoEpisode["episode_name"]; ?></p>

                                    <div class="more">
                                        <p><?php echo Utilities::truncate($videoEpisode["episode_description"],20)?></p>
                                    </div>
                                    <div class="date">
                                        <?php echo $episodeDate; ?>
                                    </div>
                                </div>

                                <?php } ?>
                                <!--Timeline Item-->
                                <div class="timeline-item">
                                    <div class="image-container">
                                        <img src="https://via.placeholder.com/800x600" alt=""
                                             data-demo-src="assets/img/demo/unsplash/popovers/pages/cssninja.png">
                                        <div class="logo-container">
                                            <img src="https://via.placeholder.com/150x150" alt=""
                                                 data-demo-src="assets/img/avatars/hanzo.svg" data-page-popover="5">
                                        </div>
                                    </div>
                                    <h3>Artistic Director</h3>
                                    <p>Css Ninja</p>
                                    <div class="more">
                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                    </div>
                                    <div class="date">
                                        Jan 2019
                                    </div>
                                </div>
                                <!--Timeline Item-->
                                <div class="timeline-item">
                                    <div class="image-container">
                                        <img src="https://via.placeholder.com/800x600" alt=""
                                             data-demo-src="assets/img/demo/unsplash/popovers/pages/lipflow.jpg">
                                        <div class="logo-container">
                                            <img src="https://via.placeholder.com/150x150" alt=""
                                                 data-demo-src="assets/img/icons/logos/lipflow.svg"
                                                 data-page-popover="9">
                                        </div>
                                    </div>
                                    <h3>Head of Sales</h3>
                                    <p>Lipflow</p>
                                    <div class="more">
                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                    </div>
                                    <div class="date">
                                        May 2018
                                    </div>
                                </div>
                                <!--Timeline Item-->
                                <div class="timeline-item">
                                    <div class="image-container">
                                        <img src="https://via.placeholder.com/800x600" alt=""
                                             data-demo-src="assets/img/demo/unsplash/popovers/pages/drop.jpg">
                                        <div class="logo-container">
                                            <img src="https://via.placeholder.com/150x150" alt=""
                                                 data-demo-src="assets/img/icons/logos/drop.svg" data-page-popover="10">
                                        </div>
                                    </div>
                                    <h3>Manager</h3>
                                    <p>Drop Cosmetics</p>
                                    <div class="more">
                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                    </div>
                                    <div class="date">
                                        Oct 2018
                                    </div>
                                </div>
                                <!--Timeline Item-->
                                <div class="timeline-item">
                                    <div class="image-container">
                                        <img src="https://via.placeholder.com/800x600" alt=""
                                             data-demo-src="assets/img/demo/unsplash/popovers/pages/imdb.jpg">
                                        <div class="logo-container">
                                            <img src="https://via.placeholder.com/150x150" alt=""
                                                 data-demo-src="assets/img/icons/logos/metamovies.svg"
                                                 data-page-popover="9">
                                        </div>
                                    </div>
                                    <h3>Intern</h3>
                                    <p>Metamovies</p>
                                    <div class="more">
                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                    </div>
                                    <div class="date">
                                        May 2018
                                    </div>
                                </div>
                                <!--Timeline Item-->
                                <div class="timeline-item">
                                    <div class="image-container">
                                        <img src="https://via.placeholder.com/800x600" alt=""
                                             data-demo-src="assets/img/demo/unsplash/popovers/pages/quick-fashion.jpg">
                                        <div class="logo-container">
                                            <img src="https://via.placeholder.com/150x150" alt=""
                                                 data-demo-src="assets/img/icons/logos/quick-fashion.svg"
                                                 data-page-popover="9">
                                        </div>
                                    </div>
                                    <h3>Intern</h3>
                                    <p>Quick Fashion</p>
                                    <div class="more">
                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                    </div>
                                    <div class="date">
                                        Feb 2018
                                    </div>
                                </div>
                                <!--Timeline Item-->
                                <div class="timeline-item">
                                    <div class="image-container">
                                        <img src="https://via.placeholder.com/800x600" alt=""
                                             data-demo-src="assets/img/demo/unsplash/popovers/pages/nuclearjs.jpg">
                                        <div class="logo-container">
                                            <img src="https://via.placeholder.com/150x150" alt=""
                                                 data-demo-src="assets/img/icons/logos/nuclearjs.svg"
                                                 data-page-popover="9">
                                        </div>
                                    </div>
                                    <h3>Intern</h3>
                                    <p>Nuclearjs</p>
                                    <div class="more">
                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                    </div>
                                    <div class="date">
                                        Jan 2018
                                    </div>
                                </div>
                            </div>

                            <div id="slider-dots-jobs-glider" class="dots"></div>
                        </div>
                        <!-- Personal tab -->
                        <div id="personal-content" class="content-section">
                            <!-- Friends about card -->
                            <div class="about-card">
                                <!-- Header -->
                                <div class="header">
                                    <div class="icon-title">
                                        <i class="mdi mdi-account-group"></i>
                                        <h3>Friends</h3>
                                    </div>
                                    <div class="actions">
                                        <div class="button-wrapper">
                                            <a class="button">Invitations</a>
                                            <div class="indicator">
                                                <span><?php

                                                    echo Utilities::friendsNumbers("$numberOfFriendInvitations");

                                                    ?></span>
                                            </div>
                                        </div>
                                        <!-- Dropdown -->
                                        <div class="dropdown is-spaced is-accent is-right dropdown-trigger">
                                            <div>
                                                <div class="button">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="smile"></i>
                                                            <div class="media-content">
                                                                <h3>Manage</h3>
                                                                <small>Manage your friend list.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="search"></i>
                                                            <div class="media-content">
                                                                <h3>Find friends</h3>
                                                                <small>Search for new friends.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="message-square"></i>
                                                            <div class="media-content">
                                                                <h3>Invites</h3>
                                                                <small>Search for new friends.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="eye"></i>
                                                            <div class="media-content">
                                                                <h3>View all</h3>
                                                                <small>View all friends.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="body">
                                    <div class="columns friends-columns is-multiline">
                                        <?php
                                        foreach ($allFriendShips as $friendShip) {

                                            if($friendShip["relation_user_id"]  == $_SESSION["user_id"] ) {
                                                $friendUser = $userObj->getUser($friendShip["relation_initiator_id"]);
                                            }else {
                                                $friendUser = $userObj->getUser($friendShip["relation_user_id"]);
                                            }

                                            $friendsNo = $relationObj->numberOfMutualFriendShips($user[0]["user_id"] ,$friendUser[0]["user_id"]);
                                            $friendsNo = "$friendsNo";

                                            ?>
                                            <!-- Friend -->
                                            <div class="column is-6">
                                                <div class="friend-small-card">
                                                    <img src="https://via.placeholder.com/150x150"
                                                         data-demo-src="/images/profile-images/<?php echo $friendUser[0]["user_image"]; ?>"
                                                         data-user-popover="<?php echo $friendUser[0]["user_no"] ?>" alt="">
                                                    <div class="meta">
                                                        <span><?php echo $friendUser[0]["user_fullname"]; ?></span>
                                                        <span><?php echo Utilities::friendsNumbers($friendsNo); ?> Friends</span>
                                                    </div>
                                                    <!-- Dropdown -->
                                                    <div class="dropdown is-spaced is-accent is-right dropdown-trigger">
                                                        <div>
                                                            <div class="button">
                                                                <i data-feather="more-vertical"></i>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-menu" role="menu">
                                                            <div class="dropdown-content">
                                                                <!--                                                                TODO::ADD ROUTE FOR PROFILE -->
                                                                <a href="#" class="dropdown-item">
                                                                    <div class="media">
                                                                        <i data-feather="user"></i>
                                                                        <div class="media-content">
                                                                            <h3>View Profile</h3>
                                                                            <small>Open this user profile.</small>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <a class="dropdown-item">
                                                                    <div class="media">
                                                                        <i data-feather="message-square"></i>
                                                                        <div class="media-content">
                                                                            <h3>Message</h3>
                                                                            <small>Send a message
                                                                                to <?php echo $user[0]["username"]; ?>
                                                                                .</small>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <hr class="dropdown-divider">
                                                                <a href="#" class="dropdown-item">
                                                                    <div class="media">
                                                                        <i data-feather="delete"></i>
                                                                        <div class="media-content">
                                                                            <h3>Unfriend</h3>
                                                                            <small>Remove from friend list.</small>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <!-- Friend -->
                                        <!--                                            <div class="column is-6">-->
                                        <!--                                                <div class="friend-small-card">-->
                                        <!--                                                    <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/mike.jpg" data-user-popover="12" alt="">-->
                                        <!--                                                    <div class="meta">-->
                                        <!--                                                        <span>Mike Lasalle</span>-->
                                        <!--                                                        <span>91 Friends</span>-->
                                        <!--                                                    </div>-->
                                        <!--                                                    Dropdown -->
                                        <!--                                                    <div class="dropdown is-spaced is-accent is-right dropdown-trigger">-->
                                        <!--                                                        <div>-->
                                        <!--                                                            <div class="button">-->
                                        <!--                                                                <i data-feather="more-vertical"></i>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                        <div class="dropdown-menu" role="menu">-->
                                        <!--                                                            <div class="dropdown-content">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="user"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>View Profile</h3>-->
                                        <!--                                                                            <small>Open this user profile.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <a class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="message-square"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Message</h3>-->
                                        <!--                                                                            <small>Send a message to this user.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <hr class="dropdown-divider">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="delete"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Unfriend</h3>-->
                                        <!--                                                                            <small>Remove from friend list.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                    </div>-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->
                                        <!-- Friend -->
                                        <!--                                            <div class="column is-6">-->
                                        <!--                                                <div class="friend-small-card">-->
                                        <!--                                                    <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/stella.jpg" data-user-popover="2" alt="">-->
                                        <!--                                                    <div class="meta">-->
                                        <!--                                                        <span>Stella Bergmann</span>-->
                                        <!--                                                        <span>547 Friends</span>-->
                                        <!--                                                    </div>-->
                                        <!--                                                    Dropdown -->
                                        <!--                                                    <div class="dropdown is-spaced is-accent is-right dropdown-trigger">-->
                                        <!--                                                        <div>-->
                                        <!--                                                            <div class="button">-->
                                        <!--                                                                <i data-feather="more-vertical"></i>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                        <div class="dropdown-menu" role="menu">-->
                                        <!--                                                            <div class="dropdown-content">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="user"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>View Profile</h3>-->
                                        <!--                                                                            <small>Open this user profile.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <a class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="message-square"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Message</h3>-->
                                        <!--                                                                            <small>Send a message to this user.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <hr class="dropdown-divider">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="delete"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Unfriend</h3>-->
                                        <!--                                                                            <small>Remove from friend list.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                    </div>-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->
                                        <!-- Friend -->
                                        <!--                                            <div class="column is-6">-->
                                        <!--                                                <div class="friend-small-card">-->
                                        <!--                                                    <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">-->
                                        <!--                                                    <div class="meta">-->
                                        <!--                                                        <span>David Kim</span>-->
                                        <!--                                                        <span>264 Friends</span>-->
                                        <!--                                                    </div>-->
                                        <!--                                                     Dropdown -->
                                        <!--                                                    <div class="dropdown is-spaced is-accent is-right dropdown-trigger">-->
                                        <!--                                                        <div>-->
                                        <!--                                                            <div class="button">-->
                                        <!--                                                                <i data-feather="more-vertical"></i>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                        <div class="dropdown-menu" role="menu">-->
                                        <!--                                                            <div class="dropdown-content">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="user"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>View Profile</h3>-->
                                        <!--                                                                            <small>Open this user profile.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <a class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="message-square"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Message</h3>-->
                                        <!--                                                                            <small>Send a message to this user.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <hr class="dropdown-divider">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="delete"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Unfriend</h3>-->
                                        <!--                                                                            <small>Remove from friend list.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                    </div>-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->
                                        <!-- Friend -->
                                        <!--                                            <div class="column is-6">-->
                                        <!--                                                <div class="friend-small-card">-->
                                        <!--                                                    <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6" alt="">-->
                                        <!--                                                    <div class="meta">-->
                                        <!--                                                        <span>Elise Walker</span>-->
                                        <!--                                                        <span>321 Friends</span>-->
                                        <!--                                                    </div>-->
                                        <!--                                                    Dropdown -->
                                        <!--                                                    <div class="dropdown is-spaced is-accent is-right dropdown-trigger">-->
                                        <!--                                                        <div>-->
                                        <!--                                                            <div class="button">-->
                                        <!--                                                                <i data-feather="more-vertical"></i>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                        <div class="dropdown-menu" role="menu">-->
                                        <!--                                                            <div class="dropdown-content">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="user"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>View Profile</h3>-->
                                        <!--                                                                            <small>Open this user profile.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <a class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="message-square"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Message</h3>-->
                                        <!--                                                                            <small>Send a message to this user.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <hr class="dropdown-divider">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="delete"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Unfriend</h3>-->
                                        <!--                                                                            <small>Remove from friend list.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                    </div>-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->
                                        <!-- Friend -->
                                        <!--                                            <div class="column is-6">-->
                                        <!--                                                <div class="friend-small-card">-->
                                        <!--                                                    <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/milly.jpg" data-user-popover="7" alt="">-->
                                        <!--                                                    <div class="meta">-->
                                        <!--                                                        <span>Milly Augustine</span>-->
                                        <!--                                                        <span>264 Friends</span>-->
                                        <!--                                                    </div>-->
                                        <!--                                                    Dropdown -->
                                        <!--                                                    <div class="dropdown is-spaced is-accent is-right dropdown-trigger">-->
                                        <!--                                                        <div>-->
                                        <!--                                                            <div class="button">-->
                                        <!--                                                                <i data-feather="more-vertical"></i>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                        <div class="dropdown-menu" role="menu">-->
                                        <!--                                                            <div class="dropdown-content">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="user"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>View Profile</h3>-->
                                        <!--                                                                            <small>Open this user profile.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <a class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="message-square"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Message</h3>-->
                                        <!--                                                                            <small>Send a message to this user.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                                <hr class="dropdown-divider">-->
                                        <!--                                                                <a href="#" class="dropdown-item">-->
                                        <!--                                                                    <div class="media">-->
                                        <!--                                                                        <i data-feather="delete"></i>-->
                                        <!--                                                                        <div class="media-content">-->
                                        <!--                                                                            <h3>Unfriend</h3>-->
                                        <!--                                                                            <small>Remove from friend list.</small>-->
                                        <!--                                                                        </div>-->
                                        <!--                                                                    </div>-->
                                        <!--                                                                </a>-->
                                        <!--                                                            </div>-->
                                        <!--                                                        </div>-->
                                        <!--                                                    </div>-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->

                                    </div>
                                </div>
                            </div>

                            <!-- Photos about card -->
                            <div class="about-card">
                                <!-- Header -->
                                <div class="header">
                                    <div class="icon-title">
                                        <i class="mdi mdi-camera"></i>
                                        <h3>Photos</h3>
                                    </div>
                                    <div class="actions">
                                        <div class="button-wrapper">
                                            <a class="button">Albums</a>
                                        </div>
                                        <!-- Dropdown -->
                                        <div class="dropdown is-spaced is-accent is-right dropdown-trigger">
                                            <div>
                                                <div class="button">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="user"></i>
                                                            <div class="media-content">
                                                                <h3>Of Me</h3>
                                                                <small>View pictures of me.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="users"></i>
                                                            <div class="media-content">
                                                                <h3>With Me</h3>
                                                                <small>View pictures with me.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="upload-cloud"></i>
                                                            <div class="media-content">
                                                                <h3>Upload</h3>
                                                                <small>Upload pictures from computer.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="plus"></i>
                                                            <div class="media-content">
                                                                <h3>Create Album</h3>
                                                                <small>Create a new album.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="image"></i>
                                                            <div class="media-content">
                                                                <h3>View all</h3>
                                                                <small>View all photos.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="body has-flex-list">
                                    <!-- Photos -->
                                    <div class="photo-list">

                                        <?php foreach ($allMyPhotos as $photo){ ?>

                                        <!-- Photo item -->
                                        <div class="photo-wrapper">
                                            <div class="photo-overlay"></div>
                                            <div class="small-like">
                                                <div class="inner">
                                                    <div class="like-overlay"></div>
                                                    <i data-feather="heart"></i>
                                                </div>
                                            </div>
                                            <img src="https://via.placeholder.com/400x400"
                                                 data-demo-src="/images/media/posts/<?php echo $photo["photo_name"]; ?>" alt="Photo ">
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                            <!-- Videos about card -->
                            <div class="about-card">
                                <!-- Header -->
                                <div class="header">
                                    <div class="icon-title">
                                        <i class="mdi mdi-video"></i>
                                        <h3>Videos</h3>
                                    </div>
                                    <div class="actions">
                                        <div class="button-wrapper">
                                            <a class="button">All Videos</a>
                                        </div>
                                        <!-- Dropdown -->
                                        <div class="dropdown is-spaced is-accent is-right dropdown-trigger">
                                            <div>
                                                <div class="button">
                                                    <i data-feather="more-vertical"></i>
                                                </div>
                                            </div>
                                            <div class="dropdown-menu" role="menu">
                                                <div class="dropdown-content">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="edit-3"></i>
                                                            <div class="media-content">
                                                                <h3>Manage</h3>
                                                                <small>Manage your videos.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="plus"></i>
                                                            <div class="media-content">
                                                                <h3>Upload</h3>
                                                                <small>Upload a new video.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="settings"></i>
                                                            <div class="media-content">
                                                                <h3>Settings</h3>
                                                                <small>Open video settings.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="body has-flex-list">
                                    <!-- Videos -->
                                    <div class="video-list">
                                        <!-- Video item -->
                                        <div class="video-wrapper">
                                            <div class="video-overlay"></div>
                                            <div class="video-length">02:32</div>
                                            <div class="small-like">
                                                <div class="inner">
                                                    <div class="like-overlay"></div>
                                                    <i data-feather="heart"></i>
                                                </div>
                                            </div>
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/profile/about/videos/1.jpg" alt="">
                                            <div class="video-button" data-video-id="LTrzSSf0YlA">
                                                <img src="assets/img/icons/video/play.svg" alt="">
                                            </div>
                                        </div>
                                        <!-- Video item -->
                                        <div class="video-wrapper">
                                            <div class="video-overlay"></div>
                                            <div class="video-length">00:49</div>
                                            <div class="small-like">
                                                <div class="inner">
                                                    <div class="like-overlay"></div>
                                                    <i data-feather="heart"></i>
                                                </div>
                                            </div>
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/profile/about/videos/2.jpg" alt="">
                                            <div class="video-button">
                                                <img src="assets/img/icons/video/play.svg" alt="">
                                            </div>
                                        </div>
                                        <!-- Video item -->
                                        <div class="video-wrapper">
                                            <div class="video-overlay"></div>
                                            <div class="video-length">01:27</div>
                                            <div class="small-like">
                                                <div class="inner">
                                                    <div class="like-overlay"></div>
                                                    <i data-feather="heart"></i>
                                                </div>
                                            </div>
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/profile/about/videos/3.jpg" alt="">
                                            <div class="video-button">
                                                <img src="assets/img/icons/video/play.svg" alt="">
                                            </div>
                                        </div>
                                        <!-- Video item -->
                                        <div class="video-wrapper">
                                            <div class="video-overlay"></div>
                                            <div class="video-length">12:32</div>
                                            <div class="small-like">
                                                <div class="inner">
                                                    <div class="like-overlay"></div>
                                                    <i data-feather="heart"></i>
                                                </div>
                                            </div>
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/profile/about/videos/4.jpg" alt="">
                                            <div class="video-button">
                                                <img src="assets/img/icons/video/play.svg" alt="">
                                            </div>
                                        </div>
                                        <!-- Video item -->
                                        <div class="video-wrapper">
                                            <div class="video-overlay"></div>
                                            <div class="video-length">03:41</div>
                                            <div class="small-like">
                                                <div class="inner">
                                                    <div class="like-overlay"></div>
                                                    <i data-feather="heart"></i>
                                                </div>
                                            </div>
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/profile/about/videos/5.jpg" alt="">
                                            <div class="video-button">
                                                <img src="assets/img/icons/video/play.svg" alt="">
                                            </div>
                                        </div>
                                        <!-- Video item -->
                                        <div class="video-wrapper">
                                            <div class="video-overlay"></div>
                                            <div class="video-length">01:13</div>
                                            <div class="small-like">
                                                <div class="inner">
                                                    <div class="like-overlay"></div>
                                                    <i data-feather="heart"></i>
                                                </div>
                                            </div>
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/profile/about/videos/6.jpg" alt="">
                                            <div class="video-button">
                                                <img src="assets/img/icons/video/play.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Places about card -->
                            <div class="about-card">
                                <!-- Header -->
                                <div class="header">
                                    <div class="icon-title">
                                        <i class="mdi mdi-map-outline"></i>
                                        <h3>Places</h3>
                                    </div>
                                    <div class="actions">
                                        <div class="button-wrapper">
                                            <a class="button">View All</a>
                                        </div>
                                        <!-- Dropdown -->
                                        <div class="dropdown is-spaced is-accent is-right dropdown-trigger">
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
                                                                <h3>Recent</h3>
                                                                <small>Show recent places.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="map-pin"></i>
                                                            <div class="media-content">
                                                                <h3>Visited</h3>
                                                                <small>Show visited places.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <hr class="dropdown-divider">
                                                    <a href="#" class="dropdown-item">
                                                        <div class="media">
                                                            <i data-feather="plus"></i>
                                                            <div class="media-content">
                                                                <h3>Add</h3>
                                                                <small>Add a new place.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="body has-flex-list">
                                    <!-- Places -->
                                    <div class="place-list">
                                        <!-- Place item -->
                                        <div class="place-wrapper">
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/unsplash/places/16.jpg" alt="">
                                            <div class="foot">
                                                <a href="#" class="place-name">Melbourne</a>
                                                <div class="rating">
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Place item -->
                                        <div class="place-wrapper">
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/unsplash/places/17.jpg" alt="">
                                            <div class="foot">
                                                <a href="#" class="place-name">Dany's Burgers</a>
                                                <div class="rating">
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Place item -->
                                        <div class="place-wrapper">
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/unsplash/places/18.jpg" alt="">
                                            <div class="foot">
                                                <a href="#" class="place-name">Vethnics Fashion</a>
                                                <div class="rating">
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Place item -->
                                        <div class="place-wrapper">
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/unsplash/places/19.jpg" alt="">
                                            <div class="foot">
                                                <a href="#" class="place-name">The Smoothie Bar</a>
                                                <div class="rating">
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Place item -->
                                        <div class="place-wrapper">
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/unsplash/places/20.jpg" alt="">
                                            <div class="foot">
                                                <a href="#" class="place-name">Eiffel Tower</a>
                                                <div class="rating">
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Place item -->
                                        <div class="place-wrapper">
                                            <img src="https://via.placeholder.com/800x600"
                                                 data-demo-src="assets/img/demo/unsplash/places/21.jpg" alt="">
                                            <div class="foot">
                                                <a href="#" class="place-name">Lennie's Fair</a>
                                                <div class="rating">
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                    <i class="is-checked" data-feather="star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include "includes/frontEnd/profile-modals.php"; ?>
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
                    <img src="https://via.placeholder.com/300x300" data-demo-src="images/profile-images/student.jpeg"
                         alt="">
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
                                F
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
<script src="/assets/js/profile.js"></script>

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
</html>