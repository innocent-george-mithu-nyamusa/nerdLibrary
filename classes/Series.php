<?php


namespace Classes;

use Exception;
use PDO;

class Series extends Dbh
{
    private string $seriesId;
    private string $seriesName;
    private string $seriesDuration;
    private string $seriesType;
    private string $seriesRating;
    private string $seriesOwner;
    private string $seriesCategoryId;
    private string $seriesImage;
    private string $seriesCoverImage;
    private string $seriesLearnerId;
    private string $seriesGif;
    private string $seriesDescription1;
    private string $seriesDescription2;
    private string $seriesDescription3;
    private string $seriesSmallSquareAboutCoverImage;
    private string $seriesMediumSquareCoverImage;
    private string $seriesAccountAccessLevel;



    public function __destruct()
    {
    }

    /**
     * @param string $seriesLearnerId
     */
    protected function setSeriesLearnerId(string $seriesLearnerId): void
    {
        $this->seriesLearnerId = $seriesLearnerId;
    }
    
     /**
     * @param string $seriesAccountAccessLevel
     */
    protected function setSeriesAccountAccessLevel(string $seriesAccountAccessLevel): void
    {
        $this->seriesAccountAccessLevel = $seriesAccountAccessLevel;
    }

    /**
     * @param string $seriesMediumSquareCoverImage
     */
    protected function setSeriesMediumSquareCoverImage(string $seriesMediumSquareCoverImage): void
    {
        $this->seriesMediumSquareCoverImage = $seriesMediumSquareCoverImage;
    }

    /**
     * @param string $seriesSmallSquareAboutCoverImage
     */
    protected function setSeriesSmallSquareAboutCoverImage(string $seriesSmallSquareAboutCoverImage): void
    {
        $this->seriesSmallSquareAboutCoverImage = $seriesSmallSquareAboutCoverImage;
    }

    /**
     * @param string $seriesDescription3
     */
    protected function setSeriesDescription3(string $seriesDescription3): void
    {
        $this->seriesDescription3 = $seriesDescription3;
    }

    /**
     * @param string $seriesDescription2
     */
    protected function setSeriesDescription2(string $seriesDescription2): void
    {
        $this->seriesDescription2 = $seriesDescription2;
    }

    /**
     * @param string $seriesDescription1
     */
    protected function setSeriesDescription1(string $seriesDescription1): void
    {
        $this->seriesDescription1 = $seriesDescription1;
    }

    /**
     * @param string $seriesGif
     */
    protected function setSeriesGif(string $seriesGif): void
    {
        $this->seriesGif = $seriesGif;
    }

    /**
     * @param string $seriesCoverImage
     */
    protected function setSeriesCoverImages(string $seriesCoverImage): void
    {
        $this->seriesCoverImage = $seriesCoverImage;
    }

    /**
     * @param string $seriesImage
     */
    protected function setSeriesImage(string $seriesImage): void
    {
        $this->seriesImage = $seriesImage;
    }

    /**
     * @param string $seriesCategoryId
     */
    protected function setSeriesCategoryId(string $seriesCategoryId): void
    {
        $this->seriesCategoryId = $seriesCategoryId;
    }

    /**
     * @param string $seriesOwner
     */
    protected function setSeriesOwner(string $seriesOwner): void
    {
        $this->seriesOwner = $seriesOwner;
    }

    /**
     * @param string $seriesRating
     */
    protected function setSeriesRating(string $seriesRating): void
    {
        $this->seriesRating = $seriesRating;
    }

    /**
     * @param string $seriesType
     */
    protected function setSeriesType(string $seriesType): void
    {
        $this->seriesType = $seriesType;
    }

    /**
     * @param string $seriesDuration
     */
    protected function setSeriesDuration(string $seriesDuration): void
    {
        $this->seriesDuration = $seriesDuration;
    }

    /**
     * @param string $seriesId
     */
    protected function setSeriesId(string $seriesId): void
    {
        $this->seriesId = $seriesId;
    }

    /**
     * @param string $seriesName
     */
    protected function setSeriesName(string $seriesName): void
    {
        $this->seriesName = $seriesName;
    }

    /**
     * @return bool
     */
    protected function createSeriesResult(): bool
    {
        return $this->createSeries();
    }

    private function createSeries(): bool
    {

        try {
            $createItemQuery = 'INSERT INTO series(
                series_id, 
                series_name, 
                   series_type, 
                   series_account,
                   series_duration, 
                   series_rating, 
                   series_owner,
                   series_category_id,
                   series_image,
                   series_cover_image,
                   series_small_square_image,
                   series_medium_square_image,
                   series_gif,
                   series_description_1,
                   series_description_2,
                   series_description_3
                 ) VALUES (
                           :seriesId,
                           :seriesName,
                           :seriesType,
                           :seriesAccountLevel,
                           :seriesDuration,
                           :seriesRating,
                           :seriesOwner,
                           :seriesCategoryId,
                           :seriesImage,
                           :seriesCoverImage,
                           :seriesSmallSquareAboutCoverImage,
                           :seriesMediumSquareCoverImage,
                           :seriesGif,
                           :seriesDescription1,
                           :seriesDescription2,
                           :seriesDescription3
       )';


            $createSeriesStmt = $this->connect()->prepare($createItemQuery);
            $createSeriesStmt->bindParam(':seriesId', $this->seriesId);
            $createSeriesStmt->bindParam(':seriesName', $this->seriesName);
            $createSeriesStmt->bindParam(':seriesType', $this->seriesType);
            $createSeriesStmt->bindParam(':seriesAccountLevel', $this->seriesAccountAccessLevel);
            $createSeriesStmt->bindParam(':seriesDuration', $this->seriesDuration);
            $createSeriesStmt->bindParam(':seriesRating', $this->seriesRating);
            $createSeriesStmt->bindParam(':seriesOwner', $this->seriesOwner);
            $createSeriesStmt->bindParam(':seriesCategoryId', $this->seriesCategoryId);
            $createSeriesStmt->bindParam(':seriesImage', $this->seriesImage);
            $createSeriesStmt->bindParam(':seriesCoverImage', $this->seriesCoverImage);
            $createSeriesStmt->bindParam(':seriesSmallSquareAboutCoverImage', $this->seriesSmallSquareAboutCoverImage);
            $createSeriesStmt->bindParam(':seriesMediumSquareCoverImage', $this->seriesMediumSquareCoverImage);
            $createSeriesStmt->bindParam(':seriesGif', $this->seriesGif);
            $createSeriesStmt->bindParam(':seriesDescription1', $this->seriesDescription1);
            $createSeriesStmt->bindParam(':seriesDescription2', $this->seriesDescription2);
            $createSeriesStmt->bindParam(':seriesDescription3', $this->seriesDescription3);

            $result = $createSeriesStmt->execute();
            $createSeriesStmt->closeCursor();

            return $result;

        } catch (Exception $exception) {

            echo "Failed to create Series :\n" . $exception->getMessage();
            return false;
        }
    }

    /**
     * @return bool
     */
    protected function UpdateSeriesResult(): bool
    {
        return $this->updateSeries();
    }

    /**
     * @return bool
     */
    private function updateSeries(): bool
    {
        try {
            $updateItemQuery = "UPDATE series
                            SET 
                                series_name=?,
                                series_type=?,
                                series_duration=?,
                                series_rating=?,
                                series_owner=?,
                                series_image=?,
                                series_cover_image=?,
                                series_gif=?,
                            WHERE series_id = ?;
                            ";
            $updateItemStmt = $this->connect()->prepare($updateItemQuery);
            $updateItemStmt->bindValue(
                "ssidssss", array(
                    $this->seriesName,
                    $this->seriesType,
                    $this->seriesDuration,
                    $this->seriesRating,
                    $this->seriesOwner,
                    $this->seriesId,
                    $this->seriesImage,
                    $this->seriesCoverImage,
                    $this->seriesGif
                )
            );
            $result = $updateItemStmt->execute();
            $updateItemStmt->closeCursor();

            return $result;
        } catch (Exception $exception) {

            echo "Failed to update Movie: \n" . $exception->getMessage();
            return false;
        }

    }

    protected function deleteSeriesResult(): ?bool
    {
        return $this->deleteSeries();
    }

    private function deleteSeries(): ?bool
    {
        try {
            $singleMovieDeleteQuery = "DELETE FROM series WHERE series_id=:id";
            $singleMovieDeleteStmt = $this->connect()->prepare($singleMovieDeleteQuery);
            $singleMovieDeleteStmt->bindParam(":id", $this->seriesId);
            $result = $singleMovieDeleteStmt->execute();
            $singleMovieDeleteStmt->closeCursor();
            return $result;

        } catch (Exception $exception) {
            echo "Failed to delete movie \n" . $exception->getMessage();
            return null;
        }
    }

    protected function deleteAllSeriesResult(): ?bool
    {
        return $this->deleteAllSeries();
    }

//    protected function getNumberOfEpisodesResult(): int|null
//    {
//        return $this->getNumberOfEpisodesInSeries();
//    }
//
//    private function getNumberOfEpisodesInSeries(): bool|int
//    {
//        try {
//
//            $episodesNumberQuery = "SELECT COUNT(episode_id) FROM episode WHERE episode_series_id=:seriesId";
//            $episodesNumberStmt = $this->connect()->prepare($episodesNumberQuery);
//            $episodesNumberStmt->bindParam(":seriesId", $this->seriesId);
//            $episodesNumberStmt->execute();
//            $results = $episodesNumberStmt->fetchColumn();
//            $episodesNumberStmt->closeCursor();
//            return $results;
//
//        } catch (Exception $exception) {
//
//            echo "Failed to get number of episodes in series" . $exception->getMessage();
//            return false;
//        }
//
//    }

    private function deleteAllSeries(): ?bool
    {
        try {
            $allItemsDeleteQuery = "DELETE FROM series";
            $allItemsDeleteStmt = $this->connect()->prepare($allItemsDeleteQuery);
            return $allItemsDeleteStmt->execute();
        } catch (Exception $exception) {
            echo "Failed to get delete item\n" . $exception->getMessage();
            return null;
        }

    }

    protected function getFewSeriesEpisodesResult(): bool|array
    {
        return $this->getFewSeriesEpisodes();
    }

    private function getFewSeriesEpisodes(): bool|array
    {
        try {

            $getSeriesEpisodesQuery = "SELECT * FROM episode WHERE episode_series_id=:seriesId LIMIT 4";
            $getSeriesEpisodesStmt = $this->connect()->prepare($getSeriesEpisodesQuery);
            $getSeriesEpisodesStmt->bindParam(":seriesId", $this->seriesId);
            $getSeriesEpisodesStmt->execute();
            $results = $getSeriesEpisodesStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSeriesEpisodesStmt->closeCursor();
            return $results;

        } catch (Exception $exception) {
            echo "Failed to get episodes in series" . $exception->getMessage();
            return false;
        }
    }

    protected function getAllSeriesEpisodesResult(): bool|array
    {
        return $this->getAllSeriesEpisodes();
    }

    private function getAllSeriesEpisodes(): bool|array
    {
        try {
            $getEpisodesInSeriesQuery = "SELECT * FROM episode WHERE episode_series_id=:seriesId";
            $getEpisodesInSeriesStmt = $this->connect()->prepare($getEpisodesInSeriesQuery);
            $getEpisodesInSeriesStmt->bindParam(":seriesId", $this->seriesId);
            $getEpisodesInSeriesStmt->execute();
            $results = $getEpisodesInSeriesStmt->fetchAll(PDO::FETCH_ASSOC);
            $getEpisodesInSeriesStmt->closeCursor();
            return $results;

        } catch (Exception $exception) {
            echo "Failed to get items in category" . $exception->getTraceAsString();
            return false;
        }
    }

    protected function getAllSeriesResult()
    {
        return $this->getAllSeries();
    }

    protected function getAllSeries(): array
    {

        try {
            $getSeriesQuery = "SELECT * FROM series";
            $getSeriesStmt = $this->connect()->prepare($getSeriesQuery);
            $getSeriesStmt->execute();
            $results = $getSeriesStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSeriesStmt->closeCursor();

            return $results;
        } catch (Exception $exception) {
            echo "Failed to get all Series" . $exception->getMessage();
        }
    }

    protected function getSeriesStatus(): array|null
    {
        return $this->getSeries();
    }

    private function getSeries(): array|null
    {
        try {
            $getSeriesQuery = "SELECT * FROM series WHERE series_id=:seriesId";
            $getSeriesStmt = $this->connect()->prepare($getSeriesQuery);
            $getSeriesStmt->bindParam(":seriesId", $this->seriesId);
            $getSeriesStmt->execute();
            $result = $getSeriesStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSeriesStmt->closeCursor();

            return $result[0];

        } catch (Exception $exception) {
            echo "failed to get Movie " . $exception->getMessage();
            return null;
        }
    }

    protected function getMySeriesResult(): array|null
    {
        return $this->getMySeries();
    }

    private function getMySeries(): array|null
    {
        try {
            $getSeriesQuery = "SELECT * FROM series WHERE series_owner=:seriesOwner";
            $getSeriesStmt = $this->connect()->prepare($getSeriesQuery);
            $getSeriesStmt->bindParam(":seriesOwner", $this->seriesOwner);
            $getSeriesStmt->execute();
            $results = $getSeriesStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSeriesStmt->closeCursor();

            return $results;

        } catch (Exception $exception) {
            echo "Failed to get user series " . $exception->getMessage();
            return null;
        }
    }

    protected function getAllCategorySeriesResult(): array|null
    {
        return $this->getAllCategorySeries();
    }

    private function getAllCategorySeries(): array|null
    {
        try {
            $getSeriesQuery = "SELECT * FROM series WHERE series_category_id=:seriesCategory";
            $getSeriesStmt = $this->connect()->prepare($getSeriesQuery);
            $getSeriesStmt->bindParam(":seriesCategory", $this->seriesCategoryId);
            $getSeriesStmt->execute();
            $results = $getSeriesStmt->fetchAll(PDO::FETCH_ASSOC);
            $getSeriesStmt->closeCursor();

            return $results ?? [];
        } catch (Exception $exception) {
            echo "Failed to get user series " . $exception->getMessage();
            return null;
        }
    }



    protected function myLearningSeriesResult():array|null {
        return $this->learningSeries();
    }

    private function learningSeries(): array|null {

        $enrollmentsObj = new EnrollmentsView();
        $allEnrollments = $enrollmentsObj->myLatestEnrollments($this->seriesLearnerId);
        $allEnrolledSeries = [];

        if($allEnrollments) {

            foreach ($allEnrollments as $enrollment) {
                $this->seriesId = $enrollment["enrolled_course_id"];
                array_push($allEnrolledSeries, $this->getSeries());
            }

            return $allEnrolledSeries;
        }

        return null;
    }

    protected function myEducationSeriesResult():array|null {
        return $this->educationSeries();
    }

    private function educationSeries(): array|null {

        $enrollmentsObj = new EnrollmentsView();
        $allEnrollments = $enrollmentsObj->myEnrollments($this->seriesLearnerId);
        $allEnrolledSeries = [];

        if($allEnrollments) {

            foreach ($allEnrollments as $enrollment) {
                $this->seriesId = $enrollment["enrolled_course_id"];
                array_push($allEnrolledSeries, $this->getSeries());
            }

            return $allEnrolledSeries;
        }

        return null;
    }



}

