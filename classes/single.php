<?php namespace Blog\Classes;

class Single
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function single(){

        $id = trim($_GET["id"]);

        $statement = $this->pdo->query(
            "SELECT * FROM posts WHERE `id`=$id;"
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