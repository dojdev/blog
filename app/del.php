<?php

require_once 'connect.php';

$id = trim($_GET["id"]);
$url = trim($_GET["url"]);

$delete = $pdo->query("delete from posts WHERE `id`=$id;");

header ("location: /" . $url);