<?php

namespace Blog;

require 'vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

echo Functions\template('templates/header.php');

$connect = Functions\connection(['host' => 'localhost', 'dbname' => 'blog', 'user' => 'root', 'password' => 'vagrant', 'encoding' => 'utf8']);
//var_dump($_GET);

$action = empty($_GET['action']) ? 'auth' : $_GET['action'];

$routes = [
    'auth' => '\Blog\Classes\Auth',
    'posts' => '\Blog\Classes\Posts',
    'del' => '\Blog\Classes\Delete',
    'single' => '\Blog\Classes\Single',
    'exit' => '\Blog\Classes\Bye'
];

$router = new Classes\Router($connect, $action, $routes);
$router->handler();