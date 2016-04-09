<div class="container text-center">
    <div class='col-xs-12 post-item'>
        <h1 class="post-item__title">
                        <?= $title   ?> </h1>
        <p>             <?= $content ?> </p>
        <p>Дата:        <?= $date    ?> </p>
        <p>Автор:       <?= $author  ?> </p>
        <p>Номер поста: <?= $post_id ?> </p>
        <a class="btn btn-danger" href="app/del.php?id=<?= $post_id ?>">Удалить</a>
    </div>
</div>