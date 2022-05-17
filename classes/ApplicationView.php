<?php


namespace Classes;


class ApplicationView extends ApplicationContr
{
    public function createApplication(string $applicantId, string $applicantRole): bool
    {
        $this->setCApplicantId($applicantId);
        $this->setCApplicantRole($applicantRole);

        return parent::createApplicationStatus();
    }
}