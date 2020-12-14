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
    '/products-admin' => [
    'controller' => 'productsAdminController',
    'method' => 'index',
    ],
    '/products-create' => [
        'controller' => 'productsAdminController',
        'method' => 'create',
    ],
    '/products-edit' => [
        'controller' => 'productsAdminController',
        'method' => 'edit',
    ],
    '/products-delete' => [
        'controller' => 'productsAdminController',
        'method' => 'delete',
    ],
    '/categories-admin' => [
        'controller' => 'categoriesAdminController',
        'method' => 'index',
    ],
    '/categories-create' => [
        'controller' => 'categoriesAdminController',
        'method' => 'create',
    ],
    '/categories-edit' => [
        'controller' => 'categoriesAdminController',
        'method' => 'edit',
    ],
    '/categories-delete' => [
        'controller' => 'categoriesAdminController',
        'method' => 'delete',
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