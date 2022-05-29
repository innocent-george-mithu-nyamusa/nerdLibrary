<?php

namespace Classes;


use DateTime;
use Exception;
use PDO;

class SubscriptionRequest extends Dbh
{

    private string $subscriptionRequestId;
    private string $subscriptionRequestSubscriber;
    private string $subscriptionRequestAccountType;
    private float $subscriptionRequestAmount;
    private string $subscriptionRequestExpiration;

    /**
     * @param string $subscriptionRequestExpiration
     */
    protected function setSubscriptionRequestExpiration(string $subscriptionRequestExpiration): void
    {
        $this->subscriptionRequestExpiration = $subscriptionRequestExpiration;
    }


    /**
     * @param float $subscriptionRequestAmount
     */
    protected function setSubscriptionRequestAmount(float $subscriptionRequestAmount): void
    {
        $this->subscriptionRequestAmount = $subscriptionRequestAmount;
    }

    /**
     * @param string $subscriptionRequestType
     */
    protected function setSubscriptionRequestType(string $subscriptionAccountRequestType): void
    {
        $this->subscriptionRequestAccountType = $subscriptionAccountRequestType;
    }

    /**
     * @param string $subscriptionRequestSubscriber
     */
    protected function setSubscriptionRequestSubscriber(string $subscriptionRequestSubscriber): void
    {
        $this->subscriptionRequestSubscriber = $subscriptionRequestSubscriber;
    }

    /**
     * @param string $subscriptionRequestId
     */
    protected function setSubscriptionRequestId(string $subscriptionRequestId): void
    {
        $this->subscriptionRequestId = $subscriptionRequestId;
    }

    protected function createSubscriptionRequestResult(): bool{
        return $this->createSubscriptionRequest();
    }

    private function createSubscriptionRequest(): bool {
        try {
            $this->clearExpiredRequests();
            $createRequestQuery = "INSERT INTO subscription_request(subscription_request_id, subscription_request_subscriber, subscription_request_account_type, subscription_request_amount, subscription_request_expiration) VALUES (:subscriptionRequestId, :subscriptionRequestSubscriber, :subscriptionRequestAccountType, :subscriptionRequestAmount, :subscriptionRequestExpiration)";
            $createRequestStmt = $this->connect()->prepare($createRequestQuery);
            $createRequestStmt->bindParam(":subscriptionRequestId", $this->subscriptionRequestId);
            $createRequestStmt->bindParam(":subscriptionRequestSubscriber", $this->subscriptionRequestSubscriber);
            $createRequestStmt->bindParam(":subscriptionRequestAccountType", $this->subscriptionRequestAccountType);
            $createRequestStmt->bindParam(":subscriptionRequestAmount", $this->subscriptionRequestAmount);
            $createRequestStmt->bindParam(":subscriptionRequestExpiration", $this->subscriptionRequestExpiration);
            $result = $createRequestStmt->execute();
            $createRequestStmt->closeCursor();
            return $result;

        }catch (Exception $exception) {
            echo "Failed to create subscription". $exception->getMessage();
            return false;
        }

    }

    protected function getAllSubscriptionsRequestsResult():array {
        return $this->getAllSubscriptionsRequests();
    }

    private function getAllSubscriptionsRequests(): array {
        try {
            $this->clearExpiredRequests();
            $getSubscriptions = "SELECT * FROM subscription_request";
            $getSubscriptionsStmt= $this->connect()->prepare($getSubscriptions);
            $getSubscriptionsStmt->execute();
            $result = $getSubscriptionsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSubscriptionsStmt->closeCursor();

            return $result?? [];
        }catch (Exception $exception) {
            echo "Failed to get all exceptions ". $exception->getMessage();
            return [];
        }
    }

    protected function getAllPendingSubscriptionsRequestsResult():array {
        return $this->getAllPendingSubscriptionsRequests();
    }

    private function getAllPendingSubscriptionsRequests(): array {
        try {
            $this->clearExpiredRequests();
            $getSubscriptions = "SELECT * FROM subscription_request WHERE subscription_request_status='pending'";
            $getSubscriptionsStmt= $this->connect()->prepare($getSubscriptions);
            $getSubscriptionsStmt->execute();
            $result = $getSubscriptionsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSubscriptionsStmt->closeCursor();

            return $result?? [];
        }catch (Exception $exception) {
            echo "Failed to get all exceptions ". $exception->getMessage();
            return [];
        }
    }

    protected function getSubscriptionRequestResult():array {
        return $this->getSubscriptionRequest();
    }

    private function getSubscriptionRequest(): array {
        try {
            $this->clearExpiredRequests();
            $getSubscriptions = "SELECT * FROM subscription_request WHERE subscription_request_id";
            $getSubscriptionsStmt= $this->connect()->prepare($getSubscriptions);
            $getSubscriptionsStmt->execute();
            $result = $getSubscriptionsStmt->fetch(PDO::FETCH_ASSOC);
            $getSubscriptionsStmt->closeCursor();

            return $result ?? [];
        }catch (Exception $exception) {
            echo "Failed to get all exceptions ". $exception->getMessage();
            return [];
        }
    }

    private function clearExpiredRequests():bool {
        try {
            $dateExpired = new DateTime("now");
            $requestExpiration = $dateExpired->format("Y-m-d H:i:s");

            $clearRequestsQuery = "DELETE FROM subscription_request WHERE subscription_request_expiration < '$requestExpiration' AND subscription_request_status != 'approved'";
            $result  = $this->connect()->prepare($clearRequestsQuery)->execute();
            return $result;

        }catch (Exception $exception) {
            echo "Failed to create subscription". $exception->getMessage();
            return false;
        }

    }

    protected function deleteSubscriptionRequestResult():bool {
        return $this->deleteSubscriptionRequest();
    }

    private function deleteSubscriptionRequest():bool {
        try {

            $clearRequestsQuery = "DELETE FROM subscription_request WHERE subscription_request_id=:subscriptionRequestId";
            $clearRequestsStmt = $this->connect()->prepare($clearRequestsQuery);
            $clearRequestsStmt->bindParam(":subscriptionRequestId", $this->subscriptionRequestId);
            $result = $clearRequestsStmt->execute();
            $clearRequestsStmt->closeCursor();

            return $result;

        }catch (Exception $exception) {
            echo "Failed to create subscription". $exception->getMessage();
            return false;
        }

    }

    protected function approveSubscriptionRequestResult():bool {
        return $this->approveSubscriptionRequest();
    }

    private function approveSubscriptionRequest():bool {
        try {

            $clearRequestsQuery = "UPDATE subscription_request SET subscription_request_status='approved' WHERE subscription_request_id=:subscriptionRequestId";
            $clearRequestsStmt = $this->connect()->prepare($clearRequestsQuery);
            $clearRequestsStmt->bindParam(":subscriptionRequestId", $this->subscriptionRequestId);
            $result = $clearRequestsStmt->execute();
            $clearRequestsStmt->closeCursor();

            return $result;

        }catch (Exception $exception) {
            echo "Failed to create subscription". $exception->getMessage();
            return false;
        }

    }



}