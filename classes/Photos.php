<?php

namespace Classes;

use PDO;

class Photos extends Dbh {

    private string $photoId;
    private string $photoUrl;
    private string $photoName;
    private string $photoOwner;
    private string $photoType;
    private string $photoAddedDate;

    /**
     * @param string $photoName
     */
    public function setPhotoName(string $photoName): void
    {
        $this->photoName = $photoName;
    }

    /**
     * @param string $photoType
     */
    protected function setPhotoType(string $photoType): void
    {
        $this->photoType = $photoType;
    }

    /**
     * @param string $photoUrl
     */
    protected function setPhotoUrl(string $photoUrl): void
    {
        $this->photoUrl = $photoUrl;
    }

    /**
     * @param string $photoId
     */
    protected function setPhotoId(string $photoId): void
    {
        $this->photoId = $photoId;
    }

    /**
     * @param string $photoOwner
     */
    protected function setPhotoOwner(string $photoOwner): void
    {
        $this->photoOwner = $photoOwner;
    }

    /**
     * @param string $photoAddedDate
     */
    private function setPhotoAddedDate(string $photoAddedDate): void
    {
        $this->photoAddedDate = $photoAddedDate;
    }

    protected function addNewPictureStatus(): bool {
        return $this->addNewPicture();
    }

    private function addNewPicture(): bool {

        try {

            $addPhotoQuery = "INSERT INTO photo(photo_id, photo_type, photo_name, photo_url, photo_owner) VALUES (:photoId, :photoType, :photoName, :photoUrl, :photoOwner)";
            $addPhotoStmt = $this->connect()->prepare($addPhotoQuery);
            $addPhotoStmt->bindParam(":photoId", $this->photoId);
            $addPhotoStmt->bindParam(":photoName", $this->photoName);
            $addPhotoStmt->bindParam(":photoType", $this->photoType);
            $addPhotoStmt->bindParam(":photoUrl", $this->photoUrl);
            $addPhotoStmt->bindParam(":photoOwner", $this->photoOwner);
            $result = $addPhotoStmt->execute();
            $addPhotoStmt->closeCursor();
            return $result;
        }catch (\Exception $exception) {
            echo "Failed to add a new Picture ". $exception->getMessage();
            return false;
        }
    }


    protected function getNewPhotosStatus(): ?array {
        return $this->getPictures();
    }

    private function getPictures(): array {

        try {

            $getPhotoQuery = "SELECT * FROM photo WHERE photo_owner=:photoOwner";
            $getPhotoStmt = $this->connect()->prepare($getPhotoQuery);
            $getPhotoStmt->bindParam(":photoOwner", $this->photoOwner);
            $getPhotoStmt->execute();
            $result = $getPhotoStmt->fetchAll(PDO::FETCH_ASSOC);
            $getPhotoStmt->closeCursor();
            return $result??[];

        }catch (\Exception $exception) {
            echo "Failed to add a new Picture ". $exception->getMessage();
            return [];
        }
    }




}