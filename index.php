<?php namespace Blog;

use Blog\Functions;
use Blog\Classes;

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'app/functions.php';
require_once 'classes/auth.php';
require_once 'classes/posts.php';

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
        $posts->posts();

        break;

    case 'del':
        $id = trim($_GET["id"]);
        $delete = $connect->query("delete from posts WHERE `id`=$id;");
        header('location: /?action=posts');
        break;

    case 'exit':
        session_destroy();
        header('location: /');
        break;
}