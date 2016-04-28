<?php namespace Blog\Classes;

abstract class Controller
{
    public function handler($action, $method)
    {
        $method = strtolower($method);
        $class_name = ucfirst($action);
        $function_name = "{$method}{$class_name}";
        return $this->{$function_name}();
    }
}