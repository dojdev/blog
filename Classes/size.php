<?php

class Size extends Doge
{
    protected $size;

    public function __construct($name,$type,$size){
        parent::__construct($name,$type);
        $this->size = $size;
    }

    public function getSize(){
        return $this->size;
    }

    public function woof(){
        return "($this->name), woof";
    }

    public function sound(){
        return 'wuf wuf';
    }
}