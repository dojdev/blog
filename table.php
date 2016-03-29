<style>table{ background-color: rgba(0,0,0,.5) !important;  }</style>
<?php

require_once 'app/connect.php';
require_once 'templates/header.php';

$statement = $pdo->query(
    "SELECT * FROM posts ORDER BY `date` DESC"
);

$content = $statement->fetchAll(PDO::FETCH_ASSOC );
$url = substr($_SERVER['REQUEST_URI'], 1);

echo '<div class="container">

                <h1 class="blog-title text-center">Simple Blog</h1>

                <div class="pull-right" style="color: #fff;">
                    <a class="btn btn-link"  style="color: inherit;" href="/">grid</a>|
                    <a class="btn btn-link"  style="color: inherit;" href="/table.php">table</a>
                </div>

        <table class="table table-condensed">
            <tr>
                <td><b>Дата</b></td>
                <td><b>Заголовок</b></td>
                <td><b>Текст</b></td>
                <td><b>Автор</b></td>
                <td><b>&nbsp;</b></td>
            </tr>
      ';

foreach($content as $value){

    $post_id =  $value['id'];

        if($post_id > 4){
            $del_item = "<td><a href='app/del.php?id=$post_id&url=$url' style='color: #f44;'>del</a></td>";
        } else{
            $del_item = "";
        }

    $user = $value['user_id'];

        if($user==0){

                $user = 'admin';

            } else {

                $user = 'user';

        }

    echo '
            <tr>
                <td>' . $value['date']    . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>' . $value['title']   . '</td>
                <td>' . $value['content'] . '</td>
                <td>' . $user . '</td>
                <td>' . $del_item . '</td>
            </tr>
        ';
};

echo '</table></div>';

if(!empty($_POST['title']) && !empty($_POST['content'])){
    $write = $pdo->query("INSERT INTO `posts` SET `title`='{$_POST['title']}', `content`='{$_POST['content']}', `date`=NOW(), `user_id`=0");
} ?>

<?php require_once 'templates/footer.php'; ?>


