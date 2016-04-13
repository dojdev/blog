<?php namespace Blog\Classes;


class Auth
{
    private $pdo;

    public function __construct($pdo)
    {
            $this->pdo = $pdo;
    }

    public function auth()
    {
        echo \Blog\Functions\template('templates/loginForm.php');
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = trim($_POST['login']);

            $password = md5(trim($_POST['password']));
            $users = $this->pdo->prepare(
                "SELECT * FROM `users` WHERE `login`=:login AND `password`=:password");
            $users->execute([
                ':login' => $_POST['login'],
                ':password' => $password
            ]);
            $loginUser = $users->fetch();
        }

        if (!empty($loginUser)) {
            $_SESSION['user'] = $loginUser;
            echo \Blog\Functions\template('templates/welcomeMessage.php', [
                'login' => $_SESSION['user']['login']
            ]);
            header('location: /?action=posts');
        }
    }


}

