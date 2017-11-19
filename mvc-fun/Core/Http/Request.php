<?php

namespace Core\Http;


class Request implements RequestInterface
{
    public $controllerName;
    public $actionName;
    public $parameters;
    public $queryString;
    public $executingPath;
    public $host;

    public function __construct($controllerName, $actionName, $parameters, $queryString, $executingPath, $host)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->parameters = $parameters;
        $this->queryString = $queryString;
        $this->executingPath = $executingPath;
        $this->host = $host;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getQueryString()
    {
        return $this->queryString;
    }

    public function getExecutingPath()
    {
        return $this->executingPath;
    }

    public function getHost()
    {
        return $this->host;
    }
}