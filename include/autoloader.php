<?php
/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/29/15
 * Time: 1:30 PM
 */

function __autoload($class_name) {
    switch ($class_name) {
        case 'Post' : {
            require_once('../include/models/Post.php');
            break;
        }

        case 'Config' : {
            require_once('../include/Config.php');
            break;
        }

        case 'Route' : {
            require_once '../include/Route.php';
            break;
        }

        case 'controller_blog' : {
            require_once '../include/controllers/controller_blog.php';
            break;
        }

        case 'controller' : {
            require_once '../include/controllers/controller.php';
            break;
        }

        default : {
            require_once('../include/storage/' . $class_name . '.php');
        }
    }
}