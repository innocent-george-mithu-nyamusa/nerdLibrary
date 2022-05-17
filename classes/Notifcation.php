<?php

namespace Classes;

Abstract Class Notifcation extends Dbh
{

    abstract protected function invokeNotificationStatus():bool;
    abstract protected function updateNotificationStatus():bool;
    abstract protected function createNotificationResult():bool;
    abstract protected function updateNotificationResult():bool;
    abstract protected function deleteNotificationResult():bool;
    abstract protected function getNotificationsResult():?array;
    abstract protected function getNotificationResult():?array;

}