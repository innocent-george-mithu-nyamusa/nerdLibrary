<?php


namespace Classes;


class Mobile extends Dbh
{
    private string $mobileOptionId;
    private string $mobileNumber;
    private string $mobileNumberOwner;
    private string $mobileType;
    private string $mobilePaymentType;

    /**
     * @param string $mobilePaymentType
     */
    protected function setMobilePaymentType(string $mobilePaymentType): void
    {
        $this->mobilePaymentType = $mobilePaymentType;
    }

    /**
     * @param string $mobileType
     */
    protected function setMobileType(string $mobileType): void
    {
        $this->mobileType = $mobileType;
    }

    /**
     * @param string $mobileNumberOwner
     */
    protected function setMobileNumberOwner(string $mobileNumberOwner): void
    {
        $this->mobileNumberOwner = $mobileNumberOwner;
    }

    /**
     * @param string $mobileNumber
     */
    protected function setMobileNumber(string $mobileNumber): void
    {
        $this->mobileNumber = $mobileNumber;
    }


    /**
     * @param string $mobileOptionId
     */
    protected function setMobileOptionId(string $mobileOptionId): void
    {
        $this->mobileOptionId = $mobileOptionId;
    }

    protected function createMobileOptionStatus(): bool {
        return $this->createMobilOption();
    }

    private function createMobilOption() : bool {
        try {

            $createMobilePayment = "INSERT INTO mobile(mobile_id, mobile_type, mobile_number, mobile_owner, mobile_payment_type) VALUES (:mobileId, :mobileType, :mobileNumber, :mobileOwner, :mobilePaymentType)";
            $createMobilePaymentStmt = $this->connect()->prepare($createMobilePayment);
            $createMobilePaymentStmt->bindParam(":mobileType", $this->mobileType);
            $createMobilePaymentStmt->bindParam(":mobileId", $this->mobileOptionId);
            $createMobilePaymentStmt->bindParam(":mobileNumber", $this->mobileNumber);
            $createMobilePaymentStmt->bindParam(":mobileOwner", $this->mobileNumberOwner);
            $createMobilePaymentStmt->bindParam(":mobilePaymentType", $this->mobilePaymentType);
            $result = $createMobilePaymentStmt->execute();
            $createMobilePaymentStmt->closeCursor();

            return $result;
        }catch (\Exception $exception) {
            echo "Failed to create mobile payment option ". $exception->getMessage();
            return false;
        }
    }

}