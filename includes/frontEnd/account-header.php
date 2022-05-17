<div class="columns is-multiline no-margin">
    <!-- Left side column -->
    <div class="column is-paddingless">

        <input type="hidden" id="userId" value="<?php

        use Classes\Utilities;

        echo $user[0]["user_id"]; ?>">
        <input type="hidden" id="userName" value="<?php echo $user[0]["username"]; ?>">
        <!-- Timeline Header -->
        <div class="cover-bg">
            <img class="cover-image" src="https://via.placeholder.com/1600x460"
                 data-demo-src="/images/covers/<?php echo $user[0]["user_profile_image_cover"]; ?>" alt="">
            <div class="avatar">
                <img id="user-avatar" class="avatar-image" src="https://via.placeholder.com/300x300"
                     data-demo-src="/images/profile-images/<?php echo $user[0]["user_image"]; ?>" alt="">
                <div class="avatar-button">
                    <i data-feather="plus"></i>
                </div>
                <div class="pop-button is-far-left has-tooltip modal-trigger"
                     data-modal="change-profile-pic-modal" data-placement="right"
                     data-title="Change profile picture">
                    <a class="inner">
                        <i data-feather="camera"></i>
                    </a>
                </div>
                <div id="follow-pop" class="pop-button pop-shift is-left has-tooltip" data-placement="top"
                     data-title="Subscription">
                    <a class="inner">
                        <i class="inactive-icon" data-feather="bell"></i>
                        <i class="active-icon" data-feather="bell-off"></i>
                    </a>
                </div>
                <div id="invite-pop" class="pop-button pop-shift is-center has-tooltip" data-placement="top"
                     data-title="Relationship">
                    <a href="#" class="inner">
                        <i class="inactive-icon" data-feather="plus"></i>
                        <i class="active-icon" data-feather="minus"></i>
                    </a>
                </div>
                <div id="chat-pop" class="pop-button is-right has-tooltip" data-placement="top"
                     data-title="Chat">
                    <a class="inner">
                        <i data-feather="message-circle"></i>
                    </a>
                </div>
                <div class="pop-button is-far-right has-tooltip" data-placement="right"
                     data-title="Send message">
                    <a href="messages-inbox.html" class="inner">
                        <i data-feather="mail"></i>
                    </a>
                </div>
            </div>
            <div class="cover-overlay"></div>
            <div class="cover-edit modal-trigger" data-modal="change-cover-modal">
                <i class="mdi mdi-camera"></i>
                <span>Edit cover image</span>
            </div>

            <!--/html/partials/pages/profile/timeline/dropdowns/timeline-mobile-dropdown.html-->
            <div class="dropdown is-spaced is-right is-accent dropdown-trigger timeline-mobile-dropdown is-hidden-desktop">
                <div>
                    <div class="button">
                        <i data-feather="more-vertical"></i>
                    </div>
                </div>
                <div class="dropdown-menu" role="menu">
                    <div class="dropdown-content">
                        <a href="/profile/main" class="dropdown-item">
                            <div class="media">
                                <i data-feather="activity"></i>
                                <div class="media-content">
                                    <h3>Timeline</h3>
                                    <small>Open Timeline.</small>
                                </div>
                            </div>
                        </a>
                        <a href="/feed" class="dropdown-item">
                            <div class="media">
                                <i data-feather="align-right"></i>
                                <div class="media-content">
                                    <h3>Feed</h3>
                                    <small>See my feed</small>
                                </div>
                            </div>
                        </a>
                        <a href="/profile/friends" class="dropdown-item">
                            <div class="media">
                                <i data-feather="heart"></i>
                                <div class="media-content">
                                    <h3>Friends</h3>
                                    <small>See my friends.</small>
                                </div>
                            </div>
                        </a>
                        <a href="/profle/photos" class="dropdown-item">
                            <div class="media">
                                <i data-feather="image"></i>
                                <div class="media-content">
                                    <h3>Photos</h3>
                                    <small>See all photos.</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="profile-menu is-hidden-mobile">
            <div class="menu-start">
                <a href="/profile/main" class="button has-min-width">Timeline</a>
                <a href="/feed" class="button has-min-width">Feed</a>
            </div>
            <div class="menu-end">
                <a id="profile-friends-link" href="/profile/friends" class="button has-min-width">Friends</a>
                <a href="/profile/photos" class="button has-min-width">Photos</a>
            </div>
        </div>

        <div class="profile-subheader">
            <div class="subheader-start is-hidden-mobile">
                <!--                            TODO::UPDATE USER FRIENDS NUMBERS-->
                <span>
                                <?php
                                $friends = $relationObj->numberOfFriendShips($user[0]["user_id"]);
                                $friends = "$friends";
                                echo Utilities::friendsNumbers($friends);
                                ?></span>
                <span>Friends</span>
            </div>
            <div class="subheader-middle">
                <h2><?php echo $_SESSION["username"]; ?></h2>
                <span><?php echo $_SESSION["role"] == "user" ? "Student" : ($_SESSION["role"] == "lecturer" ? "Lecturer" : "Administrator"); ?></span>
            </div>
            <div  class="subheader-end is-hidden-mobile">
                <a href="/profile/history" class="button has-icon is-bold">
                    <i data-feather="clock"></i>
                    History
                </a>
            </div>
        </div>
    </div>

</div>