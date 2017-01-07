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

if (DEBUG) {
    ini_set('display_errors', 'On');

} else {
    ini_set('display_errors', 'On');
}

/**
 * 2 加载函数
 */
include CORE . '/common/function.php';
include CORE . '/loader.php';
// 3 自动加载
spl_autoload_register('\\Core\\loader::load');
// 4 启动框架
\Core\Loader::run();



