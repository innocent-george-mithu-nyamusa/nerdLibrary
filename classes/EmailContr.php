<?php

namespace Classes;

class EmailContr extends Emailer
{

    protected function setCRecipientEmail(string $recipientEmail): void
    {
        $recipientEmail = Utilities::cleanData($recipientEmail);
        parent::setRecipientEmail($recipientEmail);
    }

    protected function setCRecipientName(string $recipientName): void
    {
        $recipientName = Utilities::cleanData($recipientName);
        parent::setRecipientName($recipientName);
    }

    protected function setCVerificationCode(): void
    {

        $utilities  = new Utilities();
        $verificationCode =$utilities->generateCode();

        parent::setVerificationCode($verificationCode);
    }

    protected function setCUserVerificationId(string $userVerificationId): void
    {
        $userVerificationId = Utilities::cleanData($userVerificationId);
        parent::setUserVerificationId($userVerificationId);
    }
}