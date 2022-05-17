<?php

namespace Classes;

class UserNotificationView extends UserNotificationContr
{

    public function createUserNotification(string $notificationOwner, string $notificationResource, string $notificationType="story", string $userNotified = "friends")
    {

        $this->setCNotificationId();;
        $this->setCNotificationExpiration();
        $this->setCNotificationNotified($userNotified);
        $this->setCNotificationOwner($notificationOwner);
        $this->setCNotificationResourceId($notificationResource);
        $this->setCNotificationType($notificationType);
        return $this->createNotificationResult();
    }


    public function getMyFriendshipsNotifications(string $notificationResource): array {

        $this->setCNotificationResourceId($notificationResource);
        return $this->getNotificationsResult();
    }


}