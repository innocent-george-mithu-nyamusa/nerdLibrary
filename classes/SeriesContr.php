<?php

namespace Classes;

class SeriesContr extends Series
{
    public function __construct() {

    }
    
     protected function setCSeriesAccountAccessLevel(string $seriesAccountAccessLevel): void
    {
        $seriesAccountAccessLevel = Utilities::cleanData($seriesAccountAccessLevel);
        parent::setSeriesAccountAccessLevel($seriesAccountAccessLevel);
    }

    protected function setCSeriesId(): void
    {
        $seriesId = Utilities::genUniqueId("ser");
        parent::setSeriesId($seriesId);
    }

    protected function setCSeriesGif(string $seriesGif): void
    {
        $seriesGif = Utilities::cleanData($seriesGif);
        parent::setSeriesGif($seriesGif);
    }

    protected function setCSeriesImage(string $seriesImage): void
    {
        parent::setSeriesImage($seriesImage);
    }

    protected function setCSeriesMediumSquareCoverImage(string $seriesMediumSquareCoverImage): void
    {
        $seriesMediumSquareCoverImage = Utilities::cleanData($seriesMediumSquareCoverImage);
        parent::setSeriesMediumSquareCoverImage($seriesMediumSquareCoverImage);
    }


    protected function setCSeriesSmallSquareAboutCoverImage(string $seriesSmallSquareAboutCoverImage): void
    {
        $seriesSmallSquareAboutCoverImage = Utilities::cleanData($seriesSmallSquareAboutCoverImage);
        parent::setSeriesSmallSquareAboutCoverImage($seriesSmallSquareAboutCoverImage);
    }


    protected function setCSeriesCoverImages(string $seriesCoverImage): void
    {
        parent::setSeriesCoverImages($seriesCoverImage);
    }

    protected function setCSeriesCategoryId(string $seriesCategoryId): void
    {
        $seriesCategoryId = Utilities::cleanData($seriesCategoryId);
        parent::setSeriesCategoryId($seriesCategoryId);
    }

    protected function setCSeriesOwner(string $seriesOwner): void
    {
        $seriesOwner = Utilities::cleanData($seriesOwner);
        parent::setSeriesOwner($seriesOwner);
    }

    protected function setCSeriesName(string $seriesName): void
    {
        $seriesName = Utilities::cleanData($seriesName);
        parent::setSeriesName($seriesName);
    }

    protected function setCSeriesRating(string $seriesRating): void
    {
        $seriesRating = Utilities::cleanData($seriesRating);
        parent::setSeriesRating($seriesRating);
    }

    protected function setCSeriesType(string $seriesType): void
    {
        $seriesType = Utilities::cleanData($seriesType);
        parent::setSeriesType($seriesType);
    }

    protected function setCSeriesDuration(string $seriesDuration): void
    {
        $seriesDuration = Utilities::cleanData($seriesDuration);
        parent::setSeriesDuration($seriesDuration);
    }

    protected function setCSeriesDescription1(string $seriesDescription1): void
    {
        $seriesDescription1 = Utilities::cleanData($seriesDescription1);
        parent::setSeriesDescription1($seriesDescription1);
    }

    protected function setCSeriesDescription2(string $seriesDescription2): void
    {
        $seriesDescription2 = Utilities::cleanData($seriesDescription2);
        parent::setSeriesDescription2($seriesDescription2);
    }

    protected function setCSeriesDescription3(string $seriesDescription3): void
    {
        $seriesDescription3 = Utilities::cleanData($seriesDescription3);
        parent::setSeriesDescription3($seriesDescription3);
    }


    protected function addSeriesId($seriesId): void {
        $seriesId = Utilities::cleanData($seriesId);
        parent::setSeriesId($seriesId);
    }

    protected function setCSeriesLearnerId(string $seriesLearnerId): void
    {
        $seriesLearnerId = Utilities::cleanData($seriesLearnerId);
        parent::setSeriesLearnerId($seriesLearnerId);
    }
    public function __destruct()
    {
    }
}