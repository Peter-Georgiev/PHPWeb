<?php

namespace Core;


class Application
{
    /** @var  string */
    private $controllerName;
    /** @var  string */
    private $actionName;
    private $params = [];

    public function __construct(string $controllerName, string $actionName, array $params)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
    }

    public function start()
    {
        $controllerFullQualifiedName = 'Controller\\' .
            ucfirst($this->controllerName) . 'Controller';
        $controller = new $controllerFullQualifiedName();

        call_user_func_array([$controller, $this->actionName], $this->params);
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }
}