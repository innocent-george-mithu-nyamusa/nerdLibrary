<?php

namespace Classes;

use PDO;

class NotificationSettings extends Dbh
{
    use Setting;
    private int $notificationEnabled;
    private int $notificationSound;
    private int $notificationFriendRequest;
    private int $notificationComment;
    private int $notificationMessage;
    private int $notificationFollower;
    private int $notificationCourse;
    private int $notificationPayment;

    /**
     * @param int $notificationPayment
     */
    protected function setNotificationPayment(int $notificationPayment): void
    {
        $this->notificationPayment = $notificationPayment;
    }

    /**
     * @param int $notificationCourse
     */
    protected function setNotificationCourse(int $notificationCourse): void
    {
        $this->notificationCourse = $notificationCourse;
    }

    /**
     * @param int $notificationFollower
     */
    protected function setNotificationFollower(int $notificationFollower): void
    {
        $this->notificationFollower = $notificationFollower;
    }

    /**
     * @param int $notificationMessage
     */
    protected function setNotificationMessage(int $notificationMessage): void
    {
        $this->notificationMessage = $notificationMessage;
    }

    /**
     * @param int $notificationComment
     */
    protected function setNotificationComment(int $notificationComment): void
    {
        $this->notificationComment = $notificationComment;
    }

    /**
     * @param int $notificationFriendRequest
     */
    protected function setNotificationFriendRequest(int $notificationFriendRequest): void
    {
        $this->notificationFriendRequest = $notificationFriendRequest;
    }

    /**
     * @param int $notificationSound
     */
    protected function setNotificationSound(int $notificationSound): void
    {
        $this->notificationSound = $notificationSound;
    }

    /**
     * @param int $notificationEnabled
     */
    protected function setNotificationEnabled(int $notificationEnabled): void
    {
        $this->notificationEnabled = $notificationEnabled;
    }

    protected function enableInitNotificationStatus(): bool {
        return $this->enableInitNotification();
    }

    private function enableInitNotification(): bool {
        try {
//            $createNotificationQuery = "INSERT INTO notification_settings (notification_id, notification_user_id, notification_enabled, notification_sound, notification_friend_request, notification_comment, notification_message, notification_follower, notification_course_enrolment, notification_payment) VALUES (:notificationId, :notificationUserId, :notificationEnabled, :notificationSound, :notificationFriendRequest, :notificationComment, :notificationMessage, :notificationFollower, :notificationCourse, :notificationPayment)";
            $createNotificationQuery = "INSERT INTO notification_settings (notification_id, notification_user_id) VALUES (:notificationId, :notificationUserId)";
            $createNotificationStmt = $this->connect()->prepare($createNotificationQuery);
            $createNotificationStmt->bindParam(":notificationId", $this->settingId);
            $createNotificationStmt->bindParam(":notificationUserId", $this->userId);
//            $createNotificationStmt->bindParam(":notificationEnabled", $this->notificationEnabled);
//            $createNotificationStmt->bindParam(":notificationSound", $this->notificationSound);
//            $createNotificationStmt->bindParam(":notificationFriendRequest", $this->notificationFriendRequest);
//            $createNotificationStmt->bindParam(":notificationComment", $this->notificationComment);
//            $createNotificationStmt->bindParam(":notificationMessage", $this->notificationMessage);
//            $createNotificationStmt->bindParam(":notificationFollower", $this->notificationFollower);
//            $createNotificationStmt->bindParam(":notificationCourse", $this->notificationCourse);
//            $createNotificationStmt->bindParam(":notificationPayment", $this->notificationPayment);
            $result = $createNotificationStmt->execute();
            $createNotificationStmt->closeCursor();
            return $result;

        }catch ( \Exception $exception) {
            echo "Failed to create notification setting ". $exception->getMessage();
            return false;
        }
    }

    protected function getUserNotificationSettingsResult(): ?array {
        return $this->getUserNotificationSettings();
    }
    private function getUserNotificationSettings(): ?array {
        try {

            $getNotificationQuery = "SELECT * FROM notification_settings WHERE notification_user_id=:notificationUserId";
            $getNotificationStmt = $this->connect()->prepare($getNotificationQuery);
            $getNotificationStmt->bindParam(":notificationUserId", $this->userId);
            $getNotificationStmt->execute();
            $result = $getNotificationStmt->fetchAll(PDO::FETCH_ASSOC);
            $getNotificationStmt->closeCursor();

            return $result[0];

        }catch (\Exception $exception){
            echo "Failed to get notifications settings ". $exception->getMessage();
            return null;
        }
    }



    protected function enableNotificationCommentsStatus(): bool
    {
        return $this->updateNotificationComments();
    }

    private function updateNotificationComments(): bool {
        try {
            $updateSettingQuery = "UPDATE notification_settings SET notification_comment=:settingStatus WHERE notification_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->notificationComment);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;
        }catch (\Exception $exception){
            echo "Failed to update notifications settings ". $exception->getMessage();
            return false;
        }
    }

    protected function enabledSoundNotificationsStatus(): bool
    {
        return $this->enabledSoundNotifications();
    }

    private function enabledSoundNotifications(): bool {
        try {
            $updateSettingQuery = "UPDATE notification_settings SET notification_sound=:settingStatus WHERE notification_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->notificationSound);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;

        }catch (\Exception $exception){
            echo "Failed to update notifications ". $exception->getMessage();
            return false;
        }
    }

    protected function enabledNotificationsStatus(): bool
    {
        return $this->enabledNotifications();
    }

    private function enabledNotifications(): bool {
        try {
            $updateSettingQuery = "UPDATE notification_settings SET notification_enabled=:settingStatus WHERE notification_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->notificationEnabled);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;

        }catch (\Exception $exception){
            echo "Failed to update notifications ". $exception->getMessage();
            return false;
        }
    }

    protected function enabledFriendRequestNotificationsStatus(): bool
    {
        return $this->enabledFriendRequestNotifications();
    }

    private function enabledFriendRequestNotifications(): bool {
        try {
            $updateSettingQuery = "UPDATE notification_settings SET notification_friend_request=:settingStatus WHERE notification_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->notificationFriendRequest);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;

        }catch (\Exception $exception){
            echo "Failed to update notifications settings". $exception->getMessage();
            return false;
        }
    }

    protected function enabledMessageNotificationsStatus(): bool
    {
        return $this->enabledMessageNotifications();
    }

    private function enabledMessageNotifications(): bool {
        try {
            $updateSettingQuery = "UPDATE notification_settings SET notification_message=:settingStatus WHERE notification_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->notificationMessage);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;

        }catch (\Exception $exception){
            echo "Failed to update notifications settings". $exception->getMessage();
            return false;
        }
    }

    protected function enabledFollowerNotificationsStatus(): bool
    {
        return $this->enabledFollowerNotifications();
    }

    private function enabledFollowerNotifications(): bool {
        try {
            $updateSettingQuery = "UPDATE notification_settings SET notification_follower=:settingStatus WHERE notification_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->notificationFollower);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;

        }catch (\Exception $exception){
            echo "Failed to update notifications settings". $exception->getMessage();
            return false;
        }
    }

    protected function enabledCourseNotificationsStatus(): bool
    {
        return $this->enabledCourseNotifications();
    }

    private function enabledCourseNotifications(): bool {
        try {
            $updateSettingQuery = "UPDATE notification_settings SET notification_course_enrolment=:settingStatus WHERE notification_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->notificationCourse);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;

        }catch (\Exception $exception){
            echo "Failed to update notifications settings". $exception->getMessage();
            return false;
        }
    }

    protected function enabledPaymentNotificationsStatus(): bool
    {
        return $this->enabledPaymentNotifications();
    }

    private function enabledPaymentNotifications(): bool {
        try {
            $updateSettingQuery = "UPDATE notification_settings SET notification_payment=:settingStatus WHERE notification_user_id=:settingUserId";
            $updateSettingStmt = $this->connect()->prepare($updateSettingQuery);
            $updateSettingStmt->bindParam(":settingStatus", $this->notificationPayment);
            $updateSettingStmt->bindParam(":settingUserId", $this->userId);
            $result = $updateSettingStmt->execute();
            $updateSettingStmt->closeCursor();
            return $result;

        } catch (\Exception $exception){
            echo "Failed to update notifications settings". $exception->getMessage();
            return false;
        }
    }


}