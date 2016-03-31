<?php
session_start();

require_once 'connect.php';

$login = trim($_POST['login']);
$password = md5(trim($_POST['password']));

if(!empty($_POST['login']) && !empty($_POST['password'])) {

    echo $_POST['login'] . ' ' . md5($_POST['password']);

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
    header('location: auth2.php');
}

//var_dump($loginUser);

?>

<form method="POST">
    <input type="text" name="login" class="form-control">
    <input type="text" name="password" class="form-control">
    <input type="submit" value="Autorize" class="btn btn-success">
</form>

<?= '<h1>test acc</h1><br>author1 & 1234' ?>
<?= '<br><br><a href="auth2.php">Step 2 token</a>' ?>
<?= '<br><br><a href="/">back to main</a>' ?>