<?php

namespace Classes;

class PagesView extends PagesContr
{

    public function getSuggestionPages(string $userId): array {
        $this->setCPageOwner($userId);
        return parent::getAllSuggestionPagesResult();
    }

    public function getPage(string $pageId): array {
        $this->addCPageId($pageId);
        return $this->getPageResult();
    }

}