<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/13/15
 * Time: 2:58 AM
 */
class TextFileHandler implements Handler
{
    private $textStoragePath = "../storage/storage.txt";
    private $postDelimiter = "\n+=+=+";
    private $fieldDelimiter = "+=+";

    public function getAllPosts()
    {
        $contents = file_get_contents($this->textStoragePath);
        $strings = explode($this->postDelimiter, $contents);
        array_pop($strings);
        if (count($strings) > 0 && strlen($strings[0]) > 0) {

            foreach ($strings as $string) {
                $postStr = explode($this->fieldDelimiter, $string);
                $posts[] = new Post($postStr[0],
                    $postStr[1],
                    $postStr[2],
                    $postStr[3],
                    $postStr[4]);
            }
            return $posts;
        }
        else return null;
    }

    public function addNewPost($subject, $text, $createdAt, $author)
    {
        $posts = $this->getAllPosts();
        if ($posts != null) {
            $id = end($posts)->getId() + 1;
        } else $id = 0;

        $contents = file_get_contents($this->textStoragePath);
        $post = new Post($id, $subject, $text, $createdAt, $author);

        $contents .= $post->__toString();
        $contents .= $this->postDelimiter;
        file_put_contents($this->textStoragePath, $contents);
    }

    public function deletePost($id)
    {
        $posts = $this->getAllPosts();
        $contents = '';

        foreach ($posts as $post) {
            if ($post->getId() != $id) {
                $contents .= $post->__toString();
                $contents .= $this->postDelimiter;
            }
        }
        file_put_contents($this->textStoragePath, $contents);
    }
}