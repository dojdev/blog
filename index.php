<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'app/connect.php';
require_once 'app/functions.php';
echo template('templates/header.php');

if(empty($_REQUEST['login']) && empty($_SESSION['user'])){
    echo template('templates/loginForm.php');
}

if(!empty($_SESSION['user'])){
    echo template('templates/exit.php',[
        'login' => $_SESSION['user']['login']
    ]);

    if(!empty($_REQUEST['exit']) && $_REQUEST['exit']=='exit'){
        session_destroy();
        header('location: /');
    }
}

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
}

if(!empty($_SESSION['user']) && $_SESSION['user']['login']=='admin'){
    echo template('templates/addForm.php');
    if(!empty($_POST['title']) && !empty($_POST['content'])) {
        $write = $pdo->prepare("INSERT INTO `posts` SET `title`=:title, `content`=:content, `date`=NOW(), `user_id`=0");
        $write->execute([
            ':title' => $_POST['title'],
            ':content' => $_POST['content']
        ]);
    }
}

if(!empty($_SESSION['user'])){
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
            'post_id' => $value['id'],
            'del'     => '<a class="btn btn-danger" href="app/del.php?id=' . $value['id'] . '">Удалить</a>',
        ]);
    };
}