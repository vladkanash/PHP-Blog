<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/12/15
 * Time: 4:47 PM
 */
class Post implements JsonSerializable {

    private $id;
    private $subject;
    private $text;
    private $created_at;
    private $author;

    /**
     * Post constructor.
     * @param $id
     * @param $subject
     * @param $text
     * @param $created_at
     * @param $author
     */
    public function __construct($id, $subject, $text, $created_at, $author)
    {
        $this->id = $id;
        $this->subject = $subject;
        $this->text = $text;
        $this->created_at = $created_at;
        $this->author = $author;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        $data['id'] = $this->id;
        $data['subject'] = $this->subject;
        $data['text'] = $this->text;
        $data['created_at'] = $this->created_at;
        $data['author'] = $this->author;

        return $data;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}
