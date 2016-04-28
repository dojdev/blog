<?php namespace Blog\Classes;

class Router
{
    private $connect;
    private $action;
    private $routes;

    public function __construct($connect, $action = 'posts', $routes = [])
    {
        $this->connect = $connect;
        $this->action = $action;
        $this->routes = $routes;
    }
    public function handler()
    {
        if(!empty($this->routes[$this->action])) {
            $controller = new $this->routes[$this->action]($this->connect);
            $method = empty($_SERVER['REQUEST_METHOD']) ? 'get' : $_SERVER['REQUEST_METHOD'];
            $controller->handler($this->action, $method);
        }
        else {
            header('location: /?action=posts');
        }
    }
    public function setRoute($new_action, $path)
    {
        $this->routes[$new_action] = $path;
        var_dump($this->routes);
    }
}