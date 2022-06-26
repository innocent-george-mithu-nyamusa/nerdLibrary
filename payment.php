
<?php


require_once('./paynow/vendor/autoload.php');

$paynow = new Paynow\Payments\Paynow(
    'INTEGRATION_ID',
    'INTEGRATION_KEY',
    'http://nerd-library.com/payment/paynow/update',

    // The return url can be set at later stages. You might want to do this if you want to pass data to the return url (like the reference of the transaction)
    'http://nerd-library.com/return/paynow'
);

# $paynow->setResultUrl('');
# $paynow->setReturnUrl('');

$payment = $paynow->createPayment('Invoice 35', 'innocentnyamusa@gmail.com');

$payment->add('Sadza and Beans', 1.25);

$response = $paynow->sendMobile($payment, "0773141650", 'ecocash');

if ($response->success()) {
    // Redirect the user to Paynow
    // $response->redirect();

    // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
    // $link = $response->redirectLink();

    $pollUrl = $response->pollUrl();


    // Check the status of the transaction
    $status = $paynow->pollTransaction($pollUrl);
}
