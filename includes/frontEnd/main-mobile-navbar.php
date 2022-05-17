<div class="navbar-menu">
    <!-- Account -->
    <div class="navbar-item has-dropdown is-active">
        <a href="/profile/main" class="navbar-link">
            <img src="https://via.placeholder.com/150x150" data-demo-src="/images/profile-images/<?php echo $_SESSION["image"]; ?>" alt="">
            <span class="is-heading"><?php echo $_SESSION["user_fullname"]; ?></span>
        </a>

        <!-- Mobile Dropdown -->
        <div class="navbar-dropdown">
            <a href="/feed" class="navbar-item is-flex is-mobile-icon">
                <span><i data-feather="activity"></i>Feed</span>
                <span class="menu-badge"><?php echo $postObj->getNumberOfNewPosts(); ?></span>
            </a>

            <a href="/myclass-library/incomplete" class="navbar-item is-flex is-mobile-icon">
                <span><i data-feather="play-circle"></i>Watch</span>
                <span class="menu-badge">
                        <?php
                        echo $progressObj->numberOfSuggestedIncompleteEpisodes($_SESSION["user_id"]);
                        ?>
                    </span>
            </a>

            <a href="/myInvites" class="navbar-item is-flex is-mobile-icon">
                <span><i data-feather="heart"></i>Friend Requests</span>
                <span class="menu-badge"><?php echo $relationObj->friendshipInvitesNumber($_SESSION["user_id"]) ?></span>
            </a>

            <a href="/profile/overview" class="navbar-item is-flex is-mobile-icon">
                <span><i data-feather="user"></i>Profile</span>
            </a>

            <a href="/cart" class="navbar-item is-flex is-mobile-icon">
                <span><i data-feather="shopping-cart"></i>Cart</span>
                <span class="menu-badge">3</span>
            </a>

            <a href="/bookmarks" class="navbar-item is-flex is-mobile-icon">
                <span><i data-feather="bookmark"></i>Bookmarks</span>
            </a>

        </div>
    </div>

    <!-- More -->
    <div class="navbar-item has-dropdown">
        <a href="/profile/main" class="navbar-link">
            <i data-feather="user"></i>
            <span class="is-heading">Account</span>
        </a>

        <!-- Mobile Dropdown -->
        <div class="navbar-dropdown">
            <a href="/support" class="navbar-item is-flex is-mobile-icon">
                <span><i data-feather="life-buoy"></i>Support</span>
            </a>
            <a href="/profile/settings" class="navbar-item is-flex is-mobile-icon">
                <span><i data-feather="settings"></i>Settings</span>
            </a>
            <a href="/logout_account" class="navbar-item is-flex is-mobile-icon">
                <span><i data-feather="log-out"></i>Logout</span>
            </a>
        </div>
    </div>
</div>
