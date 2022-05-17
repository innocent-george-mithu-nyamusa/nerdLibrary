<?php


namespace Classes;


class CardContr extends Card
{
    protected function setCCardOwnerId(string $cardOwnerId): void
    {
        $cardOwnerId = Utilities::cleanData($cardOwnerId);
        parent::setCardOwnerId($cardOwnerId);
    }

    protected function setCCardCvv(string $cardCvv): void
    {
        $cardCvv = Utilities::cleanData($cardCvv);
        parent::setCardCvv($cardCvv);
    }

    protected function setCCardBankName(string $cardBankName): void
    {
        $cardBankName = Utilities::cleanData($cardBankName);
        parent::setCardBankName($cardBankName);
    }

    protected function setCBankCardName(string $bankCardName): void
    {
        $bankCardName = Utilities::cleanData($bankCardName);
        parent::setBankCardName($bankCardName);
    }

    protected function setCCardId(): void
    {
        $cardId = Utilities::genUniqueId("crd");
        parent::setCardId($cardId);
    }

    protected function setCCardZip(int $cardZip): void
    {
        $cardZip = Utilities::cleanData($cardZip);
        parent::setCardZip($cardZip);
    }

    protected function setCCardOwnerName(string $ownerName): void
    {
        $ownerName = Utilities::cleanData($ownerName);
        parent::setCardOwnerName($ownerName);

    }

    protected function setCCardExpiry(string $expiryDate): void
    {
        $expiryDate = Utilities::cleanData($expiryDate);
        parent::setCardExpiry($expiryDate);
    }

    protected function setCCardNumber(string $cardNumber): void
    {
        $cardNumber = Utilities::cleanData($cardNumber);
        parent::setCardNumber($cardNumber);
    }


}