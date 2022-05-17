<?php


namespace Classes;


class CategoryContr extends Category
{

    private $cName;
    private $cId;



    protected function addId($id)
    {
        $this->cId = Utilities::cleanData($id);
        $this->checkId();
    }

    private function checkId()
    {
        $this->setId($this->cId);
    }

    protected function setCCategoryInterestUserId(string $categoryInterestUserId): void
    {
        $categoryInterestUserId = Utilities::cleanData($categoryInterestUserId);
        parent::setCategoryInterestUserId($categoryInterestUserId);
    }

    protected function setCCategoryType(string $categoryType): void
    {
        $categoryType =  Utilities::cleanData($categoryType);
        parent::setCategoryType($categoryType);
    }

    protected function setCCategoryDescription(string $categoryDescription): void
    {

        $categoryDescription = Utilities::cleanData($categoryDescription);
        parent::setCategoryDescription($categoryDescription);
    }

    protected function addName($name)
    {
        $this->cName =Utilities::cleanData($name);
        $this->checkName();
    }

    private function checkName()
    {
        $this->setCategoryName($this->cName);
    }

    protected function setCCategoryImage(string $categoryImage): void
    {
        $categoryImage = Utilities::cleanData($categoryImage);
        parent::setCategoryImage($categoryImage);
    }

    protected function setCCategoryIcon(string $categoryIcon): void
    {
        $categoryIcon = Utilities::cleanData($categoryIcon);
        parent::setCategoryIcon($categoryIcon);
    }

}