<?php

namespace Classes;

use PDO;

class Relationship extends Dbh
{
    private string $relationId;
    private string $relationInitiator;
    private string $relationUser;
    private string $relationType;
    private string $relationFriendId;

    /**
     * @param string $relationFriendId
     */
    public function setRelationFriendId(string $relationFriendId): void
    {
        $this->relationFriendId = $relationFriendId;
    }


    /**
     * @return string
     */
    protected function getRelationId(): string
    {
        return $this->relationId;
    }

    /**
     * @param string $relationType
     */
    protected function setRelationType(string $relationType): void
    {
        $this->relationType = $relationType;
    }

    /**
     * @param string $relationUser
     */
    protected function setRelationUser(string $relationUser): void
    {
        $this->relationUser = $relationUser;
    }

    /**
     * @param string $relationInitiator
     */
    protected function setRelationInitiator(string $relationInitiator): void
    {
        $this->relationInitiator = $relationInitiator;
    }

    /**
     * @param string $relationId
     */
    protected function setRelationId(string $relationId): void
    {
        $this->relationId = $relationId;
    }

    protected function createRelationStatus(): bool {
        return $this->createRelationship();
    }

    private function createRelationship(): bool {
        try {

            $relationCreationQuery = "INSERT INTO relationship(relation_initiator_id, relation_user_id, relation_type, relation_id) VALUES(:relationInitiatorId, :relationUserId, :relationType, :relationId)";
            $relationCreationStmt = $this->connect()->prepare($relationCreationQuery);
            $relationCreationStmt->bindParam(":relationInitiatorId", $this->relationInitiator);
            $relationCreationStmt->bindParam(":relationUserId", $this->relationUser);
            $relationCreationStmt->bindParam(":relationType", $this->relationType);
            $relationCreationStmt->bindParam(":relationId", $this->relationId);
            $result = $relationCreationStmt->execute();
            $relationCreationStmt->closeCursor();
            return $result;

        }catch (\Exception $exception) {
            echo "Failed to create relationship ". $exception->getMessage();
            return false;
        }
    }

    protected function friendsYetStatus():bool {
        return $this->friendsYet();
    }

    private function friendsYet(): bool {
        try {
            $friendsCheckQuery = "SELECT COUNT(*) FROM  relationship WHERE relation_initiator_id=:initiatorId AND relation_user_id=:relationUserId";
            $friendsCheckStmt = $this->connect()->prepare($friendsCheckQuery);
            $friendsCheckStmt->bindParam(":initiatorId", $this->relationInitiator);
            $friendsCheckStmt->bindParam(":relationUserId", $this->relationUser);
            $friendsCheckStmt->execute();
            $result = $friendsCheckStmt->fetchColumn();
            $friendsCheckStmt->closeCursor();

            if($result != 1){
                return false;
            }
            return true;

        }catch (\Exception $exception) {
            echo "Failed to check for friendship ". $exception->getMessage();
            return false;
        }
    }

    protected function haveRelationshipStatus():bool {
        return $this->haveRelationship();
    }

    private function haveRelationship(): bool {
        try {
            $friendsCheckQuery = "SELECT COUNT(*) FROM  relationship WHERE (relation_initiator_id=:initiatorId AND relation_user_id=:relationUserId) OR (relation_initiator_id=:relationUserId AND relation_user_id=:initiatorId)";
            $friendsCheckStmt = $this->connect()->prepare($friendsCheckQuery);
            $friendsCheckStmt->bindParam(":initiatorId", $this->relationInitiator);
            $friendsCheckStmt->bindParam(":relationUserId", $this->relationUser);
            $friendsCheckStmt->execute();
            $result = $friendsCheckStmt->fetchColumn();
            $friendsCheckStmt->closeCursor();

            if($result != 1){
                return false;
            }
            return true;

        }catch (\Exception $exception) {
            echo "Failed to check for friendship ". $exception->getMessage();
            return false;
        }
    }


    protected function updateFriendshipStatus(): bool {
        return $this->updateFriendship();
    }

    private function updateFriendship(): bool {
        try {
            $updateFriendshipQuery = "UPDATE relationship SET relation_status='1' WHERE relation_initiator_id=:relationInitiatorId AND relation_user_id=:relationUserId";
            $updateFriendshipStmt = $this->connect()->prepare($updateFriendshipQuery);
            $updateFriendshipStmt->bindParam(":relationInitiatorId", $this->relationInitiator);
            $updateFriendshipStmt->bindParam(":relationUserId", $this->relationUser);
            $result = $updateFriendshipStmt->execute();
            $updateFriendshipStmt->closeCursor();

            return $result;

        }catch (\Exception $exception) {
            echo "Failed to update relationship ". $exception->getMessage();
        }
    }

    protected function cancelFriendshipStatus(): bool {
        return $this->cancelFriendship();

    }

    private function cancelFriendship(): bool {
        try {
            $updateFriendshipQuery = "DELETE FROM relationship WHERE relation_initiator_id=:relationInitiatorId AND relation_user_id=:relationUserId";
            $updateFriendshipStmt = $this->connect()->prepare($updateFriendshipQuery);
            $updateFriendshipStmt->bindParam(":relationInitiatorId", $this->relationInitiator);
            $updateFriendshipStmt->bindParam(":relationUserId", $this->relationUser);
            $result = $updateFriendshipStmt->execute();
            $updateFriendshipStmt->closeCursor();

            return $result;
        }catch (\Exception $exception) {
            echo "Failed to remove relationship ". $exception->getMessage();
        }
    }



    protected function getMyFriendshipsResult(): ?array {
        return $this->myFriendships();
    }

    private function myFriendships(): array|null {
        try {

            $getFriendsQuery = "SELECT DISTINCT * FROM relationship WHERE (relation_user_id !=:userId OR relation_initiator_id !=:userId) AND relation_status='1' ORDER BY relation_date LIMIT 10";

            $getFriendsStmt = $this->connect()->prepare($getFriendsQuery);
            $getFriendsStmt->bindParam(":userId", $this->relationUser);
            $getFriendsStmt->execute();
            $results = $getFriendsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getFriendsStmt->closeCursor();

            return $results;

        }catch (\Exception $exception){
            echo "Failed to get my friends ".$exception->getMessage();
            return null;
        }
}


    protected function selectFriendWithClosestBirthDay() : array {
        $selectedUser = array();
        $allFriendShips = $this->myFriendshipsBirthday();

        $userObj = new UserView();
        $currentDate = new \DateTime("now");
        $sizeofArray  =  count($allFriendShips);
        $currentYear = $currentDate->format("Y");
        $previousNumberOfDays = 0;

        for($i= 0;  $i < $sizeofArray; $i++) {

            if($allFriendShips[$i]["relation_initiator_id"] == $this->relationUser){
                $user =($userObj->getUser($allFriendShips[$i]["relation_initiator_id"]))[0];
            }else {
                $user = ($userObj->getUser($allFriendShips[$i]["relation_user_id"]))[0];
            }



            $userDobYear = substr($user["user_dob"], 0, 4);
            $currentYearBirthday = substr_replace($user["user_dob"], $currentYear, 0, 4);
            $currentYearBirthday = new \DateTime($currentYearBirthday);
//            $userBirthday = $userBirthday->format("-m-d");

            $userDateDiff = date_diff($currentDate, $currentYearBirthday);
            $daysUntilBirthday = $userDateDiff->days;


            if($i == 0 ){
                array_push($selectedUser, $allFriendShips[$i]);
                $previousNumberOfDays = $daysUntilBirthday;

            } else {

                if($previousNumberOfDays < $daysUntilBirthday) {
                    array_pop($selectedUser);
                    array_push($allFriendShips[$i]);
                }

                $previousNumberOfDays = $daysUntilBirthday;
            }


        }

        return $selectedUser;
    }

    protected function myFriendshipsBirthdayResult(): array {
        return $this->selectFriendWithClosestBirthDay();
    }

    private function myFriendshipsBirthday(): array {
        try {

            $getFriendsQuery = "SELECT *
                                FROM relationship 
                                    INNER JOIN user 
                                        ON (relationship.relation_initiator_id = user.user_id OR relation_user_id = user.user_id) 
                                    WHERE (relation_user_id =:userId OR relation_initiator_id =:userId) 
                                      AND relation_status='1'
                                ORDER BY user.user_dob DESC LIMIT 5";

            $getFriendsStmt = $this->connect()->prepare($getFriendsQuery);
            $getFriendsStmt->bindParam(":userId", $this->relationUser);
            $getFriendsStmt->execute();
            $results = $getFriendsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getFriendsStmt->closeCursor();

            return $results?? [];

        }catch (\Exception $exception){
            echo "Failed to get my friends ".$exception->getMessage();
            return [];
        }
}

    protected function suggestedFriendshipsResult(): ?array {
        return $this->suggestedFriendships();
    }

    private function suggestedFriendships(): array|null {
        try {
            $getSuggestedFriendsQuery =
                "SELECT * FROM user WHERE user.user_id IN (SELECT relationship.relation_initiator_id  FROM relationship WHERE  NOT (relationship.relation_initiator_id = :userId XOR relationship.relation_user_id = :userId))
                 UNION
                 SELECT * FROM user WHERE user.user_id IN (SELECT relationship.relation_user_id FROM relationship WHERE  NOT (relationship.relation_initiator_id = :userId XOR relationship.relation_user_id = :userId))
                 ";

            $getSuggestedFriendsStmt = $this->connect()->prepare($getSuggestedFriendsQuery);
            $getSuggestedFriendsStmt->bindParam(":userId", $this->relationUser);
            $getSuggestedFriendsStmt->execute();
            $results = $getSuggestedFriendsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSuggestedFriendsStmt->closeCursor();

            return $results;
        }catch (\Exception $exception){
            echo "Failed to get my friends ".$exception->getMessage();
            return null;
        }
}

    protected function notificationSuggestionFriendshipsResult(): ?array {
        return $this->notificationSuggestionFriendships();
    }

    private function notificationSuggestionFriendships(): array|null {
        try {

                $getFinalResultsQuery = "SELECT user_notification.notification_owner FROM user INNER JOIN user_notification ON user_notification.notification_owner != user.user_id AND notification_resource_id=user_id  WHERE user_notification.notification_resource_id =:userId AND notification_type='follow'";

                $getFinalResultsStmt = $this->connect()->prepare($getFinalResultsQuery);
                $getFinalResultsStmt->bindParam(":userId", $this->relationUser);
                $getFinalResultsStmt->execute();
                $results = $getFinalResultsStmt->fetchAll(PDO::FETCH_ASSOC);
                $getFinalResultsStmt->closeCursor();

                return $results??[];
        }catch (\Exception $exception){
            echo "Failed to get my friends ".$exception->getMessage(). $exception->getTraceAsString();
            return null;
        }
}


    protected function getNumberOfFriendshipsResult(): int {
        return $this->myFriendshipsNumber();
    }

    private function myFriendshipsNumber(): int {
        try {

            $getFriendsQuery = "SELECT COUNT(*) 
                                FROM relationship 
                                WHERE (relation_user_id=:userId 
                                OR relation_initiator_id=:userId) 
                                AND relation_status='1'";

            $getFriendsStmt = $this->connect()->prepare($getFriendsQuery);
            $getFriendsStmt->bindParam(":userId", $this->relationUser);
            $getFriendsStmt->execute();
            $results = $getFriendsStmt->fetchColumn();
            $getFriendsStmt->closeCursor();

            return $results;

        }catch (\Exception $exception){
            echo "Failed to get my friends ".$exception->getMessage();
            return 0;
        }
    }

    protected function numberOfFriendInvitationsResult(): int {
        return $this->numberOfFriendInvitations();
    }

    private function numberOfFriendInvitations(): int {
        try {

            $getFriendsQuery = "SELECT COUNT(*) 
                                FROM relationship 
                                WHERE (relation_user_id=:userId 
                                OR relation_initiator_id=:userId) 
                                AND relation_status='0'";

            $getFriendsStmt = $this->connect()->prepare($getFriendsQuery);
            $getFriendsStmt->bindParam(":userId", $this->relationUser);
            $getFriendsStmt->execute();
            $results = $getFriendsStmt->fetchColumn();
            $getFriendsStmt->closeCursor();

            return $results;

        }catch (\Exception $exception){
            echo "Failed to get my friends ".$exception->getMessage();
            return 0;
        }
    }

    protected function getNumberOfMutualFriendshipsResult(): int {
        return $this->myFriendshipsMutualNumber();
    }

    private function myFriendshipsMutualNumber(): int {
        try {

            $getMutualFriendsQuery = "SELECT COUNT(*) 
                                FROM relationship 
                                WHERE (relation_user_id=:userId 
                                OR relation_initiator_id=:userId) AND (relation_user_id=:friendId OR relation_initiator_id=:friendId)
                                AND relation_status='1'";

            $getMutualFriendsStmt = $this->connect()->prepare($getMutualFriendsQuery);
            $getMutualFriendsStmt->bindParam(":userId", $this->relationUser);
            $getMutualFriendsStmt->bindParam(":friendId", $this->relationFriendId);
            $getMutualFriendsStmt->execute();
            $results = $getMutualFriendsStmt->fetchColumn();
            $getMutualFriendsStmt->closeCursor();

            return $results;

        }catch (\Exception $exception){
            echo "Failed to get my friends ".$exception->getMessage();
            return 0;
        }
    }

    protected function friendshipInvitesNumberResult(): int {
        return $this->friendshipInvitesNumber();
    }

    private function friendshipInvitesNumber(): int {
        try {

            $getFriendsQuery = "SELECT COUNT(*) FROM relationship WHERE relation_user_id=:userId AND relation_status='0'";
            $getFriendsStmt = $this->connect()->prepare($getFriendsQuery);
            $getFriendsStmt->bindParam(":userId", $this->relationUser);
            $getFriendsStmt->execute();
            $results = $getFriendsStmt->fetchColumn();
            $getFriendsStmt->closeCursor();

            return $results;

        }catch (\Exception $exception){
            echo "Failed to get my friends ".$exception->getMessage();
            return 0;
        }
    }



}