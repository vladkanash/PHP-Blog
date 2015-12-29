<?php

/**
 * Created by PhpStorm.
 * User: vladkanash
 * Date: 12/29/15
 * Time: 1:31 PM
 */
class Config
{
    private static $config_path = '../config/config.json';
    private static $init = false;
    private static $properties;

    private static function init() {
        if (self::$init == true) return;
        $string = file_get_contents(self::$config_path);
        self::$properties = json_decode($string, TRUE);
        self::$init = true;
    }

    private function __construct() {

    }

    private function __clone() {

    }

    static function getProperty($name) {
        self::init();
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return '';
    }
}