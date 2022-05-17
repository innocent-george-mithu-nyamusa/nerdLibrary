<?php global $page ?>
<div class="columns is-multiline no-margin">
    <!-- Left side column -->
    <div class="column is-paddingless">
        <!-- Timeline Header -->
        <!-- html/partials/pages/pages/page-profile-header.html -->
        <div class="cover-bg">
            <img class="cover-image" src="https://via.placeholder.com/1600x460" data-demo-src="/images/covers/<?php echo $page["page_cover_image"]; ?>" alt="">
            <div class="avatar">
                <img id="user-avatar" class="avatar-image" src="https://via.placeholder.com/300x300" data-demo-src="/images/pages/<?php echo $page["page_icon"]; ?>" alt="">
                <div class="avatar-button">
                    <i data-feather="plus"></i>
                </div>
                <div class="pop-button is-far-left has-tooltip modal-trigger" data-modal="change-profile-pic-modal" data-placement="right" data-title="Change profile picture">
                    <a class="inner">
                        <i data-feather="camera"></i>
                    </a>
                </div>
                <div id="follow-pop" class="pop-button pop-shift is-left has-tooltip" data-placement="top" data-title="Subscription">
                    <a class="inner">
                        <i class="inactive-icon" data-feather="bell"></i>
                        <i class="active-icon" data-feather="bell-off"></i>
                    </a>
                </div>
                <div id="invite-pop" class="pop-button pop-shift is-center has-tooltip" data-placement="top" data-title="Relationship">
                    <a href="#" class="inner">
                        <i class="inactive-icon" data-feather="plus"></i>
                        <i class="active-icon" data-feather="minus"></i>
                    </a>
                </div>
                <div id="chat-pop" class="pop-button is-right has-tooltip" data-placement="top" data-title="Chat">
                    <a class="inner">
                        <i data-feather="message-square"></i>
                    </a>
                </div>
                <div class="pop-button is-far-right has-tooltip" data-placement="right" data-title="Send message">
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
            <!--/html/partials/pages/pages/dropdowns/page-timeline-mobile-dropdown.html-->
            <div class="dropdown is-spaced is-right is-accent dropdown-trigger timeline-mobile-dropdown is-hidden-desktop">
                <div>
                    <div class="button">
                        <i data-feather="more-vertical"></i>
                    </div>
                </div>
                <div class="dropdown-menu" role="menu">
                    <div class="dropdown-content">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <div class="media">
                                <i data-feather="activity"></i>
                                <div class="media-content">
                                    <h3>Timeline</h3>
                                    <small>Open Timeline.</small>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <div class="media">
                                <i data-feather="align-right"></i>
                                <div class="media-content">
                                    <h3>About</h3>
                                    <small>See about info.</small>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <div class="media">
                                <i data-feather="globe"></i>
                                <div class="media-content">
                                    <h3>Community</h3>
                                    <small>See community.</small>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
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
                <a href="javascript:void(0);" class="button has-min-width">Timeline</a>
                <a href="javascript:void(0);" class="button has-min-width">About</a>
            </div>
            <div class="menu-end">
                <a href="javascript:void(0);" class="button has-min-width">Community</a>
                <a href="javascript:void(0);" class="button has-min-width">Photos</a>
            </div>
        </div>

        <div class="profile-subheader">
            <div class="subheader-start is-hidden-mobile">
                <span>148K</span>
                <span>Followers</span>
            </div>
            <div class="subheader-middle">
                <h2><?php echo $page["page_name"]; ?></h2>
                <span><?php echo $page["page_subtitle"]; ?></span>
            </div>
            <div class="subheader-end is-hidden-mobile">
                <a class="button has-icon is-bold">
                    <i data-feather="clock"></i>
                    History
                </a>
            </div>
        </div>
    </div>

</div>