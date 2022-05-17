<?php

namespace Classes;

class UserPostView extends UserPostContr
{
    public function addPost(
        string $postOwnerId,
        string $postImages,
        string $postText,
        string $postTags,
        string $postLocation,
        string $postMood,
        string $postLink,
        string $postStoryId,
        string $postType,
        string $postActivityId='N/A',
        string $postName = 'N/A',
    ): bool {
        $this->setCPostId();
        $this->setCPostImages($postImages);
        $this->setCPostOwnerId($postOwnerId);
        $this->setCPostText($postText);
        $this->setCPostTagsFriends($postTags);
        $this->setCPostLocation($postLocation);
        $this->setCPostMood($postMood);
        $this->setCPostStoryId($postStoryId);
        $this->setCPostActivityId($postActivityId);
        $this->setCPostName($postName);
        $this->setCPostLink($postLink);
        $this->setCPostType($postType);

        return $this->createPostResult();
    }

    public function getPostId(): string
    {
        return parent::getPostId();
    }




    public function getNewPosts(): ?array
    {
        return parent::getNewPostsResult();
    }

    public function getNumberOfNewPosts(): int
    {
        return parent::getNumberOfPostsResult();
    }

    public function getMyFeedPosts(string $myUserId): ?array
    {
        $this->setCPostOwnerId($myUserId);
        return parent::getMyFeedPostsResult();
    }

    public function getMyPosts(string $myUserId): array
    {
        $this->setCPostOwnerId($myUserId);
        return parent::getPostsResult();
    }

    public function getPost(string $postId): ?array
    {
        $this->addPostId($postId);
        return parent::getPostResult();
    }
}