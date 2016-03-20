<?php

function read(){

    $Posts = glob('posts/*');

    foreach($Posts as $post){
        echo basename($post) . " " . file_get_contents($post) . '<br>';
    }

}

read();


