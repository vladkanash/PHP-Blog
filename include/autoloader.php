<?php
/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/29/15
 * Time: 1:30 PM
 */

function __autoload($class_name) {
    switch ($class_name) {
        case 'Post' :
            require_once('../include/models/Post.php');
            break;

        case 'Config' :
        case 'Route'  :
            require_once('../include/' . $class_name . '.php');
            break;

        default :
            if(strpos($class_name, 'Controller', 0) === 0) {
                require_once '../include/controllers/' . $class_name . '.php';
                break;
            } elseif (strpos($class_name, 'Storage', 0) === 0) {
                require_once '../include/storage/' . $class_name . '.php';
                break;
            }
    }
}