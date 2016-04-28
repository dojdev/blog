<?php

//class Animal
abstract class Animal
{
    protected $name;

    public function __construct($name = '')
    {
        $this->name = $name;
        echo 'Привет, животное ' . '<br><hr>';
    }

    protected function validate($name)
    {
        return strlen($name) > 0;
    }

    public function setName($name)
    {
        if($this->validate($name)) {
            $this->name = $name;
        }
    }

    public function getName()
    {
        return $this->name;
    }

}