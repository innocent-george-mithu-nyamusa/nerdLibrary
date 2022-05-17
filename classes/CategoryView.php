<?php


namespace Classes;


class CategoryView extends CategoryContr
{
    public function __construct() {

    }

    public function createCategory(string $catName, string $categoryIcon="icon.png", string $categoryImage="icon.png", $categoryType="courses", $categoryDescription = "") :bool
    {
        $id = Utilities::genUniqueId("cat");
        $this->addId($id);
        $this->addName($catName);
        $this->setCCategoryIcon($categoryIcon);
        $this->setCCategoryImage($categoryImage);
        $this->setCCategoryType($categoryType);
        $this->setCCategoryDescription($categoryDescription);


        return $this->createCategoryResult();
    }

    public function updateCategory($id, $name): bool
    {

        $this->addName($name);
        $this->addId($id);
        return $this->updateCategoryResult();
    }

    public function deleteCategory($id)
    {
        $this->addId($id);
        return $this->deleteCategoryResult();
    }

    public function getCategories(): ?array
    {
        return $this->getCategoriesResult();

    }


    public function getCategory( string $id): ?array {
        $this->addId($id);
        return parent::getCategoryStatus();
    }

    public function getMyInterestsCoursesCategories( string $userId): ?array {

        $this->setCCategoryInterestUserId($userId);
        return parent::getMyInterestsCoursesCategoriesResult();
    }


}