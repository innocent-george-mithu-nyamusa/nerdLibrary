<?php

namespace Classes;

use PDO;

class Chapter extends Dbh
{

    private string $chapterId;
    private string $chapterName;
    private string $chapterNumber;
    private string $chapterSeries;


    /**
     * @param string $chapterName
     */
    protected function setChapterName(string $chapterName): void
    {
        $this->chapterName = $chapterName;
    }

    /**
     * @param string $chapterSeries
     */
    protected function setChapterSeries(string $chapterSeries): void
    {
        $this->chapterSeries = $chapterSeries;
    }

    /**
     * @param string $chapterNumber
     */
    protected function setChapterNumber(string $chapterNumber): void
    {
        $this->chapterNumber = $chapterNumber;
    }

    /**
     * @param string $chapterId
     */
    protected function setChapterId(string $chapterId): void
    {
        $this->chapterId = $chapterId;
    }

    protected function createChapterStatus() :bool {

        return $this->createChapter();
    }

    private function createChapter(): bool {
        try {
               $createChapterQuery = "INSERT INTO chapter (chapter_id, chapter_name, chapter_series, chapter_number) VALUES (:chapterId,:chapterName, :chapterSeries,:chapterNumber)";
               $createChapterStmt = $this->connect()->prepare($createChapterQuery);
               $createChapterStmt->bindParam(":chapterId", $this->chapterId);
               $createChapterStmt->bindParam(":chapterName", $this->chapterName);
               $createChapterStmt->bindParam(":chapterSeries", $this->chapterSeries);
               $createChapterStmt->bindParam(":chapterNumber", $this->chapterNumber);
               $result = $createChapterStmt->execute();
               $createChapterStmt->closeCursor();
               return $result;

        }catch (\Exception $exception){
            echo "Failed to create chapter ". $exception->getMessage();
            return false;
        }
    }

    protected function getChaptersInSeriesResult(): array|null {
        return $this->getChaptersInSeries();
    }

    private function getChaptersInSeries(): array| null {

        try {
            $allSeriesChaptersQuery = "SELECT * FROM chapter WHERE chapter_series=:chapterSeriesId ORDER BY chapter_number";
            $allSeriesChaptersStmt = $this->connect()->prepare($allSeriesChaptersQuery);
            $allSeriesChaptersStmt->bindParam(":chapterSeriesId", $this->chapterSeries);
            $allSeriesChaptersStmt->execute();
            $chapters =  $allSeriesChaptersStmt->fetchAll(PDO::FETCH_ASSOC);
            $allSeriesChaptersStmt->closeCursor();
            return $chapters;

        }catch (\Exception $exception) {

            echo "Failed to get chapters in series ". $exception->getMessage();
            return null;
        }
    }

    protected function getAllChaptersResult(): array|null {
        return $this->getAllChapters();
    }

    private function getAllChapters(): array|null {
        try {
            $allSeriesChaptersQuery = "SELECT * FROM chapter ORDER BY chapter_number";
            $allSeriesChaptersStmt = $this->connect()->prepare($allSeriesChaptersQuery);
            $allSeriesChaptersStmt->execute();
            $chapters =  $allSeriesChaptersStmt->fetchAll(PDO::FETCH_ASSOC);
            $allSeriesChaptersStmt->closeCursor();
            return $chapters;

        }catch (\Exception $exception) {
            echo "Failed to get chapters in series ". $exception->getMessage();
            return null;
        }
    }

    protected function getChapterResult(): array|null {
        return $this->getChapter();
    }

    private function getChapter(): array|null {
        try {
            $allSeriesChaptersQuery = "SELECT * FROM chapter WHERE chapter_id=:chapterId";
            $allSeriesChaptersStmt = $this->connect()->prepare($allSeriesChaptersQuery);
            $allSeriesChaptersStmt->bindParam(":chapterId", $this->chapterId);
            $allSeriesChaptersStmt->execute();
            $chapters =  $allSeriesChaptersStmt->fetch(PDO::FETCH_ASSOC);
            $allSeriesChaptersStmt->closeCursor();
            return $chapters;

        }catch (\Exception $exception) {
            echo "Failed to get chapter". $exception->getMessage();
            return null;
        }
    }
    
    
    protected function getLastChapterNumberInSeriesResult(): int {
        return $this->getLastChapterNumberInSeries();
    }

    private function getLastChapterNumberInSeries(): int {

        try {
            $allSeriesChaptersQuery = "SELECT MAX(chapter_number) FROM chapter WHERE chapter_series=:chapterSeriesId";
            $allSeriesChaptersStmt = $this->connect()->prepare($allSeriesChaptersQuery);
            $allSeriesChaptersStmt->bindParam(":chapterSeriesId", $this->chapterSeries);
            $allSeriesChaptersStmt->execute();
            $result =  $allSeriesChaptersStmt->fetchColumn();
            $allSeriesChaptersStmt->closeCursor();

            return $result??0;

        }catch (\Exception $exception) {

            echo "Failed to get last chapter number in series ". $exception->getMessage();
            return 0;
        }
    }


}