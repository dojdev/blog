<?php

abstract class Doge extends Animal
{
    protected $type;

    public function __construct($name,$type){
       parent::__construct($name);
        $this->type = $type;
    }

    public function getType(){
        return $this->type;
    }
}