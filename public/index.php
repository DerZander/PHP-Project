<?php /** @noinspection PhpUndefinedVariableInspection */
session_start();
require __DIR__ . "/../init.php";

$pathInfo = $_SERVER['PATH_INFO'];

$routes = [
    '/login' => [
        'controller' => 'loginController',
        'method' => 'login',
    ],
    '/logout' => [
        'controller' => 'loginController',
        'method' => 'logout',
    ],
    '/dashboard' => [
        'controller' => 'loginController',
        'method' => 'dashboard',
    ],
    '/index' => [
        'controller' => 'productsController',
        'method' => 'index',
    ],
    '/detail' => [
        'controller' => 'productsController',
        'method' => 'detail',
    ],
    '/list' => [
    'controller' => 'productsController',
    'method' => 'admin_list',
],
];

if(!empty($_SESSION)){
    if(isset($routes[$pathInfo])){
        $route = $routes[$pathInfo];
        $controller = $container->make($route['controller']);
        $method = $route['method'];
        $controller->$method();
    }
}else{
    $route = $routes["/login"];
    $controller = $container->make($route['controller']);
    $method = $route['method'];
    $controller->$method();
}




?>