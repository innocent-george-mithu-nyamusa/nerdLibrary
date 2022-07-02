<?php

namespace Classes;

use DateTime;
use Exception;
use Intervention\Image\ImageManager;
use SplFileInfo;

class Utilities
{

    //    TODO::ADD EMAIL TEMPLATES
    public static $ourMailhtml = '';
    public static $accountVerificationText = "\nThank You for Signing up Nerd Library. Click the following link to reset your account. \n";
    public static $accountPasswordResetText = "Password Reset Request\n\nPlease Click the following Link to reset your account. ";
    public static $accountPasswordResetHtml = "password html";
    public static $accountPasswordResetSubect = "Password Reset Request";
    public static $ourMailText = "";

    public static $emailVerificationSubject = "Thanks for Signing Up with Nerd Library. Please Verify your Account";
    public static $emailverificationHtml = "<html> Html </html>";

    public static function uploadPhoto($image, $image_temp, $purpose,): string|bool
    {
        try {

            $manager = new ImageManager(array('driver' => 'gd'));
            $splObj = new SplFileInfo($image);
            $extension = $splObj->getExtension();
        } catch (Exception $exception) {
            return "Failed to create image manager " . $exception->getMessage();
        }
        //        $extension = explode(".", $image)[1];

        try {


            if ($purpose != "category") {
                $image = $manager->make($image_temp);
            }

            switch ($purpose) {
                    //Used on episode series track, chapter page,
                case "episode_image_small":
                    $name = self::genUniqueId("img") . "_episode_small" . "." . $extension;
                    $target_dir = "../images/covers/";
                    $image->fit(300, 200);
                    break;
                    //Used on
                case "episode_image_large":
                    $name = self::genUniqueId("img") . "_episode_large" . "." . $extension;
                    $target_dir = "../images/covers/";
                    $image->fit(400, 230);
                    break;

                case "lecturer_image":
                    $name = self::genUniqueId("img") . "_lecturer_profile" . "." . $extension;
                    $target_dir = "../images/lecturers/";
                    $image->fit(200, 200);
                    break;

                case "user_image":
                    $name = self::genUniqueId("use") . "_user_profile" . "." . $extension;
                    $target_dir = "../images/profile-images/";
                    $image->fit(640, 640);
                    break;

                    //TODO:: FIX THIS
                    //Used On explore page
                case "series_portrait_cover":
                    $name = self::genUniqueId("use") . "_series_cover" . "." . $extension;
                    $target_dir = "../images/series/";
                    $image->fit(940, 650);
                    break;

                    //Used On Profile Overview Page
                case "series_small_square_cover":
                    $name = self::genUniqueId("ser") . "_series_small_square_cover" . "." . $extension;
                    $target_dir = "../images/covers/";
                    $image->fit(800, 600);
                    break;


                case "series_medium_square_cover":
                    $name = self::genUniqueId("ser") . "_series_medium_cover" . "." . $extension;
                    $target_dir = "../images/covers/";
                    $image->fit(800, 600);
                    break;

                    //Used on series track
                case "series_large_cover_images":
                    $name = self::genUniqueId("ser") . "_series_large_cover" . "." . $extension;
                    $target_dir = "../images/covers/";
                    $image->fit(1920, 1080);
                    break;

                case "profile_image_cover":
                    $name = self::genUniqueId("pro") . "_profile_large_cover" . "." . $extension;
                    $target_dir = "../images/covers/";
                    $image->fit(1600, 460);
                    break;

                case "category":

                    $target_dir = "../assets/img/illustrations/questions/" . $image;
                    if (move_uploaded_file($image_temp, $target_dir)) {
                        return $image;
                    } else {
                        return "icon.svg";
                    }

                case "profile_image":
                    $name = self::genUniqueId("pro") . "_user_profile" . "." . $extension;
                    $target_dir = "../images/profile-images/";
                    $image->fit(300, 300);
                    break;

                case "post_image":
                    $name = self::genUniqueId("pso") . "_post_image" . "." . $extension;
                    $target_dir = "../images/media/posts/";

                    if (($image->getHeight() < 900) && ($image->getWidth() > 1600)) {
                        print_r($image->getHeight());
                        $image->resize(1600, 900);
                    }

                    $image->orientate();
                    break;

                default:
                    $name = self::genUniqueId("img") . "_image_not_placed" . "." . $extension;
                    $target_dir = "../images/default/";
                    break;
            }

            $target_file = $target_dir . $name;
            $image->save($target_file, 100);

            return $name;
        } catch (Exception $exception) {
            echo "Failed to get Image " . $exception->getMessage();
            return false;
        }
    }


    public static function genUniqueId(string $pref): string
    {
        switch ($pref) {

            case "sbr":
                $pref = "sbr";
                break;
            case "bdg":
                $pref = "bdg";
                break;
            case "pho":
                $pref = "pic";
                break;
            case "vid":
                $pref = "vid";
                break;
            case "int":
                $pref = "int";
                break;
            case "enr":
                $pref = "lrn";
                break;
            case "not":
                $pref = "not";
                break;
            case "pso":
                $pref = "pos";
                break;
            case "sto":
                $pref = "str";
                break;
            case "set":
                $pref = "set";
                break;
            case "ptr":
                $pref = "prt";
                break;
            case "res":
                $pref = "rse";
                break;
            case "rel":
                $pref = "rle";
                break;
            case "img":
                $pref = "img";
                break;
            case "cat":
                $pref = "cat";
                break;
            case "sub":
                $pref = "sbu";
                break;
            case "mov":
                $pref = "mve";
                break;
            case "crd":
                $pref = "crd";
                break;
            case "clm":
                $pref = "mcl";
                break;
            case "mob":
                $pref = "mbo";
                break;
            case "eps":
                $pref = "epi";
                break;
            case "ser":
                $pref = "ser";
                break;
            case "com":
                $pref = "com";
                break;
            case "pro":
                $pref = "cov";
                break;
            case "pui":
                $pref = "pro";
                break;
            default:
                $pref = "use";
        }

        $id = uniqid($pref, TRUE);
        $id = str_shuffle("$id");
        $id = md5("$id");

        return $id;
    }



    public static function deletePhoto($image, $purpose): bool
    {

        switch ($purpose) {

            case "profile_image":
                $target_dir = "../images/profile-images/";
                break;
            case "profile_image_cover":
                $target_dir = "../images/covers/";
                break;
            case "movie_image_large":
                $target_dir = "../images/covers/";
                break;
            default:
                $target_dir = "../images/default/";
        }

        $filename = $target_dir . $image;

        try {
            unlink($filename);
            return true;
        } catch (Exception $exception) {
            echo "Failed to remove image file :" . $exception->getMessage();
            return false;
        }
    }

    public static function cleanData($user_data): string
    {
        $user_data = trim($user_data);
        $user_data = stripslashes($user_data);
        $user_data = htmlspecialchars($user_data);

        return $user_data;
    }


    public static function uploadVideo($video, $tempVideo, $purpose, $videoNumber): string|bool
    {


        $extension = explode(".", $video)[1];

        switch ($purpose) {
            case "episode":
                $filename = "episode_" . $videoNumber;
                $target_dir = "../resources/episodes/";
                break;
            case "feed":
                $filename = "feed_" . $videoNumber;
                $target_dir = "../resources/feed/";
                break;
        }


        $target_file = $target_dir . $filename . "." . $extension;
        $uploadOk = 1;


        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {

            return "Failed to upload Video File";
        } else {

            try {
                if (move_uploaded_file($tempVideo, $target_file)) {
                    //   $messageSuccess =  "The file ". basename( $item_image). " has been uploaded.";
                    return $filename . '.' . $extension;
                } else {
                    //   $message =  "Sorry, there was an error uploading your file.";
                    return "Failed: There was an error uploading your image";
                }
            } catch (Exception $exception) {
                return "Failed to upload Video file" . $exception->getMessage();
            }
        }
    }

    public static function isLoggedIn(): bool
    {
        if (isset($_SESSION["authenticated"])) {
            return true;
        } else {
            return false;
        }
    }

    public static function isAllowedInAdmin(): bool
    {

        if (($_SESSION["role"] === "admin") || ($_SESSION["role"] === "lecturer")) {
            return true;
        } else {
            return false;
        }
    }

    public static function isDispatcher(string $dispatcherId): bool
    {

        if (($_SESSION["user_id"] == $dispatcherId) || self::isAdmin()) {
            return true;
        }
        return false;
    }

    public static function isAdmin(): bool
    {
        if (isset($_SESSION["role"]) && ($_SESSION["role"] === "admin")) {
            return true;
        } else {
            return false;
        }
    }

    public function generateCode(): string
    {
        $id = uniqid("cde", TRUE);
        $id = str_shuffle("$id");
        return $id;
    }

    public function isSubscriptionValid(DateTime $expirationDate)
    {

        $currentDate = new DateTime("now");
        $currentDate = $currentDate->format("Y-m-d");
        if ($expirationDate > $currentDate) {
            return true;
        }
        return false;
    }

    public static function friendsNumbers(string $friends): string
    {

        switch (strlen($friends)) {
            case 6:
            case 5:
            case 4:
                return substr($friends, 0, -3) . "k";
            case 8:
            case 9:
            case 7:
                return substr($friends, 0, -6) . "M";

            case 10:
            case 11:
            case 12:
                return  substr($friends, 0, -9) . "B";
            case 13:
            case 14:
            case 15:
                return substr($friends, 0, -12) . "T";
            default:
                return $friends;
        }
    }

    public static function itemsNumbers(string $item): string
    {

        switch (strlen($item)) {
            case 6:
            case 5:
            case 4:
                return substr($item, 0, -3) . "k";
            case 8:
            case 9:
            case 7:
                return substr($item, 0, -6) . "M";

            case 10:
            case 11:
            case 12:
                return  substr($item, 0, -9) . "B";
            case 13:
            case 14:
            case 15:
                return substr($item, 0, -12) . "T";
            default:
                return $item;
        }
    }

    /**
     * multi-purpose function to calculate the time elapsed between $start and optional $end
     * @param string|null $start the date string to start calculation
     * @param string|null $end the date string to end calculation
     * @param string $suffix the suffix string to include in the calculated string
     * @param string $format the format of the resulting date if limit is reached or no periods were found
     * @param string $separator the separator between periods to use when filter is not true
     * @param null|string $limit date string to stop calculations on and display the date if reached - ex: 1 month
     * @param bool|array $filter false to display all periods, true to display first period matching the minimum, or array of periods to display ['year', 'month']
     * @param int $minimum the minimum value needed to include a period
     * @return string
     */
    public static  function elapsedTimeString($start, $end = null, $limit = null, $filter = true, $suffix = 'ago', $format = 'Y-m-d', $separator = ' ', $minimum = 1): string
    {
        $dates = (object) array(
            'start' => new DateTime($start ?: 'now'),
            'end' => new DateTime($end ?: 'now'),
            'intervals' => array('y' => 'year', 'm' => 'month', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second'),
            'periods' => array()
        );
        $elapsed = (object) array(
            'interval' => $dates->start->diff($dates->end),
            'unknown' => 'unknown'
        );
        if ($elapsed->interval->invert === 1) {
            return trim('0 seconds ' . $suffix);
        }
        if (false === empty($limit)) {
            $dates->limit = new DateTime($limit);
            if (date_create()->add($elapsed->interval) > $dates->limit) {
                return $dates->start->format($format) ?: $elapsed->unknown;
            }
        }
        if (true === is_array($filter)) {
            $dates->intervals = array_intersect($dates->intervals, $filter);
            $filter = false;
        }
        foreach ($dates->intervals as $period => $name) {
            $value = $elapsed->interval->$period;
            if ($value >= $minimum) {
                $dates->periods[] = vsprintf('%1$s %2$s%3$s', array($value, $name, ($value !== 1 ? 's' : '')));
                if (true === $filter) {
                    break;
                }
            }
        }

        if (false === empty($dates->periods)) {
            return trim(vsprintf('%1$s %2$s', array(implode($separator, $dates->periods), $suffix)));
        }

        return $dates->start->format($format) ?: $elapsed->unknown;
    }



    public static function optimalCategoryList(array $list): array
    {



        uasort($list, function ($a, $b) {

            if (strlen($a["cat_description"]) == strlen($b["cat_description"])) return 0;

            return (strlen($a["cat_description"]) > strlen($b["cat_description"])) ? -1 : 1;
        });

        return $list;
    }

    public static function getNumberOfGroupings(array $sortedList, string $purpose = "default")
    {

        $listLength = count($sortedList);
        $groups = 0;

        switch ($purpose) {

            case "photo":
                if ($listLength > 4) {
                    $groups = is_int($listLength) ? floor($listLength / 4) : 0;
                }

                break;
            default:
                if ($listLength >= 7) {
                    $groups = is_int($listLength) ? floor($listLength / 7) : 0;
                }

                break;
        }

        return $groups;
    }


    //    public static function categorisePhotos(array $allPhotos): array {
    //        $patchedCategoriesPhotos = [];
    //        $patchArray = array();
    //
    //        /*
    //             * Structure of Patch = Array [
    //             * "order": "plp",
    //             * "portraits: 2,
    //             * landscape: 1,
    //             * "data": [image_1_data,image_2_data]
    //             *
    //             * ]
    //             */
    //
    //
    //        foreach ($allPhotos as $photo){
    //            //Steps I want to take
    //            //1. Check if image is portrait or landscape
    //            //2. If Portrait Add to a patch array
    //            //3.If landscape check the size of the width
    //            //
    //
    //        }
    //
    //    }



    public static function getDifferenceArray(array $firstList, array $secondList): array
    {

        $result = array_udiff_assoc($firstList, $secondList, function ($a, $b) {

            if ($a["category_id"] != $b["category_id"]) {
                return 0;
            }
            return ($a["category_id"] == $b["category_id"]) ? 1 : -1;
        });

        return $result;
    }

    public function userPaymentLink($typeOfAccount = "free"): string
    {

        $cost = $this->subscriptionAccountAmount($_SESSION["currency"], $typeOfAccount);

        $encodeString = "search=innocentnyamusa@gmail.com&amount=" . $cost . "&reference=" . $_SESSION["user_id"] . "&l=1";
        $encodedString = base64_encode($encodeString);

        return "https://www.paynow.co.zw/payment/link/" . $_SESSION["user_email"] . "?q=" . $encodedString;
    }


    public function subscriptionCovers(string $accountType): string
    {

        switch ($_SESSION["subscription"]) {
            case "premium":
                $level = 3;
                break;
            case "standard":
                $level = 2;
                break;
            default:
                $level = 1;
        }

        switch ($accountType) {
            case "premium":
                $expectation = 3;
                break;
            case "standard":
                $expectation = 2;
                break;
            default:
                $expectation = 1;
        }


        if ($level < $expectation) {
            return "false";
        } else {
            return "true";
        }
    }

    public function subscriptionAccountAmount(string $currency, $subscriptionAcc = "free")
    {

        $subscriptionAcc = isset($_SESSION["subscription"]) ? $_SESSION["subscription"] : $subscriptionAcc;

        switch ($currency) {
            case "us":
                if ($subscriptionAcc == "premium") {
                    return 5.0;
                } else if ($subscriptionAcc == "standard") {
                    return 3.0;
                } else {
                    return 0.0;
                }

            case "rtgs":
                if ($subscriptionAcc == "premium") {
                    return 600.0;
                } else if ($subscriptionAcc == "standard") {
                    return 200.0;
                } else {
                    return 0.0;
                }

            default:
                return 100.0;
        }
    }

    /**
     * Truncates the given string at the specified length.
     *
     * @param string $str The input string.
     * @param int $width The number of chars at which the string will be truncated.
     * @return string
     */
    public static function truncate($str, $width)
    {
        return strtok(wordwrap($str, $width, "...\n"), "\n");
    }
}
