<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple blog</title>
</head>
    <body>

        <section class="blog-stuff text-center">
            <div class="container">

                <h1 class="blog-title">Simple Blog</h1>

                <?php require_once 'app/form.php'; require_once 'app/db.php'; ?>

            </div>
        </section>


        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body{
                background-image: url(http://android.mobile-review.com/image/materials/wallpapers-37/big/37-wall07.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                -webkit-background-size: cover;
                background-size: cover;
                color: #ffffff;
            }
            textarea,
            input[type='text'],
            textarea::-webkit-input-placeholder,
            input[type='text']::-webkit-input-placeholder{
                font-size: 2rem !important;
                color: #ffffff !important;
            }
            input,
            textarea,
            .post-item{
                background-color: rgba(0,0,0,.5) !important;
                color: #ffffff !important;
            }
            .post-item{
                border: 1px solid #eeeeee;
                padding: 20px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                min-height: 250px;
                margin-bottom: 20px;
            }
            .post-item__title{
                font-size: 2.1rem;
                position: relative;
            }

            .post-item__title:before{
                position: absolute;
                height: 2px;
                width: 20px;
                background-color: #fff;
                left: 0;
                content:;
            }

        </style>
    </body>
</html>
