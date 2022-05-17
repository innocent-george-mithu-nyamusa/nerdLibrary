<?php

use Classes\ActivityView;
use Classes\CommentView;
use Classes\UserNotificationView;

include "../vendor/autoload.php";
session_start();
$activityObj = new ActivityView();
$commentObj = new CommentView();
$userNotificationObj = new UserNotificationView();
$commentTime = date('now');
$commentIsRoot = "true";

if(isset($_POST)) {

    $responseId = "null";
    $commentIsRoot = "true";

    if(isset($_POST["responseId"])) {
        $responseId = $_POST["responseId"];
        $commentIsRoot = "false";
    }


    if($commentObj->createComment(
        $_POST["commentText"],
        $commentIsRoot,
        $_POST["postId"],
        $_SESSION["user_id"],
        $responseId
    )){

        $activityObj->createActivity("Commented on post", "comment", $commentObj->getId(), $_SESSION["user_id"]);
        $userNotificationObj->createUserNotification($_SESSION["user_id"], $_POST["postId"], "comment", "owner");

        $response ='<div class="media is-comment add-other-comment-'.$_POST["postId"].'">
                                    <!-- User image -->
                                    <div class="media-left">
                                        <div class="image">
                                            <img src="/images/profile-images/'.$_SESSION["image"].'"
                                                 data-demo-src="/images/profile-images/'.$_SESSION["image"].'" data-user-popover="'.$_SESSION["no"].'"
                                                 alt="Commentor Image">
                                        </div>
                                    </div>
                                    <!-- Content -->
                                    <div class="media-content">
                                        <a href="#">'.$_SESSION["user_fullname"].'</a>
                                        <span class="time">'.\Classes\Utilities::elapsedTimeString($commentTime).'</span>
                                        <p>'.$_POST["commentText"].'</p>
                                        <!-- Actions -->
                                        <div class="controls">
                                            <div class="like-count">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                                                <span>0</span>
                                            </div>
                                            <div class="reply">
                                                <a 
                                                    class="reply-link"
                                                    data-post-item-id="'.$_POST["postId"].'"
                                                    data-comment-id="'.$responseId.'"
                                                    data-comment-item-id="'.$responseId.'"
                                                >Reply</a>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <!-- Right side dropdown -->
                                    <div class="media-right">
                                        <!-- /partials/pages/feed/dropdowns/comment-dropdown.html -->
                                        <div class="dropdown is-spaced is-right is-neutral dropdown-trigger">
                                            <div>
                                                <div class="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
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
                                </div>';


        echo "$response";


    };



}
