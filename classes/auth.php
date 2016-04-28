<?php namespace Blog\Classes;

class Auth extends Controller
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAuth()
    {

        echo \Blog\Functions\template('templates/loginForm.php');

        if(!empty($_SESSION['user'])){
            header('location: /?action=posts');
        }

    }

    public function postAuth(){

        if(!empty($_SESSION['user'])){
            header('location: /?action=posts');
        }

        if (!empty($_POST['login']) && !empty($_POST['password'])) {


            $login = !empty($_POST['login']) ? trim($_POST['login']) : null;
            $password = !empty($_POST['password']) ? md5(trim($_POST['password'])) : null;

            if (!empty($login) && !empty($password)){

                $users = $this->pdo->prepare(
                    "SELECT * FROM `users` WHERE `login`=:login AND `password`=:password");

                $users->execute([
                    ':login' => $login,
                    ':password' => $password
                ]);

                $loginUser = $users->fetch();

                $_SESSION['user'] = $loginUser;

                if($loginUser){
                    header('location: /?action=posts');
                } else{
                    header('location: /?action=auth');
                }

            }

        }

    }

}

