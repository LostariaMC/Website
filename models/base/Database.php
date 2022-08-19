<?php

namespace models\base;


use Redis;

class Database
{
    /*static function connect()
    {
        $config = include("configs.php");
        $pdo = new \PDO ($config["DB_DSN"], $config["DB_USER"], $config["DB_PASSWORD"]);

        if ($pdo && $config["DEBUG"]) {
            // ACTIVER LE DEBUG DES REQUÊTES
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }

        return $pdo;
    }*/

    static function connect()
    {
        $config = include("configs.php");
        $redis = new Redis() or die("Cannot load Redis module in PHP.");
        $redis->connect($config['DB_SERVER'], $config['DB_PORT']);

        $redis->auth($config['DB_PASSWORD']);

        $redis->select(1);

        return $redis;
    }
}