<?php

namespace Classes;

class EnrollmentsView extends EnrollmentsContr
{

    /**
     * @param string $courseId
     * @param string $studentId
     *
     * The method adds a user to a course series
     * @return bool
     */
    public function enrolCourse(string $courseId, string $studentId): bool {
        $this->setCEnrollId();
        $this->setCStudentCourseId($courseId);
        $this->setCStudentId($studentId);

        return $this->enrollInCourseStatus();
    }

    /**
     * @param string $courseId
     * @param string $Id
     *
     * The method Gets Number of Students in particluar Course
     * By a particular lecturer/Organization With The $id
     * @return int
     */
    public function getNumberOfStudentsForCourse(string $courseId, string $Id): int {

        $this->setCStudentId($Id);
        $this->setCStudentCourseId($courseId);

        return $this->getNumberOfEnrolledStudents();
    }

    public function myEnrollments($studentId): ?array{
        $this->setCStudentId($studentId);

        return $this->myEnrollmentsResult();
    }
      public function myNumberOfTracksEnrollments($studentId): ?int{
        $this->setCStudentId($studentId);

        return $this->myNumberOfTracksEnrollmentsResult();
    }



    public function myLatestEnrollments($studentId): array|null {
        $this->setCStudentId($studentId);
        return $this->myLatestEnrollmentsResult();
    }

    public function isEnrolled(string $Id, string $courseId): bool
    {
        $this->setCStudentId($Id);
        $this->setCStudentCourseId($courseId);
        return parent::isEnrolledStatus();
    }


}