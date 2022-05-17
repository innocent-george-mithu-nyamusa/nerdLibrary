<!DOCTYPE html>
<html lang="en">
<?php
use Classes\ActivityView;
use Classes\CategoryView;
use Classes\CommentView;
use Classes\EnrollmentsView;
use Classes\ProgressTrackView;
use Classes\RelationshipView;
use Classes\SeriesView;
use Classes\UserPostView;
use Classes\UserView;
use Classes\Utilities;

include "vendor/autoload.php";

$seriesObj = new SeriesView();
$categoryObj = new CategoryView();
$enrollmentObj = new EnrollmentsView();
$userObj = new UserView();
$postObj = new UserPostView();
$utility = new Utilities();
$progressObj = new ProgressTrackView();
$relationObj = new RelationshipView();
$commentsObj = new CommentView();
$activityObj = new ActivityView();

?>


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Events| NerdLibrary </title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link href="../cdn.jsdelivr.net/npm/fontisto%40v3.0.4/css/fontisto/fontisto-brands.min.css" rel="stylesheet">
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
    ?>
    <div class="view-wrapper">

        <!--Wrapper-->
        <div id="events-page" class="events-wrapper">
            <!--Events Sidebar-->
            <div class="left-panel">
                <div class="left-panel-inner has-slimscroll">
                    <!--Event Link-->
                    <a href="#event-1" data-event-id="event-1" class="scroll-link is-active">
                        <span class="date-block">
                                <i data-feather="calendar"></i>
                                <span class="month">May 5th</span>
                        </span>
                        <span class="meta-block">
                                <span class="time">at 08:00 pm</span>
                        </span>
                    </a>
                    <!--Event Link-->
                    <a href="#event-2" data-event-id="event-2" class="scroll-link">
                        <span class="date-block">
                                <i data-feather="calendar"></i>
                                <span class="month">May 8th</span>
                        </span>
                        <span class="meta-block">
                                <span class="time">at 09:30 am</span>
                        </span>
                    </a>
                    <!--Event Link-->
                    <a href="#event-3" data-event-id="event-3" class="scroll-link">
                        <span class="date-block">
                                <i data-feather="calendar"></i>
                                <span class="month">May 10th</span>
                        </span>
                        <span class="meta-block">
                                <span class="time">at 10:45 am</span>
                        </span>
                    </a>
                    <!--Event Link-->
                    <a href="#event-4" data-event-id="event-4" class="scroll-link">
                        <span class="date-block">
                                <i data-feather="calendar"></i>
                                <span class="month">May 23rd</span>
                        </span>
                        <span class="meta-block">
                                <span class="time">at 04:00 pm</span>
                        </span>
                    </a>
                    <!--Event Link-->
                    <a href="#event-5" data-event-id="event-5" class="scroll-link">
                        <span class="date-block">
                                <i data-feather="calendar"></i>
                                <span class="month">Jun 3rd</span>
                        </span>
                        <span class="meta-block">
                                <span class="time">at 09:30 am</span>
                        </span>
                    </a>
                    <!--Event Link-->
                    <a href="#event-6" data-event-id="event-6" class="scroll-link">
                        <span class="date-block">
                                <i data-feather="calendar"></i>
                                <span class="month">Jul 28th</span>
                        </span>
                        <span class="meta-block">
                                <span class="time">at 02:00 pm</span>
                        </span>
                    </a>
                    <!--Add Event-->
                    <div class="add-event">
                        <button class="button">New Event</button>
                    </div>
                </div>
            </div>

            <!--Event List-->
            <div class="wrapper-inner">
                <div id="event-list" class="event-list">
                    <!-- /partials/pages/events/events-1.html -->
                    <div id="event-1" class="event-item">
                        <div class="event-inner-wrap">
                            <!-- /partials/pages/events/event-options-dropdown.html -->
                            <div class="dropdown is-spaced event-options is-accent is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="settings"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="calendar"></i>
                                                <div class="media-content">
                                                    <h3>View Event</h3>
                                                    <small>Open event details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="smile"></i>
                                                <div class="media-content">
                                                    <h3>Owner</h3>
                                                    <small>View owner details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="delete"></i>
                                                <div class="media-content">
                                                    <h3>Leave</h3>
                                                    <small>Leave this event.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="flag"></i>
                                                <div class="media-content">
                                                    <h3>Report</h3>
                                                    <small>unappropriate content.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h2 class="event-title">Awesome Pool Party with Friends</h2>
                            <div class="event-subtitle">
                                <i data-feather="map-pin"></i>
                                <h3>Stella Bergmann's place | July 5, 2020.</h3>
                            </div>
                            <div class="event-content">
                                <div class="event-description content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Restatis igitur vos; Putabam equidem
                                        satis, inquit, me
                                        dixisse. Sed ea mala virtuti magnitudine obruebantur. Tenent mordicus. Duo Reges:
                                        constructio interrete. </p>

                                    <p>Tollitur beneficium, tollitur gratia, quae sunt vincla concordiae. Falli igitur possumus.
                                        Bonum patria: miserum
                                        exilium. Sullae consulatum? Eiuro, inquit adridens, iniquum, hac quidem de re; Tu vero,
                                        inquam, ducas licet, si
                                        sequetur; </p>

                                    <p>Quorum altera prosunt, nocent altera. Quis hoc dicit? Hos contra singulos dici est melius.
                                        Quid iudicant sensus? </p>

                                </div>
                            </div>
                            <div class="event-participants">
                                <div class="participants-group">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" data-user-popover="7" alt="">
                                </div>
                                <div class="participants-text">
                                    <p>
                                        <a href="#">You</a>,
                                        <a href="#">David</a>
                                    </p>
                                    <p>and 23 more are participating</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /partials/pages/events/events-2.html -->
                    <div id="event-2" class="event-item">
                        <div class="event-inner-wrap">
                            <!-- /partials/pages/events/event-options-dropdown.html -->
                            <div class="dropdown is-spaced event-options is-accent is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="settings"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="calendar"></i>
                                                <div class="media-content">
                                                    <h3>View Event</h3>
                                                    <small>Open event details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="smile"></i>
                                                <div class="media-content">
                                                    <h3>Owner</h3>
                                                    <small>View owner details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="delete"></i>
                                                <div class="media-content">
                                                    <h3>Leave</h3>
                                                    <small>Leave this event.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="flag"></i>
                                                <div class="media-content">
                                                    <h3>Report</h3>
                                                    <small>unappropriate content.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h2 class="event-title">Design & Web of today conference</h2>
                            <div class="event-subtitle">
                                <i data-feather="map-pin"></i>
                                <h3>Parkman Conference Center, Chicago | July 8, 2020.</h3>
                            </div>
                            <div class="event-content">
                                <div class="event-description content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Restatis igitur vos; Putabam equidem
                                        satis, inquit, me
                                        dixisse. Sed ea mala virtuti magnitudine obruebantur. Tenent mordicus. Duo Reges:
                                        constructio interrete. </p>

                                    <p>Tollitur beneficium, tollitur gratia, quae sunt vincla concordiae. Falli igitur possumus.
                                        Bonum patria: miserum.</p>

                                    <p>Quorum altera prosunt, nocent altera. Quis hoc dicit? Hos contra singulos dici est melius.
                                        Quid iudicant sensus? </p>

                                </div>
                            </div>
                            <div class="event-participants">
                                <div class="participants-group">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" data-user-popover="7" alt="">
                                </div>
                                <div class="participants-text">
                                    <p>
                                        <a href="#">You</a>,
                                        <a href="#">David</a>
                                    </p>
                                    <p>and 272 more are participating</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /partials/pages/events/events-3.html -->
                    <div id="event-3" class="event-item">
                        <div class="event-inner-wrap">
                            <!-- /partials/pages/events/event-options-dropdown.html -->
                            <div class="dropdown is-spaced event-options is-accent is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="settings"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="calendar"></i>
                                                <div class="media-content">
                                                    <h3>View Event</h3>
                                                    <small>Open event details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="smile"></i>
                                                <div class="media-content">
                                                    <h3>Owner</h3>
                                                    <small>View owner details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="delete"></i>
                                                <div class="media-content">
                                                    <h3>Leave</h3>
                                                    <small>Leave this event.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="flag"></i>
                                                <div class="media-content">
                                                    <h3>Report</h3>
                                                    <small>unappropriate content.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h2 class="event-title">Project review with Edward and Nelly</h2>
                            <div class="event-subtitle">
                                <i data-feather="map-pin"></i>
                                <h3>Office, meeting room | July 10, 2020.</h3>
                            </div>
                            <div class="event-content">
                                <div class="event-description content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Restatis igitur vos; Putabam equidem
                                        satis, inquit, me
                                        dixisse. Sed ea mala virtuti magnitudine obruebantur. Tenent mordicus. Duo Reges:
                                        constructio interrete. </p>

                                    <p>Tollitur beneficium, tollitur gratia, quae sunt vincla concordiae. Falli igitur possumus.
                                        Bonum patria: miserum.</p>

                                </div>
                            </div>
                            <div class="event-participants">
                                <div class="participants-group">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" data-user-popover="9" alt="">
                                </div>
                                <div class="participants-text">
                                    <p>
                                        <a href="#">You</a>,
                                        <a href="#">Nelly</a>
                                    </p>
                                    <p>and 1 more are participating</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /partials/pages/events/events-4.html -->
                    <div id="event-4" class="event-item">
                        <div class="event-inner-wrap">
                            <!-- /partials/pages/events/event-options-dropdown.html -->
                            <div class="dropdown is-spaced event-options is-accent is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="settings"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="calendar"></i>
                                                <div class="media-content">
                                                    <h3>View Event</h3>
                                                    <small>Open event details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="smile"></i>
                                                <div class="media-content">
                                                    <h3>Owner</h3>
                                                    <small>View owner details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="delete"></i>
                                                <div class="media-content">
                                                    <h3>Leave</h3>
                                                    <small>Leave this event.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="flag"></i>
                                                <div class="media-content">
                                                    <h3>Report</h3>
                                                    <small>unappropriate content.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h2 class="event-title">Chanel Private Flash Sale</h2>
                            <div class="event-subtitle">
                                <i data-feather="map-pin"></i>
                                <h3>Timothy Palace, Baltimore | July 23, 2020.</h3>
                            </div>
                            <div class="event-content">
                                <div class="event-description content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Restatis igitur vos; Putabam equidem
                                        satis, inquit, me
                                        dixisse. Sed ea mala virtuti magnitudine obruebantur. Tenent mordicus. Duo Reges:
                                        constructio interrete. </p>

                                    <p>Tollitur beneficium, tollitur gratia, quae sunt vincla concordiae. Falli igitur possumus.
                                        Bonum patria: miserum
                                        exilium. Sullae consulatum? Eiuro, inquit adridens, iniquum, hac quidem de re; Tu vero,
                                        inquam, ducas licet, si
                                        sequetur; </p>

                                    <p>Quorum altera prosunt, nocent altera. Quis hoc dicit? Hos contra singulos dici est melius.
                                        Quid iudicant sensus? </p>

                                </div>
                            </div>
                            <div class="event-participants">
                                <div class="participants-group">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" data-user-popover="7" alt="">
                                </div>
                                <div class="participants-text">
                                    <p>
                                        <a href="#">You</a>,
                                        <a href="#">David</a>
                                    </p>
                                    <p>and 128 more are participating</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /partials/pages/events/events-5.html -->
                    <div id="event-5" class="event-item">
                        <div class="event-inner-wrap">
                            <!-- /partials/pages/events/event-options-dropdown.html -->
                            <div class="dropdown is-spaced event-options is-accent is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="settings"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="calendar"></i>
                                                <div class="media-content">
                                                    <h3>View Event</h3>
                                                    <small>Open event details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="smile"></i>
                                                <div class="media-content">
                                                    <h3>Owner</h3>
                                                    <small>View owner details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="delete"></i>
                                                <div class="media-content">
                                                    <h3>Leave</h3>
                                                    <small>Leave this event.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="flag"></i>
                                                <div class="media-content">
                                                    <h3>Report</h3>
                                                    <small>unappropriate content.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h2 class="event-title">Vue Js Workshop</h2>
                            <div class="event-subtitle">
                                <i data-feather="map-pin"></i>
                                <h3>Parkman Conference Center, Chicago | July 3, 2020.</h3>
                            </div>
                            <div class="event-content">
                                <div class="event-description content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Restatis igitur vos; Putabam equidem
                                        satis, inquit, me
                                        dixisse. Sed ea mala virtuti magnitudine obruebantur. Tenent mordicus. Duo Reges:
                                        constructio interrete. </p>

                                    <p>Tollitur beneficium, tollitur gratia, quae sunt vincla concordiae. Falli igitur possumus.
                                        Bonum patria: miserum.</p>

                                    <p>Quorum altera prosunt, nocent altera. Quis hoc dicit? Hos contra singulos dici est melius.
                                        Quid iudicant sensus? </p>

                                </div>
                            </div>
                            <div class="event-participants">
                                <div class="participants-group">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">
                                </div>
                                <div class="participants-text">
                                    <p>
                                        <a href="#">You</a> and
                                        <a href="#"> David</a>
                                    </p>
                                    <p>are participating</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /partials/pages/events/events-6.html -->
                    <div id="event-6" class="event-item">
                        <div class="event-inner-wrap">
                            <!-- /partials/pages/events/event-options-dropdown.html -->
                            <div class="dropdown is-spaced event-options is-accent is-right dropdown-trigger">
                                <div>
                                    <div class="button">
                                        <i data-feather="settings"></i>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="calendar"></i>
                                                <div class="media-content">
                                                    <h3>View Event</h3>
                                                    <small>Open event details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="smile"></i>
                                                <div class="media-content">
                                                    <h3>Owner</h3>
                                                    <small>View owner details.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="delete"></i>
                                                <div class="media-content">
                                                    <h3>Leave</h3>
                                                    <small>Leave this event.</small>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            <div class="media">
                                                <i data-feather="flag"></i>
                                                <div class="media-content">
                                                    <h3>Report</h3>
                                                    <small>unappropriate content.</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h2 class="event-title">Lana and Michael's wedding party</h2>
                            <div class="event-subtitle">
                                <i data-feather="map-pin"></i>
                                <h3>Calapura Resort | July 28, 2020.</h3>
                            </div>
                            <div class="event-content">
                                <div class="event-description content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Restatis igitur vos; Putabam equidem
                                        satis, inquit, me
                                        dixisse. Sed ea mala virtuti magnitudine obruebantur. Tenent mordicus. Duo Reges:
                                        constructio interrete. </p>

                                    <p>Tollitur beneficium, tollitur gratia, quae sunt vincla concordiae. Falli igitur possumus.
                                        Bonum patria: miserum
                                        exilium. Sullae consulatum? Eiuro, inquit adridens, iniquum, hac quidem de re; Tu vero,
                                        inquam, ducas licet, si
                                        sequetur; </p>

                                    <p>Quorum altera prosunt, nocent altera. Quis hoc dicit? Hos contra singulos dici est melius.
                                        Quid iudicant sensus? </p>

                                </div>
                            </div>
                            <div class="event-participants">
                                <div class="participants-group">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" data-user-popover="0" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                                    <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" data-user-popover="7" alt="">
                                </div>
                                <div class="participants-text">
                                    <p>
                                        <a href="#">You</a>,
                                        <a href="#">David</a>
                                    </p>
                                    <p>and 78 more are participating</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Activity Panel-->
            <div class="right-panel">
                <div class="panel-header">
                    <h3>Events Activity</h3>
                </div>
                <div class="panel-body has-slimscroll">
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">
                        <div class="activity-meta">
                            <p><a>David Kim</a> is now participating to the <a>Awesome Pool Party with Friends</a> event.</p>
                            <span>23 minutes ago</span>
                        </div>
                    </div>
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/icons/logos/fastpizza.svg" data-page-popover="0" alt="">
                        <div class="activity-meta">
                            <p><a>Fast Pizza</a> has scheduled a new event named <a>Family day at your closest Fast Pizza</a>.</p>
                            <span>1 hour ago</span>
                        </div>
                    </div>
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                        <div class="activity-meta">
                            <p><a>Edward Mayers</a> is now participating to the <a>Awesome Pool Party with Friends</a> event.</p>
                            <span>2 hours ago</span>
                        </div>
                    </div>
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/nelly.png" data-user-popover="9" alt="">
                        <div class="activity-meta">
                            <p><a>Nelly Scwatrz</a> accepted your invitation to <a>Project review with Edward and Nelly</a>.</p>
                            <span>2 hours ago</span>
                        </div>
                    </div>
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/icons/logos/lonelydroid.svg" data-page-popover="1" alt="">
                        <div class="activity-meta">
                            <p><a>Lonely Droid</a> has scheduled a new event named <a>Lonely Droid Days</a>.</p>
                            <span>5 hours ago</span>
                        </div>
                    </div>
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/milly.jpg" data-user-popover="7" alt="">
                        <div class="activity-meta">
                            <p><a>Milly Augustine</a> is now participating to the <a>Awesome Pool Party with Friends</a> event.</p>
                            <span>8 hours ago</span>
                        </div>
                    </div>
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                        <div class="activity-meta">
                            <p><a>Dan Walker</a> is now participating to the <a>Awesome Pool Party with Friends</a> event.</p>
                            <span>Yesterday</span>
                        </div>
                    </div>
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/edward.jpeg" data-user-popover="5" alt="">
                        <div class="activity-meta">
                            <p><a>Edward Mayers</a> is now participating to <a>2 events</a>.</p>
                            <span>Yesterday hours ago</span>
                        </div>
                    </div>
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/dan.jpg" data-user-popover="1" alt="">
                        <div class="activity-meta">
                            <p><a>Dan Walker</a> is now participating to the <a>Super Ball Snack & Drinks</a> event.</p>
                            <span>Monday</span>
                        </div>
                    </div>
                    <!--Activity-->
                    <div class="activity-block">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" data-user-popover="4" alt="">
                        <div class="activity-meta">
                            <p><a>David Kim</a> is now participating to the <a>Legacy Of The Void Release Party</a> event.</p>
                            <span>Monday</span>
                        </div>
                    </div>
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
                    <div class="add-button modal-trigger" data-modal="add-conversation-modal"><i data-feather="user"></i></div>
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
                            <div class="message-text">Great to hear it. Just send me the PSD files so i can have a look at it.</div>
                        </div>
                    </div>

                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>8:18am</span>
                            <div class="message-text">And if you have a prototype, you can also send me the link to it.</div>
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
                            <div class="message-text">Hey Jenna, thanks for answering so quickly. Iam stuck, i need a car.</div>
                        </div>
                    </div>

                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/daniel.jpg" alt="">
                        <div class="message-block">
                            <span>3:43pm</span>
                            <div class="message-text">Can i borrow your car for a quick ride to San Fransisco? Iam running behind and
                                there' no train in sight.</div>
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
                            <div class="message-text">C'mon, you just gotta learn the tricks. You can't expect aliens to behave like
                                humans. I mean that's how the mechanics are.</div>
                        </div>
                    </div>
                    <div class="chat-message is-received">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/david.jpg" alt="">
                        <div class="message-block">
                            <span>13:11pm</span>
                            <div class="message-text">I checked the replay and for example, you always get supply blocked. That's not
                                the right thing to do.</div>
                        </div>
                    </div>
                    <div class="chat-message is-sent">
                        <img src="https://via.placeholder.com/300x300" data-demo-src="assets/img/avatars/jenna.png" alt="">
                        <div class="message-block">
                            <span>13:12pm</span>
                            <div class="message-text">I know but i struggle when i have to decide what to make from larvas.</div>
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
                            <div class="message-text">And yeah, don't forget to bring some of my favourite cheese cake.</div>
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
                            <div class="message-text">It was so frightening, i felt my heart was about to blow inside my chest.</div>
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
                            <div class="message-text">Hello Milly, Iam really sorry, Iam so busy recently, but i had the time to read
                                it.</div>
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
                            <div class="message-text">Actually it's quite good, there might be some small changes but overall it's
                                great.</div>
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
                        <a href="index.php#demos-section" class="button is-solid accent-button raised is-fullwidth">Explore</a>
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

    <!-- profile js -->

    <!-- stories js -->

    <!-- friends js -->

    <!-- questions js -->

    <!-- video js -->

    <!-- events js -->
    <script src="assets/js/events.js"></script>

    <!-- news js -->

    <!-- shop js -->

    <!-- inbox js -->

    <!-- settings js -->

    <!-- map page js -->

    <!-- elements page js -->
</body>


<!-- Mirrored from friendkit.cssninja.io/navbar-v1-events.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Sep 2021 21:59:23 GMT -->
</html>