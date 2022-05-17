<?php

namespace Classes;

use DateTime;

class CommentContr extends Comment
{

    protected function setCCommentId(): void
    {
        $commentId = Utilities::genUniqueId("com");
        parent::setCommentId($commentId);
    }

    protected function setCComment(string $comment): void
    {
        $comment = Utilities::cleanData($comment);
        parent::setComment($comment);
    }

    protected function setCCommentIsRoot(): void
    {
        parent::setCommentIsRoot(true);
    }

    protected function setCCommentIsNotRoot(): void
    {
        parent::setCommentIsRoot(false);
    }

    protected function setCCommentItemId(string $commentItemId): void
    {
        $commentItemId  = Utilities::cleanData($commentItemId);
        parent::setCommentItemId($commentItemId);
    }

    protected function setCCommentResponseId(string $commentResponseId): void
    {
        parent::setCommentResponseId($commentResponseId);
    }

    protected function setCommentResponseId(string $commentResponseId): void
    {
        parent::setCommentResponseId($commentResponseId);
    }

    protected function setCCommentorId(string $commentorId): void
    {
        parent::setCommentorId($commentorId); // TODO: Change the autogenerated stub
    }

}