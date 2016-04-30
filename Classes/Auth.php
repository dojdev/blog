<?php namespace Blog\Classes;

class Auth extends Controller
{
    protected $pdo;
    protected $twig;

    public function __construct($pdo, $twig)
    {
        $this->pdo  = $pdo;
        $this->twig = $twig;
    }

    public function getAuth()
    {
        $template = $this->twig->loadTemplate('loginForm.html');

        echo $template->render(array(
            'pagetitle'=>'auth'
        ));

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

                if(!empty($_SESSION['user'])){
                    header('location: /?action=posts');
                }

            }

        }

    }

    public function getExit(){
        session_destroy();
        header('location: /?action=auth');
    }

}

