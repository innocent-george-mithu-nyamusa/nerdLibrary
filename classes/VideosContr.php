<?php

namespace Classes;

class VideosContr extends Videos
{

    protected function setCVideoName(string $videoName): void
    {
      $videoName = Utilities::cleanData($videoName);
        parent::setVideoName($videoName);
    }


    protected function setCVideosId(): void
    {
        $videosId = Utilities::genUniqueId("vid");
        parent::setVideosId($videosId);
    }

    protected function setCVideoOwner(string $videoOwner): void
    {
        $videoOwner = Utilities::cleanData($videoOwner);
        parent::setVideoOwner($videoOwner);
    }

    protected function setCVideoUrl(string $videoFile): void
    {
//        $videoUrl = "https://nerdlife.co.zw/resources/feed-videos/" .$videoFile;
        $videoUrl = "http://localhost/resources/feed-videos/" .$videoFile;
        parent::setVideoUrl($videoUrl);
    }


}