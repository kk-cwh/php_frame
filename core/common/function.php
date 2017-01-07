<?php
namespace Core;
/**
 * Created by PhpStorm.
 * User: pc188
 * Date: 2017/1/6
 * Time: 16:30
 */
/**
 * @param $var
 */
function p($var)
{
    if (is_bool($var)) {
        var_dump($var);
    } elseif (is_null($var)) {
        var_dump(NULL);
    } else {
        echo "<pre>" . print_r($var, true) . "</pre>";
    }
}