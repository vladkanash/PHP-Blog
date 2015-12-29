<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/12/15
 * Time: 4:38 PM
 */
interface Storage_handler
{
    public function getAllPosts();

    public function addNewPost($subject, $text, $createdAt, $author);

    public function deletePost($id);
}