<?php

namespace Classes;

use PDO;

class UserNotification extends Notifcation
{

    private string $notificationId;
    private string $notificationExpiration;
    private string $notificationOwner;
    private string $notificationNotified;
    private string $notificationStatus;
    private string $notificationResourceId;
    private string $notificationType;

    /**
     * @param string $notificationType
     */
    protected function setNotificationType(string $notificationType): void
    {
        $this->notificationType = $notificationType;
    }

    /**
     * @param string $notificationResourceId
     */
    protected function setNotificationResourceId(string $notificationResourceId): void
    {
        $this->notificationResourceId = $notificationResourceId;
    }


    /**
     * @param string $notificationStatus
     */
    protected function setNotificationStatus(string $notificationStatus): void
    {
        $this->notificationStatus = $notificationStatus;
    }

    /**
     * @param string $notificationNotified
     */
    protected function setNotificationNotified(string $notificationNotified): void
    {
        $this->notificationNotified = $notificationNotified;
    }


    /**
     * @param string $notificationOwner
     */
    protected function setNotificationOwner(string $notificationOwner): void
    {
        $this->notificationOwner = $notificationOwner;
    }

    /**
     * @param string $notificationExpiration
     */
    protected function setNotificationExpiration(string $notificationExpiration): void
    {
        $this->notificationExpiration = $notificationExpiration;
    }

    /**
     * @param string $notificationId
     */
    protected function setNotificationId(string $notificationId): void
    {
        $this->notificationId = $notificationId;
    }


    /**
     * @return bool
     */
    protected function invokeNotificationStatus(): bool
    {
        // TODO: Implement invokeNotificationStatus() method.
        return false;
    }

    /**
     * @return bool
     */
    protected function createNotificationResult(): bool
    {
        return $this->createNotification();
    }

    private function createNotification (): bool {
        try {
            $createNotificationQuery = "INSERT INTO user_notification (notification_id, notification_owner, notification_resource_id, notification_type, notification_expiration) VALUES (:notificationId, :notificationOwner,:notificationResourceId, :notificationType, :notificationExpiration)";
            $createNotificationStmt = $this->connect()->prepare($createNotificationQuery);
            $createNotificationStmt->bindParam(":notificationId", $this->notificationId);
            $createNotificationStmt->bindParam(":notificationOwner", $this->notificationOwner);
            $createNotificationStmt->bindParam(":notificationExpiration", $this->notificationExpiration);
            $createNotificationStmt->bindParam(":notificationResourceId", $this->notificationResourceId);
            $createNotificationStmt->bindParam(":notificationType", $this->notificationType);

            $result = $createNotificationStmt->execute();
            $createNotificationStmt->closeCursor();

            return $result;

        }catch (\Exception $exception) {
            echo "Failed to create notification ". $exception->getMessage();
            return false;
        }
    }


    /**
     * @return bool
     */
    protected function updateNotificationResult(): bool
    {
        // TODO: Implement updateNotificationResult() method.
        return false;
    }

    /**
     * @return bool
     */
    protected function deleteNotificationResult(): bool
    {
        // TODO: Implement deleteNotificationResult() method.
        return false;

    }

    /**
     * @return array|null
     */
    protected function getNotificationsResult(): ?array
    {
        return $this->getMyFriendshipsNotifications();
    }

    private function getMyFriendshipsNotifications(): array {
        try {

            $getFriendShipsQuery = "SELECT * FROM user_notification WHERE notification_resource_id=:userNotificationResourceId AND notification_type='follow'";
            $getFriendShipsStmt= $this->connect()->prepare($getFriendShipsQuery);
            $getFriendShipsStmt->bindParam(":userNotificationResourceId", $this->notificationResourceId);
            $getFriendShipsStmt->execute();
            $result = $getFriendShipsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getFriendShipsStmt->closeCursor();

            return $result ?? [];
        }catch (\Exception $exception) {
            echo "Failed to get friendships ".$exception->getMessage();
            return [];
        }
    }


    /**
     * @return array|null
     */
    protected function getNotificationResult(): ?array
    {
        // TODO: Implement getNotificationResult() method.
        return null;
    }

    protected function updateNotificationStatus(): bool
    {
        // TODO: Implement updateNotificationStatus() method.
    }
}