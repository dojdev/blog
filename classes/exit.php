<?php namespace Blog\Classes;

class Bye extends Controller
{
    public function bye(){
        session_destroy();
        header('location: /?action=auth');
    }
}