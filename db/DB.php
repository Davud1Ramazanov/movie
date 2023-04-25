<?php
namespace db;
class DB
{
    private const hostname = "localhost";
    private const username = "root";
    private const password = "";
    private const database = "movie_db";
    private static $instance;

    public function __construct(){}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect(): \mysqli
    {
        return new \mysqli(self::hostname, self::username, self::password, self::database);
    }
}

?>