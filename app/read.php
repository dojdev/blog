<?php

function read($postsDir){

    $Posts = glob($postsDir . '/*');

    foreach($Posts as $post){
        echo basename($post) . " " . file_get_contents($post) . '<br>';
    }

}


'this is read file';



