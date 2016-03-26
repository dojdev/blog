<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form</title>
</head>
<body>
    <div class="container text-center" style="background-color: #f2f2f2;">
        <h1>Simple blog</h1>
        <hr>
            <form method="POST" class="form-group">
                <input type="text" name="title" class=form-control" placeholder="Введите заголовок">
                <input type="text" name="content" class=form-control" placeholder="Введите текст поста">
                <input type="submit" class="btn btn-success" onclick="window.location.reload();">
            </form>
        <?php if (!empty($_POST)){print_r($_POST);} ?>
    </div>

</body>
</html>

