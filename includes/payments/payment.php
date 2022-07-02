<?php

use Classes\Utilities;

require_once('vendor/autoload.php');

$utilityObj = new Utilities();
$paynow = new Paynow\Payments\Paynow(
    'INTEGRATION_ID',
    'INTEGRATION_KEY',
    'http://nerd-library.com/payments/paymentConfirmation.php',

    // The return url can be set at later stages. You might want to do this if you want to pass data to the return url (like the reference of the transaction)
    'http://nerd-library.com/return/paynow'
);

if (isset($_POST)) {

    $reference = $_POST["user_phone"] . " subscription";
    $currency = $_POST["user_account_currency"];
    $phone_number = $_POST["user_phone"];
    $payment_platform_option = $_POST["user_account_payment_option_platform"];

    $amount = $utilityObj->subscriptionAccountAmount($currency, $_POST["accountSubscriptionType"]);;
    $payment = $paynow->createPayment($reference, 'roy@mopanesystems.com');

    $payment->add('Subscription ', $amount);

    $response = $paynow->sendMobile($payment, $phone_number, $payment_platform_option);

    if ($response->success()) {
        // Redirect the user to Paynow
        // $response->redirect();

        // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
        // $link = $response->redirectLink();

        $pollUrl = $response->pollUrl();

        // Check the status of the transaction
        $status = $paynow->pollTransaction($pollUrl);

        if ($status->paid()) {
            // Yay! Transaction was paid for
            echo "Person Paid";
        } else {
            print("Why you no pay?");
        }
    }
}
