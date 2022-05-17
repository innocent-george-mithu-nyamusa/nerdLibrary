<?php


namespace Classes;

use Exception;
use PDO;

class Activity extends Dbh
{

    private string $activityId;
    private string $activityName;
    private string $activityType;
    private string $activityResourceId;
    private string $activityOwner;

    /**
     * @param string $activityResourceId
     */
    public function setActivityResourceId(string $activityResourceId): void
    {
        $this->activityResourceId = $activityResourceId;
    }

    /**
     * @param string $activityType
     */
    public function setActivityType(string $activityType): void
    {
        $this->activityType = $activityType;
    }

    /**
     * @param string $activityName
     */
    public function setActivityName(string $activityName): void
    {
        $this->activityName = $activityName;
    }

    /**
     * @param string $activityId
     */
    protected function setActivityId(string $activityId): void
    {
        $this->activityId = $activityId;
    }


    /**
     * @param string $activityOwner
     */
    protected function setActivityOwner(string $activityOwner): void
    {
        $this->activityOwner = $activityOwner;
    }

    protected function createActivityStatus(): bool {
        return self::createUserActivity();
    }


    private function createUserActivity(): bool {

        try {
            $createActivityQuery = "INSERT INTO activity (activity_id, activity_name, activity_owner, activity_resource_id, activity_type) VALUES(:activityId, :activityName, :activityOwner, :activityResourceId, :activityType)";
            $createActivityStmt = $this->connect()->prepare($createActivityQuery);
            $createActivityStmt->bindParam(":activityId", $this->activityId);
            $createActivityStmt->bindParam(":activityName", $this->activityName);
            $createActivityStmt->bindParam(":activityOwner", $this->activityOwner);
            $createActivityStmt->bindParam(":activityResourceId", $this->activityResourceId);
            $createActivityStmt->bindParam(":activityType", $this->activityType);
            $result = $createActivityStmt->execute();
            $createActivityStmt->closeCursor();
            return $result;

        }catch (Exception $exception) {
            echo "Failed to create activity". $exception->getMessage();
            return false;
        }
    }

//    protected function getOwnerActivityStatus(): bool|array {
//        return self::getOwnerActivity();
//    }

//    private function getOwnerActivity(): bool|array {
//        try {
//            $getActivityQuery = "SELECT * FROM (((activity INNER JOIN user ON user.user_id = activity.activity_resource_id) INNER JOIN lost_item ON lost_item.item_id = activity.activity_resource_id) INNER JOIN claim ON claim.claim_id = activity.activity_resource_id) WHERE activity.activity_owner=:activityOwner";
//            $getActivityStmt = $this->connect()->prepare($getActivityQuery);
//            $getActivityStmt->bindParam(":activityOwner", $this->activityOwner);
//            $getActivityStmt->execute();
//            $results = $getActivityStmt->fetchAll(PDO::FETCH_ASSOC);
//            $getActivityStmt->closeCursor();
//            return $results;
//        }catch (Exception $exception) {
//            echo "Failed to get all user ". $exception->getMessage();
//            return false;
//        }
//    }

//    protected function getActivityOnUserItemsClaimedStatus(): bool|array {
//        return self::getActivityOnUserItemsClaimed();
//    }
//
//    private function getActivityOnUserItemsClaimed(): bool|array {
//        try {
//
//            $getUserClaimedItemsQuery = "SELECT * FROM ((activity INNER JOIN user on activity.activity_owner = user.user_id) INNER JOIN claims ON claim.claim_user_id= activity.activity_owner) WHERE activity.activity_ower=:activityOwner ORDER BY activity.activity_date DESC LIMIT 15";
//            $getUserClaimedItemsStmt = $this->connect()->prepare($getUserClaimedItemsQuery);
//            $getUserClaimedItemsStmt->bindParam(":activityOwner", $this->activityOwner);
//            $getUserClaimedItemsStmt->execute();
//            $results = $getUserClaimedItemsStmt->fetchAll();
//            $getUserClaimedItemsStmt->closeCursor();
//
//            return $results;
//
//        }catch (Exception $exception){
//            echo "failed to get actvity claims on User". $exception->getMessage();
//        }
//    }


//    protected function getActivityOnUserItemLikesStatus(): bool|array {
//        return self::getActivityOnUserItemLikes();
//    }
//
//    private function getActivityOnUserItemLikes(): bool|array {
//        try {
//            $getUserLikeItemsQuery = "SELECT * FROM ((activity INNER JOIN user on activity.activity_owner = user.user_id) INNER JOIN resource ON resource.claim_user_id=) WHERE activity.activity_ower=:activityOwner ORDER BY activity.activity_date DESC LIMIT 15";
//            $getUserLikeItemsStmt = $this->connect()->prepare($getUserLikeItemsQuery);
//            $getUserLikeItemsStmt->bindParam(":activityOwner", $this->activityOwner);
//            $getUserLikeItemsStmt->execute();
//            $results = $getUserLikeItemsStmt->fetchAll();
//            $getUserLikeItemsStmt->closeCursor();
//
//        }catch (Exception $exception){
//            echo "failed to get actvity claims on User". $exception->getMessage();
//        }
//    }

    protected function userLoggedInActivityStatus(): bool {
        return $this->userLoggedIn();
    }
    private function userLoggedIn(): bool {
        try {
            $addLogQuery = "INSERT INTO login_activity(login_activity_id, login_activity_user_id, login_activity_status) VALUES(:activityId, :activityUser, 'active')";
            $addLogStmt = $this->connect()->prepare($addLogQuery);
            $addLogStmt->bindParam(":activityId", $this->activityId);
            $addLogStmt->bindParam(":activityUser", $this->activityOwner);
            $result = $addLogStmt->execute();
            $addLogStmt->closeCursor();

            return $result;

        }catch (Exception $exception) {
            echo "Failed to log activity ". $exception->getMessage();
        }
    }

    protected function getActivityOnFriendsStatus(): ?array {
        return self::getActivityOnFriends();
    }

    private function getActivityOnFriends(): ?array {

        try {

            $getUserActivityQuery = "SELECT * 
                                     FROM login_activity 
                                     INNER JOIN relationship 
                                     ON (relationship.relation_user_id = login_activity.login_activity_user_id  OR relationship.relation_initiator_id = login_activity.login_activity_user_id) AND relationship.relation_status='1'
                                     WHERE  login_activity.login_activity_user_id=:activityOwner
                                     ORDER BY login_activity.login_activity_status
                                     LIMIT 4
                                     ";

            $getUserActivityStmt = $this->connect()->prepare($getUserActivityQuery);
            $getUserActivityStmt->bindParam(":activityOwner", $this->activityOwner);
            $getUserActivityStmt->execute();
            $results = $getUserActivityStmt->fetchAll();
            $getUserActivityStmt->closeCursor();

            return $results;
        }catch (Exception $exception){
            echo "failed to get activity claims on User". $exception->getMessage();
            return null;
        }
    }


    protected function updateLogoutActivityStatus(): bool {
        return $this->updateLogoutActivity();
    }

    private function updateLogoutActivity(): bool {

        try{
            $updateActivityLogoutQuery = "UPDATE login_activity SET logout_date='now', login_activity_status='inactive' WHERE login_activity_user_id=:activityOwner";
            $updateActivityLogoutStmt = $this->connect()->prepare($updateActivityLogoutQuery);
            $updateActivityLogoutStmt->bindParam(":activityOwner", $this->activityOwner);
            $result = $updateActivityLogoutStmt->execute();
            $updateActivityLogoutStmt->closeCursor();
            return $result;
        }catch ( Exception $exception){
            echo "Failed to update logout time ". $exception->getMessage();
            return false;
        }
    }

    protected function updateLoginActivityStatus(): bool {
        return $this->updateLoginActivity();
    }

    private function updateLoginActivity(): bool {
        try{

            $date = date("Y-m-d H:i:s");

            $updateActivityLogoutQuery = "UPDATE login_activity SET login_date='$date' WHERE login_activity_user_id=:activityOwner";
            $updateActivityLogoutStmt = $this->connect()->prepare($updateActivityLogoutQuery);
            $updateActivityLogoutStmt->bindParam(":activityOwner", $this->activityOwner);

            $result = $updateActivityLogoutStmt->execute();
            $updateActivityLogoutStmt->closeCursor();

            return $result;
        }catch ( Exception $exception){
            echo "Failed to update logout time". $exception->getMessage();
            return false;
        }
    }

    protected function getUserNotificationActivityStatus():array {
        return $this->getUserNotificationActivity();
    }

    private function getUserNotificationActivity(): array {

        try{
            $getActivityOnUserResourcesQuery = "SELECT * FROM activity WHERE activity_resource_id IN (SELECT user_notification.notification_resource_id FROM user_notification WHERE notification_owner=:activityOwner)";
            $getActivityOnUserResourcesStmt = $this->connect()->prepare($getActivityOnUserResourcesQuery);
            $getActivityOnUserResourcesStmt->bindParam(":activityOwner", $this->activityOwner);
            $getActivityOnUserResourcesStmt->execute();
            $result = $getActivityOnUserResourcesStmt->fetchAll(PDO::FETCH_ASSOC);
            $getActivityOnUserResourcesStmt->closeCursor();

            return $result ?? [];
        }catch ( Exception $exception){
            echo "Failed to get activity results on user items". $exception->getMessage();
            return [];
        }
    }

}