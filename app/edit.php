<?php

require_once 'connect.php';

$title = 'awesome title';
$content = 'awesome text';
$id = trim($_GET["id"]);
//$url = trim($_GET["url"]);

$edit = $pdo->query("update `posts` SET `title`=  . $title ., `content`= . $content . , where `id`= . $id . ");

//header ("location: /" . $url);