<?php

function read($postsDir){

    $Posts = glob($postsDir . '/*');

    foreach($Posts as $post){
        echo "
              <article style='background-color: #f2f2f2; padding: 0 15px;'>
                  <hr>
                  <div class='single-post'>
                      <p>
                          <i class='glyphicon glyphicon-time'></i>
                          <span class='single-post__date'>" . basename($post) . "</span>
                      </p>
                  <hr>
                      <p class='single-post__content'>
                      " . file_get_contents($post) . "
                      </p>
                      <p>&nbsp;</p>
                  </div>
              </article>";

    }

}

read('../posts');