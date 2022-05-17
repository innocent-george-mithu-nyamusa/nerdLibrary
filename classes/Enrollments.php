<?php

namespace Classes;

use PDO;

class Enrollments extends Dbh
{

    private string $studentId;
    private string $studentCourseId;
    private string $enrollId;

    /**
     * @param string $enrollId
     */
    protected function setEnrollId(string $enrollId): void
    {
        $this->enrollId = $enrollId;
    }

    /**
     * @param string $studentCourseId
     */
    protected function setStudentCourseId(string $studentCourseId): void
    {
        $this->studentCourseId = $studentCourseId;
    }

    /**
     * @param string $studentId
     */
    protected function setStudentId(string $studentId): void
    {
        $this->studentId = $studentId;
    }


    protected function enrollInCourseStatus(): bool {
        return $this->enrollInCourse();
    }

    private function enrollInCourse(): bool {
        try {

            $enrollInCourseQuery = "INSERT INTO enrollment(enrolled_id, enrolled_student_id, enrolled_course_id) VALUES(:enrollId, :enrollStudentId, :enrollCourseId)";
            $enrollInCourseStmt = $this->connect()->prepare($enrollInCourseQuery);
            $enrollInCourseStmt->bindParam(":enrollId", $this->enrollId);
            $enrollInCourseStmt->bindParam(":enrollStudentId", $this->studentId);
            $enrollInCourseStmt->bindParam(":enrollCourseId", $this->studentCourseId);
            $status = $enrollInCourseStmt->execute();
            $enrollInCourseStmt->closeCursor();
            return $status;
        }catch (\Exception $exception) {
            echo "Failed to enroll in course ". $exception->getMessage();
        }
    }

    protected function getNumberOfEnrolledStudents(): int {
        return $this->numberOfEnrolledStudents();

    }

    private function numberOfEnrolledStudents()
    {
        try {
            $numberOfEnrolledStudentsQuery = "SELECT COUNT(enrolled_id) FROM enrollment WHERE  enrolled_course_id=:enrolledCourseId";
            $numberOfEnrolledStudentsStmt = $this->connect()->prepare($numberOfEnrolledStudentsQuery);
//            $numberOfEnrolledStudentsStmt->bindParam(":enrolledId", $this->studentId);
            $numberOfEnrolledStudentsStmt->bindParam(":enrolledCourseId", $this->studentCourseId);
            $numberOfEnrolledStudentsStmt->execute();
            $totalStudents = $numberOfEnrolledStudentsStmt->fetchColumn();
            $numberOfEnrolledStudentsStmt->closeCursor();

            return $totalStudents;

        }catch (\Exception $exception) {
            echo "Failed to get that number of students ". $exception->getMessage();
            return 0;
        }
    }

    protected function myEnrollmentsResult(): array|null {
        return $this->getMyEnrollments();
    }

    private function getMyEnrollments(): array|null {

        try {
            $getMyEnrollmentsQuery = "SELECT * FROM enrollment WHERE enrolled_student_id=:studentId";
            $getMyEnrollmentsStmt = $this->connect()->prepare($getMyEnrollmentsQuery);
            $getMyEnrollmentsStmt->bindParam(":studentId", $this->studentId);
            $getMyEnrollmentsStmt->execute();
            $results = $getMyEnrollmentsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getMyEnrollmentsStmt->closeCursor();
            return $results;
        }catch (\Exception $exception) {
            echo "Failed to get enrollments ". $exception->getMessage();
            return null;
        }
    }

    protected function myNumberOfTracksEnrollmentsResult(): int {
        return $this->myNumberEnrollments();
    }

    private function myNumberEnrollments(): int {

        try {
            $getMyEnrollmentsQuery = "SELECT COUNT(enrolled_course_id) FROM enrollment WHERE enrolled_student_id=:studentId";
            $getMyEnrollmentsStmt = $this->connect()->prepare($getMyEnrollmentsQuery);
            $getMyEnrollmentsStmt->bindParam(":studentId", $this->studentId);
            $getMyEnrollmentsStmt->execute();
            $results = $getMyEnrollmentsStmt->fetchColumn();
            $getMyEnrollmentsStmt->closeCursor();

            return $results;
        }catch (\Exception $exception) {
            echo "Failed to get enrollments ". $exception->getMessage();
            return 0;
        }
    }

    protected function myLatestEnrollmentsResult(): array|null {
        return $this->getMyLatestEnrollments();
    }

    private function getMyLatestEnrollments(): array|null {

        try {
            $getMyEnrollmentsQuery = "SELECT * FROM enrollment WHERE enrolled_student_id=:studentId ORDER BY enrolled_date LIMIT 4";
            $getMyEnrollmentsStmt = $this->connect()->prepare($getMyEnrollmentsQuery);
            $getMyEnrollmentsStmt->bindParam(":studentId", $this->studentId);
            $getMyEnrollmentsStmt->execute();
            $results = $getMyEnrollmentsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getMyEnrollmentsStmt->closeCursor();
            return $results;
        }catch (\Exception $exception) {
            echo "Failed to get enrollments ". $exception->getMessage();
            return null;
        }
    }

    protected function isEnrolledStatus(): bool {
        return $this->isEnrolled();
    }

    private function isEnrolled(): bool {

        try {
            $checkEnrollmentQuery = "SELECT COUNT(*) FROM enrollment WHERE enrolled_student_id=:enrolledStudentId AND enrolled_course_id=:enrolledCourseId";
            $checkEnrollmentStmt = $this->connect()->prepare($checkEnrollmentQuery);
            $checkEnrollmentStmt->bindParam(":enrolledStudentId", $this->studentId);
            $checkEnrollmentStmt->bindParam(":enrolledCourseId", $this->studentCourseId);
            $checkEnrollmentStmt->execute();
            $result = $checkEnrollmentStmt->fetchColumn();
            $checkEnrollmentStmt->closeCursor();
            return $result;

        }catch (\Exception $exception) {
            echo "Failed to check if user has enrolled for a course " . $exception->getMessage();
            return false;
        }
    }
}