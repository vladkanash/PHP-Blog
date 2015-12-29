<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/29/15
 * Time: 2:29 PM
 */
class Controller_blog
{

    function action_index() {
        $posts = Storage::getInstance()->readData();
        include '../view/index.htm.php';
    }

    function action_add() {
        if (isset($_POST['subject']) && isset($_POST['text']) && isset($_POST['author'])) {
            Storage::getInstance()->writeData($_POST['subject'], $_POST['text'], $_POST['author']);
        }
        unset($_POST);
        header('Location: /blog');
    }

    function action_delete($id) {
        Storage::getInstance()->removeData($id);

        header('Location: /blog');
    }
}