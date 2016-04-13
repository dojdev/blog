<?php namespace Blog\Classes;

class Posts{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function posts(){
        if (empty($_REQUEST['login']) && empty($_SESSION['user'])) {
            header('location: /?action=auth');
        }

        echo \Blog\Functions\template('templates/exit.php', [
            'login' => $_SESSION['user']['login']
        ]);

        echo \Blog\Functions\template('templates/addForm.php');

        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $write = $this->pdo->query("INSERT INTO `posts` SET `title`='{$_POST['title']}', `content`='{$_POST['content']}', `date`=NOW(), `user_id`=0");
        }

        $statement = $this->pdo->query(
            "SELECT * FROM posts ORDER BY `date` DESC"
        );

        $content = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($content as $value) {
            echo \Blog\Functions\template('templates/posts.php', [
                'title' => htmlspecialchars($value['title']),
                'content' => htmlspecialchars($value['content']),
                'date' => $value['date'],
                'author' => $value['user_id'],
                'post_id' => $value['id']
            ]);
        };
    }
}

