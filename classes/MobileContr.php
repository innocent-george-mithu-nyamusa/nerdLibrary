<?php


namespace Classes;


class MobileContr extends Mobile
{
        protected function setCMobileNumber(string $mobileNumber): void
        {
            parent::setMobileNumber($mobileNumber);
        }

        protected function setCMobileNumberOwner(string $mobileNumberOwner): void
        {

            parent::setMobileNumberOwner($mobileNumberOwner);
        }

        protected function setCMobileOptionId(): void
        {
            $mobileOptionId = Utilities::genUniqueId("mob");
            parent::setMobileOptionId($mobileOptionId);
        }

        protected function setCMobilePaymentType(string $mobilePaymentType): void
        {
            $mobilePaymentType = Utilities::cleanData($mobilePaymentType);
            parent::setMobilePaymentType($mobilePaymentType);
        }

        protected function setCMobileType(string $mobileType): void
        {
            $mobileType = Utilities::cleanData($mobileType);
            parent::setMobileType($mobileType);
        }
}