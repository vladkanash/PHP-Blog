<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/29/15
 * Time: 2:29 PM
 */
class controller_blog extends controller
{

    function action_index() {
        $posts = storage::getInstance()->readData();
        include '../view/index.htm.php';
    }

    function action_add() {
        if (isset($_POST['subject']) && isset($_POST['text']) && isset($_POST['author'])) {
            storage::getInstance()->writeData($_POST['subject'], $_POST['text'], $_POST['author']);
        }
        unset($_POST);
        header('Location: /blog');
    }

    function action_delete($id) {
        storage::getInstance()->removeData($id);

        header('Location: /blog');
    }
}