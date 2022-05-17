<?php


namespace Classes;


use Exception;
use PDO;

class Subscriber extends Dbh
{

    private string $subscriberId;
    private string $subscriberEmail;

    /**
     * @param string $subscriberId
     */
    public function setSubscriberId(string $subscriberId): void
    {
        $this->subscriberId = $subscriberId;
    }

    /**
     * @param string $subscriberEmail
     */
    public function setSubscriberEmail(string $subscriberEmail): void
    {
        $this->subscriberEmail = $subscriberEmail;
    }

    protected function createSubscriberStatus(): bool {
        return self::setEmail();
    }

    private function setEmail(): bool {
        try {
            $addSubscriberEmailQuery = "INSERT INTO subscriber (subscriber_id, subscriber_email) VALUES (:subId, :subEmail)";
            $addSubscriberEmailStmt = $this->connect()->prepare($addSubscriberEmailQuery);
            $addSubscriberEmailStmt->bindParam(":subId", $this->subscriberId);
            $addSubscriberEmailStmt->bindParam(":subEmail", $this->subscriberEmail);
            return $addSubscriberEmailStmt-> execute();
        }catch (Exception $exception) {
            echo "Failed to add subscription". $exception->getMessage();
            return false;

        }
    }

    protected function getAllSubscriptionsStatus(): ?array {

        return self::getAllSubscriptions();
    }
    private function getAllSubscriptions(): ?array {
        try {
            $getSubs = "SELECT * FROM subscriber";
            $getSubsStmt = $this->connect()->prepare($getSubs);
            $getSubsStmt->execute();
            $result = $getSubsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSubsStmt->closeCursor();
            return $result;
        }catch (Exception $exception) {
            echo "Failed to get all subscriptions". $exception->getMessage();
            return null;

        }
    }

    protected function deleteSubscriptionStatus(): bool
    {
        return self::deleteSubscription();
    }

    private function deleteSubscription(): bool {
        try {
            $deleteSubQuery = "DELETE FROM subscriber WHERE subscriber_id=:subId";
            $deleteSubStmt = $this->connect()->prepare($deleteSubQuery);
            $deleteSubStmt->bindParam(":subId", $this->subscriberId);
            $result = $deleteSubStmt->execute();
            $deleteSubStmt->closeCursor();
            return $result;
        }catch (Exception $exception) {
            echo "Failed to Delete Subscription". $exception->getMessage();
            return false;
        }
    }
}