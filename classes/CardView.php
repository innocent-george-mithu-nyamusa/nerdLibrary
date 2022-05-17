<?php


namespace Classes;


class CardView extends CardContr
{
    public function createCard(string $bankCardName, string $cardBankName, string $cardNumber, string $cardCvv, string $ownerId, string $ownerFullname, string $cardExpiry, int $cardZip): bool
    {
        $this->setBankCardName($bankCardName);
        $this->setCCardBankName($cardBankName);
        $this->setCCardCvv($cardCvv);
        $this->setCCardId();
        $this->setCCardNumber($cardNumber);
        $this->setCCardOwnerId($ownerId);
        $this->setCCardOwnerName($ownerFullname);
        $this->setCCardZip($cardZip);
        $this->setCCardExpiry($cardExpiry);

        return parent::createCardStatus();
    }

    public function updateCard(string $bankCardName, string $cardBankName, string $cardNumber, string $cardCvv, string $ownerId, string $ownerFullname, string $cardExpiry, int $cardZip): bool
    {

        $this->setBankCardName($bankCardName);
        $this->setCCardBankName($cardBankName);
        $this->setCCardCvv($cardCvv);
        $this->setCCardNumber($cardNumber);
        $this->setCCardOwnerId($ownerId);
        $this->setCCardOwnerName($ownerFullname);
        $this->setCCardZip($cardZip);
        $this->setCCardExpiry($cardExpiry);

        return parent::updateCardStatus();
    }

    public function getCard(string $ownerId): ?array {
        $this->setCCardOwnerId($ownerId);

        return parent::getCardResult();
    }

}