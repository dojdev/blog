<?php

if(!empty($_GET['action'])){

    session_destroy();
    header('location: /');

}