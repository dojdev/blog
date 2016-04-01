<?php session_start(); require_once 'templates/header.php'; ?>

<section class="blog-stuff text-center">


            <div class="container">

                <h2 class="pull-right"><?php

                    if(!empty($_SESSION['user'])){
                        echo $_SESSION['user']['login'] . "<a style='color: #fff;' href='?action=exit'>[ Выйти ]</a>";
                    };

                    ?></h2>

                <br><br><br>
                <h1 class="blog-title">Simple Blog</h1>

                <article class="blog-content js-load">

                    <?php

                        if($_SESSION['user']){

                            require_once 'app/posts.php';

                        }

                        if(!empty($_GET['action'])){

                            session_destroy();
                            header('location: /');

                        }


                    echo '</div>'; ?>

                </article>

            </div>
</section>

