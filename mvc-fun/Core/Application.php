<?php

namespace Core;


use Core\DependencyManagement\ContainerInterface;
use Core\Http\RequestInterface;
use Core\ModelBinding\ModelBinderInterface;

class Application implements ApplicationInterface
{
    /** @var  RequestInterface */
    private $request;
    /** @var  ModelBinderInterface */
    private $modelBinder;
    /** @var  ContainerInterface */
    private $container;

    /**
     * Application constructor.
     * @param RequestInterface $request
     * @param ModelBinderInterface $modelBinder
     * @param ContainerInterface $container
     */
    public function __construct(RequestInterface $request,
                                ModelBinderInterface $modelBinder,
                                ContainerInterface $container)
    {
        $this->request = $request;
        $this->modelBinder = $modelBinder;
        $this->container = $container;
    }

    public function start()
    {
        $controllerName = 'Controllers\\' . ucfirst($this->request->getControllerName()) . 'Controller';
        //$view = new View($this->request);
        //$controller = new $controllerName($view);
        $controller = $this->container->resolve($controllerName);

        $actionInfo = new \ReflectionMethod($controllerName, $this->request->getActionName());

        $pos = -1;
        $internalPos = 0;
        $allParameters = [];
        $requestParameters = $this->request->getParameters();
        foreach ($actionInfo->getParameters() as $parameter) {
            $pos++;
            $className = $parameter->getClass();
            if (null === $className) {
                $allParameters[$pos] = $requestParameters[$internalPos];
                $internalPos++;
                continue;
            }

            $className = $className->getName();

            $bindingModel = null;
            $parameter = null;
            if ($this->container->exists($className)) {
                $parameter = $this->container->resolve($className);
            } else {
                $parameter = $this->modelBinder->bind($_POST, $className);
            }

            $allParameters[$pos] = $parameter;
        }

        call_user_func_array(
            [$controller, $this->request->getActionName()],
            $allParameters
        );
    }
}