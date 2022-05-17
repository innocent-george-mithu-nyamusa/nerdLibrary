<?php


namespace Classes;


use Exception;

class Finder extends Dbh
{

    private string $finderId;
    private string $finderPhone;
    private string $finderFullName;
    private string $finderAccount;
    private string $finderAddress;
    private float $finderCredit;
    private string $finderNationalIdCard;
    private string $itemSubmittedId;
    private float $finderEarnings;

    /**
     * @param float $finderEarnings
     */
    protected function setFinderEarnings(float $finderEarnings): void
    {

        $this->finderEarnings = $finderEarnings;
    }


    /**
     * @param string $finderNationalIdCard
     */
    protected function setFinderNationalIdCard(string $finderNationalIdCard): void
    {
        $this->finderNationalIdCard = $finderNationalIdCard;
    }

    /**
     * @param string $finderPhone
     */
    protected function setFinderPhone(string $finderPhone): void
    {
        $this->finderPhone = $finderPhone;
    }

    /**
     * @param string $finderId
     */
    protected function setFinderId(string $finderId): void
    {
        $this->finderId = $finderId;
    }

    /**
     * @param string $finderFullName
     */
    protected function setFinderName(string $finderFullName): void
    {
        $this->finderFullName = $finderFullName;
    }

    /**
     * @param string $finderAccount
     */
    protected function setFinderAccount(string $finderAccount): void
    {
        $this->finderAccount = $finderAccount;
    }

    /**
     * @param string $finderAddress
     */
    protected function setFinderAddress(string $finderAddress): void
    {
        $this->finderAddress = $finderAddress;
    }

    /**
     * @param float $finderCredit
     */
    protected function setFinderCredit(float $finderCredit): void
    {
        $this->finderCredit = $finderCredit;
    }


    /**
     * @param string $itemSubmittedId
     */
    protected function setItemSubmittedId(string $itemSubmittedId): void
    {
        $this->itemSubmittedId = $itemSubmittedId;
    }


    protected function createFinderStatus(): bool{
        return $this->createFinder();
    }

    private function createFinder(): bool {

        try {

            $createFinderQuery = "INSERT INTO finder(finder_fullname, finder_address, finder_phone, finder_id, finder_account_no, finder_id_no, finder_credits, finder_submitted_id) ";
//            $createFinderQuery .= "VALUES(?,?,?,?,?,?,?,?)";
            $createFinderQuery .= "VALUES(:finderName, :finderAddress, :finderPhone, :finderId, :finderAccountNo, :finderIdNo, :finderCredits, :finderSubmittedId)";
            $createFinderStmt = $this->connect()->prepare($createFinderQuery);
//
            $createFinderStmt->bindParam(":finderName", $this->finderFullName);
            $createFinderStmt->bindParam(":finderAddress", $this->finderAddress);
            $createFinderStmt->bindParam(":finderPhone", $this->finderPhone);
            $createFinderStmt->bindParam(":finderId", $this->finderId);
            $createFinderStmt->bindParam(":finderAccountNo", $this->finderAccount);
            $createFinderStmt->bindParam(":finderIdNo", $this->finderNationalIdCard);
            $createFinderStmt->bindParam(":finderCredits",$this->finderCredit);
            $createFinderStmt->bindParam(":finderSubmittedId", $this->itemSubmittedId);

            return $createFinderStmt->execute();
        }catch (Exception $exception) {
            echo "failed to create finder user \n". $exception->getMessage()."\n". $exception->getTraceAsString();
            return false;
        }

    }

    protected function getFinderStatus(): null| array {
        return $this->getFinder();
    }

    private function getFinder(): null|array {
        try {
            $getFinderQuery = "SELECT * FROM finder WHERE finder_id=:finderId";
            $getFinderStmt = $this->connect()->prepare($getFinderQuery);
            $getFinderStmt->bindParam(":finderId", $this->finderId);
            $getFinderStmt->execute();
            return $getFinderStmt->fetchAll();
        }catch (Exception $exception) {
            echo "failed to get finder ". $exception->getMessage();
            return null;
        }

    }

    protected function getAllFindersStatus(): null|array {
        return $this->getAllFinders();
    }

    private function getAllFinders(): null| array {
        try {
            $getFindersQuery = "SELECT * FROM finder";
            $getFindersStmt = $this->connect()->prepare($getFindersQuery);
            $getFindersStmt->execute();
            return $getFindersStmt->fetchAll();
        }catch (Exception $exception) {
            echo "failed to get finder ". $exception->getMessage();
            return null;
        }
    }

    protected function deleteFinderStatus(): bool {
        return $this->deleteFinder();
    }

    private function deleteFinder(): bool
    {
        try {
            $deleteFinderQuery = "DELETE FROM finder WHERE finder_id=:finderId";
            $deleteFinderStmt = $this->connect()->prepare($deleteFinderQuery);
            $deleteFinderStmt->bindParam(":finderId", $this->finderId);
            return $deleteFinderStmt->execute();
        }catch (Exception $exception) {
            echo "failed to get finder ". $exception->getMessage();
            return false;
        }
    }

    public function updateFinderStatus():bool {
        return $this->updateFinder();
    }

    private function updateFinder(): bool {

        try {

            $updateFinderQuery = "UPDATE finder SET finder_fullname=:finderFullName, finder_address=:finderAddress, finder_phone=:finderPhone, finder_account_no=:finderAccountNo, finder_id_no=:finderIdNo, finder_credits=:finderCredits WHERE finder_submitted_id=:finderSubmittedId";
            $updateFinderStmt = $this->connect()->prepare($updateFinderQuery);

            $updateFinderStmt->bindParam(":finderFullName", $this->finderFullName);
            $updateFinderStmt->bindParam(":finderAddress", $this->finderAddress);
            $updateFinderStmt->bindParam(":finderPhone", $this->finderPhone);
            $updateFinderStmt->bindParam(":finderAccountNo", $this->finderAccount);
            $updateFinderStmt->bindParam(":finderIdNo", $this->finderNationalIdCard);
            $updateFinderStmt->bindParam(":finderCredits", $this->finderCredit);
            $updateFinderStmt->bindParam(":finderSubmittedId", $this->itemSubmittedId);

            return $updateFinderStmt->execute();
        }catch (Exception $exception) {
            echo "Failed to update Finder \n". $exception->getMessage();
            return false;
        }

    }

    protected function addEarningsStatus(): bool {
        return self::addEarning();
    }

    private function addEarning(): bool {

        try {

            $selectEarningQuery = "SELECT finder_withdrawable FROM finder WHERE finder_id=:finderId";
            $selectEarningStmt = $this->connect()->prepare($selectEarningQuery);
            $selectEarningStmt->bindParam(":finderId", $this->finderId);
            $selectEarningStmt->execute();
            $earning = $selectEarningStmt->fetchColumn();
            $earning = $this->finderEarnings + $earning;

            $updateEarningsQuery = "UPDATE finder SET finder_withdrawable=:earning WHERE finder_id=:finderId";
            $updateEarningsStmt= $this->connect()->prepare($updateEarningsQuery);
            $updateEarningsStmt->bindParam(":finderId", $this->finderId);
            $updateEarningsStmt->bindParam(":earning", $earning);
            $result = $updateEarningsStmt->execute();
            $updateEarningsStmt->closeCursor();
            return $result;

        }catch (Exception $exception) {
            echo "Failed to update earnings \n". $exception->getMessage();
            return false;
        }
    }
}