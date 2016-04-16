<?php namespace Blog\Classes;

abstract class Controller
{
    public function handler($action, $method)
    {
        $method = strtolower($method);
        $class_name = ucfirst($action);
        $functon_name = "{$method}{$class_name}";
        return $this->{$functon_name}();
    }
}