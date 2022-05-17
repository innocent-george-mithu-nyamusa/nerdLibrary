<?php


namespace Classes;


class ResourceContr extends Resource
{

    protected function setCFavorite(bool $favorite): void
    {
        $favorite = Utilities::cleanData($favorite);
        parent::setFavorite($favorite);
    }
    protected function setCItemId(string $itemId): void
    {
        $itemId = Utilities::cleanData($itemId);
        parent::setItemId($itemId);
    }

    protected function setCLike(bool $like): void
    {
        $like = Utilities::cleanData($like);
        parent::setLike($like);
    }
    protected function addCResourceId(string $resourceId): void
    {
        $resourceId = Utilities::cleanData($resourceId);
        parent::setResourceId($resourceId);
    }

    protected function setCResourceId(): void
    {
        $resourceId = Utilities::genUniqueId("res");
        parent::setResourceId($resourceId);
    }

    protected function setCUserId(string $userId): void
    {
        $userId = Utilities::cleanData($userId);
        parent::setUserId($userId);
    }

}