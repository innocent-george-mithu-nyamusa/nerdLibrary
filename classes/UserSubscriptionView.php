<?php


namespace Classes;


class UserSubscriptionView extends UserSubscriptionContr
{
    public function createUserSubscription(string $subscriptionCurrency, string $subscriptionType, string $subscriptionRId ,string $subscriberId): bool {

        $this->setCSubscriberId($subscriberId);
        $this->setCSubscriptionAmount($subscriptionCurrency, $subscriptionType);
        $this->setCSubscriptionId();
        $this->setCSubscriptionResourceId($subscriptionRId);
        $this->setCSubscriptionType($subscriptionType);
        $this->setCSubscriptionCurrency($subscriptionCurrency);

        return parent::createSubscriptionStatus();
    }

    public function updateUserSubscription(string $subscriptionCurrency, string $subscriptionType,string $subscriberId): bool {

        $this->setCSubscriberId($subscriberId);
        $this->setCSubscriptionAmount($subscriptionCurrency, $subscriptionType);
        $this->setCSubscriptionType($subscriptionType);

        return parent::updateSubscriptionResult();
    }

    public function getSubscription(string $subscriberId): array{
        $this->setCSubscriberId($subscriberId);
        return $this->getSubscriptionResult();
    }

    public function getAllSubscriptions(): array{

        return $this->getAllSubscriptionResult();
    }

  public function getAllPendingSubscriptions(): array{
        return $this->getAllPendingSubscriptionResult();
    }

    public function getAllApprovedSubscriptions(): array{
        return $this->getAllApprovedSubscriptionResult();
    }

    public function getAllExpiredSubscriptions(): array{
        return $this->getAllExpiredSubscriptionResult();
    }

    public function approveSubscription(string $subscriberId): array{
        $this->setCSubscriberId($subscriberId);
        return $this->approveSubscriptionResult();
    }





}