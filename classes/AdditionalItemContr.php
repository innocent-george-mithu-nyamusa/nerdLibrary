<?php


namespace Classes;


class AdditionalItemContr extends AdditionalItem
{

    protected function setCAddItemId(): void
    {
        $addItemId = Utilities::genUniqueId("add");
        parent::setAddItemId($addItemId); // TODO: Change the autogenerated stub
    }

    protected function setCAddItem($id): void {
        parent::setAddItemId($id);
    }

    protected function setCAddItemName(string $addItemName): void
    {
        parent::setAddItemName($addItemName); // TODO: Change the autogenerated stub
    }

    protected function setCAddItemValue(float $addItemValue): void
    {
        parent::setAddItemValue($addItemValue); // TODO: Change the autogenerated stub
    }
    protected function setCDescription(string $addDescription): void {
        parent::setAddDescription($addDescription);
    }

    protected function setCParentId(string $parentId): void
    {
        parent::setParentId($parentId); // TODO: Change the autogenerated stub
    }

}