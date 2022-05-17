<?php

use Classes\InterestsView;

include "../vendor/autoload.php";

$interestObj = new InterestsView();

session_start();

if(isset($_POST)) {
    $categoriesIds = trim($_POST["userData"]);
    echo $interestObj->createInterest($categoriesIds, $_SESSION["user_id"]);
}