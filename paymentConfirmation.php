<?php

/**
 * First install the Paynow PHP Library using Composer
 *
 * You'll need to set the result url to https://yourapp/path/update.php
 */


// Require in composer's autoloader
include 'vendor/autoload.php';

// Create a new paynow object passing in your integration keys (used for validating the hash of the status update)
$paynow = new Paynow\Payments\Paynow('14889', 'INTEGRATION_KEY', null, null);

try {
    // Process the incoming status update
    $status = $paynow->processStatusUpdate();


    // Get the reference of the transaction you sent with the transaction when you initiated it
    // @see https://developers.paynow.co.zw/docs/sourcedocs_php.html#class-paynow-core-statusresponse
    $reference = $status->reference();

    // Check if the transaction was paid for 
    if ($status->paid()) {
        // This user showed us dat doe. Better give them whatever they paid for 

        // On the real. Here you might want to update the transaction with the reference '$reference'
        // in your DB. Set it's status as paid
    } else {
        // We got some other status from Paynow. Handle that
        // For the full list of the statuses that can be returned by Paynow, see https://developers.paynow.co.zw/docs/status_update.html
        $state = $reference->status();

        // Update the transaction's status in your DB maybe?
    }
} catch (\Exception $e) {
    // *scream* ahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
    // something broke. log this? 
}
