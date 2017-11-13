<?php
spl_autoload_register();

$url = explode('/', $_SERVER['']);

array_shift($url);
array_shift($url);
array_shift($url);

$className = ucfirst(array_shift($url));
$methodName = array_shift($url);

$classFullName = 'Controller\\'.$className.'Controller';

$view = new \Core\View();

$obj = new $classFullName($view);

if(is_callable([$obj, $methodName], $url)){
    call_user_func_array([$obj, $methodName], $url);
} else {
    echo '404 Not Found';
}