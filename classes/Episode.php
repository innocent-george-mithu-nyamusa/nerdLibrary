<?php


namespace Classes;

use DateTime;
use Exception;
use PDO;

class Episode extends Dbh
{
    private string $episodeId;
    private string $episodeName;
    private DateTime $episodePremieredDate;
    private string $episodeDuration;
    private int $episodeNumberInChapter;
    private string $episodeSmallArtCover;
    private string $episodeLargeArtCover;
    private string $episodeDescription;
    private string $episodeUrl;
    private string $episodeLecturersImages;
    private string $episodeSeriesId;
    private string $episodeChapter;
    private string $episodeShareableUrl;
    private string $excludeEpisode1;
    private string $excludeEpisode2;
    private int $episodeNoInChapter;
    private string $episodeUserId;

    /**
     * @param string $episodeUserId
     */
    protected function setEpisodeUserId(string $episodeUserId): void
    {
        $this->episodeUserId = $episodeUserId;
    }

    protected function getFewChapterEpisodesResult(): ?array
    {
        return $this->getFewChapterEpisodes();
    }

    private function getFewChapterEpisodes(): ?array
    {
        try {
            $allChapterEpisodesQuery = "SELECT * FROM episode WHERE episode_chapter_id=:episodeChapterId LIMIT 4";
            $allChapterEpisodesStmt = $this->connect()->prepare($allChapterEpisodesQuery);
            $allChapterEpisodesStmt->bindParam(":episodeChapterId", $this->episodeChapter);
            $allChapterEpisodesStmt->execute();
            $results = $allChapterEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allChapterEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all results:\n" . $exception->getMessage();
            return null;
        }

    }

    /**
     * @param int $episodeNoInChapter
     */
    protected function setEpisodeNoInChapter(int $episodeNoInChapter): void
    {
        $this->episodeNoInChapter = $episodeNoInChapter;
    }

    /**
     * @param string $excludeEpisode1
     */
    protected function setExcludeEpisode1(string $excludeEpisode1): void
    {
        $this->excludeEpisode1 = $excludeEpisode1;
    }

    /**
     * @param string $excludeEpisode2
     */
    protected function setExcludeEpisode2(string $excludeEpisode2): void
    {
        $this->excludeEpisode2 = $excludeEpisode2;
    }

    /**
     * @param string $episodeChapter
     */
    protected function setEpisodeChapter(string $episodeChapter): void
    {
        $this->episodeChapter = $episodeChapter;
    }

    /**
     * @param string $episodeShareableUrl
     */
    protected function setEpisodeShareableUrl(string $episodeShareableUrl): void
    {
        $this->episodeShareableUrl = $episodeShareableUrl;
    }

    /**
     * @return array|null
     */
    protected function AllItems(): ?array
    {
        return $this->getAllEpisodeItems();
    }

    protected function getAllSeriesEpisodesResult(): ?array
    {
        return $this->getAllSeriesEpisodes();
    }

    /**
     * @return array|null
     */
    private function getAllSeriesEpisodes(): ?array
    {
        try {

            $allSeriesEpisodesQuery = "SELECT * FROM episode WHERE episode_series_id=:episodeSeriesId";
            $allSeriesEpisodesStmt = $this->connect()->prepare($allSeriesEpisodesQuery);
            $allSeriesEpisodesStmt->bindParam(":episodeSeriesId", $this->episodeSeriesId);
            $allSeriesEpisodesStmt->execute();
            $results = $allSeriesEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allSeriesEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all results:\n" . $exception->getMessage();
            return null;
        }

    }

    protected function getAllViewedSeriesEpisodesResult(): array
    {
        return $this->getAllViewedSeriesEpisodes();
    }

    /**
     * @return array|null
     */
    private function getAllViewedSeriesEpisodes(): array
    {
        try {
            $allSeriesEpisodesQuery = "SELECT * FROM episode INNER JOIN progress ON episode.episode_id = progress.progress_item_id WHERE episode.episode_series_id=:episodeSeriesId AND progress_user_id=:episodeUserId";
            $allSeriesEpisodesStmt = $this->connect()->prepare($allSeriesEpisodesQuery);
            $allSeriesEpisodesStmt->bindParam(":episodeSeriesId", $this->episodeSeriesId);
            $allSeriesEpisodesStmt->bindParam(":episodeUserId", $this->episodeUserId);
            $allSeriesEpisodesStmt->execute();
            $results = $allSeriesEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allSeriesEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all results:\n" . $exception->getMessage();
            return [];
        }

    }

    protected function getAllViewedEpisodesResult(): array
    {
        return $this->getAllViewedEpisodes();
    }

    /**
     * @return array|null
     */
    private function getAllViewedEpisodes(): array
    {
        try {
            $allSeriesEpisodesQuery = "SELECT * FROM episode INNER JOIN progress ON episode.episode_id = progress.progress_item_id WHERE progress_user_id=:episodeUserId";
            $allSeriesEpisodesStmt = $this->connect()->prepare($allSeriesEpisodesQuery);
            $allSeriesEpisodesStmt->bindParam(":episodeUserId", $this->episodeUserId);
            $allSeriesEpisodesStmt->execute();
            $results = $allSeriesEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allSeriesEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all results:\n" . $exception->getMessage();
            return [];
        }

    }

    protected function getAllCompletedSeriesEpisodesResult(): array
    {
        return $this->getAllCompletedSeriesEpisodes();
    }

    /**
     * @return array
     */
    private function getAllCompletedSeriesEpisodes(): array
    {
        try {
            $allSeriesEpisodesQuery = "SELECT * FROM episode INNER JOIN progress ON episode.episode_id = progress.progress_item_id WHERE episode.episode_series_id=:episodeSeriesId AND progress_user_id=:episodeUserId AND progress.progress_level='10.0'";
            $allSeriesEpisodesStmt = $this->connect()->prepare($allSeriesEpisodesQuery);
            $allSeriesEpisodesStmt->bindParam(":episodeSeriesId", $this->episodeSeriesId);
            $allSeriesEpisodesStmt->bindParam(":episodeUserId", $this->episodeUserId);
            $allSeriesEpisodesStmt->execute();
            $results = $allSeriesEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allSeriesEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all results:\n" . $exception->getMessage();
            return [];
        }

    }
    protected function getAllInCompletedSeriesEpisodesResult(): array
    {
        return $this->getAllInCompletedSeriesEpisodes();
    }

    /**
     * @return array
     */
    private function getAllInCompletedSeriesEpisodes(): array
    {
        try {
            $allSeriesEpisodesQuery = "SELECT * FROM episode INNER JOIN progress ON episode.episode_id = progress.progress_item_id WHERE episode.episode_series_id=:episodeSeriesId AND progress_user_id=:episodeUserId AND progress.progress_level<'10.0'";
            $allSeriesEpisodesStmt = $this->connect()->prepare($allSeriesEpisodesQuery);
            $allSeriesEpisodesStmt->bindParam(":episodeSeriesId", $this->episodeSeriesId);
            $allSeriesEpisodesStmt->bindParam(":episodeUserId", $this->episodeUserId);
            $allSeriesEpisodesStmt->execute();
            $results = $allSeriesEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allSeriesEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all results:\n" . $exception->getMessage();
            return [];
        }

    }
    protected function getAllLikedSeriesEpisodesResult(): array
    {
        return $this->getAllLikedSeriesEpisodes();
    }

    /**
     * @return array
     */
    private function getAllLikedSeriesEpisodes(): array
    {
        try {
            $allSeriesEpisodesQuery = "SELECT * FROM episode INNER JOIN resource ON episode.episode_id = resource.resource_item_id WHERE episode.episode_series_id=:episodeSeriesId AND  resource.resource_user_id=:episodeUserId AND  resource.resource_like='1'";
            $allSeriesEpisodesStmt = $this->connect()->prepare($allSeriesEpisodesQuery);
            $allSeriesEpisodesStmt->bindParam(":episodeSeriesId", $this->episodeSeriesId);
            $allSeriesEpisodesStmt->bindParam(":episodeUserId", $this->episodeUserId);
            $allSeriesEpisodesStmt->execute();
            $results = $allSeriesEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allSeriesEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all results:\n" . $exception->getMessage();
            return [];
        }

    }

    protected function getAllChapterEpisodesResult(): ?array
    {
        return $this->getAllChapterEpisodes();
    }

    private function getAllChapterEpisodes(): ?array
    {
        try {
            $allChapterEpisodesQuery = "SELECT * FROM episode WHERE episode_chapter_id=:episodeChapterId ORDER BY episode_chapter_id";
            $allChapterEpisodesStmt = $this->connect()->prepare($allChapterEpisodesQuery);
            $allChapterEpisodesStmt->bindParam(":episodeChapterId", $this->episodeChapter);
            $allChapterEpisodesStmt->execute();
            $results = $allChapterEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allChapterEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all results:\n" . $exception->getMessage();
            return null;
        }
    }



    private function getIncompleteEpisodes(): ?array {

    }


    /**
     * @param string $episodeLecturersImages
     */
    protected function setEpisodeLecturersImages(string $episodeLecturersImages): void
    {
        $this->episodeLecturersImages = $episodeLecturersImages;
    }

    /**
     * @param string $episodeRating
     */
    protected function setEpisodeRating(string $episodeRating): void
    {
        $this->episodeRating = $episodeRating;
    }

    /**
     * @return string
     */
    protected function getEpisodeId(): string
    {
        return $this->episodeId;
    }

    /**
     * @param string $episodeId
     */
    protected function setEpisodeId(string $episodeId): void
    {
        $this->episodeId = $episodeId;
    }

    /**
     * @param string $episodeSeriesId
     */
    protected function setEpisodeSeriesId(string $episodeSeriesId): void
    {
        $this->episodeSeriesId = $episodeSeriesId;
    }

    /**
     * @param string $episodeUrl
     */
    protected function setEpisodeUrl(string $episodeUrl): void
    {
        $this->episodeUrl = $episodeUrl;
    }

    /**
     * @param string $episodeDescription
     */
    protected function setEpisodeDescription(string $episodeDescription): void
    {
        $this->episodeDescription = $episodeDescription;
    }

    /**
     * @param string $episodeLargeArtCover
     */
    protected function setEpisodeLargeArtCover(string $episodeLargeArtCover): void
    {
        $this->episodeLargeArtCover = $episodeLargeArtCover;
    }

    /**
     * @param string $episodeSmallArtCover
     */
    protected function setEpisodeSmallArtCover(string $episodeSmallArtCover): void
    {
        $this->episodeSmallArtCover = $episodeSmallArtCover;
    }

    /**
     * @param string $episodeDuration
     */
    protected function setEpisodeDuration(string $episodeDuration): void
    {
        $this->episodeDuration = $episodeDuration;
    }

    /**
     * @param int $episodeNumberInSeries
     */
    protected function setEpisodeNumberInChapter(int $episodeNumberInChapter): void
    {
        $this->episodeNumberInChapter = $episodeNumberInChapter;
    }

    /**
     * @param DateTime $episodePremieredDate
     */
    protected function setEpisodePremieredDate(DateTime $episodePremieredDate): void
    {
        $this->episodePremieredDate = $episodePremieredDate;
    }

    /**
     * @param string $episodeName
     */
    protected function setEpisodeName(string $episodeName): void
    {
        $this->episodeName = $episodeName;
    }

    /**
     * @return bool
     */
    protected function createEpisodeResult(): bool
    {
        return $this->createEpisode();
    }

    /**
     *
     * @return bool
     */
    private function createEpisode(): bool
    {

        $premieredDateText = $this->episodePremieredDate->format("Y-m-d");

        try {
            $createItemQuery = 'INSERT INTO episode(
                    episode_id, 
                    episode_series_id, 
                    episode_number_in_chapter, 
                    episode_chapter_id,
                    episode_name, 
                    episode_premiered_date, 
                    episode_duration, 
                    episode_small_art_cover, 
                    episode_large_art_cover, 
                    episode_description,
                    episode_lecturer_images,
                    episode_shareable_url,
                    episode_url
                    ) VALUES (
                          :episodeId,
                          :episodeSeriesId,
                           :episodeNumberInChapter,
                            :episodeChapterId,
                           :episodeName,
                           :episodePremieredDate,
                           :episodeDuration,
                           :episodeSmallArtCover,
                           :episodeLargeArtCover,
                            :episodeDescription,
                           :episodeLecturerImages,
                          :episodeShareableUrl,
                          :episodeUrl
       )';


            $createEpisodeStmt = $this->connect()->prepare($createItemQuery);
            $createEpisodeStmt->bindParam(':episodeId', $this->episodeId);
            $createEpisodeStmt->bindParam(":episodeSeriesId", $this->episodeSeriesId);
            $createEpisodeStmt->bindParam(":episodeChapterId", $this->episodeChapter);
            $createEpisodeStmt->bindParam(':episodeName', $this->episodeName);
            $createEpisodeStmt->bindParam(':episodePremieredDate', $premieredDateText);
            $createEpisodeStmt->bindParam(":episodeDuration", $this->episodeDuration);
            $createEpisodeStmt->bindParam(':episodeNumberInChapter', $this->episodeNumberInChapter);
            $createEpisodeStmt->bindParam(':episodeSmallArtCover', $this->episodeSmallArtCover);
            $createEpisodeStmt->bindParam(':episodeLargeArtCover', $this->episodeLargeArtCover);
            $createEpisodeStmt->bindParam(':episodeDescription', $this->episodeDescription);
            $createEpisodeStmt->bindParam(':episodeLecturerImages', $this->episodeLecturersImages);
            $createEpisodeStmt->bindParam(':episodeUrl', $this->episodeUrl);
            $createEpisodeStmt->bindParam(':episodeShareableUrl', $this->episodeShareableUrl);

            $result = $createEpisodeStmt->execute();
            $createEpisodeStmt->closeCursor();

            return $result;

        } catch (Exception $exception) {

            echo "Failed to create Episode :\n" . $exception->getMessage();
            return false;
        }
    }

    protected function getNumberOfEpisodesResult(): int|null
    {
        return $this->getNumberOfEpisodesInSeries();
    }

    private function getNumberOfEpisodesInSeries(): bool|int
    {
        try {
            $episodesNumberQuery = "SELECT COUNT(episode_id) FROM episode WHERE episode_series_id=:seriesId";
            $episodesNumberStmt = $this->connect()->prepare($episodesNumberQuery);
            $episodesNumberStmt->bindParam(":seriesId", $this->episodeSeriesId);
            $episodesNumberStmt->execute();
            $results = $episodesNumberStmt->fetchColumn();
            $episodesNumberStmt->closeCursor();
            return $results;

        } catch (Exception $exception) {

            echo "Failed to get number of episodes in series" . $exception->getMessage();
            return false;
        }
    }

    /**
     * @return bool
     */
    protected function episodeUpdateResult(): bool
    {
        return $this->updateEpisode();
    }

    /**
     * @return bool
     */
    private function updateEpisode(): bool
    {
        try {
            $updateItemQuery = "UPDATE episode
                            SET 
                                episode_name=?,
                    episode_number_in_series=?, 
                    episode_premiered_date=?, 
                    episode_duration=?, 
                    episode_small_art_cover=?, 
                    episode_large_art_cover=?, 
                    episode_description=?, 
                    episode_lecturer_images=?, 
                    episode_shareable_url=?, 
                    episode_url=?
                            WHERE episode_id = ?;
                            ";
            $updateItemStmt = $this->connect()->prepare($updateItemQuery);
            $updateItemStmt->bindValue(
                "sisisss", array(
                    $this->episodeName,
                    $this->episodeNumberInSeries,
                    $this->episodePremieredDate,
                    $this->episodeDuration,
                    $this->episodeSmallArtCover,
                    $this->episodeLargeArtCover,
                    $this->episodeDescription,
                    $this->episodeLecturersImages,
                    $this->episodeShareableUrl,
                    $this->episodeUrl,
                )
            );
            $result = $updateItemStmt->execute();
            $updateItemStmt->closeCursor();

            return $result;
        } catch (Exception $exception) {

            echo "Failed to update episode: \n" . $exception->getMessage();
            return false;
        }

    }

    protected function deleteEpisodeResult(): ?bool
    {
        return $this->deleteEpisode();
    }

    private function deleteEpisode(): ?bool
    {
        try {
            $singleEpisodeDeleteQuery = "DELETE FROM episode WHERE episode_id=:id";
            $singleEpisodeDeleteStmt = $this->connect()->prepare($singleEpisodeDeleteQuery);
            $singleEpisodeDeleteStmt->bindParam(":id", $this->episodeId);
            $result = $singleEpisodeDeleteStmt->execute();
            $singleEpisodeDeleteStmt->closeCursor();
            return $result;

        } catch (Exception $exception) {
            echo "Failed to delete episode \n" . $exception->getMessage();
            return null;
        }
    }

    protected function deleteAllEpisodesResult(): ?bool
    {
        return $this->deleteAllEpisodes();
    }

    private function deleteAllEpisodes(): ?bool
    {
        try {
            $allItemsDeleteQuery = "DELETE FROM episode";
            $allItemsDeleteStmt = $this->connect()->prepare($allItemsDeleteQuery);
            $result = $allItemsDeleteStmt->execute();
            $allItemsDeleteStmt->closeCursor();
            return $result;

        } catch (Exception $exception) {
            echo "Failed to get delete item\n" . $exception->getMessage();
            return null;
        }

    }

    protected function getAllEpisodesResult(): ?array
    {
        return $this->getAllEpisodes();
    }

//    protected function getFewCategoryEpisodeResult(): bool|array
//    {
//        return $this->getFewCategoryMovies();
//    }
//
//    private function getFewCategoryMovies(): bool|array
//    {
//        try {
//
//            $getCategoryMoviesQuery = "SELECT * FROM movie WHERE movie_category=:catId LIMIT 4";
//            $getCategoryMoviesStmt = $this->connect()->prepare($getCategoryMoviesQuery);
//            $getCategoryMoviesStmt->bindParam(":catId", $this->episodeSeriesId);
//            $getCategoryMoviesStmt->execute();
//            $results = $getCategoryMoviesStmt->fetchAll(PDO::FETCH_ASSOC);
//            $getCategoryMoviesStmt->closeCursor();
//            return $results;
//
//        } catch (Exception $exception) {
//            echo "Failed to get movies in category" . $exception->getMessage();
//            return false;
//        }
//    }

    private function getAllEpisodes(): ?array
    {
        try {

            $getEpisodesQuery = "SELECT * FROM episode";
            $getEpisodesStmt = $this->connect()->prepare($getEpisodesQuery);
            $getEpisodesStmt->execute();
            $results = $getEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $getEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all episodes" . $exception->getTraceAsString();

            return null;
        }
    }

    protected function getEpisodeResult(): array|null
    {
        return $this->getEpisode();
    }

    private function getEpisode(): array|null
    {
        try {
            $getEpisodeQuery = "SELECT * FROM episode WHERE episode_id=:episodeId";
            $getEpisodeStmt = $this->connect()->prepare($getEpisodeQuery);
            $getEpisodeStmt->bindParam(":episodeId", $this->episodeId);
            $getEpisodeStmt->execute();
            $result = $getEpisodeStmt->fetchAll(PDO::FETCH_ASSOC);
            $getEpisodeStmt->closeCursor();
            return $result[0];

        } catch (Exception $exception) {
            echo "failed to get Episode " . $exception->getMessage();
            return null;
        }
    }

    protected function getLastEpisodeNumberInChapterResult(): int
    {
        return $this->getLastEpisodeNumberInChapter();
    }

    private function getLastEpisodeNumberInChapter(): int
    {
        try {
            $getMaxEpisodeNumberQuery = "SELECT MAX(episode_number_in_chapter) FROM episode WHERE episode_chapter_id=:episodeChapterId";
            $getMaxEpisodeNumberStmt = $this->connect()->prepare($getMaxEpisodeNumberQuery);
            $getMaxEpisodeNumberStmt->bindParam(":episodeChapterId", $this->episodeChapter);
            $getMaxEpisodeNumberStmt->execute();
            $result = $getMaxEpisodeNumberStmt->fetchColumn();
            $getMaxEpisodeNumberStmt->closeCursor();
            return $result??0;
        } catch (Exception $exception) {
            echo "failed to get largest episode number " . $exception->getMessage();
            return 0;
        }
    }

    protected function getOtherChapterEpisodesResult(): ?array {
        return $this->getOtherChapterEpisodes();
    }

    private function getOtherChapterEpisodes(): ?array
    {
        try {
            $allChapterEpisodesQuery = "SELECT * FROM episode WHERE episode_chapter_id=:episodeChapterId AND episode_id !=:excludeEpisode1 AND episode_id !=:excludeEpisode2";
            $allChapterEpisodesStmt = $this->connect()->prepare($allChapterEpisodesQuery);
            $allChapterEpisodesStmt->bindParam(":episodeChapterId", $this->episodeChapter);
            $allChapterEpisodesStmt->bindParam(":excludeEpisode1", $this->excludeEpisode1);
            $allChapterEpisodesStmt->bindParam(":excludeEpisode2", $this->excludeEpisode2);

            $allChapterEpisodesStmt->execute();
            $results = $allChapterEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allChapterEpisodesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get all results:\n" . $exception->getMessage();
            return null;
        }

    }



    protected function getNextEpisodeResult(): array|null
    {
        return $this->getNextEpisode();
    }

    private function getNextEpisode(): array|null
    {
        try {
            $getMaxEpisodeQuery = "SELECT MAX(episode_no) FROM episode WHERE episode_chapter_id=:chapterId";
            $getMaxEpisodeStmt = $this->connect()->prepare($getMaxEpisodeQuery);
            $getMaxEpisodeStmt->bindParam(":chapterId", $this->episodeChapter);
            $getMaxEpisodeStmt->execute();
            $maxNumber = $getMaxEpisodeStmt->fetchColumn();
            $getMaxEpisodeStmt->closeCursor();


            if($this->episodeNoInChapter > $maxNumber) {
                $this->episodeNoInChapter = 1;
            }

            $getEpisodeQuery = "SELECT * FROM episode WHERE episode_number_in_chapter=:episodeNoInChapter AND episode_chapter_id=:chapterId";
            $getEpisodeStmt = $this->connect()->prepare($getEpisodeQuery);
            $getEpisodeStmt->bindParam(":episodeNoInChapter", $this->episodeNoInChapter);
            $getEpisodeStmt->bindParam(":chapterId", $this->episodeChapter);
            $getEpisodeStmt->execute();
            $result = $getEpisodeStmt->fetch(PDO::FETCH_ASSOC);
            $getEpisodeStmt->closeCursor();

            if(is_bool($result)) {
                $result = [];
            }

            return $result;

        } catch (Exception $exception) {
            echo "failed to get Episode " . $exception->getMessage();
            return null;
        }
    }


}

