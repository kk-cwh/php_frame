<?php
namespace Core;

use Core\Route;

class Loader
{
    public static $classMap = [];
    public $data = [];

    public static function run()
    {
        $route = new Route();
        $controlName = $route->controlName;
        $action = $route->actionName;

        $file = APP . '/controller/' . $controlName . '.php';

        if (is_file($file)) {
            include $file;
            $controlName = '\\App\\Controller\\' . $controlName;
            $controlClass = new $controlName();
            if (method_exists($controlClass, $action)) {
                $controlClass->$action();
            } else {
                throw new \Exception('找不到方法' . $action);
            }
        } else {
            throw new \Exception('找不到控制器' . $controlName);
        }
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

    public function assign($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function display($view)
    {
        $file = APP . '/view/' . $view;

        if (is_file($file)) {
            extract($this->data);
            include $file;
        }
    }
}