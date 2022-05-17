<?php

namespace Classes;

use PDO;

class Interests extends Dbh
{

    private string $interestId;
    private string $interestOwnerId;
    private string $interestItems;

    /**
     * @param string $interestItems
     */
    protected function setInterestItems(string $interestItems): void
    {
        $this->interestItems = $interestItems;
    }

    /**
     * @param string $interestOwner
     */
    protected function setInterestOwner(string $interestOwner): void
    {
        $this->interestOwnerId = $interestOwner;
    }

    /**
     * @param string $interestId
     */
    protected function setInterestId(string $interestId): void
    {
        $this->interestId = $interestId;
    }

    protected function createInterestStatus(): bool {
        return $this->createInterest();
    }
    private function createInterest(): bool {
        try {

            $createInterestQuery = "INSERT INTO interest (interest_id, interest_items, interest_owner_id) VALUES(:interestId, :interestItems, :interestOwnerId)";
            $createInterestStmt = $this->connect()->prepare($createInterestQuery);
            $createInterestStmt->bindParam(":interestId", $this->interestId);
            $createInterestStmt->bindParam(":interestItems", $this->interestItems);
            $createInterestStmt->bindParam(":interestOwnerId", $this->interestOwnerId);

            $result = $createInterestStmt->execute();
            $createInterestStmt->closeCursor();

            return $result;
        }catch (\Exception $exception) {
            echo "Failed to create exception ". $exception->getMessage();
            return false;
        }
    }

    protected function getMyInterestsCategoriesIdResult(): array {
        return $this->getMyInterestsCategoriesId();
    }
    private function getMyInterestsCategoriesId(): array {
        try {

            $getCatInterestQuery = "SELECT * FROM interest WHERE interest_owner_id=:interestOwnerId";
            $getCaInterestStmt = $this->connect()->prepare($getCatInterestQuery);
            $getCaInterestStmt->bindParam(":interestOwnerId", $this->interestOwnerId);
            $getCaInterestStmt->execute();
            $result = $getCaInterestStmt->fetchAll(PDO::FETCH_ASSOC);
            $getCaInterestStmt->closeCursor();

            $result = explode(",", $result[0]["interest_items"]);

            return $result;
        }catch (\Exception $exception) {
            echo "Failed to create exception ". $exception->getMessage();
            return [];
        }
    }

}