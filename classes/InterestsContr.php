<?php

namespace Classes;

class InterestsContr extends Interests
{

    protected function setCInterestId(): void
    {
        $interestId = Utilities::genUniqueId("int");
        parent::setInterestId($interestId);
    }

    protected function setCInterestItems(string $interestItems): void
    {
        $interestItems = Utilities::cleanData($interestItems);
        parent::setInterestItems($interestItems);
    }

    protected function setCInterestOwner(string $interestOwner): void
    {
        $interestOwner = Utilities::cleanData($interestOwner);
        parent::setInterestOwner($interestOwner);
    }

}