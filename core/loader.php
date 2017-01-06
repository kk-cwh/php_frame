<?php
namespace Core;

use Core\Route;

class Loader
{
    public static $classMap = [];

    public static function run()
    {
        echo 'ok';
        $route = new Route();
    }

    public static function load($class)
    {

        // 4.自动加载类
        $class = str_replace('\\', '/', $class);
        if (isset(self::$classMap[$class])) {
            return true;
        }

        if (is_file(BASEDIR . '/' . $class . '.php')) {
            self::$classMap[$class] = $class;
            include BASEDIR . '/' . $class . '.php';
        } else {
            return false;
        }
    }
}