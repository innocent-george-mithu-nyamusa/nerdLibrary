<?php

namespace Classes;

class PagesContr extends Pages
{

    protected function setCPageId(): void
    {
        $pageId = Utilities::genUniqueId('pge');
        parent::setPageId($pageId);
    }

    protected function addCPageId(string $pageId): void
    {
        $pageId = Utilities::cleanData($pageId);
        parent::setPageId($pageId);
    }

    protected function setCPageCoverImage(string $pageCoverImage): void
    {
        $pageCoverImage = Utilities::cleanData($pageCoverImage);
        parent::setPageCoverImage($pageCoverImage);
    }

    protected function setCPageIcon(string $pageIcon): void
    {
        $pageIcon = Utilities::cleanData($pageIcon);
        parent::setPageIcon($pageIcon);
    }

    protected function setCPageIndustry(string $pageIndustry): void
    {
        $pageIndustry = Utilities::cleanData($pageIndustry);
        parent::setPageIndustry($pageIndustry);
    }

    protected function setCPageOwner(string $pageOwner): void
    {
        $pageOwner = Utilities::cleanData($pageOwner);
        parent::setPageOwner($pageOwner);
    }
}