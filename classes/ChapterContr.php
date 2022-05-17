<?php

namespace Classes;

class ChapterContr extends Chapter
{

    protected function setCChapterId(): void
    {
        $chapterId = Utilities::genUniqueId('chp');
        parent::setChapterId($chapterId);
    }

    protected function addChapterId(string $chapterId): void {
        $chapterId= Utilities::cleanData($chapterId);
        parent::setChapterId($chapterId);
    }

    protected function setCChapterNumber(string $chapterNumber): void
    {
        $chapterNumber = Utilities::cleanData($chapterNumber);
        parent::setChapterNumber($chapterNumber);
    }

    protected function setCChapterSeries(string $chapterSeries): void
    {
        $chapterSeries = Utilities::cleanData($chapterSeries);
        parent::setChapterSeries($chapterSeries);
    }

    protected function setCChapterName(string $chapterName): void
    {
        $chapterName = Utilities::cleanData($chapterName);
        parent::setChapterName($chapterName);
    }

}