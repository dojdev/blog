<?php

session_start();

if(!empty($_SESSION['user'])){
    echo 'Login Success ';
    echo 'Hey <b> ' . $_SESSION['user']['login'] . '</b> your password <b>' . $_SESSION['user']['password'] . '</b><br>' . 'Have a Good Day <b>' . Date(" d M Y ") . '</b>';

} else{
    echo 'Login fail - ';
    echo 'Enter your Name on step 1';
}

?>

<?= '<br><br><a href="auth.php">come back</a>' ?>