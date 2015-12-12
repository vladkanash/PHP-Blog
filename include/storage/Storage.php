<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/12/15
 * Time: 4:36 PM
 */

include_once('JsonHandler.php');

class Storage
{
    private static $instance = null;

    private static $id;
    private $handler;

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$id = 0;
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
        //TODO date
        $this->handler->addNewPost($subject, $text, '12.12.2016', $author);
    }

    public function removeData() {

    }

    public function setHandler(Handler $hnd) {
       $this->handler = $hnd;
    }
}