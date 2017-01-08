<?php
namespace Core\lib;

use Core\lib\Config;

class log
{
    static $class;

    static public function init()
    {
        $drive = Config::get('log')['DRIVE'];
        $class = '\\Core\\lib\\drive\\log\\' . $drive;
        self::$class = new $class;
    }
    static public function log($name,$file='log'){
        self::$class->log($name,$file);
    }
}