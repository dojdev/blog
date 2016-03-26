        <hr>
            <form method="POST" class="form-group">
                <input type="text" name="title" class=form-control" placeholder="Введите заголовок">
                <input type="text" name="content" class=form-control" placeholder="Введите текст поста">
                <input type="submit" class="btn btn-success" onclick="window.location.reload();">
            </form>
        <?php if (!empty($_POST['title']) && !empty($_POST['content'])){print_r($_POST);} ?>

