<?php

use Classes\ActivityView;
use Classes\PhotoView;
use Classes\PostStoryView;
use Classes\UserNotificationView;
use Classes\UserPostView;
use Classes\Utilities;

include "../vendor/autoload.php";
session_start();

$postObj = new UserPostView();
$storyObj = new PostStoryView();
$activityObj = new ActivityView();
$notificationObj = new UserNotificationView();
$photoObj = new PhotoView();



$date =  date("F d Y, H:m a");
$postLink = null;
$taggedUsers = "";
$userTaggedHtml = "";
$postId = "";


$postLink  = isset($_POST["post-link"])? '{POST-LINK}': '';

if ($_POST["post-user-tagged-number"] > 0) {

    $index = 0;

    while ($index < intval($_POST["post-user-tagged-number"])) {

        $taggedUsers .= $_POST["post-user-id-$index"] . ",";

        if(($index != 1) && ($index == (intval($_POST["post-user-tagged-number"]) - 1)) ) {
            $userTaggedHtml .= " And <a href='/profile/main/". $_POST["post-user-id-$index"]."'> @{".$_POST["post-user-id-$index"]."}  <a/>";
        }else {
            $userTaggedHtml .= "-with <a href='/profile/". $_POST["post-user-id-$index"]."'> @{".$_POST["post-user-id-$index"]."}  <a/>,";
        }

        $index++;
    }

}


$postMood = isset($_POST["post-mood"])? "- is ". $_POST["post-mood"]: '';

$location = isset($_POST["post-location"]) ? $_POST["post-location"] : "";
$mood = isset($_POST["post-mood"]) ? $_POST["post-mood"] : "";

if (isset($_FILES["post-image"])) {

    $postImage = Utilities::uploadPhoto($_FILES["post-image"]["name"], $_FILES["post-image"]["tmp_name"], "post_image");
    $photoObj->addNewPicture($postImage, $_SESSION["user_id"], "post");
    $storyId = "";

    if ($_POST["post-on-story"] == "true") {
        //Add user Story
        $storyObj->createStory(
            $postImage,
            $_SESSION["user_id"]
        );

        $storyId = $storyObj->getItemId();

        $activityObj->createActivity(
            "posted a story",
            "posted",
            $storyId,
            $_SESSION["user_id"]
        );

//        Add story Activity
        $notificationObj->createUserNotification($_SESSION["user_id"], $storyId, userNotified: ($_POST["story-restriction"]));

//        NotifyFollowersOf Story
//        Create UserNotification System

    }

    $postImage = is_bool($postImage) ? "" : $postImage;

    if ($_POST["post-on-activity"]) {
        //Create the post activity here

        $postObj->addPost(
            $_SESSION["user_id"],
            $postImage,
            $_POST["post-text"],
            $taggedUsers,
            $location,
            $mood,
            $_POST["post-link"] ?? '',
            $storyId,
            "photo",
        );

        $activityObj->createActivity(
            "posted activity feed ",
            "posted",
            $postObj->getPostId(),
            $_SESSION["user_id"],
        );

        $notificationObj->createUserNotification($_SESSION["user_id"], $postObj->getPostId(), 'activity', strtolower($_POST["activity-restriction"]));
    }

    $response = '<div class="card is-post is-simple">
                            <!-- Main wrap -->
                            <div class="content-wrap">
                                <!-- Header -->
                                <div class="card-heading">
                                    <!-- User image -->
                                    <div class="user-block">
                                        <div class="image">
                                            <img src="/images/profile-images/'.$_SESSION["image"].'"  data-demo-src="/images/profile-images/'.$_SESSION["image"].'" data-user-popover="'.$_SESSION['no'].'" alt="">
                                        </div>
                                        <div class="user-info">
                                            <a href="/profile/main/'.$_SESSION["user_id"].'">'.$_SESSION["user_fullname"].'</a>
                                            <span class="time">'.$date.'</span>
                                        </div>
                                    </div>
                                    <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                                    <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                        <div>
                                            <div class="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu" role="menu">
                                            <div class="dropdown-content">
                                                <a data-post-id="'.$postId.'"  class="dropdown-item bookmark-item">
                                                    <div class="media">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                        <div class="media-content">
                                                            <h3>Bookmark</h3>
                                                            <small>Add this post to your bookmarks.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a data-post-id="'.$postId.'" class="dropdown-item subscribe-notification">
                                                    <div class="media">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                                        <div class="media-content">
                                                            <h3>Notify me</h3>
                                                            <small>Send me the updates.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <hr class="dropdown-divider">
                                                <a data-post-id="'.$postId.'" class="dropdown-item flag-post">
                                                    <div class="media">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
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
                                        <p>
                                        '. $_POST["post-text"] .'<a href="javascript:void(0);">'.$postMood.'</a>'.$userTaggedHtml.'
                                        <p>
                                    </div>  
                                    <div class="post-image">
                                        <a data-fancybox="post10" data-lightbox-type="comments" data-thumb="/images/media/posts/'.$postImage.'" href="/images/media/posts/'.$postImage.'" data-demo-href="/images/media/posts/'.$postImage.'">
                                            <img src="/images/media/posts/'.$postImage.'" data-demo-src="/images/media/posts/'.$postImage.'" alt="post image">
                                        </a>
                                    </div>
                                    '. $postLink.'
                       
                                    <!-- Post actions -->
                                    <div class="post-actions">
                                        <!-- /partials/pages/feed/buttons/feed-post-actions.html -->
                                        <div class="like-wrapper">
                                            <a data-post-id="{$postId}" href="javascript:void(0);" class="like-button favorite-post">
                                                <i class="mdi mdi-heart not-liked bouncy"></i>
                                                <i class="mdi mdi-heart is-liked bouncy"></i>
                                                <span class="like-overlay"></span>
                                            </a>
                                        </div>

                                        <div class="fab-wrapper is-share">
                                            <a href="javascript:void(0);" class="small-fab share-fab modal-trigger" data-modal="share-modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </a>
                                        </div>

                                        <div class="fab-wrapper is-comment">
                                            <a href="javascript:void(0);" class="small-fab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Post body -->

                                <!-- Post footer -->
                                <div class="card-footer">
                                    <!-- Followers -->
                                    <div class="likers-group">

                                    </div>
                                    <div class="likers-text">

                                    </div>
                                    <!-- Post statistics -->
                                    <div class="social-count">
                                        <div class="likes-count">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                            <span class="likes-number">0</span>
                                        </div>
                                        <div class="shares-count">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            <span class="shares-number">0</span>
                                        </div>
                                        <div class="comments-count">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            <span class="comment-number">0</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Post footer -->
                            </div>
                            <!-- /Main wrap -->
                           ';

    echo "$response";
//    print_r($_FILES);
}

if (!isset($_FILES["post-image"])) {


    if ($_POST["post-on-activity"]) {
        //Create the post activity here

        $postObj->addPost(
            $_SESSION["user_id"],
            "N/A",
            $_POST["post-text"],
            $taggedUsers,
            $location,
            $mood,
            $postLink,
            postStoryId: '',
            postType: "text",
            postActivityId: "N/A",
            postName: "N/A"
        );

        $activityObj->createActivity(
            "posted text activity feed ",
            "posted",
            $postObj->getPostId(),
            $_SESSION["user_id"],
        );

        $postId = $postObj->getPostId();
        $notificationObj->createUserNotification($_SESSION["user_id"], $postObj->getPostId(), 'activity', strtolower($_POST["activity-restriction"]));
    }

    $response = '<div class="card is-post">
                            <!-- Main wrap -->
                            <div class="content-wrap">
                                <!-- Header -->
                                <div class="card-heading">
                                    <!-- User image -->
                                    <div class="user-block">
                                        <div class="image">
                                            <img src="/images/profile-images/'.$_SESSION["image"].'"  data-demo-src="/images/profile-images/'.$_SESSION["image"].'" data-user-popover="'.$_SESSION['no'].'" alt="">
                                        </div>
                                        <div class="user-info">
                                            <a href="/profile/main/'.$_SESSION["user_id"].'">'.$_SESSION["user_fullname"].'</a>
                                            <span class="time">'.$date.'</span>
                                        </div>
                                    </div>
                                    <!-- /partials/pages/feed/dropdowns/feed-post-dropdown.html -->
                                    <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                        <div>
                                            <div class="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </div>
                                        </div>
                                        <div class="dropdown-menu" role="menu">
                                            <div class="dropdown-content">
                                                <a data-post-id="'.$postId.'"  class="dropdown-item bookmark-item">
                                                    <div class="media">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                        <div class="media-content">
                                                            <h3>Bookmark</h3>
                                                            <small>Add this post to your bookmarks.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a data-post-id="'.$postId.'" class="dropdown-item subscribe-notification">
                                                    <div class="media">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                                        <div class="media-content">
                                                            <h3>Notify me</h3>
                                                            <small>Send me the updates.</small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <hr class="dropdown-divider">
                                                <a data-post-id="'.$postId.'" class="dropdown-item flag-post">
                                                    <div class="media">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg>
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
                                        <p>
                                        '. $_POST["post-text"] .'<a href="javascript:void(0);">'.$postMood.'</a>'.$userTaggedHtml.'
                                        <p>
                                    </div>
                                    '. $postLink.'
                                    <!-- Post actions -->
                                    <div class="post-actions">
                                        <!-- /partials/pages/feed/buttons/feed-post-actions.html -->
                                        <div class="like-wrapper">
                                            <a data-post-id="{$postId}" href="javascript:void(0);" class="like-button favorite-post">
                                                <i class="mdi mdi-heart not-liked bouncy"></i>
                                                <i class="mdi mdi-heart is-liked bouncy"></i>
                                                <span class="like-overlay"></span>
                                            </a>
                                        </div>

                                        <div class="fab-wrapper is-share">
                                            <a href="javascript:void(0);" class="small-fab share-fab modal-trigger" data-modal="share-modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            </a>
                                        </div>

                                        <div class="fab-wrapper is-comment">
                                            <a href="javascript:void(0);" class="small-fab">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Post body -->

                                <!-- Post footer -->
                                <div class="card-footer">
                                    <!-- Followers -->
                                    <div class="likers-group">

                                    </div>
                                    <div class="likers-text">

                                    </div>
                                    <!-- Post statistics -->
                                    <div class="social-count">
                                        <div class="likes-count">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                            <span class="likes-number">0</span>
                                        </div>
                                        <div class="shares-count">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                            <span class="shares-number">0</span>
                                        </div>
                                        <div class="comments-count">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            <span class="comment-number">0</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Post footer -->
                            </div>
                            <!-- /Main wrap -->
                           ';

    echo "$response";
//    print_r($_FILES);
}
