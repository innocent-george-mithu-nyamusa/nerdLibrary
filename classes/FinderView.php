<?php


namespace Classes;


class FinderView extends FinderContr
{

    public function addFinder(
        string $finderPhone,
        string $finderFullName,
        string $finderAccount,
        string $finderAddress,
        float $finderCredit,
        string $finderNationalIdCard,
        string $itemSubmittedId
    ): bool {

        $this->setCFinderId();
        $this->setCFinderPhone($finderPhone);
        $this->setCFinderName($finderFullName);
        $this->setCFinderAccount($finderAccount);
        $this->setCFinderAddress($finderAddress);
        $this->setCFinderCredit($finderCredit);
        $this->setCFinderNationalIdCard($finderNationalIdCard);
        $this->setCItemSubmittedId($itemSubmittedId);

        return $this->createFinderStatus();
    }

    public function getAllFinders(): null|array
    {
        return parent::getAllFindersStatus();
    }

    public function getFinder(string $id): null|array
    {
        $this->addCFinderId($id);
        return parent::getFinderStatus();
    }

    public function deleteFinder(string $id): bool
    {
        return parent::deleteFinderStatus();
    }

    public function updateFinder(string $finderPhone,
                                 string $finderFullName,
                                 string $finderAccount,
                                 string $finderAddress,
                                 float $finderCredit,
                                 string $finderNationalIdCard,
                                 string $itemSubmittedId): bool
    {
        $this->setCFinderPhone($finderPhone);
        $this->setCFinderName($finderFullName);
        $this->setCFinderAccount($finderAccount);
        $this->setCFinderAddress($finderAddress);
        $this->setCFinderCredit($finderCredit);
        $this->setCFinderNationalIdCard($finderNationalIdCard);
        $this->setCItemSubmittedId($itemSubmittedId);
        return parent::updateFinderStatus();
    }


    public function addFinderEarnings(float $earnings, string $userId): bool {
        $this->addCFinderId($userId);
        $this->setCFinderEarnings($earnings);
        return parent::addEarningsStatus();
    }


}