<?php

namespace Classes;

class ChapterView extends ChapterContr
{
    public function createChapter(string $chapterName, string $chapterSeriesId, string $chapterNumberInSeries, ): bool {

        $this->setCChapterId();
        $this->setCChapterNumber($chapterNumberInSeries);
        $this->setCChapterSeries($chapterSeriesId);
        $this->setCChapterName($chapterName);
        return $this->createChapterStatus();
    }

    public function getChaptersInSeries(string $seriesId) :array|null
    {
        $this->setCChapterSeries($seriesId);
        return parent::getChaptersInSeriesResult();
    }

    public function getChapter(string $chapterId) : array|null {
        $this->addChapterId($chapterId);
        return $this->getChapterResult();

    }
    
     public function getLastChapterNumberInSeries(string $seriesId) :int
    {
        $this->setCChapterSeries($seriesId);
        return parent::getLastChapterNumberInSeriesResult();
    }

    public function getAllChapters(): array|null
    {
        return parent::getAllChaptersResult();
    }

}