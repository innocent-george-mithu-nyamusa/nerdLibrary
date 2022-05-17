<?php


namespace Classes;

class UserContr extends User
{
    private string $cUserId;

    /**
     * @param string $cUserFacebook
     */
    public function setCUserFacebook(string $cUserFacebook): void
    {
        $cUserFacebook1 = Utilities::cleanData($cUserFacebook);
        $this->setUserFacebook($cUserFacebook1);
    }

    /**
     * @param string $cUserBio
     */
    protected function setCUserBio(string $cUserBio): void
    {
        $cUserBio1 = Utilities::cleanData($cUserBio);
        $this->setUserBio($cUserBio1);
    }

    protected function setCAccountHolder(string $accountHolder): void
    {
        $accountHolder = Utilities::cleanData($accountHolder);
        parent::setAccountHolder($accountHolder);
    }

    protected function setCAccountType(string $accountType): void
    {
        $accountType = Utilities::cleanData($accountType);
        parent::setAccountType($accountType);
    }

    protected function setCAccountNumber(string $accountNumber): void
    {
        $accountNumber = Utilities::cleanData($accountNumber);
        parent::setAccountNumber($accountNumber);
    }
    protected function setCUserFullname(string $userFullname): void
    {
        $userFullname = Utilities::cleanData($userFullname);
        parent::setUserFullname($userFullname);
    }

    protected function setCBankName(string $bankName): void
    {
        parent::setBankName($bankName);
    }

    /**
     * @param string $CUserLinkedIn
     */
    protected function setCUserLinkedIn(string $CUserLinkedIn): void
    {
        $CUserLinkedIn1 = Utilities::cleanData($CUserLinkedIn);
        $this->setUserLinkedIn($CUserLinkedIn1);
    }

    /**
     * @param string $cUserTown
     */
    protected function setCUserTown(string $cUserTown): void
    {
        $cUserTown1 = Utilities::cleanData($cUserTown);
        $this->setUserTown($cUserTown1);
    }

    /**
     * @param string $cUserCountry
     */
    protected function setCUserCountry(string $cUserCountry): void
    {
        $cUserCountry1 = Utilities::cleanData($cUserCountry);
        $this->setUserCountry($cUserCountry1);
    }

    /**
     * @param string $cUserStreet
     */
    protected function setCUserStreet(string $cUserStreet): void
    {
        $cUserStreet1 = Utilities::cleanData($cUserStreet);
        $this->setUserStreet($cUserStreet1);
    }

    /**
     * @param string $cUserFloor
     */
    protected function setCUserFloor(string $cUserFloor): void
    {
        $cUserFloor1 = Utilities::cleanData($cUserFloor);
        $this->setUserFloor($cUserFloor1);
    }

    /**
     * @param mixed $cEmail
     */
    protected function setCEmail($cEmail): void
    {
        $cEmail1 = Utilities::cleanData($cEmail);
        $this->setUserEmail($cEmail1);
    }

    /**
     * @param string $cFirstname
     */
    protected function setCFullname(string $cFirstname): void
    {
        $cFirstname1 = Utilities::cleanData($cFirstname);
        $this->setUserFullName($cFirstname1);
    }


    /**
     * @param string $cUserBuilding
     */
    protected function setCUserBuilding(string $cUserBuilding): void
    {
        $cUserBuilding1 = Utilities::cleanData($cUserBuilding);
        $this->setUserBuilding($cUserBuilding1);
    }

    /**
     * @param mixed $cUserPhone
     */
    protected function setCUserPhone($cUserPhone): void
    {
        $cUserPhone1 = Utilities::cleanData($cUserPhone);
        $this->setUserPhone($cUserPhone1);
    }

    protected function setCUserDoB($cDoB): void
    {
        $Dob = Utilities::cleanData($cDoB);
        $this->setUserDoB($Dob);
    }

    protected function setCUserImage($cImage): void
    {
        $cUserImage = Utilities::cleanData($cImage);
        $this->setUserImage($cUserImage);
    }

    protected function addUserId($id)
    {
        $this->cUserId = Utilities::cleanData($id);
        $this->checkUserId();
    }


    private function checkUserId()
    {
        $this->setUserId($this->cUserId);
    }

    protected function setCUsername(string $username): void
    {
        parent::setUsername($username);
    }

    protected function setCUserOldPassword(string $userOldPassword): void
    {
        $userOldPassword = Utilities::cleanData($userOldPassword);
        parent::setUserOldPassword($userOldPassword);
    }

    protected function setCNewPassword(string $newPassword): void
    {
        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT, array("cost"=> 12));
        parent::setNewPassword($newPassword);
    }

    protected function setCEarnings(float $earnings): void
    {
        $earnings = Utilities::cleanData($earnings);
        parent::setEarnings($earnings);
    }


    protected function setCAdminEarnings(float $adminEarnings): void
    {
        parent::setAdminEarnings($adminEarnings);
    }

    protected function addVerificationCode(string $verificationCode): void {
        $verificationCode = Utilities::cleanData($verificationCode);
        parent::setVerificationCode($verificationCode);
    }

    protected function setCUserCoverImage(string $userCoverImage): void
    {
        parent::setUserCoverImage($userCoverImage);
    }
    protected function setCUserProfileImage(string $userCoverImage): void
    {
        parent::setUserCoverImage($userCoverImage);
    }

    protected function setCBackupEmail(string $backupEmail): void
    {
        $backupEmail = Utilities::cleanData($backupEmail);
        parent::setBackupEmail($backupEmail);
    }

    protected function setCUserAddress(string $userAddress): void
    {
        $userAddress = Utilities::cleanData($userAddress);
        parent::setUserAddress($userAddress);
    }


}