<?php

namespace Classes;

class PostStoryView extends PostStoryContr
{

    public function createStory(
        string $storyMedia,
        string $storyOwner,
        string $storyMediaType = "photo"
    ): bool
    {

        $this->setCStoryId();
        $this->setCStoryExpiration();
        $this->setCStoryMedia($storyMedia);
        $this->setCStoryMediaType($storyMediaType);
        $this->setCStoryOwnerId($storyOwner);

        return $this->createPostResult();
    }

    public function getItemId(): string{

        return $this->getStoryId();
    }

    public function getUserFeedStories(string $userId): array {
        $this->setCStoryOwnerId($userId);
        return $this->getPostsResult();
    }


}