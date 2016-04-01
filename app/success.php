<?php

session_start();

if(!empty($_SESSION['user'])){
    echo '<div class="alert alert-success">Login Success ';
    echo 'Hey <b> ' . $_SESSION['user']['login'] . '</b> your password hash <b>' . $_SESSION['user']['password'] . '</b><br>' . 'Have a Good Day <b>' . Date(" d M Y ") . '</b></div>';
//    header('location: /account.php');

    if($_SESSION['user']['login']==='admin'){

        header( "refresh:5;url=/admin.php" );
        echo 'You\'ll be redirected in about 5 secs. If not, click <a href="/admin.php">here</a>.';

    }

    if($_SESSION['user']['login']!=='admin'){

        header( "refresh:5;url=/read.php" );
        echo 'You\'ll be redirected in about 5 secs. If not, click <a href="/read.php">here</a>.';

    }

} else{
    echo 'Login fail - ';
    echo 'Enter your Name on step 1';
}
