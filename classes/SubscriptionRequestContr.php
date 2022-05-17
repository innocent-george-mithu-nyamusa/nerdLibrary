<?php

namespace Classes;

use DateInterval;
use DateTime;

class SubscriptionRequestContr extends SubscriptionRequest
{


    protected function setCSubscriptionRequestAmount(float $subscriptionRequestAmount): void
    {
        $subscriptionRequestAmount = Utilities::cleanData($subscriptionRequestAmount);
        parent::setSubscriptionRequestAmount($subscriptionRequestAmount);
    }

    protected function setCSubscriptionRequestExpiration(): void
    {
        $dateExpired = new DateTime("now");
        $dateExpired = $dateExpired->add(new DateInterval('P1D'));

        $subscriptionRequestExpiration = $dateExpired->format("Y-m-d H:i:s");
        parent::setSubscriptionRequestExpiration($subscriptionRequestExpiration);
    }

    protected function setCSubscriptionRequestId(): void
    {

        $subscriptionRequestId = Utilities::genUniqueId("sbr");
        parent::setSubscriptionRequestId($subscriptionRequestId);

    }

    protected function addSubscriptionRequestId(string $subscriptionRequestId): void
    {
        $subscriptionRequestId = Utilities::cleanData($subscriptionRequestId);
        parent::setSubscriptionRequestId($subscriptionRequestId);
    }

    protected function setCSubscriptionRequestSubscriber(string $subscriptionRequestSubscriber): void
    {
        $subscriptionRequestSubscriber = Utilities::cleanData($subscriptionRequestSubscriber);
        parent::setSubscriptionRequestSubscriber($subscriptionRequestSubscriber);
    }

    protected function setCSubscriptionRequestType(string $subscriptionAccountRequestType): void
    {
        $subscriptionAccountRequestType = Utilities::cleanData($subscriptionAccountRequestType);
        parent::setSubscriptionRequestType($subscriptionAccountRequestType);
    }

}