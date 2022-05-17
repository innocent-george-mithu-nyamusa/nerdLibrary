<?php

namespace Classes;

class EnrollmentsContr extends Enrollments
{

    protected function setCStudentCourseId(string $studentCourseId): void
    {
        $studentCourseId = Utilities::cleanData($studentCourseId);

        parent::setStudentCourseId($studentCourseId);
    }

    protected function setCStudentId(string $studentId): void
    {
        $studentId = Utilities::cleanData($studentId);
        parent::setStudentId($studentId);
    }

    protected function setCEnrollId(): void
    {
        $enrollId = Utilities::genUniqueId("enr");
        parent::setEnrollId($enrollId);
    }

    protected function addCEnrollId(string $enrollId): void
    {
        $enrollId = Utilities::cleanData($enrollId);
        parent::setEnrollId($enrollId);
    }
}