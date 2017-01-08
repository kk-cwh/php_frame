<?php
/**
 * 入口文件
 * 1 定义常量
 *
 */

define('BASEDIR', realpath('./'));
define('CORE', BASEDIR . '/core');
define('APP', BASEDIR . '/app');

define('DEBUG', true);

include "vendor/autoload.php";

if (DEBUG) {
    $whoops = new \Whoops\Run();
    $handler = new \Whoops\Handler\PrettyPageHandler();
    $handler->setPageTitle('抱歉,出错了');
    $whoops->pushHandler($handler);
    $whoops->register();
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'On');
}
//dump($_SERVER);
/**
 * 2 加载函数
 */
include CORE . '/common/function.php';
include CORE . '/loader.php';
// 3 自动加载
spl_autoload_register('\\Core\\loader::load');
// 4 启动框架
\Core\Loader::run();



