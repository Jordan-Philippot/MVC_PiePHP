<?php

namespace Core;

use Core\Router;
use Core\Controller;
use Controller\ErrorController;


class Core extends Controller
{

    public function run()
    {
        include 'src/routes.php';
        $currentRoute = $this->CurrentRoute();

        $route = Router::get($currentRoute);
        // var_dump($currentRoute);
        if ($route !== NULL) {
            //new AppController();
            $class =  "\Controller\\" . $route['controller'] . "Controller";
            $action = $route['action'] . "Action";
            $controller = new $class;
            $controller->$action();
        } elseif ($route == NULL || $route == false) {
            $error = new ErrorController;
            $error->errorAction();
        }
    }

    private function CurrentRoute()
    {
        $fullPath = $_SERVER['REQUEST_URI'];
        $arrayPath = explode("?", $fullPath);
        $pathRoute = substr($arrayPath[0], strlen("/MVC_PiePHP"));
        return $pathRoute;
    }
}
