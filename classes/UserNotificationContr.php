<?php

namespace Classes;

use DateInterval;
use DateTime;

class UserNotificationContr extends UserNotification
{

   protected function setCNotificationExpiration(): void
   {
       $dateExpired = new DateTime("now");
       $dateExpired = $dateExpired->add(new DateIntervalEnhanced('PT12H'));

       $notificationExpiration = $dateExpired->format("Y-m-d H:i:s");
       parent::setNotificationExpiration($notificationExpiration);
   }

   protected function setCNotificationId(): void
   {
       $notificationId = Utilities::genUniqueId("not");
       parent::setNotificationId($notificationId);
   }

   protected function setCNotificationType(string $notificationType): void
   {
       $notificationType = Utilities::cleanData($notificationType);
       parent::setNotificationType($notificationType);
   }

    protected function setCNotificationResourceId(string $notificationResourceId): void
   {
       $notificationResourceId = Utilities::cleanData($notificationResourceId);
       parent::setNotificationResourceId($notificationResourceId);
   }

    protected function setCNotificationNotified(string $notificationNotified): void
   {
       $notificationNotified = Utilities::cleanData($notificationNotified);
       parent::setNotificationNotified($notificationNotified);
   }

   protected function setCNotificationOwner(string $notificationOwner): void
   {
       $notificationOwner = Utilities::cleanData($notificationOwner);
       parent::setNotificationOwner($notificationOwner);
   }

   protected function setCNotificationStatus(string $notificationStatus): void
   {
       $notificationStatus = Utilities::cleanData($notificationStatus);
       parent::setNotificationStatus($notificationStatus);
   }
}