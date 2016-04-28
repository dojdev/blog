<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($class){
    include "Classes/{$class}.php";
});

//$animal = new Animal('dkjfkdfk <br>');
//$other = new Animal('asxcpdk   <br>');
//
//echo $animal->getName() . PHP_EOL;
//echo $other->getName() . PHP_EOL;
//
//$doge = new Doge('Such wow', 'some doge');
//
//echo $doge->getName() . '<br>';
//echo $doge->getType() . '<br>';

$big = new Size('laika','fat','huge');

echo $big->getName() . ' ';
echo $big->getSize() . '<br>';
echo $big->sound()   . '<br>';