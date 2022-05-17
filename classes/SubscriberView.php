<?php


namespace Classes;


class SubscriberView extends SubscriberContr
{
    public function createSubscriberEmailStatus(string $email): bool
    {
        $this->setCSubscriberId();
        $this->setCSubscriberEmail($email);

        return parent::createSubscriberStatus();
    }

    public function getAllSubscriptions(): ?array {
        return parent::getAllSubscriptionsStatus();
    }

    public function deleteSubscription(string $subId): bool {
        $this->addCSubscriberId($subId);
        return parent::deleteSubscriptionStatus();
    }

}