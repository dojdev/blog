<?php

$dataDay  = Date('d-m-y');
$dataTime = Date('h:i:s');
$dataSum  = $dataDay . " " . $dataTime;

$link = 'posts/';
$linkFull = $link . $dataSum;

$a = readline();
file_put_contents($linkFull, $a);