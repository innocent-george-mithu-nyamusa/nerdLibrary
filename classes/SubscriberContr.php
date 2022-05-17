<?php


namespace Classes;


class SubscriberContr extends Subscriber
{

    protected function setCSubscriberEmail(string $subscriberEmail): void
    {
        $subscriberEmail = Utilities::cleanData($subscriberEmail);
        parent::setSubscriberEmail($subscriberEmail);
    }

    protected function setCSubscriberId(): void
    {
        $subscriberId = Utilities::genUniqueId("sub");
        parent::setSubscriberId($subscriberId);
    }

    protected function addCSubscriberId(string $subscriberId): void
    {
        parent::setSubscriberId($subscriberId);
    }

}