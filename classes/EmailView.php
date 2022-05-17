<?php


namespace Classes;


class EmailView extends EmailContr
{

    public function sendAccountVerificationEmail(string $name, string $email, string $userId) :bool
    {

        $this->setCRecipientEmail($email);
        $this->setCRecipientName($name);
        $this->setCVerificationCode();
        $this->setUserVerificationId($userId);

        return parent::verifyAccountStatus();
    }

    public function sendPasswordResetEmail(string $name, string $email, string $userId): bool{

        $this->setCRecipientEmail($email);
        $this->setCRecipientName($name);
        $this->setUserVerificationId($userId);
        $this->setCVerificationCode();
        return parent::passwordResetResult();
    }

}