<?php

require_once 'connect.php';

echo '<br><br>';

    $statement = $pdo->query(
        "SELECT * FROM posts ORDER BY `date` DESC"
    );

    $content = $statement->fetchAll(PDO::FETCH_ASSOC );

    foreach($content as $value){

        echo "<div class='col-xs-6 post-item'>";
        echo '<h1 class="post-item__title">' . htmlspecialchars($value['title'])  . '</h1><br>';
        echo  $value['content']              . '<br>';
        echo 'Дата: '                        . $value['date']     . '<br>';
        echo 'Автор: '                       . $value['user_id']  . '<br>'; $post_id =  $value['id'];

        if($post_id > 4) {
            echo "<a href='app/del.php?id=$post_id' style='color: #f44;'>[ Удалить пост ]</a>";
        }

        echo  '<br></div>';
    };

    if(!empty($_POST['title']) && !empty($_POST['content'])){

       $write = $pdo->query("INSERT INTO `posts` SET `title`='{$_POST['title']}', `content`='{$_POST['content']}', `date`=NOW(), `user_id`=0");

//        $write = $pdo->prepare("INSERT INTO `posts` SET `title`=:title, `content`=:content, `date`=NOW(), `user_id`=0");
//        $write->execute([
//            ':title' => $_POST['title'],
//            ':content' => $_POST['content']
//        ]);

    }


