<?php
namespace notes\db;
use PDO;
class DB
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance($config)
    {
        if (null === static::$instance) {
            $mysql_server = sprintf(
                "mysql:host=%s;dbname=%s",
                $config['db']['host'],
                $config['db']['dbname']
            );
            $charset_info = sprintf("SET NAMES %s", $config['db']['charset']);
            static::$instance = new PDO(
                $mysql_server,
                $config['db']['user'],
                $config['db']['password'],
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => $charset_info,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        }
        return static::$instance;
    }
}
