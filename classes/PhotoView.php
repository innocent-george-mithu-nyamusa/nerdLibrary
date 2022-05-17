<?php

namespace Classes;

class PhotoView extends PhotosContr
{
    public function addNewPicture(string $photoName,string $photoOwner, string $photoType="profile"): bool
    {
        $this->setCPhotoId();
        $this->setCPhotoType("$photoType");
        $this->setCPhotoName($photoName);
        $this->setCPhotoOwner($photoOwner);
        $this->setCPhotoUrl($photoName);
        return parent::addNewPictureStatus();
    }

    public function getPhotos(string $photoOwner): array
    {
        $this->setCPhotoOwner($photoOwner);
        return parent::getNewPhotosStatus();
    }



}