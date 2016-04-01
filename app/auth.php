<div class="" style="background-color: rgba(0,0,0,.8);position: relative;padding: 40px 60px;display: block; border: 1px dashed #4cae4c;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;" id="out">

    <form method="POST" style="margin: 0 auto;width: 400px; id="authform">
        <input type="text" name="login" class="form-control" placeholder="Введите логин">
        <br>
        <input type="text" name="password" class="form-control" placeholder="Введите пароль">
        <br>

        <input type="submit" value="Авторизоваться" class="btn btn-success">
    </form>
</div>

<?php
session_start();

require_once 'connect.php';

$login = trim($_POST['login']);
$password = md5(trim($_POST['password']));

if(!empty($_POST['login']) && !empty($_POST['password'])) {

    echo '<h4 class="alert alert-warning">Доступ закрыт, сорян: ' . $login . ' & token hash ' . $password . '</h4>';
    echo '<h4 class="alert alert-success">Тестовый аккаунт: author1 & pass 1234</h4>';
    echo '<h4 class="alert alert-success">Админ доступ: admin & pass admin</h4>';

}

    $users = $pdo->prepare(
        "SELECT * FROM `users` WHERE `login`=:login AND `password`=:password");

    $users->execute([
        ':login' => $_POST['login'],
        ':password' => $password
    ]);

    $loginUser = $users->fetch();


if(!empty($loginUser)){
    $_SESSION['user']=$loginUser;
}

?>