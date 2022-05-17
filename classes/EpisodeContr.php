<?php

namespace Classes;

use DateTime;

class EpisodeContr extends Episode
{


    protected function setCEpisodeNoInChapter(int $episodeNoInChapter): void
    {
        $episodeNoInChapter +=1;
        parent::setEpisodeNoInChapter($episodeNoInChapter);
    }

    protected function setCEpisodeId(): void
    {
        $episodeId = Utilities::genUniqueId("eps");
        parent::setEpisodeId($episodeId);
    }

    protected function setCEpisodeDescription(string $episodeDescription): void
    {
        $episodeDescription = Utilities::cleanData($episodeDescription);
        parent::setEpisodeDescription($episodeDescription);
    }

    protected function setCEpisodeDuration(string $episodeDuration): void
    {
        $episodeDuration = Utilities::cleanData($episodeDuration);
        parent::setEpisodeDuration($episodeDuration);
    }

    protected function addCEpisodeId(string $id): void {
        $id = Utilities::cleanData($id);
        parent::setEpisodeId($id);
    }

    protected function setCEpisodeLargeArtCover(string $episodeLargeArtCover): void
    {
        $episodeLargeArtCover = Utilities::cleanData($episodeLargeArtCover);
        parent::setEpisodeLargeArtCover($episodeLargeArtCover);
    }

    protected function setCEpisodeName(string $episodeName): void
    {
        $episodeName = Utilities::cleanData($episodeName);
        parent::setEpisodeName($episodeName);
    }

    protected function setCEpisodeNumberInChapter(int $episodeNumberInSeries): void
    {
        $episodeNumberInSeries = Utilities::cleanData($episodeNumberInSeries);
        parent::setEpisodeNumberInChapter($episodeNumberInSeries);
    }


    protected function setCEpisodeSeriesId(string $episodeSeriesId): void
    {
        $episodeSeriesId = Utilities::cleanData($episodeSeriesId);
        parent::setEpisodeSeriesId($episodeSeriesId);
    }

 protected function setCEpisodeWatcherId(string $episodeWatcherId): void
    {
        $episodeWatcherId = Utilities::cleanData($episodeWatcherId);
        parent::setEpisodeUserId($episodeWatcherId);
    }

    protected function setCEpisodeSmallArtCover(string $episodeSmallArtCover): void
    {
        $episodeSmallArtCover = Utilities::cleanData($episodeSmallArtCover);
        parent::setEpisodeSmallArtCover($episodeSmallArtCover);
    }

    protected function setCEpisodeUrl(string $episodeUrl): void
    {
        $episodeUrl = Utilities::cleanData($episodeUrl);
        parent::setEpisodeShareableUrl($episodeUrl);
        parent::setEpisodeUrl($episodeUrl);
    }

    protected function setCEpisodePremieredDate(DateTime $episodePremieredDate): void
    {
        parent::setEpisodePremieredDate($episodePremieredDate);
    }

    protected function setCEpisodeLecturersImages(string $episodeLecturersImages): void
    {
        $episodeLecturersImages = Utilities::cleanData($episodeLecturersImages);
        parent::setEpisodeLecturersImages($episodeLecturersImages);
    }

    protected function setCEpisodeChapter(string $episodeChapter): void
    {
        parent::setEpisodeChapter($episodeChapter);
    }

}