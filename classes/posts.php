<?php namespace Blog\Classes;

class Posts{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add_post(){
        echo \Blog\Functions\template('templates/addForm.php');

        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $write = $this->pdo->query("INSERT INTO `posts` SET `title`='{$_POST['title']}', `content`='{$_POST['content']}', `date`=NOW(), `user_id`=0");
        }
    }

    public function bye(){
        echo \Blog\Functions\template('templates/exit.php', [
            'login' => $_SESSION['user']['login']
        ]);
    }

}

