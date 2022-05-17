<?php


namespace Classes;


use PDO;

class Card extends Dbh
{
    private string $cardId;
    private string $cardNumber;
    private string $cardBankName;
    private string $bankCardName;
    private string $cardCvv;
    private string $cardOwnerId;
    private string $cardExpiry;
    private string $cardOwnerName;
    private int $cardZip;

    /**
     * @param string $cardOwnerId
     */
    public function setCardOwnerId(string $cardOwnerId): void
    {
        $this->cardOwnerId = $cardOwnerId;
    }

    /**
     * @param string $bankCardName
     */
    protected function setBankCardName(string $bankCardName): void
    {
        $this->bankCardName = $bankCardName;
    }

    /**
     * @param string $cardBankName
     */
    protected function setCardBankName(string $cardBankName): void
    {
        $this->cardBankName = $cardBankName;
    }

    /**
     * @param string $paymentType
     */
    protected function setPaymentType(string $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @param string $mobileNumber
     */
    protected function setMobileNumber(string $mobileNumber): void
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * @param int $cardZip
     */
    protected function setCardZip(int $cardZip): void
    {
        $this->cardZip = $cardZip;
    }

    /**
     * @param string $cardOwnerName
     */
    protected function setCardOwnerName(string $cardOwnerName): void
    {
        $this->cardOwnerName = $cardOwnerName;
    }

    /**
     * @param string $cardExpiry
     */
    protected function setCardExpiry(string $cardExpiry): void
    {
        $this->cardExpiry = $cardExpiry;
    }



    /**
     * @param int $cardCvv
     */
    protected function setCardCvv(string $cardCvv): void
    {
        $this->cardCvv = $cardCvv;
    }

    /**
     * @param int $cardNumber
     */
    protected function setCardNumber(string $cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * @param string $cardId
     */
    protected function setCardId(string $cardId): void
    {
        $this->cardId = $cardId;
    }

    protected function createCardStatus(): bool {
        return $this->createCard();
    }

    private function createCard(): bool {
        try {

            $cardAddQuery = "INSERT INTO card(card_id, card_number, card_cvv, card_owner, card_owner_full_name, card_expiry, card_zip) VALUES(:cardId, :cardNumber,:cardCvv, :cardOwner, :cardOwnerName, :cardExpiry, :cardZip)";
            $cardAddStmt = $this->connect()->prepare($cardAddQuery);
            $cardAddStmt->bindParam(":cardId", $this->cardId);
            $cardAddStmt->bindParam(":cardNumber", $this->cardNumber);
            $cardAddStmt->bindParam(":cardCvv", $this->cardCvv);
            $cardAddStmt->bindParam(":cardOwner", $this->cardOwnerId);
            $cardAddStmt->bindParam(":cardOwnerName", $this->cardOwnerName);
            $cardAddStmt->bindParam(":cardExpiry", $this->cardExpiry);
            $cardAddStmt->bindParam(":cardZip", $this->cardZip);
            $result =$cardAddStmt->execute();
            $cardAddStmt->closeCursor();

            return $result;
        }catch (\Exception $exception) {
            echo "Failed to create card ". $exception->getMessage();
            return false;
        }
    }

    protected function updateCardStatus(): bool {
        return $this->updateCard();
    }

    private function updateCard(): bool {
        try {

            $cardAddQuery = "UPDATE card SET card_number=:cardNumber, card_cvv=:cardCvv, card_owner_full_name=:cardOwnerName, card_expiry=:cardExpiry, card_zip=:cardZip WHERE card_owner=:cardOwner";
            $cardAddStmt = $this->connect()->prepare($cardAddQuery);
            $cardAddStmt->bindParam(":cardId", $this->cardId);
            $cardAddStmt->bindParam(":cardNumber", $this->cardNumber);
            $cardAddStmt->bindParam(":cardCvv", $this->cardCvv);
            $cardAddStmt->bindParam(":cardOwner", $this->cardOwnerId);
            $cardAddStmt->bindParam(":cardOwnerName", $this->cardOwnerName);
            $cardAddStmt->bindParam(":cardExpiry", $this->cardExpiry);
            $cardAddStmt->bindParam(":cardZip", $this->cardZip);
            $result =$cardAddStmt->execute();
            $cardAddStmt->closeCursor();

            return $result;
        }catch (\Exception $exception) {
            echo "Failed to update card ". $exception->getMessage();
            return false;
        }
    }

    protected function getCardResult(): ?array {
        return $this->getCard();
    }

    private function getCard():?array {

        try {

            $getCardQuery = "SELECT * FROM card WHERE card_owner=:cardOwner ";
            $getCardStmt = $this->connect()->prepare($getCardQuery);
            $getCardStmt->bindParam(":cardOwner", $this->cardOwnerId);
            $getCardStmt->execute();
            $results = $getCardStmt->fetchAll(PDO::FETCH_ASSOC);
            $getCardStmt->closeCursor();
            return $results[0];

        }catch (\Exception $exception) {
            echo "Failed get card ".$exception->getMessage();
        }
    }
}