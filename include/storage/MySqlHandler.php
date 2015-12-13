<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/13/15
 * Time: 2:57 AM
 */
class MySqlHandler implements Handler
{

    //CREATE TABLE php_blog.posts
    //(
    //id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    //subject VARCHAR(255) NOT NULL,
    //text TEXT NOT NULL,
    //created_at VARCHAR(255) NOT NULL,
    //author VARCHAR(255) NOT NULL
    //);

    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'pass';
    private $database = 'php_blog';

    public function getAllPosts()
    {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        $sql = "SELECT * FROM posts";
        $result = mysqli_query($con, $sql);
        $list = [];

        while($post = mysqli_fetch_array($result)) {
            $list[] = new Post($post['id'],
                $post['subject'],
                $post['text'],
                $post['created_at'],
                $post['author']);
        }

        mysqli_free_result($result);
        mysqli_close($con);

        return $list;
    }

    public function addNewPost($subject, $text, $createdAt, $author)
    {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        $subj = mysqli_real_escape_string($con, $subject);
        $txt = mysqli_real_escape_string($con, $text);
        $created = mysqli_real_escape_string($con, $createdAt);
        $auth = mysqli_real_escape_string($con, $author);

        $query = "INSERT INTO posts (subject, text, created_at, author)
              VALUES ('$subj', '$txt', '$created', '$auth')";

        mysqli_query($con, $query);
        mysqli_close($con);
    }

    public function deletePost($id)
    {
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        $query = "DELETE FROM posts WHERE id='$id'";
        mysqli_query($con, $query);
        mysqli_close($con);
    }
}

