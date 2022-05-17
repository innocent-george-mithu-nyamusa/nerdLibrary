<?php


namespace Classes;


class MobileView extends MobileContr
{
    public function createMobileOption(string $mobileNumber, string $ownerId,  string $mobileAccType, string $mobilePaymentType): bool
    {
        $this->setCMobileNumber($mobileNumber);
        $this->setCMobileNumberOwner($ownerId);
        $this->setCMobileOptionId();
        $this->setCMobilePaymentType($mobilePaymentType);
        $this->setCMobileType($mobileAccType);

        return parent::createMobileOptionStatus();
    }

}