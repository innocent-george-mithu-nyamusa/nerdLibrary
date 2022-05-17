<?php

namespace Classes;

class UserPostContr extends UserPost
{

    protected function setCPostId(): void
    {
        $postId = Utilities::genUniqueId("pos");
        parent::setPostId($postId);
    }

    protected function addPostId(string $postId):void {
        $postId = Utilities::cleanData($postId);
        parent::setPostId($postId);
    }
    protected function setCPostTagsFriends(string $postTagsFriends): void
    {
        $postTagsFriends = Utilities::cleanData($postTagsFriends);
        parent::setPostTagsFriends($postTagsFriends);
    }

    protected function setCPostActivityId(string $postActivityId): void
    {
        $postActivityId = Utilities::cleanData($postActivityId);
        parent::setPostActivityId($postActivityId);
    }

    protected function setCPostGif(string $postGif): void
    {
        $postGif =Utilities::cleanData($postGif);
        parent::setPostGif($postGif);
    }

    protected function setCPostType(string $postType): void
    {
        $postType = Utilities::cleanData($postType);
        parent::setPostType($postType);
    }

    protected function setCPostLocation(string $postLocation): void
    {
        $postLocation = Utilities::cleanData($postLocation);
        parent::setPostLocation($postLocation);
    }

    protected function setCPostMood(string $postMood): void
    {
        $postMood = Utilities::cleanData($postMood);
        parent::setPostMood($postMood);
    }

    protected function setCPostName(string $postName): void
    {
        $postName = Utilities::cleanData($postName);
        parent::setPostName($postName);
    }

    protected function setCPostStoryId(string $postStoryId): void
    {
        $postStoryId = Utilities::cleanData($postStoryId);
        parent::setPostStoryId($postStoryId);
    }


    protected function setCPostImages(string $postImages): void
    {
        $postImages = Utilities::cleanData($postImages);
        parent::setPostImages($postImages);
    }

    protected function setCPostLink(string $postLink): void
    {
        $postLink = Utilities::cleanData($postLink);
        parent::setPostLink($postLink);
    }

    protected function setCPostOwnerId(string $postOwnerId): void
    {
        $postOwnerId = Utilities::cleanData($postOwnerId);
        parent::setPostOwnerId($postOwnerId);
    }

    protected function setCPostText(string $postText): void
    {
        $postText = Utilities::cleanData($postText);
        parent::setPostText($postText);
    }
}