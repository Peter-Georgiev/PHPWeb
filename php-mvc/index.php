<?php
include 'config.php';
spl_autoload_register();

$params = explode('/', $_SERVER['REQUEST_URI']);

array_shift($params);
array_shift($params);

$controllerName = array_shift($params);
$actionName = array_shift($params);

$app = new \Core\Application($controllerName, $actionName, $params);
$app->start();



/*
$controllerFullQualifiedName = 'Controller\\' . ucfirst($controllerName);

if (class_exists($controllerFullQualifiedName)) {

    $controller = new $controllerFullQualifiedName;

    if (is_callable([$controller, $actionName])) {
        call_user_func_array([$controller, $actionName], $params);
    } else {
        $actionName = DEFAULT_ACTION;
        call_user_func_array([$controller, $actionName], $params);
    }
} elseif (empty($controllerName) && empty($actionName)) {
    $controllerName = DEFAULT_CONTROLLER;
    $actionName = DEFAULT_ACTION;
    $controllerFullQualifiedName = 'Controller\\' . ucfirst($controllerName);
    $controller = new $controllerFullQualifiedName;
    call_user_func_array([$controller, $actionName], $params);
} else {
    header("HTTP/1.0 404 Not Found");
    include 'templates/not_found.php';
}
*/