<?php namespace Blog\Classes;

class Delete{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function handler(){
        $this->delete();
    }

    public function delete()
    {
        $id = trim($_GET["id"]);
        $delete = $this->pdo->query("delete from posts WHERE `id`=$id;");
        header('location: /?action=posts');
    }
}