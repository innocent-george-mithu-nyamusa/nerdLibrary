<?php
//
//use Classes\DateIntervalEnhanced;
//use Classes\RelationshipView;
//use Classes\Utilities;
//use Intervention\Image\ImageManager;
//
//
////
//require "vendor/autoload.php";
//
//
//$utility = new Utilities();
////
//$paynow = new Paynow\Payments\Paynow(
//    'secret-key',
//    '13156',
//    'http://www.nerdlife.co.zw/gateways/paynow/update',
//
////     The return url can be set at later stages. You might want to do this if you want to pass data to the return url (like the reference of the transaction)
////    'http://www.nerdlife.co.zw/return?gateway=paynow'
//);
//
//$payment = $paynow->createPayment('Subscription Paid', 'myemail.com')
////session_start();
////
///
//$payment->add('Bananas', 2.50);
//$payment->add('Apples', 3.40);
//
//
//$response = $paynow->sendMobile($payment, '077777777', 'ecocash');
//
//try {
//
//    $response = $paynow->send($payment);
//
//    print_r($response);
//
//if ($response->success()) {
//    // Get the poll url (used to check the status of a transaction). You might want to save this in your DB
//   echo  $link = $response->redirectUrl();
//
//    // Get the instructions
//    echo $pollUrl = $response->pollUrl();
//}
////session_start();
////echo $utility->userPaymentLink("premium");
//
//}
//
//////
/////
////$dateExpired = new DateTime("now");
////$notificationExpiration = $dateExpired->format("Y-m-d H:i:s");
////
//// $item = new DateTime("now");
//////$timezone =$item->getTimezone();
//////echo $timezone->getName();
//////echo $notificationExpiration;
////$postObj =  new \Classes\UserPostView();
////$allFeedPosts = $postObj->getMyFeedPosts($_SESSION["user_id"]);
////
////print_r($allFeedPosts);
////$pass = password_hash("Password12345", PASSWORD_BCRYPT, array("cost"=> 12));
////echo $pass;
//echo \Classes\Utilities::genUniqueId("ser");
////
////$a1=array("red","green");
////$a2=array("blue","yellow");
////print_r(array_merge($a1,$a2));
//
////$manager = new ImageManager(array('driver' => 'gd'));
////
////$splObj = new SplFileInfo("/Applications/XAMPP/xamppfiles/htdocs/images/media/thumbnails/1.jpg");
////$path = $splObj->getPath();
////
////
////$image = $manager->make($path);
////$image->height();
//
////print_r(pathinfo("/Applications/XAMPP/xamppfiles/htdocs/images/media/thumbnails/1.jpg"));