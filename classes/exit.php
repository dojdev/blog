<?php namespace Blog\Classes;

class Bye{

    public function bye(){
        session_destroy();
        header('location: /');
    }
}