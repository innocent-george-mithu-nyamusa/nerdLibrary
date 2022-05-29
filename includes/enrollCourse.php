<?php

use Classes\EnrollmentsView;


session_start();

include "../vendor/autoload.php";


$enrollObj = new EnrollmentsView();
if(isset($_POST["courseId"])) {

    if($enrollObj->enrolCourse($_POST["courseId"], $_SESSION["user_id"])){
        echo 1;
    }

}
