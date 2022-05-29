<?php

namespace Classes;

use Exception;
use PDO;

class Pages extends Dbh
{

    private string $pageId;
    private string $pageOwner;
    private string $pageCoverImage;
    private string $pageIcon;
    private string $pageIndustry;

    /**
     * @param string $pageIndustry
     */
    protected function setPageIndustry(string $pageIndustry): void
    {
        $this->pageIndustry = $pageIndustry;
    }

    /**
     * @param string $pageIcon
     */
    protected function setPageIcon(string $pageIcon): void
    {
        $this->pageIcon = $pageIcon;
    }

    /**
     * @param string $pageCoverImage
     */
    protected function setPageCoverImage(string $pageCoverImage): void
    {
        $this->pageCoverImage = $pageCoverImage;
    }

    /**
     * @param string $pageOwner
     */
    protected function setPageOwner(string $pageOwner): void
    {
        $this->pageOwner = $pageOwner;
    }

    /**
     * @param string $pageId
     */
    protected function setPageId(string $pageId): void
    {
        $this->pageId = $pageId;
    }


    protected function getAllSuggestionPagesResult():array {
        return $this->getAllSuggestionPages();
    }

    private function getAllSuggestionPages(): array {
        try {
            $allPagesQuery = "SELECT * 
                              FROM pages
                              LEFT JOIN relationship
                              ON (relationship.relation_initiator_id !=pages.page_owner_id
                              AND relationship.relation_user_id != pages.page_owner_id)
                              WHERE relationship.relation_initiator_id !=:userId
                              ";

            $allPagesStmt = $this->connect()->prepare($allPagesQuery);
            $allPagesStmt->bindParam(":userId", $this->pageOwner);
            $allPagesStmt->execute();
            $result = $allPagesStmt->fetchAll(PDO::FETCH_ASSOC);
            $allPagesStmt->closeCursor();

            return $result??[];
        }catch (Exception $exception){
            echo "Failed to get all pages ". $exception->getMessage();
            return [];
        }
    }

    protected function getPageResult():array {
        return $this->getPage();
    }

    private function getPage(): array {
        try {
            $getPageQuery = "SELECT * 
                              FROM pages 
                              WHERE page_id=:pageId ";
            $getPageStmt = $this->connect()->prepare($getPageQuery);
            $getPageStmt->bindParam(":pageId", $this->pageId);
            $getPageStmt->execute();
            $result = $getPageStmt->fetchAll(PDO::FETCH_ASSOC);
            $getPageStmt->closeCursor();

            return $result[0]?? [];
        }catch (Exception $exception){
            echo "Failed to get all pages ". $exception->getMessage();
            return [];
        }
    }



}