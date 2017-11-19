<?php

namespace Core\View;


use Core\Http\RequestInterface;
use Core\Http\UrlBuilderInterface;

class View implements ViewInterface
{
    const VIEWS_FOLDER = 'Views/';
    const EXTENSIONS = '.php';

    /** @var RequestInterface */
    private $request;
    /** @var UrlBuilderInterface  */
    private $urlBuilder;

    public function __construct(RequestInterface $request, UrlBuilderInterface $urlBuilder)
    {
        $this->request = $request;
        $this->urlBuilder = $urlBuilder;
    }


    public function render($viewName = null, $model = null)
    {
        if (null == $viewName || is_object($viewName)) {
            $model = $viewName;
            $viewName = $this->request->getControllerName() .
                DIRECTORY_SEPARATOR . $this->request->getActionName();
        }

        require_once self::VIEWS_FOLDER . $viewName . self::EXTENSIONS;
    }

    public function url($controller, $action, ...$params)
    {
        return $this->urlBuilder->build($controller, $action, $params);
    }

}