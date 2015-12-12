<?php
/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/11/15
 * Time: 9:48 PM
 */

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

if ($action == 'get') ;

include_once('../include/models/Post.php');
include_once('../include/storage/Storage.php');

?>

<html>
    <head>
        <title>
            My PHP blog
        </title>
    </head>
    <body>
        <header>
        </header>
        <?php

            $posts = Storage::getInstance()->readData();
            foreach($posts as $post) {
                require_once('../view/post.htm.php');
            }
        ?>
        <footer>
            <?php
                echo date("r");
            ?>
            Copyright
        </footer>
    </body>
</html>


