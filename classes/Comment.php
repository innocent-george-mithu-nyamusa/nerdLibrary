<?php

namespace Classes;

use DateTime;
use Exception;
use PDO;

class Comment extends Dbh
{

    private string $commentId;
    private string $comment;
    private string $commentorId;
    private string $commentItemId;
    private bool $commentIsRoot;
    private string $commentResponseId="null";

    /**
     * @return string
     */
    protected function getCommentId(): string
    {
        return $this->commentId;
    }

    /**
     * @param string $commentId
     */
    protected function setCommentId(string $commentId): void
    {
        $this->commentId = $commentId;
    }

    /**
     * @param bool $commentIsRoot
     */
    protected function setCommentIsRoot(bool $commentIsRoot): void
    {
        $this->commentIsRoot = $commentIsRoot;
    }

    /**
     * @param string $commentResponseId
     */
    protected function setCommentResponseId(string $commentResponseId): void
    {
        $this->commentResponseId = $commentResponseId;
    }

    /**
     * @param string $commentItemId
     */
    protected function setCommentItemId(string $commentItemId): void
    {
        $this->commentItemId = $commentItemId;
    }

    /**
     * @param string $commentorId
     */
    protected function setCommentorId(string $commentorId): void
    {
        $this->commentorId = $commentorId;
    }

    /**
     * @param string $comment
     */
    protected function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    protected function createCommentStatus(): bool {

        return $this->createComment();
    }

    private function createComment():bool
    {
        try {

            $commentIsRoot = isset($this->commentIsRoot) ? $this->commentIsRoot : false;

            $createCommentQuery = "INSERT INTO comment(comment_id, comment_item_id, comment_response_id, commentor_id, comment, comment_is_root) VALUES (:commentId, :commentItemId,:commentResponseId, :commentorId, :comment, :commentIsRoot)";
            $createCommentStmt = $this->connect()->prepare($createCommentQuery);
            $createCommentStmt->bindParam(":commentId", $this->commentId);
            $createCommentStmt->bindParam(":commentItemId", $this->commentItemId);
            $createCommentStmt->bindParam(":commentResponseId", $this->commentResponseId);
            $createCommentStmt->bindParam(":commentorId", $this->commentorId);
            $createCommentStmt->bindParam(":comment", $this->comment);

            if ($commentIsRoot == 1){
                $createCommentStmt->bindParam(":commentIsRoot", $commentIsRoot);
            }else {
                $commentIsRoot = 0;
                $createCommentStmt->bindParam(":commentIsRoot", $commentIsRoot);
            }

            $result = $createCommentStmt->execute();
            $createCommentStmt->closeCursor();
            return $result;

        }catch (Exception $exception) {
            echo "Failed to create a new comment ". $exception->getMessage(). $exception->getTraceAsString();
            return false;
        }
    }

    protected function getAllItemRootCommentsResult() :bool|array {
        return $this->getAllItemRootComments();
    }

    private function getAllItemRootComments(): bool|array {
        try {
            $getAllCommentsQuery = "SELECT * FROM comment WHERE comment_item_id=:commentItemId AND comment_is_root='1' ORDER BY comment_date DESC ";
            $getAllCommentsStmt = $this->connect()->prepare($getAllCommentsQuery);
            $getAllCommentsStmt->bindParam(":commentItemId", $this->commentItemId);
            $getAllCommentsStmt->execute();
            $comments = $getAllCommentsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getAllCommentsStmt->closeCursor();

            return $comments;
        }catch (Exception $exception) {
            echo "Failed to obtain all comments" . $exception->getMessage();
            return false;
        }
    }


    protected function getAllItemRootReplyCommentsResult() :bool|array {
        return $this->getAllItemRootReplyComments();
    }

    private function getAllItemRootReplyComments(): bool|array {
        try {
            $getAllCommentsQuery = "SELECT * FROM comment WHERE comment_item_id=:commentItemId AND comment_response_id=:commentResponseId AND comment_is_root='0' ORDER BY comment_item_id";
            $getAllCommentsStmt = $this->connect()->prepare($getAllCommentsQuery);
            $getAllCommentsStmt->bindParam(":commentItemId", $this->commentItemId);
            $getAllCommentsStmt->bindParam(":commentResponseId", $this->commentResponseId);
             $getAllCommentsStmt->execute();
            $comments = $getAllCommentsStmt->fetchAll(PDO::FETCH_ASSOC);
            $getAllCommentsStmt->closeCursor();

            return $comments;
        }catch (Exception $exception) {
            echo "Failed to obtain all comments" . $exception->getMessage();
            return false;
        }
    }

    protected function getNumberOfRootCommentsOfItemResults():bool|int {
        return $this->getNumberOfRootCommentsOfItem();
    }

    private function getNumberOfRootCommentsOfItem(): bool|int{

        try {

            $getNumberOfCommentsQuery =  "SELECT COUNT(comment_id) FROM comment WHERE comment_is_root='1' AND comment_item_id=:commentItemId";
            $getNumberOfCommentsStmt = $this->connect()->prepare($getNumberOfCommentsQuery);
            $getNumberOfCommentsStmt->bindParam(":commentItemId", $this->commentItemId);
            $getNumberOfCommentsStmt->execute();
            $noOfComments = $getNumberOfCommentsStmt->fetchColumn();
            $getNumberOfCommentsStmt->closeCursor();

            return $noOfComments;
        }catch (Exception $exception) {

            echo "Failed to get number of comments" . $exception->getMessage(). $exception->getTraceAsString();
            return 0;
        }
    }

    protected function getNumberOfCommentsOfItemResults():bool|int {
        return $this->getNumberOfCommentsOfItem();
    }

    private function getNumberOfCommentsOfItem(): bool|int {

        try {

            $getNumberOfCommentsQuery =  "SELECT COUNT(comment_id) FROM comment WHERE comment_item_id=:commentItemId";
            $getNumberOfCommentsStmt = $this->connect()->prepare($getNumberOfCommentsQuery);
            $getNumberOfCommentsStmt->bindParam(":commentItemId", $this->commentItemId);
            $getNumberOfCommentsStmt->execute();
            $noOfComments = $getNumberOfCommentsStmt->fetchColumn();
            $getNumberOfCommentsStmt->closeCursor();

            return $noOfComments;

        }catch (Exception $exception) {

            echo "Failed to get number of comments" . $exception->getMessage(). $exception->getTraceAsString();
            return 0;
        }
    }

    protected function getNumberOfReplyCommentsResults():bool|int {
        return $this->getNumberOfReplyCommentsOfItem();
    }

    private function getNumberOfReplyCommentsOfItem(): bool|int{

        try {

            $getNumberOfCommentsQuery =  "SELECT COUNT(comment_id) FROM comment WHERE comment_is_root='0' AND comment_item_id=:commentItemId AND comment_response_id=:commentResponseId";
            $getNumberOfCommentsStmt = $this->connect()->prepare($getNumberOfCommentsQuery);
            $getNumberOfCommentsStmt->bindParam(":commentItemId", $this->commentItemId);
            $getNumberOfCommentsStmt->bindParam(":commentResponseId", $this->commentResponseId);
            $getNumberOfCommentsStmt->execute();
            $noOfComments = $getNumberOfCommentsStmt->fetchColumn();
            $getNumberOfCommentsStmt->closeCursor();

            return $noOfComments;

        }catch (Exception $exception) {

            echo "Failed to get number of comments" . $exception->getMessage().$exception->getTraceAsString();
            return 0;
        }
    }

    protected function getNumberOfSeriesCommentsResult(): int {
        return $this->getNumberOfSeriesComments();
    }



    private function getNumberOfSeriesComments(): int {
        try {

            $getNumberOfSeriesCommentsQuery = "SELECT COUNT(comment.comment_id) FROM ((comment INNER JOIN episode ON episode.episode_id = comment.comment_item_id) INNER JOIN chapter ON chapter.chapter_id = episode.episode_chapter_id) WHERE chapter.chapter_series=:chapterSeriesId";
            $getNumberOfSeriesCommentsStmt = $this->connect()->prepare($getNumberOfSeriesCommentsQuery);
            $getNumberOfSeriesCommentsStmt->bindParam(":chapterSeriesId", $this->commentItemId);
            $getNumberOfSeriesCommentsStmt->execute();
            $result = $getNumberOfSeriesCommentsStmt->fetchColumn();
            $getNumberOfSeriesCommentsStmt->closeCursor();

            return $result;

        }catch (Exception $exception) {
            echo "Failed to get number of comments" . $exception->getMessage().$exception->getTraceAsString();
            return 0;
        }
    }

}