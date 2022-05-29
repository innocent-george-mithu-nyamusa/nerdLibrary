<?php

namespace Classes;

use DateTime;
use Exception;
use PDO;

class UserPost extends Post
{

    private string $postId;
    private string $postOwnerId;
    private string $postImages;
    private string $postText;
    private string $postName;
    private string $postTagsFriends;
    private string $postLocation;
    private string $postMood;
    private string $postGif;
    private string $postStoryId;
    private string $postActivityId;
    private string $postLink;
    private string $postType;

    /**
     * @param string $postType
     */
    protected function setPostType(string $postType): void
    {
        $this->postType = $postType;
    }

    /**
     * @param string $postLink
     */
    protected function setPostLink(string $postLink): void
    {
        $this->postLink = $postLink;
    }

    /**
     * @return string
     */
    protected function getPostId(): string
    {
        return $this->postId;
    }

    /**
     * @param string $postName
     */
    protected function setPostName(string $postName): void
    {
        $this->postName = $postName;
    }

    /**
     * @param string $postActivityId
     */
    protected function setPostActivityId(string $postActivityId): void
    {
        $this->postActivityId = $postActivityId;
    }

    /**
     * @param string $postStoryId
     */
    protected function setPostStoryId(string $postStoryId): void
    {
        $this->postStoryId = $postStoryId;
    }

    /**
     * @param string $postGif
     */
    protected function setPostGif(string $postGif): void
    {
        $this->postGif = $postGif;
    }

    /**
     * @param string $postMood
     */
    protected function setPostMood(string $postMood): void
    {
        $this->postMood = $postMood;
    }

    /**
     * @param string $postLocation
     */
    protected  function setPostLocation(string $postLocation): void
    {
        $this->postLocation = $postLocation;
    }

    /**
     * @param string $postTagsFriends
     */
    protected function setPostTagsFriends(string $postTagsFriends): void
    {
        $this->postTagsFriends = $postTagsFriends;
    }

    /**
     * @param string $postText
     */
    protected function setPostText(string $postText): void
    {
        $this->postText = $postText;
    }

    /**
     * @param string $postImages
     */
    protected function setPostImages(string $postImages): void
    {
        $this->postImages = $postImages;
    }

    /**
     * @param string $postOwnerId
     */
    protected function setPostOwnerId(string $postOwnerId): void
    {
        $this->postOwnerId = $postOwnerId;
    }

    /**
     * @param string $postId
     */
    protected function setPostId(string $postId): void
    {
        $this->postId = $postId;
    }

    protected function getNumberOfPostsResult(): int {
        return $this->getNumberOfNewPosts();
    }

    private function getNumberOfNewPosts(): int {

//        $currentDate = new DateTime("now");
//        $currentDate = $currentDate->format("Y-m-d h:m:s");
            $currentDate = date("Y-m-d h:m:s");

        try {
            $getNumberOfNewPostsQuery = "SELECT COUNT(*) FROM post WHERE post_datetime > '$currentDate'";
            $getNumberOfNewPostsStmt = $this->connect()->prepare($getNumberOfNewPostsQuery);
            $getNumberOfNewPostsStmt->execute();
            $allPosts = $getNumberOfNewPostsStmt->fetchColumn();
            $getNumberOfNewPostsStmt->closeCursor();

            return $allPosts;
        }catch (Exception $exception) {
            echo "Failed to get posts ". $exception->getMessage();
            return 0;

        }
    }


    protected function getNewPostsResult(): ?array {
        return $this->getNewPosts();
    }


    private function getNewPosts(): ?array {
        $currentDate = new DateTime("now");
        $currentDate = $currentDate->format("Y-m-d h:m:s");

        try {
            $getNewPostsQuery = "SELECT * FROM post WHERE post_datetime > $currentDate";
            $getNumberOfNewPostsStmt = $this->connect()->prepare($getNewPostsQuery);
            $getNumberOfNewPostsStmt->execute();
            $allPosts = $getNumberOfNewPostsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getNumberOfNewPostsStmt->closeCursor();
            return $allPosts;
        }catch (Exception $exception) {
            echo "Failed to get posts ". $exception->getMessage();
            return null;

        }
    }

    protected function getMyFeedPostsResult(): ?array {
        return $this->getMyFeedPosts();
    }

    private function getMyFeedPosts(): ?array {
        $currentDate = new DateTime("now");
        $currentDate = $currentDate->format("Y-m-d h:m:s");

        try {
            $getNewPostsQuery = "SELECT DISTINCT post.post_id, 
                                        post.post_owner_id, 
                                        post.post_images, 
                                        post.post_text,
                                        post.post_datetime,
                                        post.post_tags,
                                        post.post_location,
                                        post.post_mood,
                                        post.post_shared_link,
                                        post.post_type    
                                FROM post 
                                LEFT JOIN relationship 
                                ON (relationship.relation_initiator_id = post.post_owner_id 
                                OR relationship.relation_user_id = post.post_owner_id)
                                WHERE relationship.relation_initiator_id=:postOwnerId OR relationship.relation_user_id=:postOwnerId ORDER BY post_datetime DESC";

            $getNumberOfNewPostsStmt = $this->connect()->prepare($getNewPostsQuery);
            $getNumberOfNewPostsStmt->bindParam(":postOwnerId", $this->postOwnerId);
            $getNumberOfNewPostsStmt->execute();
            $allPosts = $getNumberOfNewPostsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getNumberOfNewPostsStmt->closeCursor();

            return $allPosts;
        }catch (Exception $exception) {
            echo "Failed to get posts ". $exception->getMessage();
            return null;

        }
    }



    protected function createPostResult(): bool
    {
       return $this->createPost();
    }

    private function createPost(): bool
    {
        $createPostsQuery = "INSERT INTO post(
                 post_id, 
                 post_owner_id, 
                 post_images, 
                 post_text, 
                 post_name, 
                 post_tags, 
                 post_location, 
                 post_mood,
                 post_shared_link,
                 post_type,
                 post_story_id, 
                 post_activity_id
                 ) VALUES (
                          :postId,
                          :postOwnerId,
                          :postImages,
                          :postText,
                          :postName,
                          :postTagsId,
                          :postLocation,
                          :postMood,
                           :postSharedLink,
                           :postType,
                          :postStoryId,
                          :postActivityId
                 )";

        $createPostStmt = $this->connect()->prepare($createPostsQuery);
        $createPostStmt->bindParam(":postId", $this->postId);
        $createPostStmt->bindParam(":postOwnerId", $this->postOwnerId);
        $createPostStmt->bindParam(":postImages", $this->postImages);
        $createPostStmt->bindParam(":postText", $this->postText);
        $createPostStmt->bindParam(":postName", $this->postName);
        $createPostStmt->bindParam(":postTagsId", $this->postTagsFriends);
        $createPostStmt->bindParam(":postLocation", $this->postLocation);
        $createPostStmt->bindParam(":postMood", $this->postMood);
        $createPostStmt->bindParam(":postSharedLink", $this->postLink);
        $createPostStmt->bindParam(":postType", $this->postType);
        $createPostStmt->bindParam(":postStoryId", $this->postStoryId);
        $createPostStmt->bindParam(":postActivityId", $this->postActivityId);

        $result = $createPostStmt->execute();
        $createPostStmt->closeCursor();

        return $result;
    }

    /**
     * @return bool
     */
    protected function updatePostResult(): bool
    {
        // TODO: Implement updatePost() method.
    }

    /**
     * @return bool
     */
    protected function deletePostResult(): bool
    {
        // TODO: Implement deletePost() method.
    }

    /**
     * @return array|null
     */
    protected function getPostsResult(): ?array
    {
        return $this->getMyPosts();
    }


    private function getMyPosts(): ?array {

        try {
            $getPostsQuery = "SELECT *   
                                 FROM post 
                                 WHERE post_owner_id=:postOwnerId ORDER BY post_datetime DESC";
            $getPostsStmt = $this->connect()->prepare($getPostsQuery);
            $getPostsStmt->bindParam(":postOwnerId", $this->postOwnerId);
            $getPostsStmt->execute();
            $allPosts = $getPostsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getPostsStmt->closeCursor();

            return $allPosts ?? [];
        }catch (Exception $exception) {
            echo "Failed to get posts ". $exception->getMessage();
            return null;
        }
    }

    /**
     * @return array|null
     */
    protected function getPostResult(): ?array
    {
        return $this->getPost();
    }

    private function getPost(): ?array {
        try{
            $getPostQuery = "SELECT * FROM post WHERE post_id=:postId";
            $getPostStmt = $this->connect()->prepare($getPostQuery);
            $getPostStmt->bindParam(":postId", $this->postId);
            $getPostStmt->execute();
            $result = $getPostStmt->fetch();
            $getPostStmt->closeCursor();

            return $result;
        }catch (Exception $exception) {
            echo "Failed to get post";
            return null;
        }
    }
}