<?php

namespace Classes;

class PhotosContr extends Photos
{
    protected function setCPhotoId(): void
    {
        $photoId = Utilities::genUniqueId("pho");
        parent::setPhotoId($photoId);
    }

    protected function setCPhotoType(string $photoType): void
    {
        parent::setPhotoType($photoType);
    }

    protected function setCPhotoOwner(string $photoOwner): void
    {
        $photoOwner = Utilities::cleanData($photoOwner);
        parent::setPhotoOwner($photoOwner);
    }
    protected function setCPhotoUrl(string $photoFile): void
    {
        $photoUrl = "http://nerdlife.co.zw/images/media/posts/".$photoFile;
        parent::setPhotoUrl($photoUrl);
    }



    public function setCPhotoName(string $photoName): void
    {
        $photoName = Utilities::cleanData($photoName);
        parent::setPhotoName($photoName);
    }

}