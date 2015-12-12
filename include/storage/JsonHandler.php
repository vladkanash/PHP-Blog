<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/12/15
 * Time: 4:45 PM
 */

include_once('Handler.php');

class JsonHandler extends Handler
{
    public function getAllPosts() {
        $list[] = new Post(1, 'subject', 'text text text', date("r"), 'default_author');
        return $list;
    }

    public function addNewPost() {

    }

    public function deletePost() {

    }
}