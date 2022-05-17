<!DOCTYPE html>
<html lang="en">
<?php

use Classes\ActivityView;
use Classes\CategoryView;
use Classes\ChapterView;
use Classes\EnrollmentsView;
use Classes\EpisodeView;
use Classes\ProgressTrackView;
use Classes\RelationshipView;
use Classes\SeriesView;
use Classes\UserPostView;
use Classes\UserView;
use Classes\Utilities;

//TODO:: ADD TABS FUNCTIONALITY

include "vendor/autoload.php";

if (!isset($_GET["sId"])) {
    header("Location: explore");
}

$utility = new Utilities();

if ($utility::isLoggedIn()) {
    header("Location: .");
}

$seriesObj = new SeriesView();
$episodeObj = new EpisodeView();
$categoryObj = new CategoryView();
$userObj = new UserView();
$enrollmentObj = new EnrollmentsView();
$chapterObj = new ChapterView();
$progressObj = new ProgressTrackView();
$relationObj = new RelationshipView();
$postObj = new UserPostView();
$activityObj = new ActivityView();



$series = $seriesObj->getSeries($_GET["sId"]);
$numberOfEpisodes = $episodeObj->getNumberOfEpisodesInSeries($series["series_id"]);
$category = $categoryObj->getCategory($series["series_category_id"]);
$lecturer = ($userObj->getUser($series["series_owner"]))[0];
$allEnrolledStudents = $enrollmentObj->getNumberOfStudentsForCourse($series["series_id"], $series["series_owner"]);
$allChapters = $chapterObj->getChaptersInSeries($series["series_id"]);

if (is_array($allChapters)) {
    $firstEpisodeId = ($episodeObj->fewChapterEpisodes($allChapters[0]["chapter_id"]))[0]["episode_id"] ?? 0;
    $introVideo = ($episodeObj->fewChapterEpisodes($allChapters[0]["chapter_id"]))[0]["episode_url"] ?? "dress.mp4";
}

$seriesCoverImages = explode(',', $series["series_cover_image"]);

?>
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> <?php echo $series["series_name"]; ?> | NerdLibrary</title>
    <link rel="icon" type="image/png" href="/assets/img/logo/logo.png"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/core.css">
</head>

<body class="is-white">

<!-- Pageloader -->
<div class="pageloader"></div>
<div class="infraloader is-active"></div>
<div class="app-overlay"></div>

<?php
include "includes/frontEnd/main-navbar.php";
$enrolledInCourse = $enrollmentObj->isEnrolled($_SESSION["user_id"], $series["series_id"]);
$subscriptionCovers  = $utility->subscriptionCovers($series["series_account"]);

?>

<div class="view-wrapper is-full">

    <div class="videos-wrapper is-home">


        <div class="videos-sidebar is-active">
            <div class="videos-sidebar-inner">
                <div class="user-block">
                    <a class="close-videos-sidebar">
                        <i data-feather="x"></i>
                    </a>
                    <div class="avatar-wrap">
                        <img src="https://via.placeholder.com/150x150"
                             data-demo-src="/images/profile-images/<?php echo $lecturer['user_image']; ?>"
                             data-user-popover="0" alt="">
                        <div class="badge">
                            <i data-feather="check"></i>
                        </div>
                    </div>
                    <h4><?php echo $lecturer["user_fullname"]; ?></h4>
                    <p><?php echo $lecturer["user_country"]; ?>, <?php echo $lecturer["user_town"]; ?></p>
                    <div class="user-stats">
                        <div class="stat-block">
                            <span>Episodes</span>
                            <span><?php echo $numberOfEpisodes; ?></span>
                        </div>
                        <div class="stat-block">
                            <span>Students</span>
                            <span><?php echo $allEnrolledStudents; ?></span>
                        </div>
                    </div>
                </div>
                <div class="user-menu">
                    <div class="user-menu-inner has-slimscroll">
                        <?php if ($subscriptionCovers == "true") { ?>
                            <div class="menu-block">
                                <ul>
                                    <li class="is-active">
                                        <a href="">
                                            <i data-feather="youtube"></i>
                                            <span>Overview</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../course-library/<?php echo $series["series_id"]; ?>">
                                            <i data-feather="copy"></i>
                                            <span>Library</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../course-library/completed/<?php echo $series["series_id"]; ?>">
                                            <i data-feather="cast"></i>
                                            <span>Completed Episodes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../course-library/incompleted/<?php echo $series["series_id"]; ?>">
                                            <i data-feather="film"></i>
                                            <span>Incomplete Episodes</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="separator"></div>
                        <?php } ?>
                        <div class="menu-block">
                            <ul>
                                <?php if ($subscriptionCovers == "true"){ ?>
                                    <li>
                                        <a href="../course-library/liked/<?php echo $series["series_id"]; ?>">
                                            <i data-feather="thumbs-up"></i>
                                            <span>Liked Videos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../course-library/watch-later/<?php echo $series["series_id"]; ?>">
                                            <i data-feather="watch"></i>
                                            <span>Watch Later</span>
                                        </a>
                                    </li>
                                <?php }else { ?>
                                <li>
                                    <a href="<?php echo $utility->userPaymentLink($series["series_account"]); ?>"  target="_blank">
                                        <i data-feather="check-square"></i>
                                        <span>Pay Subscription</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="separator"></div>
                        <div class="menu-block">
                            <ul>
                                <li>
                                    <a href="../settings">
                                        <i data-feather="sliders"></i>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i data-feather="life-buoy"></i>
                                        <span>Help & Support</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Homepage content -->
        <div class="home-wrapper">
            <a class="mobile-sidebar-trigger">
                <i data-feather="menu"></i>
            </a>

            <!-- Wrapper -->
            <div class="video-header-wrap">

                <div class="video-header-outer">
                    <div class="video-header">
                        <!-- Image -->
                        <img class="cover" src="https://via.placeholder.com/1920x1080"
                             data-demo-src="/images/covers/<?php echo $seriesCoverImages[0]; ?>" alt="">
                        <!-- Overlay -->
                        <div class="cover-overlay"></div>
                        <!-- Caption -->
                        <div class="cover-caption">
                            <div class="caption-inner">
                                <div class="video-caption">
                                    <div class="caption-block">
                                        <h2><?php echo $series["series_name"]; ?></h2>
                                        <div class="video-meta">
                                            <span>CCO</span>
                                            <span><?php echo $category["category_name"]; ?></span>
                                            <span class="rating">
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                </span>
                                        </div>
                                        <p class="description">
                                            <?php echo Utilities::truncate($series["series_description_1"], 140); ?>
                                        </p>
                                        <?php
                                        if ($subscriptionCovers == "true") {

                                            if ($enrolledInCourse) {
                                                ?>
                                                <div class="caption-actions">
                                                    <a href="/watch/<?php echo $firstEpisodeId; ?>"
                                                       id="start-watching-btn-1"
                                                       class="button is-solid accent-button is-rounded">
                                                        Start Watching
                                                    </a>
                                                    <a data-fancybox="" data-src="/resources/episodes/<?php echo $introVideo;?>" class="trailer-button">
                                                        <i data-feather="play"></i>
                                                        <span>Watch Intro</span>
                                                    </a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="caption-actions">
                                                    <a value="<?php echo $series["series_id"]; ?>"
                                                       cust-first-lecture="<?php echo isset($firstEpisodeId) ? $firstEpisodeId : 0; ?>"
                                                       id="enrollment-btn"
                                                       class="button is-solid accent-button is-rounded">
                                                        Start On Track
                                                    </a>
                                                    <a data-fancybox="" data-src="/resources/episodes/<?php echo $introVideo; ?>" class="trailer-button">
                                                        <i data-feather="play"></i>
                                                        <span>Watch Intro</span>
                                                    </a>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <div class="caption-actions">
                                                <a
                                                   data-success-url="<?php echo $utility->userPaymentLink($series["series_account"]); ?>"
                                                   data-subscription="<?php echo$series["series_account"]; ?>"
                                                   data-subscriber-id="<?php echo $_SESSION["user_id"]; ?>"
                                                   class="button is-solid accent-button is-rounded add-subscription">
                                                    Pay Subscription
                                                </a>
                                                <a data-fancybox id="morphing" data-src="#morphing-content"
                                                   class="trailer-button">
                                                    <i data-feather="pen-tool"></i>
                                                    <span>Description</span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="video-header-outer">
                    <div class="video-header">
                        <!-- Image -->
                        <img class="cover" src="https://via.placeholder.com/1920x1080"
                             data-demo-src="/images/covers/<?php echo $seriesCoverImages[1]; ?>" alt="">
                        <!-- Overlay -->
                        <div class="cover-overlay"></div>
                        <!-- Caption -->
                        <div class="cover-caption">
                            <div class="caption-inner">
                                <div class="video-caption">
                                    <div class="caption-block">
                                        <h2><?php echo $series["series_name"]; ?></h2>
                                        <div class="video-meta">
                                            <span>CCO</span>
                                            <span><?php echo $category["category_name"]; ?></span>
                                            <span class="rating">
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                </span>
                                        </div>
                                        <p class="description">
                                            <?php echo Utilities::truncate($series["series_description_2"], 140); ?>
                                        </p>
                                        <?php
                                        if ($subscriptionCovers == "true") {

                                            if ($enrolledInCourse) {
                                                ?>
                                                <div class="caption-actions">
                                                    <a href="/watch/<?php echo $firstEpisodeId; ?>"
                                                       id="start-watching-btn-1"
                                                       class="button is-solid accent-button is-rounded">
                                                        Start Watching
                                                    </a>
                                                    <a data-fancybox=""
                                                       data-src="/resources/episodes/<?php echo $introVideo ?>"
                                                       class="trailer-button">
                                                        <i data-feather="play"></i>
                                                        <span>Watch Intro</span>
                                                    </a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="caption-actions">
                                                    <a value="<?php echo $series["series_id"]; ?>"
                                                       cust-first-lecture="<?php echo isset($firstEpisodeId) ? $firstEpisodeId : 0; ?>"
                                                       id="enrollment-btn"
                                                       class="button is-solid accent-button is-rounded">
                                                        Start On Track
                                                    </a>
                                                    <a data-fancybox=""
                                                       data-src="/resources/episodes/<?php echo $introVideo ?>"
                                                       class="trailer-button">
                                                        <i data-feather="play"></i>
                                                        <span>Watch Intro</span>
                                                    </a>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <div class="caption-actions">
                                                <a data-success-url="<?php echo $utility->userPaymentLink($series["series_account"]); ?>"
                                                   data-subscription="<?php echo$series["series_account"]; ?>"
                                                   data-subscriber-id="<?php echo $_SESSION["user_id"]; ?>"
                                                   class="button is-solid accent-button is-rounded add-subscription">
                                                    Pay Subscription
                                                </a>
                                                <a data-fancybox id="morphing" data-src="#morphing-content"
                                                   class="trailer-button">
                                                    <i data-feather="pen-tool"></i>
                                                    <span>Description</span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="video-header-outer">
                    <div class="video-header">
                        <!-- Image -->
                        <img class="cover" src="https://via.placeholder.com/1920x1080"
                             data-demo-src="/images/covers/<?php echo $seriesCoverImages[2]; ?>" alt="">
                        <!-- Overlay -->
                        <div class="cover-overlay"></div>
                        <!-- Caption -->
                        <div class="cover-caption">
                            <div class="caption-inner">
                                <div class="video-caption">
                                    <div class="caption-block">
                                        <h2><?php echo $series["series_name"]; ?></h2>
                                        <div class="video-meta">
                                            <span>CCO</span>
                                            <span><?php echo $category["category_name"]; ?></span>
                                            <span class="rating">
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                    <i data-feather="star"></i>
                                                </span>
                                        </div>
                                        <p class="description">
                                            <?php echo Utilities::truncate($series["series_description_3"], 140); ?>
                                        </p>
                                        <?php
                                        if ($subscriptionCovers == "true") {

                                            if ($enrolledInCourse) {
                                                ?>
                                                <div class="caption-actions">
                                                    <a href="/watch/<?php echo $firstEpisodeId; ?>"
                                                       id="start-watching-btn-1"
                                                       class="button is-solid accent-button is-rounded">
                                                        Start Watching
                                                    </a>
                                                    <a data-fancybox=""
                                                       data-src="/resources/episodes/<?php echo $introVideo ?>"
                                                       class="trailer-button">
                                                        <i data-feather="play"></i>
                                                        <span>Watch Intro</span>
                                                    </a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="caption-actions">
                                                    <a value="<?php echo $series["series_id"]; ?>"
                                                       cust-first-lecture="<?php echo isset($firstEpisodeId) ? $firstEpisodeId : 0; ?>"
                                                       id="enrollment-btn"
                                                       class="button is-solid accent-button is-rounded">
                                                        Start On Track
                                                    </a>
                                                    <a data-fancybox=""
                                                       data-src="/resources/episodes/<?php echo $introVideo ?>"
                                                       class="trailer-button">
                                                        <i data-feather="play"></i>
                                                        <span>Watch Intro</span>
                                                    </a>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <div class="caption-actions">
                                                <a data-success-url="<?php echo $utility->userPaymentLink($series["series_account"]); ?>"
                                                   data-subscription="<?php echo$series["series_account"]; ?>"
                                                   data-subscriber-id="<?php echo $_SESSION["user_id"]; ?>"
                                                   class="button is-solid accent-button is-rounded add-subscription">
                                                    Pay Subscription
                                                </a>
                                                <a data-fancybox id="morphing" data-src="#morphing-content"
                                                   class="trailer-button">
                                                    <i data-feather="pen-tool"></i>
                                                    <span>Description</span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Home content -->
            <div class="home-content">
                <div class="collections-header">
                    <a class="is-active">Latest</a>
                    <a>Subscribed</a>
                    <a>Related</a>
                    <div class="search-button">
                        <i data-feather="search"></i>
                    </div>
                </div>

                <?php if ($utility->subscriptionCovers($series["series_account"]) == "true") { ?>
                <div class="collections-wrap is-active">

                    <?php foreach ($allChapters as $chapter) {

                        $allEpisodes = $episodeObj->fewChapterEpisodes($chapter["chapter_id"]);

                        if (!$allEpisodes) {
                            $allEpisodes = [];
                        }

                        ?>
                        <div class="collection">
                            <div class="header">
                                <h4><?php echo $chapter["chapter_name"] ?></h4>
                                <a href="../chapter/<?php echo $chapter["chapter_id"] ?>">Show More</a>
                            </div>
                            <div class="video-collection">
                                <!-- Episode -->

                                <?php foreach ($allEpisodes as $episode) {

                                    $lecturer = explode(",", $episode["episode_lecturer_images"])[0];
                                    ?>
                                    <a href="../watch/<?php echo $episode['episode_id']; ?>" class="episode">
                                        <div class="episode-thumbnail">
                                            <div class="episode-overlay"></div>
                                            <div class="episode-duration"><?php echo $episode["episode_duration"]; ?></div>
                                            <div class="play-button">
                                                <i data-feather="play-circle"></i>
                                            </div>
                                            <img src="https://via.placeholder.com/320x200"
                                                 data-demo-src="/images/covers/<?php echo $episode['episode_small_art_cover'] ?>"
                                                 alt="">
                                        </div>
                                        <div class="episode-meta">
                                            <img src="https://via.placeholder.com/150x150"
                                                 data-demo-src="/images/lecturers/<?php echo $lecturer; ?>"
                                                 data-page-popover="2" alt="">
                                            <div class="info">
                                                <span><?php echo $episode["episode_name"]; ?></span>
                                                <span><?php echo $episode["episode_number_in_chapter"] . " in " . explode(".", $chapter["chapter_name"])[1]; ?></span>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>

                    <!-- Load more posts -->
                    <div class=" load-more-wrap has-text-centered">
                        <a href="#" class="load-more-button">Load More</a>
                    </div>
                </div>
                <?php } ?>
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

                <img src="//assets/img/icons/chat/bubbles.svg" alt="">

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
<div id="morphing-content" class="hidden fancybox-content">
    <p>
        <?php echo $series["series_description_1"]; ?>
    </p>
    <p>
        <?php echo $series["series_description_2"]; ?>
    </p>
    <p>
        <?php echo $series["series_description_3"]; ?>
    </p>
</div>


<?php include "includes/frontEnd/explore-menu.php"; ?>

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
<script src="/assets/js/videos.js"></script>

<!-- events js -->

<!-- news js -->

<!-- shop js -->

<!-- inbox js -->

<!-- settings js -->

<!-- map page js -->

<!-- elements page js -->
</body>


<!-- Mirrored from friendkit.cssninja.io/videos-home.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 21:58:52 GMT -->
</html>