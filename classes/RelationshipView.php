<?php

namespace Classes;

class RelationshipView extends RelationshipContr
{
    /**
     * @param string $initiatorId
     * @param string $relationType
     * @param string $relationUser
     * @param string $relation
     *
     * method creates new relationship between users
     *
     * @return bool
     */
    public function createRelation(string $initiatorId, string $relationType, string $relationUser)
    {

        $this->setCRelationId();
        $this->setCRelationInitiator($initiatorId);
        $this->setCRelationType($relationType);
        $this->setCRelationUser($relationUser);
        return $this->createRelationStatus();
    }

    public function friendsYet(string $initiatorId, string $relationUser): bool
    {
        $this->setCRelationInitiator($initiatorId);
        $this->setCRelationUser($relationUser);
        return $this->friendsYetStatus();
    }

    public function haveRelationshipYet(string $initiatorId, string $relationUser): bool
    {
        $this->setCRelationInitiator($initiatorId);
        $this->setCRelationUser($relationUser);
        return $this->haveRelationshipStatus();
    }

    public function updateFriendship() :bool {
        return $this->updateFriendshipStatus();
    }

    public function myFriendsShips(string $userId): array|null {
        $this->setCRelationUser($userId);
        return $this->getMyFriendshipsResult();
    }

    public function myFriendsBirthdays(string $userId): array {

        $this->setCRelationUser($userId);
        return $this->myFriendshipsBirthdayResult();
    }

    public function suggestedFriendsShips(string $userId): array|null {
        $this->setCRelationUser($userId);
        return $this->suggestedFriendshipsResult();
    }

    public function notificationSuggestionFriendships(string $userId): array|null {
        $this->setCRelationUser($userId);
        return $this->notificationSuggestionFriendshipsResult();
    }

    public function numberOfFriendShips(string $userId): int {
        $this->setCRelationUser($userId);
        return $this->getNumberOfFriendshipsResult();
    }

    public function numberOfFriendInvitations(string $userId): int {
        $this->setCRelationUser($userId);
        return $this->numberOfFriendInvitationsResult();
    }

    public function numberOfMutualFriendShips(string $userId, string $friendId): int {
        $this->setCRelationUser($userId);
        $this->setCRelationFriendId($friendId);
        return $this->getNumberOfMutualFriendshipsResult();
    }

    public function cancelFriendship() :bool {
        return $this->cancelFriendshipStatus();
    }

    public function friendshipInvitesNumber(string $userId): int
    {
        $this->setRelationUser($userId);
        return parent::friendshipInvitesNumberResult();
    }

    public function getRelationIdResult(): string {
        return $this->getRelationId();
    }

}