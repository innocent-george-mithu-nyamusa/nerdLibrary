<?php


namespace Classes;


use Exception;
use PDO;

class Application extends Dbh
{
    private string $applicationId;
    private string $applicantId;
    private string $applicationStatus;
    private string $applicantRole;

    /**
     * @param string $applicantRole
     */
    protected function setApplicantRole(string $applicantRole): void
    {
        $this->applicantRole = $applicantRole;
    }

    /**
     * @param string $applicationId
     */
    protected function setApplicationId(string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    /**
     * @param string $applicantId
     */
    protected function setApplicantId(string $applicantId): void
    {
        $this->applicantId = $applicantId;
    }

    /**
     * @param string $applicationStatus
     */
    protected function setApplicationStatus(string $applicationStatus): void
    {
        $this->applicationStatus = $applicationStatus;
    }

    protected function createApplicationStatus():bool {
        return $this->createApplication();
    }

    private function createApplication(): bool {
        try {
            $createApplicationQuery = "INSERT INTO application (application_id, applicant_id, applicant_role) VALUES (:applicationId, :applicantId, :applicantRole)";
            $createApplicationStmt = $this->connect()->prepare($createApplicationQuery);
            $createApplicationStmt->bindParam(":applicationId", $this->applicantId);
            $createApplicationStmt->bindParam(":applicantId", $this->applicantId);
            $createApplicationStmt->bindParam(":applicantRole", $this->applicantRole);
            $result = $createApplicationStmt->execute();
            $createApplicationStmt->closeCursor();
            return $result;
        }catch (Exception $exception){
            echo "failed to create application ". $exception->getMessage();
            return false;
        }
    }

    protected function getMyApplicationStatus(): ?array {
        return $this->getMyApplication();
    }

    private function getMyApplication(): ?array {
        try {
            $getMyApplicationQuery = "SELECT * FROM application WHERE applicant_id=:applicantId";
            $getMyApplicationStmt = $this->connect()->prepare($getMyApplicationQuery);
            $getMyApplicationStmt->bindParam(":applicantId", $this->applicantId);
            $getMyApplicationStmt->execute();
            $results = $getMyApplicationStmt->fetchAll(PDO::FETCH_ASSOC);
            $getMyApplicationStmt->closeCursor();

            return $results;
        }catch (Exception $exception) {
            echo "Failed to get your application".$exception->getMessage();
            return null;
        }
    }

    protected function getAllApplicationsStatus(): ?array {
        return self::getAllApplications();
    }

    private function getAllApplications(): ?array {
        try {
            $getMyApplicationQuery = "SELECT * FROM application";
            $getMyApplicationStmt = $this->connect()->prepare($getMyApplicationQuery);
            $getMyApplicationStmt->execute();
            $results = $getMyApplicationStmt->fetchAll(PDO::FETCH_ASSOC);
            $getMyApplicationStmt->closeCursor();

            return $results;
        }catch (Exception $exception) {
            echo "Failed to get all applications ".$exception->getMessage();
            return null;
        }
    }

    private function deleteApplication(): bool {
        try {
            $getMyApplicationQuery = "DELETE FROM application WHERE application_id=:applicationId";
            $getMyApplicationStmt = $this->connect()->prepare($getMyApplicationQuery);
            $getMyApplicationStmt->bindParam(":applicationId", $this->applicationId);
            $result = $getMyApplicationStmt->execute();
            $getMyApplicationStmt->closeCursor();

            return $result;
        }catch (Exception $exception) {
            echo "Failed to Delete application".$exception->getMessage();
            return false;
        }
    }



}