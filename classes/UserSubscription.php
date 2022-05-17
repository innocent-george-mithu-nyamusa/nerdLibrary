<?php

namespace Classes;


use Cassandra\Function_;
use DateInterval;
use DateTime;
use Exception;
use PDO;

class UserSubscription extends Dbh
{
    private string $subscriptionId;
    private string $subscriberId;
    private string $subscriptionType;
    private string $subscriptionCurrency;
    private float $subscriptionAmount;
    private string $subscriptionResourceId;

    /**
     * @param string $subscriptionCurrency
     */
    protected function setSubscriptionCurrency(string $subscriptionCurrency): void
    {
        $this->subscriptionCurrency = $subscriptionCurrency;
    }

    /**
     * @param float $subscriptionAmount
     */
    protected function setSubscriptionAmount(float $subscriptionAmount): void
    {
        $this->subscriptionAmount = $subscriptionAmount;
    }

    /**
     * @param string $subscriptionResourceId
     */
    protected function setSubscriptionResourceId(string $subscriptionResourceId): void
    {
        $this->subscriptionResourceId = $subscriptionResourceId;
    }

    /**
     * @param string $subscriptionId
     */
    protected function setSubscriptionId(string $subscriptionId): void
    {
        $this->subscriptionId = $subscriptionId;
    }

    /**
     * @param string $subscriberId
     */
    protected function setSubscriberId(string $subscriberId): void
    {
        $this->subscriberId = $subscriberId;
    }

    /**
     * @param string $subscriptionType
     */
    protected function setSubscriptionType(string $subscriptionType): void
    {
        $this->subscriptionType = $subscriptionType;
    }

    protected function createSubscriptionStatus(): bool {
        return $this->createSubscription();
    }

    private function createSubscription() :bool {

        try {
            //Create Subscription
            $dateCreate = new DateTime('now');
            $dateExpired = new DateTime("now");
            $this->updateExpiredSubscriptions();

            $dateExpired = $dateExpired->add(new DateInterval('P30D'));

            $dateCreate = $dateCreate->format("Y-m-d");
            $dateExpired = $dateExpired->format("Y-m-d");

            $addSubQuery = "INSERT INTO subscription (subscription_id, subscription_date, subscription_amount, subscription_resource_id, subscription_type, subscription_currency, subscription_expiration, subscriber_id) VALUES(:subscriptionId, :subscriptionDate, :subscriptionAmount,:subscriptionResourceId, :subscriptionType,:subscriptionCurrency, :subscriptionExpiration, :subscriberId)";
            $addSubStmt = $this->connect()->prepare($addSubQuery);
            $addSubStmt->bindParam(":subscriptionId", $this->subscriptionId);
            $addSubStmt->bindParam(":subscriptionDate", $dateCreate);
            $addSubStmt->bindParam(":subscriptionAmount", $this->subscriptionAmount);
            $addSubStmt->bindParam(":subscriptionResourceId", $this->subscriptionResourceId);
            $addSubStmt->bindParam(":subscriptionType", $this->subscriptionType);
            $addSubStmt->bindParam(":subscriptionCurrency", $this->subscriptionCurrency);
            $addSubStmt->bindParam(":subscriptionExpiration", $dateExpired);
            $addSubStmt->bindParam(":subscriberId", $this->subscriberId);
            $result = $addSubStmt->execute();
            $addSubStmt->closeCursor();


            return $result;

        }catch (Exception $exception) {

            echo "failed to create subscription " . $exception->getMessage();
            return false;
        }
    }



    protected function updateSubscriptionResult(): bool {
        return $this->updateSubscription();
    }
    private function updateSubscription(): bool {

        try {
            $this->updateExpiredSubscriptions();
            $dateExpired = new DateTime("now");

            $dateExpired = $dateExpired->add(new DateInterval('P30D'));
            $dateExpired = $dateExpired->format("Y-m-d");

            $updateAccountSubscriptionQuery = "UPDATE subscription SET subscription_amount=:subscriptionAmount, subscription_expiration='$dateExpired', subscription_type=:subscriptionType WHERE subscriber_id=:subscriberId";
            $updateAccountSubscriptionStmt =  $this->connect()->prepare($updateAccountSubscriptionQuery);
            $updateAccountSubscriptionStmt->bindParam(":subscriptionAmount", $this->subscriptionAmount);
            $updateAccountSubscriptionStmt->bindParam(":subscriptionType", $this->subscriptionType);
            $updateAccountSubscriptionStmt->bindParam(":subscriberId", $this->subscriberId);
            $result = $updateAccountSubscriptionStmt->execute();
            $updateAccountSubscriptionStmt->closeCursor();

            return $result;

        }catch (Exception $exception) {
            echo "Failed to update subscription ". $exception->getMessage();
        }
    }

    protected function getSubscriptionResult():array {
        return $this->getSubscription();
    }

    private function getSubscription(): array {
        try {
            $this->updateExpiredSubscriptions();
            $getSubscription = "SELECT * FROM subscription WHERE subscriber_id=:subscriberId";
            $getSubscriptionStmt = $this->connect()->prepare($getSubscription);
            $getSubscriptionStmt->bindParam(":subscriberId", $this->subscriberId);
            $getSubscriptionStmt->execute();
            $result = $getSubscriptionStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSubscriptionStmt->closeCursor();

            return $result[0] ?? [];
        }catch (Exception $exception) {
            echo "Failed to get subscription ".$exception->getMessage();
            return [];
        }
    }

    protected function getAllSubscriptionResult():array {
        return $this->getAllSubscriptions();
    }

    private function getAllSubscriptions(): array {
        try {
            $this->updateExpiredSubscriptions();
            $getSubscription = "SELECT * FROM subscription";
            $getSubscriptionStmt = $this->connect()->prepare($getSubscription);
            $getSubscriptionStmt->execute();
            $result = $getSubscriptionStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSubscriptionStmt->closeCursor();

            return $result?? [];
        }catch (Exception $exception) {
            echo "Failed to get subscriptions ".$exception->getMessage();
            return [];
        }
    }



    protected function getAllPendingSubscriptionResult():array {
        return $this->getAllPendingSubscriptions();
    }

    private function getAllPendingSubscriptions(): array {
        try {
            $this->updateExpiredSubscriptions();
            $getSubscription = "SELECT * FROM subscription WHERE subscription_status='pending'";
            $getSubscriptionStmt = $this->connect()->prepare($getSubscription);
            $getSubscriptionStmt->execute();
            $result = $getSubscriptionStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSubscriptionStmt->closeCursor();

            return $result?? [];
        }catch (Exception $exception) {
            echo "Failed to get subscriptions ".$exception->getMessage();
            return [];
        }
    }

    protected function getAllApprovedSubscriptionResult():array {
        return $this->getAllApprovedSubscriptions();
    }

    private function getAllApprovedSubscriptions(): array {
        try {
            $this->updateExpiredSubscriptions();
            $getSubscription = "SELECT * FROM subscription WHERE subscription_status='active'";
            $getSubscriptionStmt = $this->connect()->prepare($getSubscription);
            $getSubscriptionStmt->execute();
            $result = $getSubscriptionStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSubscriptionStmt->closeCursor();

            return $result?? [];
        }catch (Exception $exception) {
            echo "Failed to get subscriptions ".$exception->getMessage();
            return [];
        }
    }

    private function updateExpiredSubscriptions(): bool {
        try {
            $today = date("Y-m-d");
            $updateExpiredSubscriptions = "UPDATE subscription SET subscription_status='expired' WHERE subscription_expiration < '$today' AND subscription_status!='expired'";
            $updateExpiredSubscriptionsStmt = $this->connect()->prepare($updateExpiredSubscriptions);
            $result = $updateExpiredSubscriptionsStmt->execute();
            $updateExpiredSubscriptionsStmt->closeCursor();

            return $result;
        }catch (Exception $exception) {}
        echo "Failed to update subscriptions ". $exception->getMessage();
        return false;
    }

    protected function getAllExpiredSubscriptionResult():array {
        return $this->getAllExpiredSubscriptions();
    }

    private function getAllExpiredSubscriptions(): array {
        try {
            $this->updateExpiredSubscriptions();
            $getSubscription = "SELECT * FROM subscription WHERE subscription_status='expired'";
            $getSubscriptionStmt = $this->connect()->prepare($getSubscription);
            $getSubscriptionStmt->execute();
            $result = $getSubscriptionStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSubscriptionStmt->closeCursor();

            return $result?? [];
        }catch (Exception $exception) {
            echo "Failed to get subscriptions ".$exception->getMessage();
            return [];
        }
    }

    protected function approveSubscriptionResult():array {
        return $this->approveSubscription();
    }

    private function approveSubscription(): array {
        try {
            $getSubscription = "UPDATE subscription SET subscription_status='active' WHERE subscriber_id=:subscriberId AND subscription_currency=:subscriptionCurrency";
            $getSubscriptionStmt = $this->connect()->prepare($getSubscription);
            $getSubscriptionStmt->bindParam(":subscriberId", $this->subscriberId);
            $getSubscriptionStmt->bindParam(":subscriptionCurrency", $this->subscriptionCurrency);
            $getSubscriptionStmt->execute();
            $result = $getSubscriptionStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSubscriptionStmt->closeCursor();

            return $result[0] ?? [];
        }catch (Exception $exception) {
            echo "Failed to get subscription ".$exception->getMessage();
            return [];
        }
    }


}