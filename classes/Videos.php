<?php

namespace Classes;

use Exception;
use PDO;

class Videos extends Dbh
{

    private string $videosId;
    private string $videoName;
    private string $videoUrl;
    private string $videoOwner;

    /**
     * @param string $videoOwner
     */
    protected function setVideoOwner(string $videoOwner): void
    {
        $this->videoOwner = $videoOwner;
    }

    /**
     * @param string $videoUrl
     */
    protected function setVideoUrl(string $videoUrl): void
    {
        $this->videoUrl = $videoUrl;
    }

    /**
     * @param string $videoName
     */
    protected function setVideoName(string $videoName): void
    {
        $this->videoName = $videoName;
    }

    /**
     * @param string $videosId
     */
    protected function setVideosId(string $videosId): void
    {
        $this->videosId = $videosId;
    }

    protected function addVideoStatus():bool {
        return $this->addVideo();
    }

    private function addVideo(): bool {

        try {

            $addVideoQuery = "INSERT INTO video(video_id, video_name, video_url, video_owner) VALUES (:videoId, :videoName, :videoUrl, :videoOwner)";
            $addVideoStmt = $this->connect()->prepare($addVideoQuery);
            $addVideoStmt->bindParam(":videoId", $this->videosId);
            $addVideoStmt->bindParam(":videoName", $this->videoName);
            $addVideoStmt->bindParam(":videoUrl", $this->videoUrl);
            $addVideoStmt->bindParam(":videoOwner", $this->videoOwner);
            $result = $addVideoStmt->execute();
            $addVideoStmt->closeCursor();
            return $result;

        }catch (Exception $exception) {
            echo "Failed to add video ". $exception->getMessage();
            return false;
        }
    }

    protected function getVideosResult():bool {
        return $this->getVideos();
    }

    private function getVideos(): bool {

        try {

            $getVideoQuery = "SELECT * FROM video WHERE video_owner=:videoOwner";
            $getVideoStmt = $this->connect()->prepare($getVideoQuery);
            $getVideoStmt->bindParam(":videoOwner", $this->videoOwner);
            $getVideoStmt->execute();
            $result = $getVideoStmt->fetchAll(PDO::FETCH_ASSOC);
            $getVideoStmt->closeCursor();
            return $result;

        }catch (Exception $exception) {
            echo "Failed to add video ". $exception->getMessage();
            return false;
        }
    }

    protected function getFewVideosResult():array {
        return $this->getFewVideos();
    }

    private function getFewVideos(): array {

        try {

            $getVideoQuery = "SELECT * FROM video WHERE video_owner=:videoOwner LIMIT 3";
            $getVideoStmt = $this->connect()->prepare($getVideoQuery);
            $getVideoStmt->bindParam(":videoOwner", $this->videoOwner);
            $getVideoStmt->execute();
            $result = $getVideoStmt->fetchAll(PDO::FETCH_ASSOC);
            $getVideoStmt->closeCursor();

            return $result??[];

        }catch (Exception $exception) {
            echo "Failed to add video ". $exception->getMessage();
            return [];
        }
    }

}