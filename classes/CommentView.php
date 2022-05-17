<?php

namespace Classes;


class CommentView extends CommentContr
{
    public function createComment(
        string $comment,
        string $commentIsRoot,
        string $commentItemId,
        string $commentorId,
        string $commentResponseId = null
    ): bool
    {

        if($commentIsRoot == "true") {
            $this->setCCommentIsRoot();
        }else {
            $this->setCCommentIsNotRoot();
        }


        $this->setCComment($comment);
        $this->setCCommentResponseId($commentResponseId);
        $this->setCCommentItemId($commentItemId);
        $this->setCCommentId();
        $this->setCCommentorId($commentorId);

        return parent::createCommentStatus();
    }

    public function getId(): string
    {
        return parent::getCommentId();
    }

    public function getAllItemRootComments(string $itemId): bool|array
    {
        $this->setCCommentItemId($itemId);
        return parent::getAllItemrootCommentsResult();
    }

    public function getNumberOfCommentsOfItem(string $itemId): bool|int
    {
        $this->setCCommentItemId($itemId);
        return parent::getNumberOfCommentsOfItemResults();
    }

    public function getAllReplyComments(string $itemId, string $responseId): bool|array
    {
        $this->setCCommentResponseId($responseId);
        $this->setCCommentItemId($itemId);
        return parent::getAllItemRootReplyCommentsResult();
    }

    public function getNumberOfComments(string  $itemId, bool $isRoot = true):bool|int {

        $this->setCCommentItemId($itemId);
        $this->setCCommentResponseId($itemId);
       return $isRoot ? $this->getNumberOfRootCommentsOfItemResults() : $this->getNumberOfReplyCommentsResults();
    }

    public function getNumberOfSeriesComments(string  $itemId):bool|int {

            $this->setCCommentItemId($itemId);
           return $this->getNumberOfSeriesCommentsResult();
        }




}