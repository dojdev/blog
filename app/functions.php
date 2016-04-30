<?php namespace Blog\Functions;

function connection(array $config)
{
    return new \PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['user'], $config['password'], [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$config['encoding']}"
    ]);
}

