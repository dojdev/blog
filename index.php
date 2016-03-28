<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple blog</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
    <body>

        <section class="blog-stuff text-center">
            <div class="container">

                <h1 class="blog-title">Simple Blog</h1>

                <?php require_once 'app/form.php'; require_once 'app/posts.php'; ?>

            </div>
        </section>

        <script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
