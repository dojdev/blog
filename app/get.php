<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GET</title>
</head>
<body>
<?php

var_dump($_GET);

foreach($_GET as $key => $value){
    echo '<br><br>utm <b> ' . $key . ' </b>: ' . $value;
}

?>

</body>
</html>
