<?php


use Classes\CommentView;
use Classes\ResourceView;
use Classes\UserPostView;
use Classes\UserView;
use Classes\Utilities;

include "../vendor/autoload.php";
session_start();

$commentObj = new CommentView();
$commentorObj = new UserView();
$postObj = new UserPostView();
$resourceObj = new ResourceView();

if (isset($_POST)) {

    $allComments = $commentObj->getAllItemRootComments($_POST["postId"]);
    $postDetails = $postObj->getPost($_POST["postId"]);
    $postNumberOfComments = $commentObj->getNumberOfCommentsOfItem($_POST["postId"]);
    $postLikes = $resourceObj->getItemLikes($_POST["postId"]);

//    print_r($allComments);
    $header = '<div class="header">
    <img alt="" data-demo-src="/images/profile-images/' . $_SESSION["image"] . '" src="https://via.placeholder.com/300x300">
    <div class="user-meta">
        <span>' . $_SESSION["user_fullname"] . '</span>
        <span><small>' . Utilities::elapsedTimeString($postDetails["post_datetime"]) . '</small></span>
    </div>
    <button class="button" type="button">Follow</button>
    <div class="dropdown is-spaced is-right dropdown-trigger">
        <div>
            <div class="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
            </div>
        </div>
        <div class="dropdown-menu" role="menu">
            <div class="dropdown-content">
                <div class="dropdown-item is-title has-text-left">
    Who can see this ?
                </div>
                <a class="dropdown-item" href="#">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                        <div class="media-content">
                            <h3>Public</h3>
                            <small>Anyone can see this publication.</small>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <div class="media-content">
                            <h3>Friends</h3>
                            <small>only friends can see this publication.</small>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <div class="media-content">
                            <h3>Specific friends</h3>
                            <small>Dont show it to some friends.</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a class="dropdown-item">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
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
    <div class="live-stats">
        <div class="social-count">
            <div class="likes-count">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                <span>' . $postLikes . '</span>
            </div>
            <div class="comments-count">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                <span>' . $postNumberOfComments . '</span>
            </div>
        </div>
        <div class="social-count ml-auto">
            <div class="views-count">
                <span>' . $postNumberOfComments . '</span>
                <span class="views"><small>comments</small></span>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="action">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
            <span>Like</span>
        </div>
        <div class="action">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
            <span>Comment</span>
        </div>
    </div>
</div>';
    $header .= '<div class="comments-list has-slimscroll">';
    $stuff = "";

    foreach ($allComments as $allComment) {

        $commenter = $commentorObj->getUser($allComment["commentor_id"])[0];
        $replyComments = $commentObj->getAllReplyComments($_POST["postId"], $allComment["comment_id"]);
        $commentLikes = $resourceObj->getItemLikes($allComment["comment_id"]);

        $stuff .= '<div class="media is-comment ">
        <figure class="media-left">
            <p class="image is-32x32">
                <img alt="" data-demo-src="/images/profile-images/' . $commenter["user_image"] . '" data-user-popover="' . $commenter["user_image"] . '" src="https://via.placeholder.com/300x300" >
            </p>
        </figure>

        <div class="media-content">
            <div class="username">' . $commenter["user_fullname"] . '</div>
            <p>' . $allComment["comment"] . '</p>
            <div class="comment-actions">
                <a class="is-inverted" href="javascript:void(0);">Like</a>
                <span>' . Utilities::elapsedTimeString($allComment["comment_date"]) . '</span>
                <div class="likes-count">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    <span>' . $commentLikes . '</span>
                </div>
            </div>
        </div>
    </div>';
        foreach ($replyComments as $replyComment) {
            $commentOwner = $commentorObj->getUser($replyComment["commentor_id"])[0];
            $replyCommentLikes = $resourceObj->getItemLikes($replyComment["comment_id"]);

            $header .= '<div class="media is-comment is-nested">
        <figure class="media-left">
            <p class="image is-32x32">
                <img alt="" data-demo-src="/images/profile-images/' . $commentOwner["user_image"] . '" data-user-popover="' . $commentOwner["user_no"] . '" src="https://via.placeholder.com/300x300" >
            </p>
        </figure>

        <div class="media-content">
            <div class="username">' . $commentOwner["user_fullname"] . '</div>
            <p>' . $replyComment["comment"] . '</p>
            <div class="comment-actions">
                <a class="is-inverted" href="javascript:void(0);">Like</a>
                <span>' . Utilities::elapsedTimeString($replyComment["comment_date"]) . '</span>
                <div class="likes-count">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    <span>' . $replyCommentLikes . '</span>
                </div>
            </div>
        </div>
    </div>' . '';

        }

    }


    $header .= $stuff . '<div class="comment-controls has-lightbox-emojis">
    <div class="controls-inner">
        <img alt="" data-demo-src="/images/profile-images/' . $_SESSION["image"] . '" src="https://via.placeholder.com/300x300">
        <div class="control">
            <textarea class="textarea comment-textarea is-rounded" rows="1">
            </textarea>
            <button class="emoji-button"> 
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
             </button>
        </div>
    </div>
    </div>';

    print_r($header);

}
