<?php

namespace Classes;

use DateTime;

class EpisodeView extends EpisodeContr
{

    public function createEpisode(
                    String $episodeSeriesId,
                    String $episodeNumberInChapter,
                    String $episodeName,
                    string $episodeChapter,
                    DateTime $episodePremieredDate,
                    String $episodeDuration,
                    String $episodeSmallArtCover,
                    String $episodeLargeArtCover,
                    String $episodeDescription,
                    String $episodeLecturersImages,
                    String $episodeUrl
    ): bool
    {

        $this->setCEpisodeId();
        $this->setCEpisodePremieredDate($episodePremieredDate);
        $this->setCEpisodeLecturersImages($episodeLecturersImages);
        $this->setCEpisodeSeriesId($episodeSeriesId);
        $this->setCEpisodeChapter($episodeChapter);
        $this->setCEpisodeUrl($episodeUrl);
        $this->setCEpisodeNumberInChapter($episodeNumberInChapter);
        $this->setCEpisodeSmallArtCover($episodeSmallArtCover);
        $this->setCEpisodeName($episodeName);
        $this->setCEpisodeLargeArtCover($episodeLargeArtCover);
        $this->setCEpisodeDuration($episodeDuration);
        $this->setCEpisodeDescription($episodeDescription);

        return parent::createEpisodeResult();
    }


    public function allSeriesEpisodes($seriesId): ?array{

        $this->setCEpisodeSeriesId($seriesId);
        return $this->getAllSeriesEpisodesResult();
    }

    public function allViewedSeriesEpisodes(string $seriesId, string $episodeWatcher): ?array{

        $this->setCEpisodeWatcherId($episodeWatcher);
        $this->setCEpisodeSeriesId($seriesId);
        return $this->getAllViewedSeriesEpisodesResult();
    }

    public function allViewedEpisodes(string $episodeWatcher): ?array{

        $this->setCEpisodeWatcherId($episodeWatcher);
        return $this->getAllViewedEpisodesResult();
    }

    public function allCompletedSeriesEpisodes(string $seriesId, string $episodeWatcher): ?array{

        $this->setCEpisodeWatcherId($episodeWatcher);
        $this->setCEpisodeSeriesId($seriesId);
        return $this->getAllCompletedSeriesEpisodesResult();
    }

    public function allInCompletedSeriesEpisodes(string $seriesId, string $episodeWatcher): ?array{

        $this->setCEpisodeWatcherId($episodeWatcher);
        $this->setCEpisodeSeriesId($seriesId);
        return $this->getAllInCompletedSeriesEpisodesResult();
    }

 public function allLikedSeriesEpisodes(string $seriesId, string $episodeWatcher): ?array{

        $this->setCEpisodeWatcherId($episodeWatcher);
        $this->setCEpisodeSeriesId($seriesId);

        return $this->getAllLikedSeriesEpisodesResult();
    }

    public function allChapterEpisodes($chapterId): ?array{
        $this->setCEpisodeChapter($chapterId);
        return $this->getAllChapterEpisodesResult();
    }

    public function allOtherChapterEpisodes(string $chapterId,string  $excludeEpisode1,string  $excludeEpisode2): ?array{

        $this->setExcludeEpisode1($excludeEpisode1);
        $this->setExcludeEpisode2($excludeEpisode2);
        $this->setCEpisodeChapter($chapterId);
        return $this->getOtherChapterEpisodesResult();

    }

    public function fewChapterEpisodes($chapterId): ?array{
        $this->setCEpisodeChapter($chapterId);
        return $this->getFewChapterEpisodesResult();
    }

    public function getEpisode(string $episodeId): ?array {
        $this->addCEpisodeId($episodeId);
        return $this->getEpisodeResult();
    }

    public function getMaxEpisodeNumberInChapter(string $episodeChapter): int {

        $this->setCEpisodeChapter($episodeChapter);
        return $this->getLastEpisodeNumberInChapterResult();
    }

    public function getAllEpisodes(): ?array {

        return $this->getAllEpisodesResult();
    }

    public function getNumberOfEpisodesInSeries(string $seriesId): int|null
    {
        $this->setCEpisodeSeriesId($seriesId);
        return parent::getNumberOfEpisodesResult();
    }

    public function getNextEpisode(string $chapterId, string $episodeNo){

        $this->setCEpisodeNoInChapter($episodeNo);
        $this->setCEpisodeChapter($chapterId);

        return $this->getNextEpisodeResult();
    }

}