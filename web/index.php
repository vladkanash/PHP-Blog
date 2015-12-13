<?php
/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/11/15
 * Time: 9:48 PM
 */

include_once('../include/models/Post.php');
include_once('../include/storage/Storage.php');

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch($action) {
    case('add'): {
        Storage::getInstance()->writeData($_POST['subject'], $_POST['text'], $_POST['author']);
        header("Location:index.php");
        break;
    }
    case ('delete'): {
        if (isset($_GET['id'])) {
            Storage::getInstance()->removeData($_GET['id']);
            header("Location:index.php");
        }
        break;
    }
    default: break;
}

require_once('../view/index.htm.php');
?>




