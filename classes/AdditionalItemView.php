<?php


namespace Classes;


class AdditionalItemView extends AdditionalItemContr
{

    public function createAdditionalItem(string $addItemName,float $itemValue, string $parentId, string $addDescription): bool {

    $this->setCAddItemId();
    $this->setCAddItemName($addItemName);
    $this->setCAddItemValue($itemValue);
    $this->setCParentId($parentId);
    $this->setCDescription($addDescription);
    return $this->createAdditionalItemStatus();
    }

    public function getAllItemAdditionalItems($parentId) :null| array {
       $this->setCParentId($parentId);
       return $this->getItemAdditionalItemsStatus();
}

    public function updateAdditionalItem(string $addItemName, float $itemValue, string $parentId, string $addDescription, $itemId): bool {
        $this->setCAddItem($itemId);
        $this->setCAddItemName($addItemName);
        $this->setCAddItemValue($itemValue);
        $this->setCParentId($parentId);
        $this->setCDescription($addDescription);
        return $this->updateAdditionalItemStatus();
    }


}