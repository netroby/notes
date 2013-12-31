<?php
namespace Acmu;
use PDO;
class Db
{
    private static $_instance = null;

    private function __construct()
    {
    }

    public static function getInstance($config)
    {
        if (null === static::$_instance) {
            $mysql_server = sprintf("mysql:host=%s;dbname=%s", $config['db']['host'], $config['db']['dbname']);
            $charset_info = sprintf("SET NAMES %s", $config['db']['charset']);
            static::$_instance = new PDO($mysql_server, $config['db']['user'], $config['db']['password'], array(
                PDO::MYSQL_ATTR_INIT_COMMAND => $charset_info
            ));
        }
        return static::$_instance;
    }
}