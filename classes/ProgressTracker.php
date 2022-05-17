<?php

namespace Classes;

use PDO;

class ProgressTracker extends Dbh
{

    private string $progressId;
    private string $progressItemId;
    private string $progressUserId;
    private string $progressCheckDate;
    private int $progressLevel;
    private string $progressStatus;

    /**
     * @param string $progressUserId
     */
    protected function setProgressUserId(string $progressUserId): void
    {
        $this->progressUserId = $progressUserId;
    }

    /**
     * @param string $progressId
     */
    protected function setProgressId(string $progressId): void
    {
        $this->progressId = $progressId;
    }

    /**
     * @param string $progressStatus
     */
    protected function setProgressStatus(string $progressStatus): void
    {
        $this->progressStatus = $progressStatus;
    }

    /**
     * @param int $progressLevel
     */
    protected function setProgressLevel(int $progressLevel): void
    {
        $this->progressLevel = $progressLevel;
    }

    /**
     * @param string $progressCheckDate
     */
    protected function setProgressCheckDate(string $progressCheckDate): void
    {
        $this->progressCheckDate = $progressCheckDate;
    }

    /**
     * @param string $progressItemId
     */
    protected function setProgressItemId(string $progressItemId): void
    {
        $this->progressItemId = $progressItemId;
    }

    private function initiateProgressCheck(): bool {

        try {
            $createProgressCheckQuery = "INSERT INTO progress (progress_id, progress_item_id, progress_user_id, progress_check_datetime, progress_level) VALUES (:progressId, :progressItemId, :progressUserId, 'now', '0.0')";
            $createProgressCheckStmt = $this->connect()->prepare($createProgressCheckQuery);
            $createProgressCheckStmt->bindParam(":progressId", $this->progressId);
            $createProgressCheckStmt->bindParam(":progressItemId", $this->progressItemId);
            $createProgressCheckStmt->bindParam(":progressUserId", $this->progressUserId);
            $result = $createProgressCheckStmt->execute();
            $createProgressCheckStmt->closeCursor();

            return $result;
        }catch (\Exception $exception) {
            echo "Failed to add progress check ". $exception->getMessage();
            return false;
        }
    }

    private function updateProgressLevel() :bool {
        try {

            $updateLevelQuery = "UPDATE progress SET progress_level=:progressLevel WHERE progress_item_id=:progressItemId AND progress_user_id=:progressUserId";
            $updateLevelStmt = $this->connect()->prepare($updateLevelQuery);
            $updateLevelStmt->bindParam(":progressItemId", $this->progressItemId);
            $updateLevelStmt->bindParam(":progressUserId", $this->progressUserId);
            $updateLevelStmt->bindParam(":progressLevel", $this->progressLevel);
            $result = $updateLevelStmt->execute();
            $updateLevelStmt->closeCursor();
            return $result;

        }catch (\Exception $exception) {

            echo "Failed to update ". $exception->getMessage();
            return false;
        }
    }

    private function getIncompleteEpisodesProgress(): ?array {

        try {
            $getIncompleteEpisodesProgressQuery = "SELECT * FROM progress WHERE progress_user_id=:progressUserId AND progress_level < '100'";
            $getIncompleteEpisodesProgressStmt = $this->connect()->prepare($getIncompleteEpisodesProgressQuery);
            $getIncompleteEpisodesProgressStmt->bindParam(":progressUserId", $this->progressUserId);
            $getIncompleteEpisodesProgressStmt->bindParam(":progressItemId", $this->progressItemId);
            $getIncompleteEpisodesProgressStmt->execute();
            $result = $getIncompleteEpisodesProgressStmt->fetchAll(PDO::FETCH_ASSOC);
            $getIncompleteEpisodesProgressStmt->closeCursor();

            return $result;

        }catch (\Exception $exception) {

            echo "Failed to get incomplete episodes ". $exception->getMessage();
            return null;
        }
    }

    protected function getNumberOfIncompleteEpisodesProgressResult(): int {
        return $this->getNumberOfIncompleteEpisodes();
    }

    private function getNumberOfIncompleteEpisodes(): int {
        try {

            $getIncompleteNumberOfEpisodesProgressQuery = "SELECT COUNT(progress_id) FROM progress WHERE progress_level < '100' AND progress_user_id=:progressUserId";
            $getIncompleteEpisodesNumberProgressStmt = $this->connect()->prepare($getIncompleteNumberOfEpisodesProgressQuery);
            $getIncompleteEpisodesNumberProgressStmt->bindParam(":progressUserId", $this->progressUserId);
            $getIncompleteEpisodesNumberProgressStmt->execute();
            $result = $getIncompleteEpisodesNumberProgressStmt->fetchColumn();
            $getIncompleteEpisodesNumberProgressStmt->closeCursor();
            return $result;

        }catch (\Exception $exception) {

            echo "Failed to get incomplete episodes ". $exception->getMessage();
            return 0;
        }
    }


    protected function completeInitiateEpisodeStatus(): bool {
        $this->completeEpisode();
    }

    private function completeEpisode(): bool {

        try {

            $completeQuery = "INSERT INTO progress(progress_id, progress_item_id, progress_user_id, progress_check_datetime, progress_level) VALUE (:progressId, :progressItemId, :progressUserId, :progressCheckDateTime, '0.0')";
            $completeStmt = $this->connect()->prepare($completeQuery);
            $completeStmt->bindParam(":progressId", $this->progressId);
            $completeStmt->bindParam(":progressItemId", $this->progressItemId);
            $completeStmt->bindParam(":progressUserId", $this->progressUserId);
            $completeStmt->bindParam(":progressDateTime", $this->progressCheckDate);
            $result = $completeStmt->execute();
            return $result;

        }catch (\Exception $exception) {
            echo "Failed to mark episode as complete ". $exception->getMessage();
            return false;
        }
    }

    protected function completedEpisodeStatus(): bool {
        return $this->completedEpisodeUpdate();
    }


    private function completedEpisodeUpdate():bool {
        try {

            $completedEpisodeUpdateQuery = "UPDATE progress SET progress_level='100' WHERE progress_item_id=:progressItemId AND progress_user_id=:progressUserId";
            $completedEpisodeUpdateStmt = $this->connect()->prepare($completedEpisodeUpdateQuery);
            $completedEpisodeUpdateStmt->bindParam(":progressItemId", $this->progressItemId);
            $completedEpisodeUpdateStmt->bindParam(":progressUserId", $this->progressUserId);
            $result = $completedEpisodeUpdateStmt->execute();
            $completedEpisodeUpdateStmt->closeCursor();

            return $result;
        }catch (\Exception $exception){
            echo "Failed to mark completed episode ". $exception->getMessage();
            return false;
        }

    }

    protected function updateWatchProgressStatus():bool {
        return $this->updateWatchProgress();
    }

    private function updateWatchProgress():bool {

        try {
            $updateProgressQuery = "UPDATE progress SET progress_level=:progressLevel WHERE progress_item_id=:progressItemId AND progress_user_id=:progressUserId";
            $updateProgressStmt = $this->connect()->prepare($updateProgressQuery);
            $updateProgressStmt->bindParam(":progressLevel", $this->progressLevel);
            $updateProgressStmt->bindParam(":progressItemId", $this->progressItemId);
            $updateProgressStmt->bindParam(":progressUserId", $this->progressUserId);
            $result = $updateProgressStmt->execute();
            $updateProgressStmt->closeCursor();

            return $result;

        }catch (\Exception $exception) {
            echo "Failed to update episode progress ". $exception->getMessage();
            return false;
        }
    }

    protected function haveWatchedEpisodeStatus(): bool {
        return $this->haveWatchedEpisode();
    }

    private function haveWatchedEpisode():bool {
        try {

            //Check if the user has already watched a video.
            $userWatchedEpisodeQuery = "SELECT COUNT(progress_user_id) FROM progress WHERE progress_user_id=:progressUserId AND progress_item_id=:progressItemId";
            $userWatchedEpisodeStmt = $this->connect()->prepare($userWatchedEpisodeQuery);
            $userWatchedEpisodeStmt->bindParam(":progressItemId", $this->progressItemId);
            $userWatchedEpisodeStmt->bindParam(":progressUserId", $this->progressUserId);
            $userWatchedEpisodeStmt->execute();
            $result = $userWatchedEpisodeStmt->fetchColumn();
            $userWatchedEpisodeStmt->closeCursor();

            if( $result > 0 ){
                return $result;
            }

            return false;
        }catch (\Exception $exception) {

            echo "Failed to check if user watched video ". $exception->getMessage();
            return false;
        }
    }
}