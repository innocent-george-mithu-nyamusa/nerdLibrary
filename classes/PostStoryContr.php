<?php

namespace Classes;

use DateInterval;
use DateTime;

class PostStoryContr extends PostStory
{
    protected function setCStoryExpiration(): void
    {
        $dateExpired = new DateTime("now");
        $dateExpired = $dateExpired->add(new DateInterval('P1D'));

        $storyExpiration = $dateExpired->format("Y-m-d H:i:s");
        parent::setStoryExpiration($storyExpiration);
    }

    protected function setCStoryId(): void
    {
        $storyId = Utilities::genUniqueId("sto");
        parent::setStoryId($storyId);
    }

    protected function setCStoryMedia(string $storyMedia): void
    {
        $storyMedia = Utilities::cleanData($storyMedia);
        parent::setStoryMedia($storyMedia);
    }

    protected function setCStoryText(string $storyText): void
    {
        $storyText = Utilities::cleanData($storyText);
        parent::setStoryText($storyText);
    }
    protected function setCStoryType(string $storyType): void
    {
        $storyType = Utilities::cleanData($storyType);
        parent::setStoryType($storyType);
    }

    protected function setCStoryMediaType(string $storyMediaType): void
    {
        $storyMediaType = Utilities::cleanData($storyMediaType);
        parent::setStoryMediaType($storyMediaType);
    }
    protected function setCStoryOwnerId(string $storyOwnerId): void
    {
        parent::setStoryOwnerId($storyOwnerId);
    }
}