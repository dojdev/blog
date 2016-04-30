<?php namespace Blog\Classes;

class Router
{
    private $connect;
    private $action;
    private $routes;
    private $twig;

    public function __construct($connect, $action = 'posts', $routes = [], $twig)
    {
        $this->connect = $connect;
        $this->action = $action;
        $this->routes = $routes;
        $this->twig = $twig;
    }
    public function handler()
    {
        if(!empty($this->routes[$this->action])) {
            $controller = new $this->routes[$this->action]($this->connect, $this->twig);
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