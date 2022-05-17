<?php

namespace Classes;

Abstract Class Post extends Dbh
{
    abstract protected function createPostResult():bool;
    abstract protected function updatePostResult():bool;
    abstract protected function deletePostResult():bool;
    abstract protected function getPostsResult():?array;
    abstract protected function getPostResult():?array;

}