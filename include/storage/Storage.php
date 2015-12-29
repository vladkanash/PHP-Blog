<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/12/15
 * Time: 4:36 PM
 */


class Storage
{
    private static $instance = null;
    private $handler;

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
            self::$instance->setHandler(new JsonHandler());
        }
        return self::$instance;
    }

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public function readData() {
        return $this->handler->getAllPosts();
    }

    public function writeData($subject, $text, $author) {
        $postSubject = $subject == null ? 'NO_SUBJECT' : $subject;
        $postText = $text == null ? 'NO_TEXT' : $text;
        $postAuthor = $author == null ? 'NO_AUTHOR' : $author;

        $createdAt = date('m.d.Y H:i', time());

        $this->handler->addNewPost($postSubject, $postText, $createdAt, $postAuthor);
    }

    public function removeData($id) {
        $this->handler->deletePost($id);
    }

    public function setHandler(Handler $hnd) {
       $this->handler = $hnd;
    }
}