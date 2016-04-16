<?php namespace Blog\Classes;

class Posts extends Controller{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPosts(){
        echo \Blog\Functions\template('templates/addForm.php');

        $pagin = $this->pdo->query(
            "SELECT count(*) FROM `posts`"
        );

        $count = $pagin->fetch(\PDO::FETCH_NUM);
        $total_rows=$count[0];
        $per_page=10;

        if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;
        $start=abs($page*$per_page);

        $num_pages=ceil($total_rows/$per_page);

        $statement = $this->pdo->query(
            "SELECT * FROM `posts` ORDER BY `date` DESC LIMIT $start,$per_page"
        );

        echo '<div class="container text-center">';
        for($i=1;$i<=$num_pages;$i++) {
            if ($i-1 == $page) {
                echo '<ul class="pagination">
                         <li><a style="pointer-events: none;color: #f44;font-weight: bold;" href="'.$_SERVER['PHP_SELF'].'?action=posts&page='.$i.'">'.$i."</a></li>
                     </ul>";
            } else {
                echo '<ul class="pagination">
                          <li><a style="font-weight: bold;" href="'.$_SERVER['PHP_SELF'].'?action=posts&page='.$i.'">'.$i."</a></li>
                     </ul>";
            }
        }
        echo '</div>';


        $content = $statement->fetchAll(\PDO::FETCH_ASSOC );
        $url = substr($_SERVER['REQUEST_URI'], 1);
        foreach ($content as $value) {
            echo \Blog\Functions\template('templates/Posts.php', [
                'title' => htmlspecialchars($value['title']),
                'content' => htmlspecialchars($value['content']),
                'date' => $value['date'],
                'author' => $value['user_id'],
                'post_id' => $value['id']
            ]);
        };

    }
    public function postPosts(){
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $write = $this->pdo->query("INSERT INTO `posts` SET `title`='{$_POST['title']}', `content`='{$_POST['content']}', `date`=NOW(), `user_id`=0");
            header('location: /?action=posts');
        }
    }

}

