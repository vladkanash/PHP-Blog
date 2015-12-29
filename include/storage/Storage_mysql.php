<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/13/15
 * Time: 2:57 AM
 */
class Storage_mysql implements Storage_handler
{

    //CREATE TABLE php_blog.posts
    //(
    //id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    //subject VARCHAR(255) NOT NULL,
    //text TEXT NOT NULL,
    //created_at VARCHAR(255) NOT NULL,
    //author VARCHAR(255) NOT NULL
    //);

    private $con; //MySQL connection

    public function __construct()
    {
        $host = Config::getProperty('mysql_host');
        $user = Config::getProperty('mysql_user');
        $pass = Config::getProperty('mysql_pass');
        $database = Config::getProperty('mysql_database');

        $this->con = mysqli_connect($host, $user, $pass, $database);
    }

    public function getAllPosts()
    {
        $sql = "SELECT * FROM posts";
        $result = mysqli_query($this->con, $sql);
        $list = [];

        while($post = mysqli_fetch_array($result)) {
            $list[] = new Post($post['id'],
                $post['subject'],
                $post['text'],
                $post['created_at'],
                $post['author']);
        }

        mysqli_free_result($result);
        return $list;
    }

    public function addNewPost($subject, $text, $createdAt, $author)
    {
        $subj = mysqli_real_escape_string($this->con, $subject);
        $txt = mysqli_real_escape_string($this->con, $text);
        $created = mysqli_real_escape_string($this->con, $createdAt);
        $auth = mysqli_real_escape_string($this->con, $author);

        $query = "INSERT INTO posts (subject, text, created_at, author)
              VALUES ('$subj', '$txt', '$created', '$auth')";
        mysqli_query($this->con, $query);
    }

    public function deletePost($id)
    {
        $txt = mysqli_real_escape_string($this->con, $id);
        $query = "DELETE FROM posts WHERE id='$txt'";
        mysqli_query($this->con, $query);
    }
    
    public function __destruct()
    {
        mysqli_close($this->con);
    }
}

