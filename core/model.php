<?php
namespace Core;

use Core\lib\Config;

class model extends \PDO
{
    public function __construct()
    {

        $dbconfig = Config::get('database');
        $dsn = $dbconfig['dsn'];
        $username =$dbconfig['username'];
        $password = $dbconfig['password'];
        try {
            parent::__construct($dsn, $username, $password);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }

    }
}