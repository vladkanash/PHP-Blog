<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/29/15
 * Time: 2:22 PM
 */
class Route
{
    static function start()
    {
        $controller_name = 'blog';
        $action_name = 'index';
        $id = null;
        $routes = explode('/', $_SERVER['REQUEST_URI']);


        if ( !empty($routes[1]) ) {
            $controller_name = $routes[1];
        }

        if ( !empty($routes[2]) ) {
            $action_name = $routes[2];
        }

        if ( !empty($routes[3]) ) {
            $id = $routes[3];
        }

        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        $controller_file = $controller_name .'.php';
        $controller_path = "../include/controllers/".$controller_file;
        if(file_exists($controller_path)) {
            include $controller_path;
        } else {
            Route::ErrorPage404();
            exit();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action)) {
            if ($id != null) {
                $controller->$action($id);
            } else {
                $controller->$action();
            }
        } else {
            Route::ErrorPage404();
            exit();
        }

    }

    function ErrorPage404() {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        include '../view/404.htm.php';
    }
}