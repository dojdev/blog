<?php

require_once 'connect.php';

$id = trim($_GET["id"]);

$delete = $pdo->query("delete from posts WHERE `id`=$id;");

header ("location: /");