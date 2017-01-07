<?php
namespace Core;


class Route
{

    public $controlName;
    public $actionName;

    function __construct()
    {

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
                $this->controlName = 'index';
                $this->actionName = 'index';
            }
        } else {
            $this->controlName = 'index';
            $this->actionName = 'index';
        }
    }
}