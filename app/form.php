            <form method="POST" class="form-group" id="ajaxform">
                <input type="text" name="title" class="form-control" placeholder="Введите заголовок" autocomplete="off">
                <br>
                <textarea id="" cols="30" rows="5" name="content" class="form-control" placeholder="Введите текст поста" autocomplete="off"  style="resize: none;"></textarea>
                <br>
                <input type="submit" class="btn btn-success">
            </form>

            <?php if (!empty($_POST['title']) && !empty($_POST['content'])){ ?>
                    <div class='alert alert-success'>
                        <?php print_r($_POST); ?>
                    </div> <?php
            }
            if(!empty($_POST['title']) && !empty($_POST['content'])){

//       $write = $pdo->query("INSERT INTO `posts` SET `title`='{$_POST['title']}', `content`='{$_POST['content']}', `date`=NOW(), `user_id`=0");

                $write = $pdo->prepare("INSERT INTO `posts` SET `title`=:title, `content`=:content, `date`=NOW(), `user_id`=0");
                $write->execute([
                    ':title' => $_POST['title'],
                    ':content' => $_POST['content']
                ]);
            }

            ?>



