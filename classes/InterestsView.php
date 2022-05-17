<?php

namespace Classes;

class InterestsView extends InterestsContr
{

    public function createInterest(string $interestItems, string $interestOwner): bool
    {

        $this->setCInterestId();
        $this->setCInterestItems($interestItems);
        $this->setCInterestOwner($interestOwner);
        return parent::createInterestStatus();

    }

    public function getMyInterestsCategoriesId(string $userId): array {

        $this->setCInterestOwner($userId);
        return parent::getMyInterestsCategoriesIdResult();

    }


}