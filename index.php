<?php require_once 'templates/header.php';

?>

        <section class="blog-stuff text-center">

            <div class="container">

                <h1 class="blog-title">Simple Blog</h1>


                <article class="blog-content js-load"> <?php require_once 'app/auth.php'; echo '<br> </div>'; ?>

                    <?php if($loginUser){ header('location: app/success.php'); } ?>

                </article>

            </div>
        </section>

<?php require_once 'templates/footer.php'; ?>


