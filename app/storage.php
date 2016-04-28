<?php

interface storage
{
    public function save($key,$value);
    public function load($key);
    public function delete($key);
}


class memc implements storage
{
    private function  save($key,$value){

    }

    public function load($key){

    }

    public function delete($key){

    }

}