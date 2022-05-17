<?php

namespace Classes;

class SubscriptionRequestView extends SubscriptionRequestContr
{
        public function createSubscriptionRequest(string $subscriptionRequestSubscriber, string $subscriptionRequestAccountType): bool{
            $utility = new Utilities();
            $amount = $utility->subscriptionAccountAmount($subscriptionRequestAccountType);

            $this->setCSubscriptionRequestId();
            $this->setCSubscriptionRequestSubscriber($subscriptionRequestSubscriber);
            $this->setCSubscriptionRequestExpiration();
            $this->setCSubscriptionRequestType($subscriptionRequestAccountType);
            $this->setCSubscriptionRequestAmount($amount);

            return $this->createSubscriptionRequestResult();
        }

        public function getAllSubscriptionsRequests(): array
        {
            return parent::getAllSubscriptionsRequestsResult();
        }

        public function getAllPendingSubscriptionsRequests(): array
        {
            return parent::getAllPendingSubscriptionsRequestsResult();
        }

        public function deleteSubscriptionRequest(string $subscriptionRequestId): bool{
            $this->addSubscriptionRequestId($subscriptionRequestId);
            return parent::deleteSubscriptionRequestResult();
        }

        public function approveSubscriptionRequest(string $subscriptionRequestId): bool{
            $this->addSubscriptionRequestId($subscriptionRequestId);
            return parent::approveSubscriptionRequestResult();
        }

        protected function getSubscriptionRequest(string $subscriptionRequestId): array
        {
            $this->addSubscriptionRequestId($subscriptionRequestId);
            return parent::getSubscriptionRequestResult();
        }
}