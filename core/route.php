<?php
namespace Core;


use Core\lib\Config;

class Route
{

    public $controlName;
    public $actionName;

    function __construct()
    {

        $routeConfig = Config::get('route');
        if (isset($_SERVER['PATH_INFO'])) {
            // p($_SERVER);
            // p(explode('/',trim($_SERVER['REQUEST_URI'],'/')));

            $path = explode('/', trim($_SERVER['PATH_INFO'], '/'));

            if (isset($path[1])) {
                $this->actionName = $path[1];
            }
            if (isset($path[0])) {
                $this->controlName = $path[0];
            } else {
                $this->controlName = $routeConfig['ctrl_def'];
                $this->actionName = $routeConfig['action_def'];
            }
        } else {
            $this->controlName = $routeConfig['ctrl_def'];
            $this->actionName = $routeConfig['action_def'];
        }
    }
}