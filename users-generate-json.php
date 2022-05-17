<?php

use Classes\UserView;

include "vendor/autoload.php";

$userObj = new UserView();
$enrollmentsObj = new \Classes\EnrollmentsView();
$friendshipObj = new \Classes\RelationshipView();

$users = $userObj->getAllUsers();


function generateUsers(): void
{
    $importantDetails = array();

    global $friendshipObj, $enrollmentsObj, $users, $userObj;

    foreach ($users as $user) {

        $friendships = $friendshipObj->myFriendsShips($user["user_id"]);
        $enrollments = $enrollmentsObj->myNumberOfTracksEnrollments($user["user_id"]);
        $firstFriend = null;

        if (!empty($friendships)) {

            if ($user["user_id"] == $friendships[0]["relation_user_id"]) {
                $friend = $userObj->getUser($friendships[0]["relation_initiator_id"]);
            } else {
                $friend = $userObj->getUser($friendships[0]["relation_user_id"]);
            }

            $firstFriend = $friend[0]["user_fullname"];
        }

        $fullnameArray = explode(" ", $user["user_fullname"]);
        $image = "/images/profile-images/" . $user["user_image"];

        $importantDetails[] = array(
            "first_name" => $fullnameArray[0],
            "last_name" => $fullnameArray[1],
            "title" => $user["user_role"] == "user" ? "Student" : "Lecturer",
            "location" => $user["user_town"],
            "user_id" => $user["user_no"],
            "course_enrolments" => $enrollments . "",
            "first_friend" => $firstFriend,
            "second_friend" => null,
            "profile_picture" => $image,
            "cover_image" => "/images/covers/" . $user["user_profile_image_cover"]
        );
    }

    $fp = fopen("assets/data/api/users/users.json", "w");

    fwrite($fp, json_encode($importantDetails, JSON_UNESCAPED_SLASHES));

    fclose($fp);
}

//function generateU

generateUsers();

//echo $enrollment->isEnrolled("233", "6789");
//echo \Classes\Utilities::genUniqueId("set");
