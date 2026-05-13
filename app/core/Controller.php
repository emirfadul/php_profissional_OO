<?php 

namespace app\core;

class Controller
{
    public function execute($router)
    {
        if (!str_contains($router, '@')) {
            throw new Exception('Rota inválida');   
        }

        list($controller, $method) = explode('@', $router);

        // dd($controller, $method);

        $namespace = "app\controllers\\";

        $controllerNamespace = $namespace . $controller;

        dd($controllerNamespace);
        


        
    }
}