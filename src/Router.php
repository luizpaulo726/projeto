<?php

namespace App;

class Router
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method)
    {

        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        // Verificar se existe uma rota configurada para o método e URI
        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            // Certifique-se de que o autoload está funcionando
            if (class_exists($controller)) {
                $controllerInstance = new $controller(); // Instancia o controlador
                $controllerInstance->$action(); // Chama o método de ação
            } else {
                throw new \Exception("Controller $controller não encontrado.");
            }
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }

}