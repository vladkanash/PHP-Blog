<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/12/15
 * Time: 4:45 PM
 */

require_once('Handler.php');

class JsonHandler implements Handler
{
    private $jsonStoragePath = "../storage/storage.json";

    public function getAllPosts() {

        $list = [];
        $json = $this->readJson();

        for ($num = 0; $num < count($json); $num++) {
            $list[] = new Post($json[$num]['id'],
                $json[$num]['subject'],
                $json[$num]['text'],
                $json[$num]['created_at'],
                $json[$num]['author']);
        }

        return $list;
    }

    public function addNewPost($subject, $text, $createdAt, $author) {

        $posts = $this->getAllPosts();
        if (count($posts) > 0) {
            $id = end($posts)->getId() + 1;
        } else $id = 0;

        $post = new Post($id, $subject, $text, $createdAt, $author);
        $posts[] = $post;

        $this->writeJson($posts);
    }

    public function deletePost($id) {

        $json = $this->readJson();

        for ($num = 0; $num < count($json); $num++) {
            if ($json[$num]['id'] == $id) {
                array_splice($json, $num, 1);
                break;
            }
        }
        $this->writeJson($json);
    }

    /**
     * @param $json
     */
    private function writeJson($json)
    {
        $new_json = json_encode($json);
        $file = fopen($this->jsonStoragePath, 'w+');
        fwrite($file, $new_json);
        fclose($file);
    }

    /**
     * @return mixed
     */
    private function readJson()
    {
        $string = file_get_contents($this->jsonStoragePath);
        return json_decode($string, TRUE);
    }
}