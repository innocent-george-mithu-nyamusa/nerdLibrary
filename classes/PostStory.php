<?php

namespace Classes;

use DateTime;
use PDO;

class PostStory extends Post
{
    private string $storyId;
    private string $storyExpiration;
    private string $storyMedia;
    private string $storyMediaType;
    private string $storyOwnerId;
    private string $storyText;
    private string $storyType;

    /**
     * @param string $storyType
     */
    protected function setStoryType(string $storyType): void
    {
        $this->storyType = $storyType;
    }

    /**
     * @param string $storyText
     */
    protected function setStoryText(string $storyText): void
    {
        $this->storyText = $storyText;
    }


    /**
     * @param string $storyOwnerId
     */
    protected function setStoryOwnerId(string $storyOwnerId): void
    {
        $this->storyOwnerId = $storyOwnerId;
    }

    /**
     * @param string $storyMediaType
     */
    protected function setStoryMediaType(string $storyMediaType): void
    {
        $this->storyMediaType = $storyMediaType;
    }

    /**
     * @param string $storyMedia
     */
    protected function setStoryMedia(string $storyMedia): void
    {
        $this->storyMedia = $storyMedia;
    }

    /**
     * @param string $storyExpiration
     */
    protected function setStoryExpiration(string $storyExpiration): void
    {
        $this->storyExpiration = $storyExpiration;
    }

    /**
     * @param string $storyId
     */
    protected function setStoryId(string $storyId): void
    {
        $this->storyId = $storyId;
    }

    /**
     * @return string
     */
    protected function getStoryId(): string
    {
        return $this->storyId;
    }


    protected function createPostResult(): bool
    {
       return $this->createStory();
    }

    private function createStory(): bool {
        try {
            $createStoryQuery = "INSERT INTO story (story_id, story_media, story_media_type, story_expiration_datetime, story_owner_id) VALUES (:storyId, :storyMedia,:storyMediaType, :storyExpiration, :storyOwnerId)";
            $createStoryStmt = $this->connect()->prepare($createStoryQuery);
            $createStoryStmt->bindParam(":storyId", $this->storyId);
            $createStoryStmt->bindParam(":storyMedia", $this->storyMedia);
            $createStoryStmt->bindParam(":storyMediaType", $this->storyMediaType);
            $createStoryStmt->bindParam(":storyExpiration", $this->storyExpiration);
            $createStoryStmt->bindParam(":storyOwnerId", $this->storyOwnerId);
            $result = $createStoryStmt->execute();
            $createStoryStmt->closeCursor();
            return $result;

        }catch (\Exception $exception) {
            echo "Failed to create story ". $exception->getMessage();
            return false;

        }
    }



    protected function updatePostResult(): bool
    {
        // TODO: Implement updatePostResult() method.
        return false;
    }

    protected function deletePostResult(): bool
    {
        // TODO: Implement deletePostResult() method.
        return false;
    }

    protected function getPostResult(): ?array
    {
        try {
//            $getStoryQuery = "SELECT * FROM story WHERE story_owner_id =:storyOwnerId";
            $getStoryQuery = "SELECT * FROM story WHERE story_owner_id =:storyOwnerId";

            $getStoryStmt = $this->connect()->prepare($getStoryQuery);
            $getStoryStmt->bindParam(":storyOwnerId", $this->storyOwnerId);
            $getStoryStmt->execute();
            $result = $getStoryStmt->fetchAll(PDO::FETCH_ASSOC);
            $getStoryStmt->closeCursor();

            return $result;

        }catch (\Exception $exception){
            echo "Failed to get story " . $exception->getMessage();
            return null;
        }

    }



    protected function getPostsResult(): array
    {
        return $this->getAllUserStoriesResult();
    }

    protected function getAllUserStoriesResult(): array
    {
        try {

            $dateExpired = new DateTime("now");
            $notificationExpiration = $dateExpired->format("Y-m-d H:i:s");


            $deleteExpiredStoriesQuery = "DELETE FROM story WHERE story_expiration_datetime < '$notificationExpiration'";
            $deleteExpiredStoriesStmt = $this->connect()->prepare($deleteExpiredStoriesQuery);
            $deleteExpiredStoriesStmt->execute();
            $deleteExpiredStoriesStmt->closeCursor();

            $getStoryQuery = "SELECT DISTINCTROW story.story_id, story.story_media, story.story_media_type, story.story_created_datetime, story.story_expiration_datetime, story.story_owner_id  
            FROM story 
            LEFT JOIN relationship ON (relationship.relation_initiator_id=story.story_owner_id 
                OR relationship.relation_user_id=story.story_owner_id
            ) 
            WHERE (relationship.relation_initiator_id=:storyOwnerId OR relationship.relation_user_id=:storyOwnerId) AND story.story_expiration_datetime > '$notificationExpiration'";
            $getStoryStmt = $this->connect()->prepare($getStoryQuery);
            $getStoryStmt->bindParam(":storyOwnerId", $this->storyOwnerId);
            $getStoryStmt->execute();
            $result = $getStoryStmt->fetchAll(PDO::FETCH_ASSOC);
            $getStoryStmt->closeCursor();
            return $result;

        }catch (\Exception $exception){
            echo "Failed to get stories ". $exception->getMessage();
            return [];
        }

    }
}