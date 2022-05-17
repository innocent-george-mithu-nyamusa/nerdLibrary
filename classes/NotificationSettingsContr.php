<?php

namespace Classes;

class NotificationSettingsContr extends NotificationSettings
{

    protected function setCUserId(string $userId): void
    {
        $this->setUserId($userId);
    }

    protected function setCNotificationComment(int $notificationComment): void
    {
        $notificationComment = Utilities::cleanData($notificationComment);
        parent::setNotificationComment($notificationComment);
    }

    protected function setCNotificationCourse(int $notificationCourse): void
    {
        $notificationCourse = Utilities::cleanData($notificationCourse);
        parent::setNotificationCourse($notificationCourse);
    }

    protected function setCNotificationEnabled(int $notificationEnabled): void
    {
        $notificationEnabled = Utilities::cleanData($notificationEnabled);
        parent::setNotificationEnabled($notificationEnabled);
    }


    protected function setCNotificationFollower(int $notificationFollower): void
    {
        $notificationFollower = Utilities::cleanData($notificationFollower);
        parent::setNotificationFollower($notificationFollower);
    }

    protected function setCNotificationFriendRequest(int $notificationFriendRequest): void
    {
        $notificationFriendRequest = Utilities::cleanData($notificationFriendRequest);
        parent::setNotificationFriendRequest($notificationFriendRequest);
    }

    protected function setCNotificationMessage(int $notificationMessage): void
    {
        $notificationMessage = Utilities::cleanData($notificationMessage);
        parent::setNotificationMessage($notificationMessage);
    }

    protected function setCNotificationPayment(int $notificationPayment): void
    {
        $notificationPayment = Utilities::cleanData($notificationPayment);
        parent::setNotificationPayment($notificationPayment);
    }

    protected function setCNotificationSound(int $notificationSound): void
    {
        $notificationSound = Utilities::cleanData($notificationSound);
        parent::setNotificationSound($notificationSound);
    }

    protected function setCSettingId(): void
    {
        $settingId = Utilities::genUniqueId("set");
        $this->setSettingId($settingId);
    }
}