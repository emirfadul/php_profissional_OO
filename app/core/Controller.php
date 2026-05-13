<?php 

namespace app\core;

use Exception;

class Controller
{
    public function execute(string $router)
    {
        // Verifica se a rota contém o separador '@'
        if (!str_contains($router, '@')) {
            throw new Exception('Rota inválida. Formato esperado: Controller@method');   
        }

        // Divide a rota em controlador e método
        list($controller, $method) = explode('@', $router);

        $namespace = "app\controllers\\";
        $controllerNamespace = $namespace . $controller;

        // Verifica se a classe do controlador existe
        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controllerNamespace} não existe");
        }

        // Instancia o controlador
        $controller = new $controllerNamespace();

        // Verifica se o método existe no controlador
        if (!method_exists($controller, $method)) {
            throw new Exception("O método {$method} não existe no controller {$controllerNamespace}");
        }

        // Chama o método do controlador
        $controller->$method();
    }
}
