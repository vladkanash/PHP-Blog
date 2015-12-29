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
            $storage_type = Config::getProperty('storage_type');
            switch ($storage_type) {
                case 'text' :
                    self::$instance->setHandler(new Storage_text());
                    break;

                case 'json' :
                    self::$instance->setHandler(new Storage_json());
                    break;

                case 'mysql' :
                    self::$instance->setHandler(new Storage_mysql());
                    break;

                default :
                    self::$instance->setHandler(new Storage_json());
            }
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

    public function setHandler(Storage_handler $hnd) {
       $this->handler = $hnd;
    }
}