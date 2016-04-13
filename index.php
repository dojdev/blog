<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'app/connect.php';
require_once 'app/functions.php';
echo template('templates/header.php');

$_GET['action']='';
$action = empty($_GET['action'] ? 'auth' : $_GET['action']);

    if (empty($_REQUEST['login']) && empty($_SESSION['user'])) {
        $action = 'auth';
    }

    if(!empty($_SESSION['user'])){
        $action = 'posts';

    if($_REQUEST['action']=='exit'){
        $action = 'exit';
    }

    if($_REQUEST['action']=='del'){
        $action = 'del';
    }
}

switch ($action) {
    case 'auth':
        echo template('templates/loginForm.php');
        if(!empty($_POST['login']) && !empty($_POST['password'])){
            $login    = trim($_POST['login']);
            $password = md5(trim($_POST['password']));
            $users    = $pdo->prepare(
                "SELECT * FROM `users` WHERE `login`=:login AND `password`=:password");
            $users->execute([
                ':login' => $_POST['login'],
                ':password' => $password
            ]);
            $loginUser = $users->fetch();
        }

        if(!empty($loginUser)){
            $_SESSION['user']=$loginUser;
            echo template('templates/welcomeMessage.php',[
                'login' => $_SESSION['user']['login']
            ]);
            header('location: /?action=posts');
        }
        break;

        case 'posts':
            echo template('templates/exit.php',[
                'login' => $_SESSION['user']['login']
            ]);
            $statement = $pdo->query(
                "SELECT * FROM posts ORDER BY `date` DESC"
            );

            $content = $statement->fetchAll(PDO::FETCH_ASSOC );
            foreach($content as $value){
                echo template('templates/posts.php',[
                    'title'   => htmlspecialchars($value['title']),
                    'content' => htmlspecialchars($value['content']),
                    'date'    => $value['date'],
                    'author'  => $value['user_id'],
                    'post_id' => $value['id']
                ]);
            };
        break;

        case 'del':
            $id = trim($_GET["id"]);
            $delete = $pdo->query("delete from posts WHERE `id`=$id;");
            header('location: /?action=posts');
        break;

        case 'exit':
            session_destroy();
            header('location: /');
        break;
}