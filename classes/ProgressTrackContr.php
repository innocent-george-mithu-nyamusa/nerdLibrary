<?php

namespace Classes;

class ProgressTrackContr extends ProgressTracker
{
    protected function addProgressId(string $progressId): void
    {
        parent::setProgressId($progressId);
    }

    protected function setCProgressCheckDate(): void
    {
        $progressCheckDate= date('now');
        parent::setProgressCheckDate($progressCheckDate);
    }

    protected function setCProgressId(): void
    {
        $progressId = Utilities::genUniqueId("ptr");
        parent::setProgressId($progressId);
    }

    protected function setCProgressItemId(string $progressItemId): void
    {
        $progressItemId = Utilities::cleanData($progressItemId);
        parent::setProgressItemId($progressItemId);
    }

    protected function setCProgressLevel(int $progressLevel): void
    {
        $progressLevel = Utilities::cleanData($progressLevel);
        parent::setProgressLevel($progressLevel);
    }

    protected function setCProgressStatus(string $progressStatus): void
    {
        $progressStatus = Utilities::cleanData($progressStatus);
        parent::setProgressStatus($progressStatus);
    }

    protected function setCProgressUserId(string $progressUserId): void
    {
        $progressUserId = Utilities::cleanData($progressUserId);
        $this->setProgressUserId($progressUserId);
    }
}