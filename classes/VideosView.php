<?php

namespace Classes;

class VideosView extends VideosContr
{

    public function addVideo(string $videoName, string $videoOwner): bool {
        $this->setCVideosId();
        $this->setCVideoOwner($videoOwner);
        $this->setCVideoName($videoName);
        $this->setCVideoUrl($videoName);

        return $this->addVideoStatus();
    }

    public function getFewVideos(string $videoOwner): array
    {
        $this->setCVideoOwner($videoOwner);
        return parent::getFewVideosResult();
    }


    public function getVideos(string $videoOwner): array
    {
        $this->setCVideoOwner($videoOwner);
        return parent::getVideosResult();
    }



}