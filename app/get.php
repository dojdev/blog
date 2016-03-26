<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GET</title>
</head>
<body>
<?php

foreach($_GET as $key){
    echo $key . '<br/><br/>';
}

print_r($_GET);

?>
</body>
</html>