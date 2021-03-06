<?php

use Classes\EpisodeView;
session_start();
include "../vendor/autoload.php";

$progressObj = new \Classes\ProgressTrackView();

if(isset($_POST)) {
//    print_r($_POST);x

    if($progressObj->haveWatchedEpisode($_SESSION["user_id"], $_POST["episodeId"])){
        echo $progressObj->completedEpisode($_POST["episodeId"], $_SESSION["user_id"]);
    } else {
        echo $progressObj->updateProgressLevel($_SESSION["user_id"], $_POST["episodeId"], 50.0);
    }
}