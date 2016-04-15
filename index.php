<?php

namespace Blog;
use Blog\Functions;
use Blog\Classes;
require_once 'app/functions.php';
require_once 'classes/auth.php';
require_once 'classes/posts.php';
require_once 'classes/single.php';
require_once 'classes/delete.php';
require_once 'classes/exit.php';

//require 'vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

echo Functions\template('templates/header.php');

$connect = Functions\connection(['host' => 'localhost', 'dbname' => 'blog', 'user' => 'root', 'password' => 'vagrant', 'encoding' => 'utf8']);
//var_dump($_GET);

$action = empty($_REQUEST['action']) ? 'auth' : $_REQUEST['action'];

if (empty($_REQUEST['login']) && empty($_SESSION['user'])) {
    $action = 'auth';
}

switch ($action) {
    case 'auth':
            $auth = new Classes\Auth($connect);
            $auth->auth();
        break;

    case 'posts':
            $posts = new Classes\Posts($connect);
            $posts->bye();
            $posts->add_post();
            $posts->posts();
        break;

    case 'del':
            $delete = new Classes\Delete($connect);
            $delete->delete();
        break;

    case 'single':
            $single = new Classes\Posts($connect);
            $single->bye();
            $single = new Classes\Single($connect);
            $single->single();
            $single->edit();
        break;

    case 'exit':
            $exit = new Classes\Bye();
            $exit->bye();
        break;
}