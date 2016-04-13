<?php namespace Blog;

use Blog\Functions;
use Blog\Classes;

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once 'app/functions.php';
require_once 'classes/auth.php';
echo Functions\template('templates/header.php');

$connect = Functions\connection(['host' => 'localhost', 'dbname' => 'blog', 'user' => 'root', 'password' => 'vagrant', 'encoding' => 'utf8']);
//var_dump($_GET);

$action = empty($_REQUEST['action']) ? 'auth' : $_REQUEST['action'];

if (empty($_REQUEST['login']) && empty($_SESSION['user'])) {
    $action = 'auth';
}

switch ($action) {
    case 'auth':

        $a = new Classes\auth($connect);
        $a->auth();

        break;

    case 'posts':

        if (empty($_REQUEST['login']) && empty($_SESSION['user'])) {
            header('location: /?action=auth');
        }

        echo \Blog\Functions\template('templates/exit.php', [
            'login' => $_SESSION['user']['login']
        ]);

        echo \Blog\Functions\template('templates/addForm.php');

        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $write = $connect->query("INSERT INTO `posts` SET `title`='{$_POST['title']}', `content`='{$_POST['content']}', `date`=NOW(), `user_id`=0");
        }

        $statement = $connect->query(
            "SELECT * FROM posts ORDER BY `date` DESC"
        );

        $content = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($content as $value) {
            echo \Blog\Functions\template('templates/posts.php', [
                'title' => htmlspecialchars($value['title']),
                'content' => htmlspecialchars($value['content']),
                'date' => $value['date'],
                'author' => $value['user_id'],
                'post_id' => $value['id']
            ]);
        };
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