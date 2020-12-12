<?php /** @noinspection PhpUndefinedVariableInspection */
require __DIR__ . "/../init.php";

$pathInfo = $_SERVER['PATH_INFO'];

$routes = [
    '/index' => [
        'controller' => 'productsController',
        'method' => 'index',
    ],
    '/detail' => [
        'controller' => 'productsController',
        'method' => 'detail',
    ]
];

if(isset($routes[$pathInfo])){
    $route = $routes[$pathInfo];
    $controller = $container->make($route['controller']);
    $method = $route['method'];

    $controller->$method();
}
?>