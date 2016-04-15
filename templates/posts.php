<div class="container text-center">
    <div class='col-xs-12 post-item'>
        <a style="color: #fff;text-transform: uppercase;" href="/?action=single&id=<?= $post_id ?>" class="post-item__title">
                        <?= $title   ?> </a>
        <p>             <?= $content ?> </p>
        <p>Дата:        <?= $date    ?> </p>
        <p>Автор:       <?= $author  ?> </p>
        <p>Номер поста: <?= $post_id ?> </p>
        <a class="btn btn-danger" href="/?action=del&id=<?= $post_id ?>">Удалить</a>
    </div>
</div>

