<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/13/15
 * Time: 2:57 AM
 */
class storage_binary implements storage_handler
{

    private $binaryStoragePath = "../storage/storage.bin";

    public function getAllPosts()
    {

    }

    public function addNewPost($subject, $text, $createdAt, $author)
    {

    }

    public function deletePost($id)
    {
        // TODO: Implement deletePost() method.
    }


}