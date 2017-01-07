<?php


namespace Core;


class model extends \PDO
{
    public function __construct()
    {

        $dsn = 'mysql:host=192.168.10.167;dbname=test';
        $username = 'root';
        $password = 'root';
        try {
            parent::__construct($dsn, $username, $password);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }

    }
}