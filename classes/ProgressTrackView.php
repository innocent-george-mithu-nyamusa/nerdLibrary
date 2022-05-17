<?php

namespace Classes;

class ProgressTrackView extends ProgressTrackContr
{

    public function numberOfSuggestedIncompleteEpisodes(string $userId): string
    {
        $this->setCProgressUserId($userId);
        return $this->getNumberOfIncompleteEpisodesProgressResult();
    }

    public function completedEpisode(string $progressItemId, string $progressUserId): string {

        $this->setProgressItemId($progressItemId);
        $this->setProgressUserId($progressUserId);


        return $this->completedEpisodeStatus();
    }


    public function startProgressOnEpisode(string $userId, string $itemId): bool
    {
        $this->setCProgressId();
        $this->setProgressUserId($userId);
        $this->setProgressItemId($itemId);
        $this->setCProgressCheckDate();
        return $this->completeInitiateEpisodeStatus();
    }

    public function updateProgressLevel(string $userId, string $itemId, float $progressLevel ): bool
    {


        $this->setProgressUserId($userId);
        $this->setProgressItemId($itemId);
        $this->setCProgressCheckDate();
        $this->setCProgressLevel($progressLevel);

        return $this->updateWatchProgressStatus();
    }

    public function haveWatchedEpisode(string $userId, string $itemId): bool
    {

        $this->setProgressUserId($userId);
        $this->setProgressItemId($itemId);

        return $this->haveWatchedEpisodeStatus();
    }



}