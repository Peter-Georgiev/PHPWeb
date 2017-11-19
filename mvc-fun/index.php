<?php
spl_autoload_register();

$uri = $_SERVER['REQUEST_URI'];
$junk = str_replace( basename(__FILE__), '', $_SERVER['PHP_SELF']);

$significantPart = str_replace($junk, '', $uri);
//var_dump($junk);
$uriParts = explode('/', $significantPart);

$controllerName = array_shift($uriParts);
$action = array_shift($uriParts);

//var_dump($controllerName);
//var_dump($action);

$modelBinder = new \Core\ModelBinding\ModelBinder();
$request = new \Core\Http\Request($controllerName, $action, $uriParts, $_SERVER['QUERY_STRING'], $junk, $_SERVER['HTTP_HOST']);

$dbInfo = parse_ini_file('Config/db.ini');
$db = new \Database\PDODatabase(new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']));

$container = new \Core\DependencyManagement\Container();

$container->cache(\Core\DependencyManagement\ContainerInterface::class, $container);
$container->cache(\Database\DatabaseInterface::class, $db);
$container->cache(\Core\Http\RequestInterface::class, $request);

$container->addDependency(
    \Service\User\UserServiceInterface::class,
    \Service\User\UserService::class
);
$container->addDependency(
    \Repository\User\UserRepositoryInterface::class,
    \Repository\User\UserRepository::class
);
$container->addDependency(
    \Repository\Dummy\DummyServiceInterface::class,
    \Repository\Dummy\DummyService::class
);
$container->addDependency(
    \Core\View\ViewInterface::class,
    \Core\View\View::class
);
$container->addDependency(
    \Core\ModelBinding\ModelBinderInterface::class,
    \Core\ModelBinding\ModelBinder::class
);
$container->addDependency(
    \Core\ApplicationInterface::class,
    \Core\Application::class
);
$container->addDependency(
    \Core\Http\UrlBuilderInterface::class,
    \Core\Http\UrlBuilder::class
);
//Application($request, $modelBinder);
$app = $container->resolve(\Core\ApplicationInterface::class);
$app->start();