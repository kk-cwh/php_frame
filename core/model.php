<?php
namespace Core;

use Core\lib\Config;

class model extends \medoo
{
    public function __construct()
    {

        $dbconfig = Config::get('database');
        parent::__construct($dbconfig);


    }
}