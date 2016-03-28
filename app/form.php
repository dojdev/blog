            <form method="POST" class="form-group" id="ajaxform">
                <input type="text" name="title" class="form-control" placeholder="Введите заголовок" autocomplete="off">
                <br>
                <textarea id="" cols="30" rows="5" name="content" class="form-control" autocomplete="off" placeholder="Введите текст поста" style="resize: none;"></textarea>
                <br>
                <input type="submit" class="btn btn-success">
            </form>

            <?php if (!empty($_POST['title']) && !empty($_POST['content'])){ ?>
                    <div class='alert alert-success'>
                        <?php print_r($_POST); ?>
                    </div> <?php
            } ?>


