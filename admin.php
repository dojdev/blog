<style>table{ background-color: rgba(0,0,0,.5) !important;  }</style>
<?php
session_start();

if(!empty($_SESSION['user'])){
    echo '<div class="pull-right">'. $_SESSION['user']['login'] . "<a style='color: #fff;' href='?action=exit'>[ Выйти ]</a></div>";
};

if(!empty($_GET['action'])){

    session_destroy();
    header('location: /');

}

if($_SESSION['user']['login']=='admin'){
    require_once 'app/connect.php';
}

require_once 'templates/header.php';

$statement = $pdo->query(
    "SELECT * FROM posts ORDER BY `date` DESC"
);

$content = $statement->fetchAll(PDO::FETCH_ASSOC );
$url = substr($_SERVER['REQUEST_URI'], 1); ?>

<div class="form">
    <br><br>
    <div class="container">
        <?php require_once 'app/form.php'; ?>
    </div>
</div>
<?php echo '<div class="container">
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

 ?>

<?php require_once 'templates/footer.php'; ?>


