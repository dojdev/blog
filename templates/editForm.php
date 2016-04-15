<div class="container">
    <a href="/?action=posts" style="color: red;">Смотреть все посты</a>
    <form method="POST" class="form-group">
        <input type="text" name="title" class="form-control" value="<?= $title ?>" placeholder="Введите заголовок" autocomplete="off">
        <br>
        <textarea id="" cols="30" rows="5" name="content" class="form-control" placeholder="Введите текст поста" autocomplete="off"  style="resize: none;"><?= $content ?></textarea>
        <br>
        <input type="submit" class="btn btn-success">
    </form>
</div>