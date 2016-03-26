<?php

echo '<br><br>';

    $pdo = new PDO(
        "mysql:host=localhost;dbname=blog;charset=utf8","root","vagrant"
    );

    $statement = $pdo->query(
        "SELECT * FROM posts ORDER BY `date` DESC"
    );

    $content = $statement->fetchAll(PDO::FETCH_ASSOC );

    foreach($content as $value){

        echo "<div class='col-xs-6 alert alert-success' style='min-height: 180px;'>";
        echo '<b>' . $value['title'] . '</b><br>';
        echo  $value['content']      . '<br>';
        echo 'Дата: '                . $value['date']     . '<br>';
        echo 'Автор: '               . $value['user_id']  . '<br>';
        echo  '<br></div>';
    };

    if(!empty($_POST['title']) && !empty($_POST['content'])){
        $write = $pdo->query("INSERT INTO `posts` SET `title`='{$_POST['title']}', `content`='{$_POST['content']}', `date`=NOW(), `user_id`=0");
    }