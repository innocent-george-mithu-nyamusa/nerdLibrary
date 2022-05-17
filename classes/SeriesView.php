<?php

namespace Classes;

class SeriesView extends SeriesContr
{

    public function __construct() {}

    public function createSeries(
        string $seriesName,
        string $seriesType,
        string $seriesDuration,
        string $seriesCategoryId,
        string $seriesRating,
        string $seriesOwner,
        string $seriesPortraitCoverImage,
        string $seriesGif,
        string $seriesLandscapeCoverImages,
        string $seriesDescription1,
        string $seriesDescription2,
        string $seriesDescription3,
        string $seriesSmallSquareAboutCoverImage,
        string $seriesMediumSquareCoverImage,

    ): bool
    {
        $this->setCSeriesMediumSquareCoverImage($seriesMediumSquareCoverImage);
        $this->setCSeriesSmallSquareAboutCoverImage($seriesSmallSquareAboutCoverImage);
        $this->setCSeriesCoverImages($seriesLandscapeCoverImages);
        $this->setCSeriesGif($seriesGif);
        $this->setCSeriesImage($seriesPortraitCoverImage);
        $this->setCSeriesDescription1($seriesDescription1);
        $this->setCSeriesDescription2($seriesDescription2);
        $this->setCSeriesDescription3($seriesDescription3);
        $this->setCSeriesDuration($seriesDuration);
        $this->setCSeriesCategoryId($seriesCategoryId);
        $this->setCSeriesOwner($seriesOwner);
        $this->setCSeriesId();
        $this->setCSeriesName($seriesName);
        $this->setCSeriesType($seriesType);
        $this->setCSeriesRating($seriesRating);

        return $this->createSeriesResult();
    }

    public function UpdateSeries(
        string $seriesName,
        string $seriesType,
        string $seriesDuration,
        string $seriesCategoryId,
        string $seriesRating,
        string $seriesOwner,
        string $seriesImage,
        string $seriesGif,
        string $seriesLargeCoverImages,
        string $seriesDescription1,
        string $seriesDescription2,
        string $seriesDescription3,
        string $seriesSmallSquareAboutCoverImage,
        string $seriesMediumSquareCoverImage,
        string $seriesAccountAccessLevel

    ): bool
    {
        $this->setCSeriesMediumSquareCoverImage($seriesMediumSquareCoverImage);
        $this->setCSeriesSmallSquareAboutCoverImage($seriesSmallSquareAboutCoverImage);
        $this->setCSeriesCoverImages($seriesLargeCoverImages);
        $this->setCSeriesGif($seriesGif);
        $this->setCSeriesImage($seriesImage);
        $this->setCSeriesDescription1($seriesDescription1);
        $this->setCSeriesDescription2($seriesDescription2);
        $this->setCSeriesDescription3($seriesDescription3);
        $this->setCSeriesDuration($seriesDuration);
        $this->setCSeriesCategoryId($seriesCategoryId);
        $this->setCSeriesOwner($seriesOwner);
        $this->setCSeriesName($seriesName);
        $this->setCSeriesType($seriesType);
        $this->setCSeriesRating($seriesRating);
        $this->setCSeriesAccountAccessLevel($seriesAccountAccessLevel);

        return parent::UpdateSeriesResult();
    }


    public function allSeries(): array
    {
        return $this->getAllSeriesResult();
    }

    public function getSeries(string $seriesId): array|null
    {
        $this->addSeriesId($seriesId);
        return parent::getSeriesStatus();
    }

    public function myLearningSeries(string $learnerId): array|null
    {
        $this->setCSeriesLearnerId($learnerId);
        return parent::myLearningSeriesResult();
    }

    public function myEducationSeries(string $learnerId): array|null
    {
        $this->setCSeriesLearnerId($learnerId);
        return parent::myEducationSeriesResult();
    }

    public function getInterestCategorySeries(string $seriesCategoryId): array {
        $this->setCSeriesCategoryId($seriesCategoryId);
        return parent::getAllCategorySeriesResult();
    }
    public function mySeries(string $seriesOwner): array|null
    {
        $this->setCSeriesOwner($seriesOwner);
        return parent::getMySeriesResult();
    }
}