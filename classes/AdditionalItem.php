<?php


namespace Classes;


use Exception;
use PDO;

class AdditionalItem extends Dbh
{

    private string $addItemName;
    private string $addItemId;
    private float $addItemValue;
    private string $parentId;
    private string $addDescription;

    /**
     * @param string $parentId
     */
    protected function setParentId(string $parentId): void
    {
        $this->parentId = $parentId;
    }

    /**
     * @param float $addItemValue
     */
    protected function setAddItemValue(float $addItemValue): void
    {
        $this->addItemValue = $addItemValue;
    }

    /**
     * @param string $addItemId
     */
    protected function setAddItemId(string $addItemId): void
    {
        $this->addItemId = $addItemId;
    }

    /**
     * @param string $addItemName
     */
    protected function setAddItemName(string $addItemName): void
    {
        $this->addItemName = $addItemName;
    }

    /**
     * @param string $addDescription
     */
    protected function setAddDescription(string $addDescription): void
    {
        $this->addDescription = $addDescription;
    }

    protected function createAdditionalItemStatus(): bool
    {
        return $this->createAdditionalItem();
    }

    private function createAdditionalItem(): bool
    {

        try {

            $additionalItemQuery = "INSERT INTO item_additional(additional_item_id, additional_item_name, additional_item_value, additional_item_parent_id, additional_item_description) VALUES(:addItemId, :addItemName, :addItemValue, :parentId, :addItemDescription)";
            $additionalItemStmt = $this->connect()->prepare($additionalItemQuery);
            $additionalItemStmt->bindParam(":addItemId", $this->addItemId);
            $additionalItemStmt->bindParam(":addItemName", $this->addItemName);
            $additionalItemStmt->bindParam(":addItemValue", $this->addItemValue);
            $additionalItemStmt->bindParam(":parentId", $this->parentId);
            $additionalItemStmt->bindParam(":addItemDescription", $this->addDescription);

            return $additionalItemStmt->execute();

        }catch (Exception $exception) {
            echo "Failed to create Additional Movie".$exception->getMessage();
            return false;
        }

    }

    protected function getItemAdditionalItemsStatus(): null| array {
        return $this->getItemAdditionalItems();
    }

    private function getItemAdditionalItems(): null|array {
        try {
            $getAdditionalItemsQuery = "SELECT * FROM item_additional WHERE additional_item_parent_id=:parentId";
            $getAdditionalItemStmt = $this->connect()->prepare($getAdditionalItemsQuery);
            $getAdditionalItemStmt->bindParam(":parentId", $this->parentId);
            $getAdditionalItemStmt->execute();
            return $getAdditionalItemStmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $exception) {
            echo "Failed to get Addition Items". $exception->getMessage();
            return null;
        }
    }

    protected function updateAdditionalItemStatus(): bool {
        return $this->updateAdditionalItem();
    }

    private function updateAdditionalItem(): bool {

        try {
            $updateItemQuery = "UPDATE item_additional SET additional_item_name=:addItemName, additional_item_value=:addItemValue, additional_item_parent_id=:addItemParentId, additional_item_description=:addItemDescription";
            $updateItemStmt = $this->connect()->prepare($updateItemQuery);
            $updateItemStmt->bindParam(":addItemName", $this->addItemName);
            $updateItemStmt->bindParam(":addItemValue", $this->addItemValue);
            $updateItemStmt->bindParam(":addItemParentId", $this->addItemId);
            $updateItemStmt->bindParam(":addItemDescription", $this->addDescription);
            return $updateItemStmt->execute();

        }catch (Exception $exception) {
           echo "Failed to update additional Movie". $exception->getMessage();
           return false;
        }

    }

}