<?php
namespace Core\lib\drive\log;

use Core\lib\Config;

class file
{
    public $path;

    function __construct()
    {
        $this->path = Config::get('log')['option']['path'];
    }

    public function log($message, $file = 'log')
    {
        if (!is_dir($this->path . date('Ymd'))) {
            mkdir($this->path . date('Ymd'), '0777', true);
        }
        $message = date('Y-m-d H:i:s') . json_encode($message) . PHP_EOL;
        file_put_contents($this->path . date('Ymd') . '//' . $file, $message, FILE_APPEND);
    }
}