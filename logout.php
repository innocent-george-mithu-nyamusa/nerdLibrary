<?php

use Classes\ActivityView;

include "vendor/autoload.php";

$activityObj = new ActivityView();
session_start();


$activityObj->updateLogoutActivity($_SESSION["user_id"]);

$_SESSION = [];

session_unset();
//$params = session_get_cookie_params();
//setcookie(session_name(), '', time()-86400, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
session_destroy();

header("Location: .");
exit;