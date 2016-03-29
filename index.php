<?php require_once 'templates/header.php'; ?>

        <section class="blog-stuff text-center">

            <div class="container">


                <h1 class="blog-title">Simple Blog</h1>

                    <div class="pull-right" style="color: #fff;">
                        <a class="btn btn-link"  style="color: inherit;" href="/">grid</a>|
                        <a class="btn btn-link"  style="color: inherit;" href="/table.php">table</a>
                    </div>

                <?php require_once 'app/form.php'; require_once 'app/posts.php'; ?>

            </div>
        </section>

<?php require_once 'templates/footer.php'; ?>