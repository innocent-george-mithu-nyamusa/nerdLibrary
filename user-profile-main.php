<!DOCTYPE html>
<html lang="en">

<?php

use Classes\ActivityView;
use Classes\BadgesView;
use Classes\CategoryView;
use Classes\CommentView;
use Classes\EpisodeView;
use Classes\PhotoView;
use Classes\ProgressTrackView;
use Classes\RelationshipView;
use Classes\ResourceView;
use Classes\SeriesView;
use Classes\UserPostView;
use Classes\UserView;
use Classes\Utilities;
use Classes\VideosView;

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
$videObj = new VideosView();
$badgeObj = new BadgesView();
$photo = new PhotoView();
$activityObj = new ActivityView();

$mySeriesList = [];
?>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Profile | NerdLibrary </title>
    <link rel="icon" type="image/png" href="/assets/img/logo/logo.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="../cdn.jsdelivr.net/npm/fontisto%40v3.0.4/css/fontisto/fontisto-brands.min.css" rel="stylesheet">
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

    $allFriendships = $relationObj->myFriendsShips($user[0]["user_id"]) ?? [];
    $allVideos = $videObj->getFewVideos($user[0]["user_id"]);
    $allBadges = $badgeObj->getAllMyBadges($user[0]["user_id"]);
    $allMyPosts = $postObj->getMyPosts($user[0]["user_id"]);
    $allMyPhotos = $photo->getPhotos($user[0]["user_id"]);

    ?>
    <div class="view-wrapper">

        <!-- Container -->
        <div class="container is-custom">

            <!-- Profile page main wrapper -->
            <div id="profile-main" class="view-wrap is-headless">

                <?php
                // Account Header for User Account
                include "includes/frontEnd/account-header.php";
                ?>

                <div class="columns">
                    <div id="profile-timeline-widgets" class="column is-4">

                        <!-- Basic Infos widget -->
                        <!-- html/partials/pages/profile/timeline/widgets/basic-infos-widget.html -->
                        <div class="box-heading">
                            <h4>Basic Infos</h4>
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="/profile/minimal" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="eye"></i>
                                                <div class="media-content">
                                                    <h3>View</h3>
                                                    <small>View user details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="search"></i>
                                                <div class="media-content">
                                                    <h3>Related</h3>
                                                    <small>Search for related users.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="basic-infos-wrapper">
                            <div class="card is-profile-info">
                                <div class="info-row">
                                    <div>
                                        <?php
                                        switch ($user[0]["user_role"]) {
                                            case "lecturer":
                                                echo '<span>Lecturer at</span>';
                                                break;
                                            case "user":
                                                echo '<span>Studied at</span>';
                                                break;
                                            case "organization":
                                                echo '<span>Institution</span>';
                                                break;
                                        }
                                        ?>
                                        <a class="is-inverted"><?php echo ($user[0]["user_university"] == "N/A") ? "Not Disclosed" : $user[0]["user_university"]; ?></a>
                                    </div>
                                    <i class="mdi mdi-school"></i>
                                </div>
                                <div class="info-row">
                                    <div>
                                        <span>Joined On </span>
                                        <a class="is-inverted"><?php echo $user[0]["user_joined"]; ?></a>
                                    </div>
                                    <i class="mdi mdi-calendar-weekend-outline"></i>
                                </div>
                                <div class="info-row">
                                    <div>
                                        <span>From</span>
                                        <a class="is-inverted"><?php echo $user[0]["user_town"]; ?></a>
                                    </div>
                                    <i class="mdi mdi-earth"></i>
                                </div>
                                <div class="info-row">
                                    <div>
                                        <span>Lives in</span>
                                        <a class="is-inverted"><?php echo $user[0]["user_town"] . " " . $user[0]["user_country"]; ?></a>
                                    </div>
                                    <i class="mdi mdi-map-marker"></i>
                                </div>
                                <div class="info-row">
                                    <div>
                                        <span>Followers</span>
                                        <a class="is-muted">

                                            <?php
                                            $followers = $relationObj->numberOfFriendShips($user[0]["user_id"]);
                                            $followers = "$followers";
                                            echo Utilities::itemsNumbers($followers);
                                            ?>
                                            followers
                                        </a>
                                    </div>
                                    <i class="mdi mdi-bell-ring"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Photos widget -->
                        <!-- html/partials/pages/profile/timeline/widgets/photos-widget.html -->
                        <div class="box-heading">
                            <h4>Photos</h4>
                            <!--    HIGHLIGHT::REWORKING HERE-->
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="image"></i>
                                                <div class="media-content">
                                                    <h3>View Photos</h3>
                                                    <small>View all your photos</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="tag"></i>
                                                <div class="media-content">
                                                    <h3>Tagged</h3>
                                                    <small>View photos you are tagged in.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="folder"></i>
                                                <div class="media-content">
                                                    <h3>Albums</h3>
                                                    <small>Open my albums.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                    HIGHLIGHT:: PLACE EXTERNAL URL BASED IMAGES WHEN HOSTING IMAGES-->
                        <div class="is-photos-widget">
                            <?php foreach ($allMyPhotos as $photo) { ?>
                                <img src="https://via.placeholder.com/200x200" data-demo-src="/images/media/posts/<?php echo $photo["photo_name"]; ?>" alt="User Images">
                            <?php } ?>
                        </div>
                        <!-- Star friends widget -->
                        <!-- html/partials/pages/profile/timeline/widgets/star-friends-widget.html -->
                        <div class="box-heading">
                            <h4>Friends</h4>
                            <!--    HIGHLIGHT::REWORKING HERE-->
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="users"></i>
                                                <div class="media-content">
                                                    <h3>All Friends</h3>
                                                    <small>View all friends.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="heart"></i>
                                                <div class="media-content">
                                                    <h3>Family</h3>
                                                    <small>View family members.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="briefcase"></i>
                                                <div class="media-content">
                                                    <h3>Work Relations</h3>
                                                    <small>View work related friends.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="friend-cards-list">
                            <div class="card is-friend-card">
                                <?php

                                foreach ($allFriendships as $friendShip) {

                                    $userRoleId = ($friendShip["relation_initiator_id"] == $user[0]["user_id"]) ? $friendShip["relation_user_id"] : $friendShip["relation_initiator_id"];
                                    $friendDetails = $userObj->getUser($userRoleId)[0];
                                    $allNumberMutualFriendships = $relationObj->numberOfMutualFriendShips($user[0]["user_id"], $friendDetails["user_id"]);

                                ?>
                                    <div class="friend-item">
                                        <img src="https://via.placeholder.com/300x300" data-demo-src="/images/profile-images/<?php echo $friendDetails["user_image"]; ?>" alt="" data-user-popover="<?php echo $friendDetails["user_no"]; ?>">
                                        <div class="text-content">
                                            <a><?php echo $friendDetails["user_fullname"]; ?></a>
                                            <span><?php echo $allNumberMutualFriendships; ?> mutual friend(s)</span>
                                        </div>
                                        <div class="star-friend">
                                            <i data-feather="star"></i>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!--                                <div class="friend-item">-->
                                <!--                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="" data-user-popover="7">-->
                                <!--                                    <div class="text-content">-->
                                <!--                                        <a>Milly Augustine</a>-->
                                <!--                                        <span>3 mutual friend(s)</span>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="star-friend is-active">-->
                                <!--                                        <i data-feather="star"></i>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                                <!--                                <div class="friend-item">-->
                                <!--                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="" data-user-popover="5">-->
                                <!--                                    <div class="text-content">-->
                                <!--                                        <a>Edward Mayers</a>-->
                                <!--                                        <span>35 mutual friend(s)</span>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="star-friend is-active">-->
                                <!--                                        <i data-feather="star"></i>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                                <!--                                <div class="friend-item">-->
                                <!--                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="" data-user-popover="2">-->
                                <!--                                    <div class="text-content">-->
                                <!--                                        <a>Stella Bergmann</a>-->
                                <!--                                        <span>48 mutual friend(s)</span>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="star-friend">-->
                                <!--                                        <i data-feather="star"></i>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                                <!--                                <div class="friend-item">-->
                                <!--                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="" data-user-popover="6">-->
                                <!--                                    <div class="text-content">-->
                                <!--                                        <a>Elise Walker</a>-->
                                <!--                                        <span>1 mutual friend(s)</span>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="star-friend">-->
                                <!--                                        <i data-feather="star"></i>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                                <!--                                <div class="friend-item">-->
                                <!--                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="" data-user-popover="9">-->
                                <!--                                    <div class="text-content">-->
                                <!--                                        <a>Nelly Schwartz</a>-->
                                <!--                                        <span>11 mutual friend(s)</span>-->
                                <!--                                    </div>-->
                                <!--                                    <div class="star-friend">-->
                                <!--                                        <i data-feather="star"></i>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                            </div>
                        </div>
                        <!-- Videos widget -->
                        <!-- html/partials/pages/profile/timeline/widgets/videos-widget.html -->
                        <div class="box-heading">
                            <h4>Videos</h4>
                            <!--    HIGHLIGHT::REVISIST HERE-->
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="video"></i>
                                                <div class="media-content">
                                                    <h3>View Videos</h3>
                                                    <small>View all your videos</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="tag"></i>
                                                <div class="media-content">
                                                    <h3>Tagged</h3>
                                                    <small>View videos you are tagged in.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="is-videos-widget">
                            <!--    HIGHLIGHT::WORKING HERE-->
                            <?php foreach ($allVideos as $video) { ?>

                                <div class="video-container">
                                    <img src="https://via.placeholder.com/200x200" data-demo-src="/images/media/thumbnails/<?php echo $video["video_thumbnail"]; ?>" alt="Video Thumbnail">
                                    <div class="video-button" data-fancybox href="<?php echo $video["video_url"]; ?>">
                                        <img src="/assets/img/icons/video/play.svg" alt="">
                                    </div>
                                    <div class="video-overlay"></div>
                                </div>
                            <?php } ?>

                            <!--                            <div class="video-container">-->
                            <!--                                <img src="https://via.placeholder.com/200x200" data-demo-src="/assets/img/demo/widgets/videos/2.jpg" alt="">-->
                            <!--                                <div class="video-button" data-fancybox href="/resources/episodes/episode_12c1d74d9d4e1a223b0798cdd8a66.mp4">-->
                            <!--                                    <img src="/assets/img/icons/video/play.svg" alt="">-->
                            <!--                                </div>-->
                            <!--                                <div class="video-overlay"></div>-->
                            <!--                            </div>-->
                            <!---->
                            <!--                            <div class="video-container">-->
                            <!--                                <img src="https://via.placeholder.com/200x200" data-demo-src="/assets/img/demo/widgets/videos/3.jpg" alt="">-->
                            <!--                                <div class="video-button">-->
                            <!--                                    <img src="/assets/img/icons/video/play.svg" alt="">-->
                            <!--                                </div>-->
                            <!--                                <div class="video-overlay"></div>-->
                            <!--                            </div>-->

                        </div>
                        <!-- Trips widget -->
                        <!-- html/partials/pages/profile/timeline/widgets/trips-widget.html -->
                        <div class="box-heading">
                            <h4>Achievements</h4>
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="globe"></i>
                                                <div class="media-content">
                                                    <h3>View my Achievements</h3>
                                                    <small>View all your achievemnts</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="compass"></i>
                                                <div class="media-content">
                                                    <h3>Badges</h3>
                                                    <small>View all badges.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trip-cards-list">
                            <div class="card is-trip-card">
                                <?php foreach ($allBadges as $badge) { ?>

                                    <div class="trip-item">
                                        <img src="https://via.placeholder.com/200x200" data-demo-src="/images/media/badges/<?php echo $badge["badge_image"] ?>" alt="">
                                        <div class="text-content">
                                            <a><?php echo $badge["badge_milestone_name"]; ?></a>
                                            <span><?php echo Utilities::elapsedTimeString($badge["badge_datetime"]); ?></span>
                                        </div>
                                    </div>
                                <?php } ?>

                                <!--                                -->
                                <!--                                <div class="trip-item">-->
                                <!--                                    <img src="https://via.placeholder.com/200x200" data-demo-src="assets/img/demo/widgets/trips/2.jpg" alt="">-->
                                <!--                                    <div class="text-content">-->
                                <!--                                        <a>Paris, France</a>-->
                                <!--                                        <span>8 months ago</span>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                                <div class="trip-item">-->
                                <!--                                    <img src="https://via.placeholder.com/200x200" data-demo-src="assets/img/demo/widgets/trips/3.jpg" alt="">-->
                                <!--                                    <div class="text-content">-->
                                <!--                                        <a>Madrid, Spain</a>-->
                                <!--                                        <span>a year ago</span>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                                <div class="trip-item">-->
                                <!--                                    <img src="https://via.placeholder.com/200x200" data-demo-src="assets/img/demo/widgets/trips/4.jpg" alt="">-->
                                <!--                                    <div class="text-content">-->
                                <!--                                        <a>Marrakech, Morocco</a>-->
                                <!--                                        <span>a year ago</span>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                            </div>
                        </div>
                        <div class="box-heading">
                            <h4>Events</h4>
                            <div class="dropdown is-neutral is-spaced is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="more-vertical"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="calendar"></i>
                                                <div class="media-content">
                                                    <h3>All Events</h3>
                                                    <small>View all your events</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="search"></i>
                                                <div class="media-content">
                                                    <h3>Search</h3>
                                                    <small>Search for events.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="compass"></i>
                                                <div class="media-content">
                                                    <h3>Suggestions</h3>
                                                    <small>View trendy suggestions.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Schedule calendar widget -->
                        <!-- html/partials/widgets/schedule/schedule-widget.html -->
                        <div class="schedule">
                            <div class="schedule-day-container hidden">
                                <div class="day-header day-header--large">
                                    <div class="day-header-bg"></div>
                                    <div class="day-header-close">
                                        <i data-feather="x"></i>
                                    </div>
                                    <div class="day-header-content">
                                        <div class="day-header-title">
                                            <div class="day-header-title-day">24</div>
                                            <div class="day-header-title-month">October</div>
                                        </div>
                                        <div class="day-header-event">Workout Session</div>
                                    </div>
                                </div>
                                <div class="day-content has-slimscroll">

                                    <!-- Event 1 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-1.html -->
                                    <div id="event-1" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-lock"></i>
                                            <div class="meta">
                                                <span>Private</span>
                                                <span>This is a private event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ Mom and Dad's house</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>02:00pm - 03:30pm</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>4 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="" data-user-popover="9">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="" data-user-popover="2">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="" data-user-popover="7">
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis
                                                commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                    <!-- Event 2 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-2.html -->
                                    <div id="event-2" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-lock"></i>
                                            <div class="meta">
                                                <span>Private</span>
                                                <span>This is a private event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ <a class="is-inverted">Wayne's Coffeeshop</a>, LA</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>11:00am - 12:30pm</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>3 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="" data-user-popover="4">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/rolf.jpg" alt="" data-user-popover="13">
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis
                                                commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                    <!-- Event 3 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-3.html -->
                                    <div id="event-3" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-earth"></i>
                                            <div class="meta">
                                                <span>Public</span>
                                                <span>This is a public event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ Frank's appartment</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>08:00pm - 02:00am</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>29 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="" data-user-popover="6">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="" data-user-popover="3">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/rolf.jpg" alt="" data-user-popover="13">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="" data-user-popover="7">
                                                <div class="is-more">+24</div>
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis
                                                commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                    <!-- Event 4 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-4.html -->
                                    <div id="event-4" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-lock"></i>
                                            <div class="meta">
                                                <span>Private</span>
                                                <span>This is a private event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ <a class="is-inverted">Gold Gym</a>, LA</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>05:00pm - 07:00pm</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>2 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/lana.jpeg" alt="" data-user-popover="10">
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis
                                                commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                    <!-- Event 5 details -->
                                    <!-- html/partials/widgets/schedule/event-details/event-5.html -->
                                    <div id="event-5" class="event-details-wrap">
                                        <div class="meta-block">
                                            <i class="mdi mdi-lock"></i>
                                            <div class="meta">
                                                <span>Private</span>
                                                <span>This is a private event</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-map-marker"></i>
                                            <div class="meta">
                                                <span>Where</span>
                                                <span>@ <a class="is-inverted">Massive Dynamics Office</a>, LA</span>
                                            </div>
                                        </div>
                                        <div class="meta-block">
                                            <i class="mdi mdi-progress-clock"></i>
                                            <div class="meta">
                                                <span>When</span>
                                                <span>08:30am - 10:00am</span>
                                            </div>
                                        </div>
                                        <div class="participants-wrap">
                                            <label>29 Participants</label>
                                            <div class="participants">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="" data-user-popover="0">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="" data-user-popover="1">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="" data-user-popover="5">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/mike.jpg" alt="" data-user-popover="12">
                                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/gaelle.jpeg" alt="" data-user-popover="11">
                                                <div class="is-more">+4</div>
                                            </div>
                                        </div>
                                        <div class="event-description">
                                            <label>Description</label>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis
                                                commodi accusamus dolores itaque repudiandae.</p>
                                        </div>
                                        <hr>
                                        <div class="button-wrap">
                                            <a class="button is-bold">Participating</a>
                                            <a class="button is-bold">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-header">
                                <div class="nav-icon">
                                    <i data-feather="chevron-left"></i>
                                </div>
                                <div class="month">October</div>
                                <div class="nav-icon">
                                    <i data-feather="chevron-right"></i>
                                </div>
                            </div>
                            <div class="schedule-calendar">
                                <div class="calendar-row day-row">
                                    <div class="day day-name">M</div>
                                    <div class="day day-name">T</div>
                                    <div class="day day-name">W</div>
                                    <div class="day day-name">T</div>
                                    <div class="day day-name">F</div>
                                    <div class="day day-name">S</div>
                                    <div class="day day-name">S</div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">&nbsp;</div>
                                    <div class="day">&nbsp;</div>
                                    <div class="day">1</div>
                                    <div class="day event green" data-content="1" data-day="2" data-event="Eat at mom and dad's">2
                                    </div>
                                    <div class="day">3</div>
                                    <div class="day">4</div>
                                    <div class="day">5</div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">6</div>
                                    <div class="day event purple" data-content="2" data-day="7" data-event="Meet customer in LA">7
                                    </div>
                                    <div class="day">8</div>
                                    <div class="day">9</div>
                                    <div class="day">10</div>
                                    <div class="day">11</div>
                                    <div class="day">12</div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">13</div>
                                    <div class="day">14</div>
                                    <div class="day">15</div>
                                    <div class="day">16</div>
                                    <div class="day">17</div>
                                    <div class="day">18</div>
                                    <div class="day">19</div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">20</div>
                                    <div class="day">21</div>
                                    <div class="day event green" data-content="3" data-day="22" data-event="Frank's birthday">22
                                    </div>
                                    <div class="day">23</div>
                                    <div class="day event primary" data-content="4" data-day="24" data-event="Workout Session">24
                                    </div>
                                    <div class="day">25</div>
                                    <div class="day event purple" data-content="5" data-day="26" data-event="Project review">26
                                    </div>
                                </div>
                                <div class="calendar-row">
                                    <div class="day">27</div>
                                    <div class="day">28</div>
                                    <div class="day">29</div>
                                    <div class="day">30</div>
                                    <div class="day"></div>
                                    <div class="day"></div>
                                    <div class="day"></div>
                                </div>
                                <div class="next-fab">
                                    <i data-feather="chevron-down"></i>
                                </div>
                            </div>
                            <div class="schedule-divider"></div>
                            <div class="schedule-events">
                                <div class="schedule-events-title">
                                    Upcoming events
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date green">2</div>
                                    <div class="event-title">
                                        <span>Eat at mom and dad's</span>
                                        <span>07:30pm | Home</span>
                                    </div>
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date purple">7</div>
                                    <div class="event-title">
                                        <span>Meet customer in LA</span>
                                        <span>11:00am | St Luc Café</span>
                                    </div>
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date green">22</div>
                                    <div class="event-title">
                                        <span>Frank's birthday</span>
                                        <span>03:00pm | Frank's home</span>
                                    </div>
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date primary">24</div>
                                    <div class="event-title">
                                        <span>Workout session</span>
                                        <span>07:00am | Gold Gym</span>
                                    </div>
                                </div>
                                <div class="schedule-event">
                                    <div class="event-date purple">26</div>
                                    <div class="event-title">
                                        <span>Project review</span>
                                        <span>08:00am | Office</span>
                                    </div>
                                </div>
                                <div class="button-wrap">
                                    <a class="button is-fullwidth has-icon"><i data-feather="plus"></i>New Event</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column is-8">
                        <div id="profile-timeline-posts" class="box-heading">
                            <h4>Posts</h4>
                            <div class="button-wrap">
                                <button type="button" class="button is-active">Recent</button>
                                <button type="button" class="button">Popular</button>
                            </div>
                        </div>

                        <div class="profile-timeline">

                            <!-- Timeline post 1 -->
                            <?php ?>
                            <!-- Timeline POST #1 -->

                            <!-- Post -->

                            <?php
                            foreach ($allMyPosts

                                as $feedPost) {

                                $postOwner = ($userObj->getUser($feedPost["post_owner_id"]))[0];
                                $allPostLikes = $resourceObj->getPostLikers($feedPost["post_id"]);
                                $postDate = new DateTime($feedPost['post_datetime']);
                                $postDate = $postDate->format("M D Y, H:m a");
                                $allTaggedUsers = explode(",", $feedPost["post_tags"]);
                                $postLikes = $resourceObj->getItemLikes($feedPost["post_id"]);
                                $postNumberOfComments = $commentObj->getNumberOfCommentsOfItem($feedPost["post_id"]);
                                $allRootPostComments = $commentObj->getAllItemRootComments($feedPost["post_id"]);
                                $isSimpleClassName = $feedPost["post_type"] == "text" ? "is-simple" : "";
                                $postText = $feedPost["post_text"] ?? "";
                                $postMood = $feedPost["post_mood"] !== "N/A" ? " is " . "<a href='' >" . $feedPost["post_mood"] . "</a>" : "";
                                $allPostLikes = $allPostLikes ?? [];
                                $userLikes = $resourceObj->isUserFavoriteItem($_SESSION["user_id"], $feedPost["post_id"]);


                                $taggedUsernames = "";

                                //                                                HIGHLIGHT:: CHECK POST USER ID"S IN TERMS OF USER ID's
                                //                                                FIXME::MAKE SURE user.json has Realistic values
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
                                <div class="profile-post">
                                    <!--                             Timeline -->
                                    <div class="time is-hidden-mobile">
                                        <div class="img-container">
                                            <img src="https://via.placeholder.com/300x300" data-demo-src="/images/profile-images/<?php echo $postOwner["user_image"]; ?>" alt="User image">
                                        </div>
                                    </div>
                                    <div class="card is-post <?php echo $isSimpleClassName; ?>">
                                        <!--                                 Main wrap -->
                                        <div class="content-wrap">
                                            <!--                                     Header -->
                                            <div class="card-heading">
                                                <!--                                         User image -->
                                                <div class="user-block">
                                                    <div class="image">
                                                        <img src="https://via.placeholder.com/300x300" data-demo-src="/images/profile-images/<?php echo $postOwner["user_image"]; ?>" data-user-popover="<?php echo $postOwner["user_no"]; ?>" alt="">
                                                    </div>
                                                    <div class="user-info">
                                                        <a href="#"><?php echo $postOwner["user_fullname"]; ?></a>
                                                        <span class="time"><?php echo $postDate; ?></span>
                                                    </div>
                                                </div>
                                                <!--                                         /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                                    <div>
                                                        <div class="button">
                                                            <i data-feather="more-vertical"></i>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-menu" role="menu">
                                                        <div class="dropdown-content">
                                                            <a data-bookmark-post-id="<?php echo $feedPost["post_id"]; ?>" class="dropdown-item bookmark-post">
                                                                <div class="media">
                                                                    <i data-feather="bookmark"></i>
                                                                    <div class="media-content">
                                                                        <h3>Bookmark</h3>
                                                                        <small>Add this post to your bookmarks.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a data-subscribe-notifification-post-id="<?php echo $feedPost["post_id"]; ?>" class="dropdown-item subscribe-notification-post">
                                                                <div class="media">
                                                                    <i data-feather="bell"></i>
                                                                    <div class="media-content">
                                                                        <h3>Notify me</h3>
                                                                        <small>Send me the updates.</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <hr class="dropdown-divider">
                                                            <a data-flag-post-id="<?php echo $feedPost["post_id"]; ?>" class="dropdown-item flag-item">
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
                                            <!--                                     /Header -->
                                            <!---->
                                            <!--                                     Post body -->
                                            <div class="card-body">

                                                <!--                                         Post body text -->
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
                                                        <a data-fancybox="<?php echo $feedPost["post_id"] ?>" data-lightbox-type="comments" data-thumb="/images/media/posts/<?php echo $feedPost["post_images"] ?>" href="https://via.placeholder.com/1600x900" data-demo-href="/images/media/posts/<?php echo $feedPost["post_images"] ?>">
                                                            <img src="https://via.placeholder.com/1600x900" data-demo-src="/images/media/posts/<?php echo $feedPost["post_images"] ?>" alt="">
                                                        </a>

                                                        <div class="like-wrapper">
                                                            <a href="javascript:void(0);" data-item-owner="<?php echo $feedPost["post_owner_id"]; ?>" data-item-id="<?php echo $feedPost["post_id"]; ?>" class="like-button <?php echo $userLikes ? "is-active" :  ""; ?>">
                                                                <i class="mdi mdi-heart not-liked bouncy"></i>
                                                                <i class="mdi mdi-heart is-liked bouncy"></i>
                                                                <span class="like-overlay"></span>
                                                            </a>
                                                        </div>

                                                        <div class="fab-wrapper is-share">
                                                            <a href="javascript:void(0);" class="small-fab share-fab modal-trigger" data-modal="share-modal">
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
                                                    <!--                                            HIGHLIGHT::POST LINK PREVIEW-->
                                                    <div class="post-link">

                                                        <div class="highlight-link" id="post-link-id-<?php echo $feedPost["post_id"] ?>" data-post-link-id="<?php echo $feedPost["post_id"] ?>" data-shared-link="<?php echo $feedPost["post_shared_link"]; ?>" onclick="initPreviewLink(this)">
                                                        </div>

                                                        <div class="like-wrapper">
                                                            <a href="javascript:void(0);" data-item-owner="<?php echo $feedPost["post_owner_id"]; ?>" data-item-id="<?php echo $feedPost["post_id"]; ?>" class="like-button <?php echo $userLikes ? "is-active" :  ""; ?>">
                                                                <i class="mdi mdi-heart not-liked bouncy"></i>
                                                                <i class="mdi mdi-heart is-liked bouncy"></i>
                                                                <span class="like-overlay"></span>
                                                            </a>
                                                        </div>

                                                        <div class="fab-wrapper is-share">
                                                            <a href="javascript:void(0);" class="small-fab share-fab modal-trigger" data-modal="share-modal">
                                                                <i data-feather="link-2"></i>
                                                            </a>
                                                        </div>

                                                        <div class="fab-wrapper is-comment">
                                                            <a href="javascript:void(0);" class="small-fab">
                                                                <i data-feather="message-circle"></i>
                                                            </a>
                                                        </div>
                                                        Post actions
                                                    </div>
                                                <?php

                                                }

                                                if (($feedPost["post_type"] == "text") && empty(trim($feedPost["post_shared_link"]))) {
                                                    //If Post is text based Post actions are supposed to be in their own position with a wrapper
                                                ?>
                                                    <div class="post-actions">
                                                        <!--                                                 Post actions -->
                                                        <!--                                                 /partials/pages/feed/buttons/feed-post-actions.html -->
                                                        <div class="like-wrapper">
                                                            <a href="javascript:void(0);" data-item-id="<?php echo $feedPost["post_id"]; ?>" data-item-owner="<?php echo $feedPost["post_owner_id"]; ?>" class="like-button <?php echo $userLikes ? "is-active" :  ""; ?> ">
                                                                <i class="mdi mdi-heart not-liked bouncy"></i>
                                                                <i class="mdi mdi-heart is-liked bouncy"></i>
                                                                <span class="like-overlay"></span>
                                                            </a>
                                                        </div>

                                                        <div class="fab-wrapper is-share">
                                                            <a href="javascript:void(0);" class="small-fab share-fab modal-trigger" data-modal="share-modal">
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

                                            <!--                                     /Post body -->


                                            <!--                                     Post footer -->
                                            <div class="card-footer">
                                                <!--                                         Followers -->

                                                <div class="likers-group">
                                                    <?php
                                                    $likeNamesArray = [];

                                                    foreach ($allPostLikes as $liker) {
                                                        $likeUser = $userObj->getUser($liker["user_id"])[0];
                                                        array_push($liker[0], $likeNamesArray);

                                                        isset($liker[1]) ? array_push($liker[1], $likeNamesArray) : 0;
                                                    ?>
                                                        <img src="https://via.placeholder.com/300x300" data-demo-src="/images/profile-images/<?php echo $likeUser['user_image']; ?>" data-user-popover="<?php echo $likeUser['user_no']; ?>" alt="User Image">
                                                    <?php } ?>
                                                </div>
                                                <div class="likers-text">
                                                    <p>
                                                        <?php
                                                        foreach ($likeNamesArray as $likeName) {
                                                            $likeUserWIthNames = $userObj->getUser($liker["user_id"])[0];
                                                        ?>
                                                            <a href="/nerdLirary/profile/main/<?php echo $likeUserWIthNames["user_id"]; ?>">
                                                                <?php echo $likeUserWIthNames["username"]; ?>
                                                            </a>
                                                        <?php } ?>
                                                    </p>
                                                    <p> <?php echo empty($likeNamesArray) ? "" : "liked this"; ?></p>
                                                </div>

                                                <!--                                         Post statistics -->
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
                                            <!--                                     /Post footer -->
                                        </div>
                                        <!--                                 /Main wrap -->

                                        <!--                                 Post #6 comments -->
                                        <div class="comments-wrap is-hidden">
                                            <!--                                     Header -->
                                            <div class="comments-heading">
                                                <h4>
                                                    <!--                                            Comments-->
                                                    <small id="number-of-comments-<?php echo $feedPost["post_id"]; ?>" data-number-of-comments="<?php echo $postNumberOfComments; ?>">(<?php echo $postNumberOfComments; ?>
                                                        )</small>
                                                </h4>
                                                <div class="close-comments">
                                                    <i data-feather="x"></i>
                                                </div>
                                            </div>
                                            <!--                                     /Header -->
                                            <div class="comments-body has-slimscroll">

                                                <?php if ($postNumberOfComments == 0) { ?>

                                                    <!--                                             Comments body -->

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

                                                            <!--                                                     User image -->
                                                            <div class="media-left">
                                                                <div class="image">
                                                                    <img src="https://via.placeholder.com/300x300" data-demo-src="/images/profile-images/<?php echo $postRootOwner["user_image"]; ?>" data-user-popover="<?php echo $postRootOwner["user_no"]; ?>" alt="Commentor picture" />
                                                                </div>
                                                            </div>
                                                            <!--                                                     Media Content  -->
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
                                                                <!--                                                         Actions -->
                                                                <div class="controls">
                                                                    <div class="like-count like-item <?php echo $hasUserLiked ? "liked" : "" ?>" data-item-id="<?php echo $postRootComment["comment_id"]; ?>" data-item-owner-id="<?php echo $postRootComment["commentor_id"]; ?>">
                                                                        <i data-feather="thumbs-up">
                                                                        </i>
                                                                        <span id="like-count-<?php echo $postRootComment["comment_id"]; ?>" data-current-like-count="<?php echo $postCommentLikes ?>">
                                                                            <?php
                                                                            echo $postCommentLikes
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <a class="reply-link" data-post-item-id="<?php echo $feedPost["post_id"]; ?>" data-comment-id="<?php echo $postRootComment["comment_id"]; ?>" data-comment-item-id="<?php echo $postRootComment["comment_id"]; ?>">
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
                                                                        User image
                                                                        <div class="media-left">
                                                                            <div class="image">
                                                                                <img src="https://via.placeholder.com/300x300" data-demo-src="/images/profile-images/<?php echo $commentorDetails["user_image"] ?>" data-user-popover="<?php echo $commentorDetails["user_no"]; ?>" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <!--                                                                 Content -->
                                                                        <div class="media-content">
                                                                            <a href="#"><?php echo $commentorDetails["user_fullname"]; ?></a>
                                                                            <span class="time"><?php echo Utilities::elapsedTimeString($replyComment["comment_date"]); ?></span>
                                                                            <p>
                                                                                <?php echo $replyComment["comment"]; ?>
                                                                            </p>
                                                                            <!--                                                                     Actions -->
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
                                                                        <!--                                                                 Right side dropdown -->
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
                                                                                        <a data-flagged-item-id="<?php echo $replyComment["comment_id"]; ?>" class="dropdown-item flag-item">
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
                                                            <!--                                                     /Media Content  -->
                                                            <!--                                                     Media Right  -->
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
                                                            <!--                                                     /Media Right  -->
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

                                            <!--                                     /Comments body -->

                                            <!--                                     Comments footer -->
                                            <div class="card-footer">
                                                <div class="media post-comment has-emojis">
                                                    <!--                                             Textarea -->
                                                    <div class="media-content">
                                                        <div class="field">
                                                            <p class="control">
                                                                <label for="post-comment-text-<?php echo $feedPost["post_id"]; ?>"></label>
                                                                <textarea class="textarea comment-textarea post-comment-text-<?php echo $feedPost["post_id"]; ?>" rows="5" placeholder="Write a comment..."></textarea>
                                                            </p>
                                                        </div>
                                                        <!--                                                 Additional actions -->
                                                        <div class="actions">
                                                            <div class="image is-32x32">
                                                                <img class="is-rounded" src="https://via.placeholder.com/300x300" data-demo-src="/images/profile-images/<?php echo $_SESSION["image"]; ?>" data-user-popover="<?php echo $_SESSION["no"]; ?>" alt="user image">
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

                                                                    <!--                                                             HIGHLIGHT:: REMOVE AN IMPLEMENT PICTURES BASED RESPONSES -->

                                                                    <input disabled type="file">
                                                                </div>
                                                                <a data-post-item-id="<?php echo $feedPost["post_id"]; ?>" data-post-owner-id="<?php echo $feedPost["post_owner_id"] ?>" class="button is-solid primary-button add-comment-btn raised">Post
                                                                    Comment</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                     /Comments footer -->
                                        </div>
                                        <!--                                 /Post #6 comments -->
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- /Post -->
                            <!--                        </div>-->
                            <!-- /Timeline POST #3 -->
                            <!-- Timeline post 2 -->
                            <!-- html/partials/pages/profile/posts/timeline-post2.html -->
                            <!-- Timeline POST #2 -->
                            <!--                        <div class="profile-post">-->
                            <!-- Timeline -->
                            <!--                            <div class="time is-hidden-mobile">-->
                            <!--                                <div class="img-container">-->
                            <!--                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                         data-demo-src="assets/img/avatars/elise.jpg" alt="">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!-- Post -->
                            <!--                            <div class="card is-post">-->
                            <!-- Main wrap -->
                            <!--                                <div class="content-wrap">-->
                            <!-- Header -->
                            <!--                                    <div class="card-heading">-->
                            <!--                                        <div class="user-block">-->
                            <!--                                            <div class="image">-->
                            <!--                                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                     data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6"-->
                            <!--                                                     alt="">-->
                            <!--                                            </div>-->
                            <!--                                            <div class="user-info">-->
                            <!--                                                <a href="#">Elise Walker shared-->
                            <!--                                                    <span>Dan Walker's post</span> on your feed</a>-->
                            <!--                                                <span class="time">July 19 2018, 19:42pm</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!---->
                            <!--                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                            <div>-->
                            <!--                                                <div class="button">-->
                            <!--                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                <div class="dropdown-content">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bookmark"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Bookmark</h3>-->
                            <!--                                                                <small>Add this post to your bookmarks.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <a class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bell"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Notify me</h3>-->
                            <!--                                                                <small>Send me the updates.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <hr class="dropdown-divider">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="flag"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Flag</h3>-->
                            <!--                                                                <small>In case of inappropriate content.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Header -->
                            <!---->
                            <!-- Post body -->
                            <!--                                    <div class="card-body">-->
                            <!-- Post body text -->
                            <!--                                        <div class="post-text">-->
                            <!--                                            <p>My brother went to their concert last night, and looks like he had tons-->
                            <!--                                                of fun. We should really do things-->
                            <!--                                                like this together.-->
                            <!--                                            <p>-->
                            <!--                                        </div>-->
                            <!-- Featured image -->
                            <!---->
                            <!-- Nested Post (Shared) -->
                            <!--                                        <div class="card is-post is-nested">-->
                            <!-- Main wrap -->
                            <!--                                            <div class="content-wrap">-->
                            <!-- Post header -->
                            <!--                                                <div class="card-heading">-->
                            <!-- User meta -->
                            <!--                                                    <div class="user-block">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/dan.jpg"-->
                            <!--                                                                 data-user-popover="1" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="user-info">-->
                            <!--                                                            <a href="#">Dan Walker</a>-->
                            <!--                                                            <span class="time">July 26 2018, 01:03pm</span>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Post header -->
                            <!---->
                            <!-- Post body -->
                            <!--                                                <div class="card-body">-->
                            <!-- Post body text -->
                            <!--                                                    <div class="post-text">-->
                            <!--                                                        <p>Yesterday with-->
                            <!--                                                            <a href="#">@Karen Miller</a> and-->
                            <!--                                                            <a href="#">@Marvin Stemperd</a> at the-->
                            <!--                                                            <a href="#">#Rock'n'Rolla</a> concert in LA. Was totally-->
                            <!--                                                            fantastic! People were really excited about-->
                            <!--                                                            this one!-->
                            <!--                                                        </p>-->
                            <!--                                                    </div>-->
                            <!-- Featured image -->
                            <!--                                                    <div class="post-image">-->
                            <!--                                                        <a data-fancybox="profile-post2" data-lightbox-type="comments"-->
                            <!--                                                           data-thumb="assets/img/demo/unsplash/1.jpg"-->
                            <!--                                                           href="https://via.placeholder.com/1600x900"-->
                            <!--                                                           data-demo-href="assets/img/demo/unsplash/1.jpg">-->
                            <!--                                                            <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                                 data-demo-src="assets/img/demo/unsplash/1.jpg" alt="">-->
                            <!--                                                        </a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Post body -->
                            <!--                                            </div>-->
                            <!-- /Main wrap -->
                            <!--                                        </div>-->
                            <!-- /Nested Post (Shared) -->
                            <!--                                        <div class="action-wrap">-->
                            <!-- Post actions -->
                            <!--                                            <div class="like-wrapper">-->
                            <!--                                                <a href="javascript:void(0);" class="like-button">-->
                            <!--                                                    <i class="mdi mdi-heart not-liked bouncy"></i>-->
                            <!--                                                    <i class="mdi mdi-heart is-liked bouncy"></i>-->
                            <!--                                                    <span class="like-overlay"></span>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!---->
                            <!--                                            <div class="fab-wrapper is-share">-->
                            <!--                                                <a href="javascript:void(0);" class="small-fab share-fab modal-trigger"-->
                            <!--                                                   data-modal="share-modal">-->
                            <!--                                                    <i data-feather="link-2"></i>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!---->
                            <!--                                            <div class="fab-wrapper is-comment">-->
                            <!--                                                <a href="javascript:void(0);" class="small-fab">-->
                            <!--                                                    <i data-feather="message-circle"></i>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!---->
                            <!--                                    </div>-->
                            <!-- /Post body -->
                            <!---->
                            <!-- Post footer -->
                            <!--                                    <div class="card-footer">-->
                            <!-- Followers -->
                            <!--                                        <div class="likers-group">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/nelly.png" data-user-popover="9"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/stella.jpg" data-user-popover="2"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/rolf.jpg" data-user-popover="13"-->
                            <!--                                                 alt="">-->
                            <!--                                        </div>-->
                            <!--                                        <div class="likers-text">-->
                            <!--                                            <p>-->
                            <!--                                                <a href="#">Jenna</a>,-->
                            <!--                                                <a href="#">Edward</a>-->
                            <!--                                            </p>-->
                            <!--                                            <p>and 3 more liked this</p>-->
                            <!--                                        </div>-->
                            <!-- Post statistics -->
                            <!--                                        <div class="social-count">-->
                            <!--                                            <div class="likes-count">-->
                            <!--                                                <i data-feather="heart"></i>-->
                            <!--                                                <span>5</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="shares-count">-->
                            <!--                                                <i data-feather="link-2"></i>-->
                            <!--                                                <span>0</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="comments-count">-->
                            <!--                                                <i data-feather="message-circle"></i>-->
                            <!--                                                <span>4</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post footer -->
                            <!--                                </div>-->
                            <!-- /Main wrap -->
                            <!---->
                            <!-- Comments -->
                            <!--                                <div class="comments-wrap is-hidden">-->
                            <!-- Header -->
                            <!--                                    <div class="comments-heading">-->
                            <!--                                        <h4>Comments-->
                            <!--                                            <small>(4)</small>-->
                            <!--                                        </h4>-->
                            <!--                                        <div class="close-comments">-->
                            <!--                                            <i data-feather="x"></i>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- Header -->
                            <!---->
                            <!-- Comments body -->
                            <!--                                    <div class="comments-body has-slimscroll">-->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/david.jpg"-->
                            <!--                                                         data-user-popover="4" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">David Kim</a>-->
                            <!--                                                <span class="time">5 hours ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud-->
                            <!--                                                    exercitation ullamco laboris consequat.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>1</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/daniel.jpg"-->
                            <!--                                                                 data-user-popover="3" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Daniel Wellington</a>-->
                            <!--                                                        <span class="time">3 minutes ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>4</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->

                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/edward.jpeg"-->
                            <!--                                                         data-user-popover="5" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Edward Mayers</a>-->
                            <!--                                                <span class="time">Yesterday</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>3</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/nelly.png"-->
                            <!--                                                         data-user-popover="9" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Nelly Schwartz</a>-->
                            <!--                                                <span class="time">2 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>1</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!--                                    </div>-->
                            <!-- Comments body -->
                            <!---->
                            <!-- Comments footer -->
                            <!--                                    <div class="card-footer">-->
                            <!--                                        <div class="media post-comment has-emojis">-->
                            <!-- Textarea -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <div class="field">-->
                            <!--                                                    <p class="control">-->
                            <!--                                                        <textarea class="textarea comment-textarea" rows="5"-->
                            <!--                                                                  placeholder="Write a comment..."></textarea>-->
                            <!--                                                    </p>-->
                            <!--                                                </div>-->
                            <!-- Additional actions -->
                            <!--                                                <div class="actions">-->
                            <!--                                                    <div class="image is-32x32">-->
                            <!--                                                        <img class="is-rounded"-->
                            <!--                                                             src="https://via.placeholder.com/300x300"-->
                            <!--                                                             data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                             data-user-popover="0" alt="">-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="toolbar">-->
                            <!--                                                        <div class="action is-auto">-->
                            <!--                                                            <i data-feather="at-sign"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-emoji">-->
                            <!--                                                            <i data-feather="smile"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-upload">-->
                            <!--                                                            <i data-feather="camera"></i>-->
                            <!--                                                            <input type="file">-->
                            <!--                                                        </div>-->
                            <!--                                                        <a class="button is-solid primary-button raised">Post-->
                            <!--                                                            Comment</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Comments footer -->
                            <!--                                </div>-->
                            <!-- /Comments -->
                            <!--                            </div>-->
                            <!-- /Post -->
                            <!--                        </div>-->
                            <!-- /Timeline POST #2 -->
                            <!-- Timeline post 3 -->
                            <!-- html/partials/pages/profile/posts/timeline-post3.html -->
                            <!-- Timeline POST #3 -->
                            <!--                        <div class="profile-post">-->
                            <!-- Timeline -->
                            <!--                            <div class="time is-hidden-mobile">-->
                            <!--                                <div class="img-container">-->
                            <!--                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                         data-demo-src="assets/img/avatars/jenna.png" alt="">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!-- Post -->
                            <!--                            <div class="card is-post">-->
                            <!-- Main wrap -->
                            <!--                                <div class="content-wrap">-->
                            <!-- Header -->
                            <!--                                    <div class="card-heading">-->
                            <!--                                        <div class="user-block">-->
                            <!--                                            <div class="image">-->
                            <!--                                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                     data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0"-->
                            <!--                                                     alt="">-->
                            <!--                                            </div>-->
                            <!--                                            <div class="user-info">-->
                            <!--                                                <a href="#">Jenna Davis</a>-->
                            <!--                                                <span class="time">October 09 2018, 11:03am</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!---->
                            <!--                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                            <div>-->
                            <!--                                                <div class="button">-->
                            <!--                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                <div class="dropdown-content">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bookmark"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Bookmark</h3>-->
                            <!--                                                                <small>Add this post to your bookmarks.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <a class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bell"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Notify me</h3>-->
                            <!--                                                                <small>Send me the updates.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <hr class="dropdown-divider">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="flag"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Flag</h3>-->
                            <!--                                                                <small>In case of inappropriate content.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Header -->
                            <!---->
                            <!-- Post body -->
                            <!--                                    <div class="card-body">-->
                            <!-- Post body text -->
                            <!--                                        <div class="post-text">-->
                            <!--                                            <p>Today i visited this amazing little fashion store in Church street.-->
                            <!--                                                Everything is handmade, from skirts-->
                            <!--                                                to bags. Their products really have an outstanding quality. If you don't-->
                            <!--                                                know them already, well-->
                            <!--                                                it's time to make your move!-->
                            <!--                                            <p>-->
                            <!--                                        </div>-->
                            <!-- Featured image -->
                            <!--                                        <div class="post-image">-->
                            <!--                                            <a data-fancybox="profile-post3" data-lightbox-type="comments"-->
                            <!--                                               data-thumb="/assets/img/demo/video/dress.jpg" href="#myVideo">-->
                            <!--                                                <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                     data-demo-src="/assets/img/demo/video/dress.jpg" alt="">-->
                            <!--                                            </a>-->
                            <!-- Post actions -->
                            <!--                                            <div class="like-wrapper">-->
                            <!--                                                <a href="javascript:void(0);" class="like-button">-->
                            <!--                                                    <i class="mdi mdi-heart not-liked bouncy"></i>-->
                            <!--                                                    <i class="mdi mdi-heart is-liked bouncy"></i>-->
                            <!--                                                    <span class="like-overlay"></span>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!---->
                            <!--                                            <div class="fab-wrapper is-share">-->
                            <!--                                                <a href="javascript:void(0);" class="small-fab share-fab modal-trigger"-->
                            <!--                                                   data-modal="share-modal">-->
                            <!--                                                    <i data-feather="link-2"></i>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!---->
                            <!--                                            <div class="fab-wrapper is-comment">-->
                            <!--                                                <a href="javascript:void(0);" class="small-fab">-->
                            <!--                                                    <i data-feather="message-circle"></i>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post body -->
                            <!---->
                            <!-- Post footer -->
                            <!--                                    <div class="card-footer">-->
                            <!-- Followers -->
                            <!--                                        <div class="likers-group">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/dan.jpg" data-user-popover="1"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/stella.jpg" data-user-popover="2"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/milly.jpg" data-user-popover="7"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/nelly.png" data-user-popover="9"-->
                            <!--                                                 alt="">-->
                            <!--                                        </div>-->
                            <!--                                        <div class="likers-text">-->
                            <!--                                            <p>-->
                            <!--                                                <a href="#">Milly</a>,-->
                            <!--                                                <a href="#">David</a>-->
                            <!--                                            </p>-->
                            <!--                                            <p>and 56 more liked this</p>-->
                            <!--                                        </div>-->
                            <!-- Post statistics -->
                            <!--                                        <div class="social-count">-->
                            <!--                                            <div class="likes-count">-->
                            <!--                                                <i data-feather="heart"></i>-->
                            <!--                                                <span>58</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="shares-count">-->
                            <!--                                                <i data-feather="link-2"></i>-->
                            <!--                                                <span>12</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="comments-count">-->
                            <!--                                                <i data-feather="message-circle"></i>-->
                            <!--                                                <span>9</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post footer -->
                            <!--                                </div>-->
                            <!-- /Main wrap -->
                            <!---->
                            <!-- Comments -->
                            <!--                                <div class="comments-wrap is-hidden">-->
                            <!-- Header -->
                            <!--                                    <div class="comments-heading">-->
                            <!--                                        <h4>Comments-->
                            <!--                                            <small>(9)</small>-->
                            <!--                                        </h4>-->
                            <!--                                        <div class="close-comments">-->
                            <!--                                            <i data-feather="x"></i>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- Header -->
                            <!---->
                            <!-- Comments body -->
                            <!--                                    <div class="comments-body has-slimscroll">-->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/milly.jpg"-->
                            <!--                                                         data-user-popover="7" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Milly Augustine</a>-->
                            <!--                                                <span class="time">1 hour ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud-->
                            <!--                                                    exercitation ullamco laboris consequat.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>1</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/edward.jpeg"-->
                            <!--                                                                 data-user-popover="5" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Edward Mayers</a>-->
                            <!--                                                        <span class="time">30 minutes ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>3</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/elise.jpg"-->
                            <!--                                                                 data-user-popover="6" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Elise Walker</a>-->
                            <!--                                                        <span class="time">15 minutes ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>0</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->

                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/stella.jpg"-->
                            <!--                                                         data-user-popover="2" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Stella Bergmann</a>-->
                            <!--                                                <span class="time">1 hour ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>5</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                                 data-user-popover="0" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Jenna Davis</a>-->
                            <!--                                                        <span class="time">30 minutes ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>0</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/edward.jpeg"-->
                            <!--                                                         data-user-popover="5" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Edward Mayers</a>-->
                            <!--                                                <span class="time">Yesterday</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>3</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/nelly.png"-->
                            <!--                                                         data-user-popover="9" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Nelly Schwartz</a>-->
                            <!--                                                <span class="time">2 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>1</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                                 data-user-popover="0" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Jenna Davis</a>-->
                            <!--                                                        <span class="time">2 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>3</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/elise.jpg"-->
                            <!--                                                                 data-user-popover="6" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Elise Walker</a>-->
                            <!--                                                        <span class="time">2 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>0</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!--                                    </div>-->
                            <!-- Comments body -->
                            <!---->
                            <!-- Comments footer -->
                            <!--                                    <div class="card-footer">-->
                            <!--                                        <div class="media post-comment has-emojis">-->
                            <!-- Textarea -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <div class="field">-->
                            <!--                                                    <p class="control">-->
                            <!--                                                        <textarea class="textarea comment-textarea" rows="5"-->
                            <!--                                                                  placeholder="Write a comment..."></textarea>-->
                            <!--                                                    </p>-->
                            <!--                                                </div>-->
                            <!-- Additional actions -->
                            <!--                                                <div class="actions">-->
                            <!--                                                    <div class="image is-32x32">-->
                            <!--                                                        <img class="is-rounded"-->
                            <!--                                                             src="https://via.placeholder.com/300x300"-->
                            <!--                                                             data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                             data-user-popover="0" alt="">-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="toolbar">-->
                            <!--                                                        <div class="action is-auto">-->
                            <!--                                                            <i data-feather="at-sign"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-emoji">-->
                            <!--                                                            <i data-feather="smile"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-upload">-->
                            <!--                                                            <i data-feather="camera"></i>-->
                            <!--                                                            <input type="file">-->
                            <!--                                                        </div>-->
                            <!--                                                        <a class="button is-solid primary-button raised">Post-->
                            <!--                                                            Comment</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Comments footer -->
                            <!--                                </div>-->
                            <!-- /Comments -->
                            <!--                            </div>-->
                            <!-- /Post -->
                            <!--                        </div>-->
                            <!-- Timeline POST #3 -->

                            <video width="800" height="450" controls id="myVideo" style="display:none;">
                                <source src="/assets/img/demo/video/source/dress.mp4" type="video/mp4">
                                <source src="/assets/img/demo/video/source/dress.webm" type="video/webm">
                                <source src="/assets/img/demo/video/source/dress.ogg" type="video/ogg">
                                Your browser doesn't support HTML5 video tag.
                            </video>
                            <!-- Timeline post 4 -->

                            <!-- html/partials/pages/profile/posts/timeline-post4.html -->

                            <!-- Timeline POST #4 -->
                            <!--                        <div class="profile-post">-->
                            <!-- Timeline -->
                            <!--                            <div class="time is-hidden-mobile">-->
                            <!--                                <div class="img-container">-->
                            <!--                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                         data-demo-src="assets/img/avatars/jenna.png" alt="">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!-- Post -->
                            <!--                            <div class="card is-post">-->
                            <!-- Main wrap -->
                            <!--                                <div class="content-wrap">-->
                            <!-- Header -->
                            <!--                                    <div class="card-heading">-->
                            <!--                                        <div class="user-block">-->
                            <!--                                            <div class="image">-->
                            <!--                                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                     data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0"-->
                            <!--                                                     alt="">-->
                            <!--                                            </div>-->
                            <!--                                            <div class="user-info">-->
                            <!--                                                <a href="#">Jenna Davis</a>-->
                            <!--                                                <span class="time">September 26 2018, 11:18am</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- Right side dropdown -->
                            <!--                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                            <div>-->
                            <!--                                                <div class="button">-->
                            <!--                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                <div class="dropdown-content">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bookmark"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Bookmark</h3>-->
                            <!--                                                                <small>Add this post to your bookmarks.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <a class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bell"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Notify me</h3>-->
                            <!--                                                                <small>Send me the updates.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <hr class="dropdown-divider">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="flag"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Flag</h3>-->
                            <!--                                                                <small>In case of inappropriate content.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- Header -->
                            <!---->
                            <!-- Post body -->
                            <!--                                    <div class="card-body">-->
                            <!-- Post body text -->
                            <!--                                        <div class="post-text">-->
                            <!--                                            <p>Hello everyone! Today iam posting a review of the latest shoe trends. I-->
                            <!--                                                tried for you more than 30 pairs of shoes. I had some crushes and some-->
                            <!--                                                deceptions, However, it was a great experience i would like to share-->
                            <!--                                                with you.-->
                            <!--                                            <p>-->
                            <!--                                        </div>-->
                            <!-- Featured image -->
                            <!--                                        <div class="post-image">-->
                            <!-- CSS masonry wrap -->
                            <!--                                            <div class="masonry-grid">-->
                            <!-- Left column -->
                            <!--                                                <div class="masonry-column-left">-->
                            <!--                                                    <a data-fancybox="profile-post4" data-lightbox-type="comments"-->
                            <!--                                                       data-thumb="assets/img/demo/unsplash/9.jpg"-->
                            <!--                                                       href="https://via.placeholder.com/1600x900"-->
                            <!--                                                       data-demo-href="assets/img/demo/unsplash/9.jpg">-->
                            <!--                                                        <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                             data-demo-src="assets/img/demo/unsplash/9.jpg" alt="">-->
                            <!--                                                    </a>-->
                            <!--                                                    <a data-fancybox="profile-post4" data-lightbox-type="comments"-->
                            <!--                                                       data-thumb="assets/img/demo/unsplash/10.jpg"-->
                            <!--                                                       href="https://via.placeholder.com/1600x900"-->
                            <!--                                                       data-demo-href="assets/img/demo/unsplash/10.jpg">-->
                            <!--                                                        <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                             data-demo-src="assets/img/demo/unsplash/10.jpg" alt="">-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!-- Right column -->
                            <!--                                                <div class="masonry-column-right">-->
                            <!--                                                    <a data-fancybox="profile-post4" data-lightbox-type="comments"-->
                            <!--                                                       data-thumb="assets/img/demo/unsplash/11.jpg"-->
                            <!--                                                       href="https://via.placeholder.com/1600x900"-->
                            <!--                                                       data-demo-href="assets/img/demo/unsplash/11.jpg">-->
                            <!--                                                        <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                             data-demo-src="assets/img/demo/unsplash/11.jpg" alt="">-->
                            <!--                                                    </a>-->
                            <!--                                                    <a data-fancybox="profile-post4" data-lightbox-type="comments"-->
                            <!--                                                       data-thumb="assets/img/demo/unsplash/12.jpg"-->
                            <!--                                                       href="https://via.placeholder.com/1600x900"-->
                            <!--                                                       data-demo-href="assets/img/demo/unsplash/12.jpg">-->
                            <!--                                                        <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                             data-demo-src="assets/img/demo/unsplash/12.jpg" alt="">-->
                            <!--                                                    </a>-->
                            <!--                                                    <a data-fancybox="profile-post4" data-lightbox-type="comments"-->
                            <!--                                                       data-thumb="assets/img/demo/unsplash/13.jpg"-->
                            <!--                                                       href="https://via.placeholder.com/1600x900"-->
                            <!--                                                       data-demo-href="assets/img/demo/unsplash/13.jpg">-->
                            <!--                                                        <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                             data-demo-src="assets/img/demo/unsplash/13.jpg" alt="">-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!-- Post actions -->
                            <!--                                                <div class="like-wrapper">-->
                            <!--                                                    <a href="javascript:void(0);" class="like-button">-->
                            <!--                                                        <i class="mdi mdi-heart not-liked bouncy"></i>-->
                            <!--                                                        <i class="mdi mdi-heart is-liked bouncy"></i>-->
                            <!--                                                        <span class="like-overlay"></span>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!---->
                            <!--                                                <div class="fab-wrapper is-share">-->
                            <!--                                                    <a href="javascript:void(0);"-->
                            <!--                                                       class="small-fab share-fab modal-trigger"-->
                            <!--                                                       data-modal="share-modal">-->
                            <!--                                                        <i data-feather="link-2"></i>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!---->
                            <!--                                                <div class="fab-wrapper is-comment">-->
                            <!--                                                    <a href="javascript:void(0);" class="small-fab">-->
                            <!--                                                        <i data-feather="message-circle"></i>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post body -->
                            <!---->
                            <!-- Post footer -->
                            <!--                                    <div class="card-footer">-->
                            <!---->
                            <!-- Followers -->
                            <!--                                        <div class="likers-group">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/rolf.jpg" data-user-popover="13"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/mike.jpg" data-user-popover="12"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/daniel.jpg" data-user-popover="3"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4"-->
                            <!--                                                 alt="">-->
                            <!--                                        </div>-->
                            <!--                                        <div class="likers-text">-->
                            <!---->
                            <!--                                            <p>-->
                            <!--                                                <a href="#">Mike</a>,-->
                            <!--                                                <a href="#">Rolf</a>-->
                            <!--                                            </p>-->
                            <!--                                            <p>and 31 more liked this</p>-->
                            <!---->
                            <!--                                        </div>-->
                            <!-- Post statistics -->
                            <!--                                        <div class="social-count">-->
                            <!--                                            <div class="likes-count">-->
                            <!--                                                <i data-feather="heart"></i>-->
                            <!--                                                <span>33</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="shares-count">-->
                            <!--                                                <i data-feather="link-2"></i>-->
                            <!--                                                <span>3</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="comments-count">-->
                            <!--                                                <i data-feather="message-circle"></i>-->
                            <!--                                                <span>8</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post footer -->
                            <!--                                </div>-->
                            <!-- Main wrap -->
                            <!---->
                            <!-- Comments -->
                            <!--                                <div class="comments-wrap is-hidden">-->
                            <!-- Header -->
                            <!--                                    <div class="comments-heading">-->
                            <!--                                        <h4>Comments-->
                            <!--                                            <small>(8)</small>-->
                            <!--                                        </h4>-->
                            <!--                                        <div class="close-comments">-->
                            <!--                                            <i data-feather="x"></i>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Header -->
                            <!---->
                            <!-- Comments body -->
                            <!--                                    <div class="comments-body has-slimscroll">-->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/stella.jpg"-->
                            <!--                                                         data-user-popover="2" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Stella Bergmann</a>-->
                            <!--                                                <span class="time">17 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud-->
                            <!--                                                    exercitation ullamco laboris consequat.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>0</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">f-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                                 data-user-popover="0" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Jenna Davis</a>-->
                            <!--                                                        <span class="time">17 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>4</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/david.jpg"-->
                            <!--                                                                 data-user-popover="4" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">David Kim</a>-->
                            <!--                                                        <span class="time">17 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>1</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/milly.jpg"-->
                            <!--                                                                 data-user-popover="7" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Milly Augustine</a>-->
                            <!--                                                        <span class="time">17 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>1</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/daniel.jpg"-->
                            <!--                                                         data-user-popover="3" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Daniel Wellington</a>-->
                            <!--                                                <span class="time">17 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>6</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/david.jpg"-->
                            <!--                                                         data-user-popover="4" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">David Kim</a>-->
                            <!--                                                <span class="time">18 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua.</p>-->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>5</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/stella.jpg"-->
                            <!--                                                                 data-user-popover="2" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Stella Bergmann</a>-->
                            <!--                                                        <span class="time">18 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>7</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/mike.jpg"-->
                            <!--                                                         data-user-popover="12" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Mike Lasalle</a>-->
                            <!--                                                <span class="time">20 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt.</p>-->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>5</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Load More comments -->
                            <!--                                        <div class="load-more has-text-centered">-->
                            <!--                                            <button class="load-more-button">-->
                            <!--                                                <i data-feather="more-horizontal"></i>-->
                            <!--                                            </button>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Comments body -->
                            <!---->
                            <!-- Comments footer -->
                            <!--                                    <div class="card-footer">-->
                            <!--                                        <div class="media post-comment has-emojis">-->
                            <!-- Textarea -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <div class="field">-->
                            <!--                                                    <p class="control">-->
                            <!--                                                        <textarea class="textarea comment-textarea" rows="5"-->
                            <!--                                                                  placeholder="Write a comment..."></textarea>-->
                            <!--                                                    </p>-->
                            <!--                                                </div>-->
                            <!-- Additional actions -->
                            <!--                                                <div class="actions">-->
                            <!--                                                    <div class="image is-32x32">-->
                            <!--                                                        <img class="is-rounded"-->
                            <!--                                                             src="https://via.placeholder.com/300x300"-->
                            <!--                                                             data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                             data-user-popover="0" alt="">-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="toolbar">-->
                            <!--                                                        <div class="action is-auto">-->
                            <!--                                                            <i data-feather="at-sign"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-emoji">-->
                            <!--                                                            <i data-feather="smile"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-upload">-->
                            <!--                                                            <i data-feather="camera"></i>-->
                            <!--                                                            <input type="file">-->
                            <!--                                                        </div>-->
                            <!--                                                        <a class="button is-solid primary-button raised">Post-->
                            <!--                                                            Comment</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Comments footer -->
                            <!--                                </div>-->
                            <!-- /Comments -->
                            <!--                            </div>-->
                            <!-- /Post -->
                            <!--                        </div>-->
                            <!-- /timeline POST #4 -->
                            <!-- Timeline post 5 -->
                            <!-- html/partials/pages/profile/posts/timeline-post5.html -->
                            <!-- Timeline POST #5 -->
                            <!--                        <div class="profile-post is-simple">-->
                            <!-- Timeline -->
                            <!--                            <div class="time is-hidden-mobile">-->
                            <!--                                <div class="img-container">-->
                            <!--                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                         data-demo-src="assets/img/avatars/jenna.png" alt="">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!-- Post -->
                            <!--                            <div class="card is-post">-->
                            <!-- Main wrap -->
                            <!--                                <div class="content-wrap">-->
                            <!-- Header -->
                            <!--                                    <div class="card-heading">-->
                            <!-- User image -->
                            <!--                                        <div class="user-block">-->
                            <!--                                            <div class="image">-->
                            <!--                                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                     data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0"-->
                            <!--                                                     alt="">-->
                            <!--                                            </div>-->
                            <!--                                            <div class="user-info">-->
                            <!--                                                <a href="#">Jenna Davis</a>-->
                            <!--                                                <span class="time">September 17 2018, 10:23am</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!---->
                            <!--                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                            <div>-->
                            <!--                                                <div class="button">-->
                            <!--                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                <div class="dropdown-content">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bookmark"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Bookmark</h3>-->
                            <!--                                                                <small>Add this post to your bookmarks.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <a class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bell"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Notify me</h3>-->
                            <!--                                                                <small>Send me the updates.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <hr class="dropdown-divider">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="flag"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Flag</h3>-->
                            <!--                                                                <small>In case of inappropriate content.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Header -->
                            <!---->
                            <!-- Post body -->
                            <!--                                    <div class="card-body">-->
                            <!-- Post body text -->
                            <!--                                        <div class="post-text">-->
                            <!--                                            <p>Hello guys, I need a ride because I need to go to <a href="#">#Los-->
                            <!--                                                    Angeles</a> to see a customer. I didn't have time to buy a train-->
                            <!--                                                ticket so can anyone pick me up in the morning if he is going there too-->
                            <!--                                                ?-->
                            <!--                                            <p>-->
                            <!--                                        </div>-->
                            <!-- Post actions -->
                            <!--                                        <div class="post-actions">-->
                            <!--                                            <div class="like-wrapper">-->
                            <!--                                                <a href="javascript:void(0);" class="like-button">-->
                            <!--                                                    <i class="mdi mdi-heart not-liked bouncy"></i>-->
                            <!--                                                    <i class="mdi mdi-heart is-liked bouncy"></i>-->
                            <!--                                                    <span class="like-overlay"></span>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!---->
                            <!--                                            <div class="fab-wrapper is-share">-->
                            <!--                                                <a href="javascript:void(0);" class="small-fab share-fab modal-trigger"-->
                            <!--                                                   data-modal="share-modal">-->
                            <!--                                                    <i data-feather="link-2"></i>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!---->
                            <!--                                            <div class="fab-wrapper is-comment">-->
                            <!--                                                <a href="javascript:void(0);" class="small-fab">-->
                            <!--                                                    <i data-feather="message-circle"></i>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post body -->
                            <!---->
                            <!-- Post footer -->
                            <!--                                    <div class="card-footer">-->
                            <!-- Followers -->
                            <!--                                        <div class="likers-group">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/daniel.jpg" data-user-popover="3"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6"-->
                            <!--                                                 alt="">-->
                            <!--                                        </div>-->
                            <!--                                        <div class="likers-text">-->
                            <!--                                            <p><a href="#">Daniel</a> and <a href="#">Elise</a></p>-->
                            <!--                                            <p>liked this</p>-->
                            <!--                                        </div>-->
                            <!-- Post statistics -->
                            <!--                                        <div class="social-count">-->
                            <!--                                            <div class="likes-count">-->
                            <!--                                                <i data-feather="heart"></i>-->
                            <!--                                                <span>2</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="shares-count">-->
                            <!--                                                <i data-feather="link-2"></i>-->
                            <!--                                                <span>0</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="comments-count">-->
                            <!--                                                <i data-feather="message-circle"></i>-->
                            <!--                                                <span>2</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post footer -->
                            <!--                                </div>-->
                            <!-- /Main wrap -->
                            <!---->
                            <!-- Post #6 comments -->
                            <!--                                <div class="comments-wrap is-hidden">-->
                            <!-- Header -->
                            <!--                                    <div class="comments-heading">-->
                            <!--                                        <h4>Comments (<small>2</small>)</h4>-->
                            <!--                                        <div class="close-comments">-->
                            <!--                                            <i data-feather="x"></i>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Header -->
                            <!---->
                            <!-- Comments body -->
                            <!--                                    <div class="comments-body has-slimscroll">-->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/elise.jpg"-->
                            <!--                                                         data-user-popover="6" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Elise Walker</a>-->
                            <!--                                                <span class="time">2 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore et dolore magna aliqua. Ut enim-->
                            <!--                                                    ad minim veniam, quis nostrud exercitation ullamco laboris-->
                            <!--                                                    consequat.</p>-->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>1</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                                 data-user-popover="0" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Jenna Davis</a>-->
                            <!--                                                        <span class="time">2 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore et dolore magna-->
                            <!--                                                            aliqua.</p>-->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>0</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Comment -->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!--                                    </div>-->
                            <!-- /Comments body -->
                            <!---->
                            <!-- Comments footer -->
                            <!--                                    <div class="card-footer">-->
                            <!--                                        <div class="media post-comment has-emojis">-->
                            <!-- Textarea -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <div class="field">-->
                            <!--                                                    <p class="control">-->
                            <!--                                                        <textarea class="textarea comment-textarea" rows="5"-->
                            <!--                                                                  placeholder="Write a comment..."></textarea>-->
                            <!--                                                    </p>-->
                            <!--                                                </div>-->
                            <!-- Additional actions -->
                            <!--                                                <div class="actions">-->
                            <!--                                                    <div class="image is-32x32">-->
                            <!--                                                        <img class="is-rounded"-->
                            <!--                                                             src="https://via.placeholder.com/300x300"-->
                            <!--                                                             data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                             data-user-popover="0" alt="">-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="toolbar">-->
                            <!--                                                        <div class="action is-auto">-->
                            <!--                                                            <i data-feather="at-sign"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-emoji">-->
                            <!--                                                            <i data-feather="smile"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-upload">-->
                            <!--                                                            <i data-feather="camera"></i>-->
                            <!--                                                            <input type="file">-->
                            <!--                                                        </div>-->
                            <!--                                                        <a class="button is-solid primary-button raised">Post-->
                            <!--                                                            Comment</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Comments footer -->
                            <!--                                </div>-->
                            <!-- /Post #6 comments -->
                            <!--                            </div>-->
                            <!-- /Post -->
                            <!--                        </div>-->
                            <!-- /timeline POST #5 -->
                            <!-- Timeline post 6 -->
                            <!-- html/partials/pages/profile/posts/timeline-post6.html -->
                            <!-- Timeline POST #6 -->
                            <!--                        <div class="profile-post is-simple">-->
                            <!-- Timeline -->
                            <!--                            <div class="time is-hidden-mobile">-->
                            <!--                                <div class="img-container">-->
                            <!--                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                         data-demo-src="assets/img/avatars/stella.jpg" alt="">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!-- Post -->
                            <!--                            <div class="card is-post">-->
                            <!-- Main wrap -->
                            <!--                                <div class="content-wrap">-->
                            <!-- Header -->
                            <!--                                    <div class="card-heading">-->
                            <!-- User image -->
                            <!--                                        <div class="user-block">-->
                            <!--                                            <div class="image">-->
                            <!--                                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                     data-demo-src="assets/img/avatars/stella.jpg" data-user-popover="2"-->
                            <!--                                                     alt="">-->
                            <!--                                            </div>-->
                            <!--                                            <div class="user-info">-->
                            <!--                                                <a href="#">Stella Bergmann shared a status on your feed</a>-->
                            <!--                                                <span class="time">September 12 2018, 05:49pm</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!---->
                            <!--                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                            <div>-->
                            <!--                                                <div class="button">-->
                            <!--                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                <div class="dropdown-content">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bookmark"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Bookmark</h3>-->
                            <!--                                                                <small>Add this post to your bookmarks.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <a class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bell"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Notify me</h3>-->
                            <!--                                                                <small>Send me the updates.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <hr class="dropdown-divider">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="flag"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Flag</h3>-->
                            <!--                                                                <small>In case of inappropriate content.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Header -->
                            <!---->
                            <!-- Post body -->
                            <!--                                    <div class="card-body">-->
                            <!-- Post body text -->
                            <!--                                        <div class="post-text">-->
                            <!--                                            <p>Are we going to see a movie tonight ? From what i can tell, that's what-->
                            <!--                                                you said last week.-->
                            <!--                                            <p>-->
                            <!--                                        </div>-->
                            <!-- Post actions -->
                            <!--                                        <div class="post-actions">-->
                            <!--                                            <div class="like-wrapper">-->
                            <!--                                                <a href="javascript:void(0);" class="like-button">-->
                            <!--                                                    <i class="mdi mdi-heart not-liked bouncy"></i>-->
                            <!--                                                    <i class="mdi mdi-heart is-liked bouncy"></i>-->
                            <!--                                                    <span class="like-overlay"></span>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!---->
                            <!--                                            <div class="fab-wrapper is-share">-->
                            <!--                                                <a href="javascript:void(0);" class="small-fab share-fab modal-trigger"-->
                            <!--                                                   data-modal="share-modal">-->
                            <!--                                                    <i data-feather="link-2"></i>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!---->
                            <!--                                            <div class="fab-wrapper is-comment">-->
                            <!--                                                <a href="javascript:void(0);" class="small-fab">-->
                            <!--                                                    <i data-feather="message-circle"></i>-->
                            <!--                                                </a>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post body -->
                            <!---->
                            <!-- Post footer -->
                            <!--                                    <div class="card-footer">-->
                            <!-- Followers -->
                            <!--                                        <div class="likers-group">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/daniel.jpg" data-user-popover="3"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6"-->
                            <!--                                                 alt="">-->
                            <!--                                        </div>-->
                            <!--                                        <div class="likers-text">-->
                            <!--                                            <p><a href="#">Daniel</a> and <a href="#">Elise</a></p>-->
                            <!--                                            <p>liked this</p>-->
                            <!--                                        </div>-->
                            <!-- Post statistics -->
                            <!--                                        <div class="social-count">-->
                            <!--                                            <div class="likes-count">-->
                            <!--                                                <i data-feather="heart"></i>-->
                            <!--                                                <span>2</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="shares-count">-->
                            <!--                                                <i data-feather="link-2"></i>-->
                            <!--                                                <span>0</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="comments-count">-->
                            <!--                                                <i data-feather="message-circle"></i>-->
                            <!--                                                <span>2</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post footer -->
                            <!--                                </div>-->
                            <!-- /Main wrap -->
                            <!---->
                            <!-- Post #6 comments -->
                            <!--                                <div class="comments-wrap is-hidden">-->
                            <!-- Header -->
                            <!--                                    <div class="comments-heading">-->
                            <!--                                        <h4>Comments (<small>2</small>)</h4>-->
                            <!--                                        <div class="close-comments">-->
                            <!--                                            <i data-feather="x"></i>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Header -->
                            <!---->
                            <!-- Comments body -->
                            <!--                                    <div class="comments-body">-->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment has-slimscroll">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                         data-user-popover="0" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Jenna Davis</a>-->
                            <!--                                                <span class="time">sep 12</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>-->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>1</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/stella.jpg"-->
                            <!--                                                                 data-user-popover="2" alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Stella Bergmann</a>-->
                            <!--                                                        <span class="time">sep 12</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore et dolore magna-->
                            <!--                                                            aliqua.</p>-->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>0</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!--                                    </div>-->
                            <!-- /Comments body -->
                            <!---->
                            <!-- Comments footer -->
                            <!--                                    <div class="card-footer">-->
                            <!--                                        <div class="media post-comment has-emojis">-->
                            <!-- Textarea -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <div class="field">-->
                            <!--                                                    <p class="control">-->
                            <!--                                                        <textarea class="textarea comment-textarea" rows="5"-->
                            <!--                                                                  placeholder="Write a comment..."></textarea>-->
                            <!--                                                    </p>-->
                            <!--                                                </div>-->
                            <!-- Additional actions -->
                            <!--                                                <div class="actions">-->
                            <!--                                                    <div class="image is-32x32">-->
                            <!--                                                        <img class="is-rounded"-->
                            <!--                                                             src="https://via.placeholder.com/300x300"-->
                            <!--                                                             data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                             data-user-popover="0" alt="">-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="toolbar">-->
                            <!--                                                        <div class="action is-auto">-->
                            <!--                                                            <i data-feather="at-sign"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-emoji">-->
                            <!--                                                            <i data-feather="smile"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-upload">-->
                            <!--                                                            <i data-feather="camera"></i>-->
                            <!--                                                            <input type="file">-->
                            <!--                                                        </div>-->
                            <!--                                                        <a class="button is-solid primary-button raised">Post-->
                            <!--                                                            Comment</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Comments footer -->
                            <!--                                </div>-->
                            <!-- /Post #6 comments -->
                            <!--                            </div>-->
                            <!-- /Post -->
                            <!--                        </div>-->
                            <!-- /timeline POST #6 -->
                            <!-- Timeline post 7 -->
                            <!-- html/partials/pages/profile/posts/timeline-post7.html -->
                            <!-- Timeline POST #7 -->
                            <!--                        <div class="profile-post">-->
                            <!-- Timeline -->
                            <!--                            <div class="time is-hidden-mobile">-->
                            <!--                                <div class="img-container">-->
                            <!--                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                         data-demo-src="assets/img/avatars/jenna.png" alt="">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!-- Post -->
                            <!--                            <div class="card is-post">-->
                            <!-- Main wrap -->
                            <!--                                <div class="content-wrap">-->
                            <!-- Header -->
                            <!--                                    <div class="card-heading">-->
                            <!--                                        <div class="user-block">-->
                            <!--                                            <div class="image">-->
                            <!--                                                <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                     data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0"-->
                            <!--                                                     alt="">-->
                            <!--                                            </div>-->
                            <!--                                            <div class="user-info">-->
                            <!--                                                <a href="#">Jenna Davis</a>-->
                            <!--                                                <span class="time">September 26 2018, 11:18am</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- Right side dropdown -->
                            <!--                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                            <div>-->
                            <!--                                                <div class="button">-->
                            <!--                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                <div class="dropdown-content">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bookmark"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Bookmark</h3>-->
                            <!--                                                                <small>Add this post to your bookmarks.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <a class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="bell"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Notify me</h3>-->
                            <!--                                                                <small>Send me the updates.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                    <hr class="dropdown-divider">-->
                            <!--                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                        <div class="media">-->
                            <!--                                                            <i data-feather="flag"></i>-->
                            <!--                                                            <div class="media-content">-->
                            <!--                                                                <h3>Flag</h3>-->
                            <!--                                                                <small>In case of inappropriate content.</small>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- Header -->
                            <!---->
                            <!-- Post body -->
                            <!--                                    <div class="card-body">-->
                            <!-- Post body text -->
                            <!--                                        <div class="post-text">-->
                            <!--                                            <p>Hello everyone! Today iam posting a review of the latest shoe trends. I-->
                            <!--                                                tried for you more than 30 pairs of shoes. I had some crushes and some-->
                            <!--                                                deceptions, However, it was a great experience i would like to share-->
                            <!--                                                with you.-->
                            <!--                                            <p>-->
                            <!--                                        </div>-->
                            <!-- Featured image -->
                            <!--                                        <div class="post-image">-->
                            <!-- CSS triple wrap -->
                            <!--                                            <div class="triple-grid">-->
                            <!--                                                <a data-fancybox="profile-post4" data-lightbox-type="comments"-->
                            <!--                                                   data-thumb="assets/img/demo/unsplash/16.jpg"-->
                            <!--                                                   href="https://via.placeholder.com/1600x900"-->
                            <!--                                                   data-demo-href="assets/img/demo/unsplash/16.jpg">-->
                            <!--                                                    <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                         data-demo-src="assets/img/demo/unsplash/16.jpg" alt="">-->
                            <!--                                                </a>-->
                            <!--                                                <a class="is-half" data-fancybox="profile-post4"-->
                            <!--                                                   data-lightbox-type="comments"-->
                            <!--                                                   data-thumb="assets/img/demo/unsplash/14.jpg"-->
                            <!--                                                   href="https://via.placeholder.com/1600x900"-->
                            <!--                                                   data-demo-href="assets/img/demo/unsplash/14.jpg">-->
                            <!--                                                    <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                         data-demo-src="assets/img/demo/unsplash/14.jpg" alt="">-->
                            <!--                                                </a>-->
                            <!--                                                <a class="is-half" data-fancybox="profile-post4"-->
                            <!--                                                   data-lightbox-type="comments"-->
                            <!--                                                   data-thumb="assets/img/demo/unsplash/15.jpg"-->
                            <!--                                                   href="https://via.placeholder.com/1600x900"-->
                            <!--                                                   data-demo-href="assets/img/demo/unsplash/15.jpg">-->
                            <!--                                                    <img src="https://via.placeholder.com/1600x900"-->
                            <!--                                                         data-demo-src="assets/img/demo/unsplash/15.jpg" alt="">-->
                            <!--                                                </a>-->
                            <!-- Post actions -->
                            <!--                                                <div class="like-wrapper">-->
                            <!--                                                    <a href="javascript:void(0);" class="like-button">-->
                            <!--                                                        <i class="mdi mdi-heart not-liked bouncy"></i>-->
                            <!--                                                        <i class="mdi mdi-heart is-liked bouncy"></i>-->
                            <!--                                                        <span class="like-overlay"></span>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!---->
                            <!--                                                <div class="fab-wrapper is-share">-->
                            <!--                                                    <a href="javascript:void(0);"-->
                            <!--                                                       class="small-fab share-fab modal-trigger"-->
                            <!--                                                       data-modal="share-modal">-->
                            <!--                                                        <i data-feather="link-2"></i>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!---->
                            <!--                                                <div class="fab-wrapper is-comment">-->
                            <!--                                                    <a href="javascript:void(0);" class="small-fab">-->
                            <!--                                                        <i data-feather="message-circle"></i>-->
                            <!--                                                    </a>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post body -->
                            <!---->
                            <!-- Post footer -->
                            <!--                                    <div class="card-footer">-->
                            <!-- Followers -->
                            <!--                                        <div class="likers-group">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/rolf.jpg" data-user-popover="13"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/mike.jpg" data-user-popover="12"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/daniel.jpg" data-user-popover="3"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/elise.jpg" data-user-popover="6"-->
                            <!--                                                 alt="">-->
                            <!--                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                 data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4"-->
                            <!--                                                 alt="">-->
                            <!--                                        </div>-->
                            <!--                                        <div class="likers-text">-->
                            <!--                                            <p>-->
                            <!--                                                <a href="#">Mike</a>,-->
                            <!--                                                <a href="#">Rolf</a>-->
                            <!--                                            </p>-->
                            <!--                                            <p>and 31 more liked this</p>-->
                            <!--                                        </div>-->
                            <!-- Post statistics -->
                            <!--                                        <div class="social-count">-->
                            <!--                                            <div class="likes-count">-->
                            <!--                                                <i data-feather="heart"></i>-->
                            <!--                                                <span>33</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="shares-count">-->
                            <!--                                                <i data-feather="link-2"></i>-->
                            <!--                                                <span>3</span>-->
                            <!--                                            </div>-->
                            <!--                                            <div class="comments-count">-->
                            <!--                                                <i data-feather="message-circle"></i>-->
                            <!--                                                <span>8</span>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Post footer -->
                            <!--                                </div>-->
                            <!-- Main wrap -->
                            <!---->
                            <!-- Comments -->
                            <!--                                <div class="comments-wrap is-hidden">-->
                            <!-- Header -->
                            <!--                                    <div class="comments-heading">-->
                            <!--                                        <h4>Comments-->
                            <!--                                            <small>(8)</small>-->
                            <!--                                        </h4>-->
                            <!--                                        <div class="close-comments">-->
                            <!--                                            <i data-feather="x"></i>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Header -->
                            <!---->
                            <!-- Comments body -->
                            <!--                                    <div class="comments-body has-slimscroll">-->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/stella.jpg"-->
                            <!--                                                         data-user-popover="4" alt=""> data-user-popover="2" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Stella Bergmann</a>-->
                            <!--                                                <span class="time">17 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud-->
                            <!--                                                    exercitation ullamco laboris consequat.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>0</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                                 data-user-popover="4" alt=""> data-user-popover="0"-->
                            <!--                                                            alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Jenna Davis</a>-->
                            <!--                                                        <span class="time">17 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>4</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/david.jpg"-->
                            <!--                                                                 data-user-popover="4" alt=""> data-user-popover="4"-->
                            <!--                                                            alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">David Kim</a>-->
                            <!--                                                        <span class="time">17 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>1</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/milly.jpg"-->
                            <!--                                                                 data-user-popover="4" alt=""> data-user-popover="7"-->
                            <!--                                                            alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Milly Augustine</a>-->
                            <!--                                                        <span class="time">17 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>1</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/daniel.jpg"-->
                            <!--                                                         data-user-popover="4" alt=""> data-user-popover="3" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Daniel Wellington</a>-->
                            <!--                                                <span class="time">17 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo.</p>-->
                            <!-- Comment actions -->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>6</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/david.jpg"-->
                            <!--                                                         data-user-popover="4" alt=""> data-user-popover="4" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">David Kim</a>-->
                            <!--                                                <span class="time">18 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt ut labore-->
                            <!--                                                    et dolore magna aliqua.</p>-->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>5</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!---->
                            <!-- Nested Comment -->
                            <!--                                                <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                                    <div class="media-left">-->
                            <!--                                                        <div class="image">-->
                            <!--                                                            <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                                 data-demo-src="assets/img/avatars/stella.jpg"-->
                            <!--                                                                 data-user-popover="4" alt=""> data-user-popover="2"-->
                            <!--                                                            alt="">-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Content -->
                            <!--                                                    <div class="media-content">-->
                            <!--                                                        <a href="#">Stella Bergmann</a>-->
                            <!--                                                        <span class="time">18 days ago</span>-->
                            <!--                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed-->
                            <!--                                                            do eiusmod tempo incididunt ut labore-->
                            <!--                                                            et dolore magna aliqua.</p>-->
                            <!-- Comment actions -->
                            <!--                                                        <div class="controls">-->
                            <!--                                                            <div class="like-count">-->
                            <!--                                                                <i data-feather="thumbs-up"></i>-->
                            <!--                                                                <span>7</span>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="reply">-->
                            <!--                                                                <a href="#">Reply</a>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!-- Right side dropdown -->
                            <!--                                                    <div class="media-right">-->
                            <!--                                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                            <div>-->
                            <!--                                                                <div class="button">-->
                            <!--                                                                    <i data-feather="more-vertical"></i>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                            <div class="dropdown-menu" role="menu">-->
                            <!--                                                                <div class="dropdown-content">-->
                            <!--                                                                    <a class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="x"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Hide</h3>-->
                            <!--                                                                                <small>Hide this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                    <div class="dropdown-divider"></div>-->
                            <!--                                                                    <a href="#" class="dropdown-item">-->
                            <!--                                                                        <div class="media">-->
                            <!--                                                                            <i data-feather="flag"></i>-->
                            <!--                                                                            <div class="media-content">-->
                            <!--                                                                                <h3>Report</h3>-->
                            <!--                                                                                <small>Report this comment.</small>-->
                            <!--                                                                            </div>-->
                            <!--                                                                        </div>-->
                            <!--                                                                    </a>-->
                            <!--                                                                </div>-->
                            <!--                                                            </div>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!-- /Nested Comment -->
                            <!---->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Comment -->
                            <!--                                        <div class="media is-comment">-->
                            <!-- User image -->
                            <!--                                            <div class="media-left">-->
                            <!--                                                <div class="image">-->
                            <!--                                                    <img src="https://via.placeholder.com/300x300"-->
                            <!--                                                         data-demo-src="assets/img/avatars/mike.jpg"-->
                            <!--                                                         data-user-popover="4" alt=""> data-user-popover="12" alt="">-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Content -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <a href="#">Mike Lasalle</a>-->
                            <!--                                                <span class="time">20 days ago</span>-->
                            <!--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do-->
                            <!--                                                    eiusmod tempo incididunt.</p>-->
                            <!--                                                <div class="controls">-->
                            <!--                                                    <div class="like-count">-->
                            <!--                                                        <i data-feather="thumbs-up"></i>-->
                            <!--                                                        <span>5</span>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="reply">-->
                            <!--                                                        <a href="#">Reply</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!-- Right side dropdown -->
                            <!--                                            <div class="media-right">-->
                            <!--                                                <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">-->
                            <!--                                                    <div>-->
                            <!--                                                        <div class="button">-->
                            <!--                                                            <i data-feather="more-vertical"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="dropdown-menu" role="menu">-->
                            <!--                                                        <div class="dropdown-content">-->
                            <!--                                                            <a class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="x"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Hide</h3>-->
                            <!--                                                                        <small>Hide this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                            <div class="dropdown-divider"></div>-->
                            <!--                                                            <a href="#" class="dropdown-item">-->
                            <!--                                                                <div class="media">-->
                            <!--                                                                    <i data-feather="flag"></i>-->
                            <!--                                                                    <div class="media-content">-->
                            <!--                                                                        <h3>Report</h3>-->
                            <!--                                                                        <small>Report this comment.</small>-->
                            <!--                                                                    </div>-->
                            <!--                                                                </div>-->
                            <!--                                                            </a>-->
                            <!--                                                        </div>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!-- /Comment -->
                            <!---->
                            <!-- Load More comments -->
                            <!--                                        <div class="load-more has-text-centered">-->
                            <!--                                            <button class="load-more-button">-->
                            <!--                                                <i data-feather="more-horizontal"></i>-->
                            <!--                                            </button>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Comments body -->
                            <!---->
                            <!-- Comments footer -->
                            <!--                                    <div class="card-footer">-->
                            <!--                                        <div class="media post-comment has-emojis">-->
                            <!-- Textarea -->
                            <!--                                            <div class="media-content">-->
                            <!--                                                <div class="field">-->
                            <!--                                                    <p class="control">-->
                            <!--                                                        <textarea class="textarea comment-textarea" rows="5"-->
                            <!--                                                                  placeholder="Write a comment..."></textarea>-->
                            <!--                                                    </p>-->
                            <!--                                                </div>-->
                            <!-- Additional actions -->
                            <!--                                                <div class="actions">-->
                            <!--                                                    <div class="image is-32x32">-->
                            <!--                                                        <img class="is-rounded"-->
                            <!--                                                             src="https://via.placeholder.com/300x300"-->
                            <!--                                                             data-demo-src="assets/img/avatars/jenna.png"-->
                            <!--                                                             data-user-popover="0" alt="">-->
                            <!--                                                    </div>-->
                            <!--                                                    <div class="toolbar">-->
                            <!--                                                        <div class="action is-auto">-->
                            <!--                                                            <i data-feather="at-sign"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-emoji">-->
                            <!--                                                            <i data-feather="smile"></i>-->
                            <!--                                                        </div>-->
                            <!--                                                        <div class="action is-upload">-->
                            <!--                                                            <i data-feather="camera"></i>-->
                            <!--                                                            <input type="file">-->
                            <!--                                                        </div>-->
                            <!--                                                        <a class="button is-solid primary-button raised">Post-->
                            <!--                                                            Comment</a>-->
                            <!--                                                    </div>-->
                            <!--                                                </div>-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!-- /Comments footer -->
                            <!--                                </div>-->
                            <!-- /Comments -->
                            <!--                            </div>-->
                            <!-- /Post -->
                            <!--                        </div>-->
                            <!-- /timeline POST #7 -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile page main wrapper -->

        </div>
        <!-- /Container -->

        <?php include "includes/frontEnd/profile-modals.php"; ?>

    </div>

    <div class="chat-wrapper">
        <div class="chat-inner">

            <!-- Chat top navigation -->
            <div class="chat-nav">
                <div class="nav-start">
                    <div class="recipient-block">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
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
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
                            <div class="user-status is-online"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="stella" data-full-name="Stella Bergmann" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="daniel" data-full-name="Daniel Wellington" data-status="Away">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                            <div class="user-status is-away"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="david" data-full-name="David Kim" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="edward" data-full-name="Edward Mayers" data-status="Online">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                            <div class="user-status is-online"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="elise" data-full-name="Elise Walker" data-status="Away">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="">
                            <div class="user-status is-away"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="nelly" data-full-name="Nelly Schwartz" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">
                            <div class="user-status is-busy"></div>
                        </div>
                    </div>
                    <!-- User -->
                    <div class="user-item" data-chat-user="milly" data-full-name="Milly Augustine" data-status="Busy">
                        <div class="avatar-container">
                            <img class="user-avatar" src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
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
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
                        <div class="message-block">
                            <span>4:55pm</span>
                            <div class="message-text">Hey Jenna, what's up?</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
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
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
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
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
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
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" alt="">
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
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/stella.jpg" alt="">
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
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
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
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
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
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" alt="">
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
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/elise.jpg" alt="">
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
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" alt="">
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
                                <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" alt="">
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

    <?php
    //Menu Exploration
    include "includes/frontEnd/explore-menu.php";

    ?>
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
                        <a href="index.php#demos-section" class="button is-solid accent-button raised is-fullwidth">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Concatenated js plugins and jQuery -->
    <script src="/assets/js/app.js"></script>

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
    <script src="/assets/js/feed.js"></script>

    <!-- profile js -->
    <script src="/assets/js/profile.js"></script>

    <script src="/assets/js/autocompletes.js"></script>
    <script src="/assets/js/resources.js"></script>

</body>

</html>