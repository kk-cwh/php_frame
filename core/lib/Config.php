<?php

namespace Core\lib;


class Config
{
    private static $config;

    static function get($file)
    {
        if (isset(self::$config[$file])) {

            return self::$config[$file];
        }

        $path = BASEDIR . '/config/' . $file . '.php';
        if (is_file($path)) {
            $array = include $path;
            self::$config[$file] = $array;
            return self::$config[$file];
        } else {
            throw new \Exception('配置文件不存在' . $path);
        }
    }
}