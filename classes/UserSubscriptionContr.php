<?php


namespace Classes;


class UserSubscriptionContr extends UserSubscription
{
    protected function setCSubscriberId(string $subscriberId): void
    {
        parent::setSubscriberId($subscriberId);
    }

    protected function setCSubscriptionCurrency(string $subscriptionCurrency): void
    {
        parent::setSubscriptionCurrency($subscriptionCurrency);
    }

    protected function setCSubscriptionAmount(string $use, $type): void
    {   $utility = new Utilities();

        $subscriptionAmount = $utility->subscriptionAccountAmount($use, $type);
        parent::setSubscriptionAmount($subscriptionAmount);
    }

    protected function setCSubscriptionId(): void
    {
        $subscriptionId = Utilities::genUniqueId("res");
        parent::setSubscriptionId($subscriptionId);
    }

    protected function setCSubscriptionResourceId(string $subscriptionResourceId): void
    {
        parent::setSubscriptionResourceId($subscriptionResourceId);
    }

    protected function setCSubscriptionType(string $subscriptionType): void
    {
        parent::setSubscriptionType($subscriptionType);
    }
}