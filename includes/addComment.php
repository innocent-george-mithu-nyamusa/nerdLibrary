<?php


use Classes\CommentView;
use Classes\Utilities;

session_start();

include "../vendor/autoload.php";

$commentObj = new CommentView();

$commentTime = date('now');

if (isset($_POST["commentContent"])) {

    if ($commentObj->createComment(
        $_POST["commentContent"],
        true,
        $_POST["episodeId"],
        "null",
        $_SESSION["user_id"]
    )) {

        echo "".'<div class="media is-comment">
                    <figure class="media-left">
                        <div class="avatar-wrap is-smaller">
                            <img src="/images/profile-images/'.$_SESSION["image"].'" data-demo-src="/images/profile-images/'.$_SESSION["image"].'"
                                 data-user-popover="7" alt="">
                        </div>
                    </figure> 
                    <div class="media-content">
                        <div class="comment-meta">
                            <h4><a>'.$_SESSION["user_fullname"].'</a> <small> · '.Utilities::elapsedTimeString($commentTime).'</small></h4>
                            <p>'.$_POST["commentContent"].'</p>
                        </div>
                        <div class="comment-stats-wrap">
                            <div class="comment-stats">
                                <div class="stat is-likes">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-thumbs-up">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                    </svg>
                                    <span>8</span>
                                </div>
                                <div class="stat is-dislikes">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-thumbs-down">
                                        <path
                                            d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path>
                                    </svg>
                                    <span>0</span>
                                </div>
                            </div>
                            
                            <div class="comment-actions">
                                <a class="comment-action is-like">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-thumbs-up">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                    </svg>
                                </a>
                                
                                <a class="comment-action is-dislike">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-thumbs-down">
                                        <path
                                            d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path>
                                    </svg>
                                </a>
                                
                                <a class="comment-action is-reply">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-message-circle">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>';

    }

}