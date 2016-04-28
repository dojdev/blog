<?php namespace Blog;

require 'vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

echo Functions\template('templates/header.php');

$connect = Functions\connection(['host' => 'localhost', 'dbname' => 'blog', 'user' => 'root', 'password' => 'vagrant', 'encoding' => 'utf8']);

$action = empty($_GET['action']) ? 'auth' : $_GET['action'];

$routes = [
    'auth'   => '\Blog\Classes\Auth',
    'exit'   => '\Blog\Classes\Auth',
    'posts'  => '\Blog\Classes\Posts',
    'single' => '\Blog\Classes\Posts',
    'del'    => '\Blog\Classes\Posts'
];

$router = new Classes\Router($connect, $action, $routes);
$router->handler();