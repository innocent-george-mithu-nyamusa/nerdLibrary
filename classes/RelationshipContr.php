<?php

namespace Classes;

class RelationshipContr extends Relationship
{
    /**
     * method a new id for each new relationship
     */
    protected function setCRelationId(): void
    {
        $relationId = Utilities::genUniqueId("rel");
        parent::setRelationId($relationId);
    }

    /**
     * @param string $relationInitiator
     */
    protected function setCRelationInitiator(string $relationInitiator): void
    {
        $relationInitiator = Utilities::cleanData($relationInitiator);
        parent::setRelationInitiator($relationInitiator);
    }

    /**
     * @param string $relationUser
     */
    protected function setCRelationUser(string $relationUser): void
    {
        $relationUser =Utilities::cleanData($relationUser);
        parent::setRelationUser($relationUser);
    }
    protected function setCRelationFriendId(string $relationUser): void
    {
        $relationUser =Utilities::cleanData($relationUser);
        parent::setRelationFriendId($relationUser);
    }

    /**
     * used to clean and set the relation Type
     * @param string $relationType
     */
    protected function setCRelationType(string $relationType): void
    {
        $relationType = Utilities::cleanData($relationType);
        parent::setRelationType($relationType);
    }
}