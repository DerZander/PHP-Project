<?php /** @noinspection PhpUndefinedVariableInspection */
session_start();
require __DIR__ . "/../init.php";

$pathInfo = $_SERVER['PATH_INFO'];

$routes = [
    '/login' => [
        'controller' => 'loginController',
        'method' => 'login',
    ],
    '/register' => [
        'controller' => 'loginController',
        'method' => 'register',
    ],
    '/logout' => [
        'controller' => 'loginController',
        'method' => 'logout',
    ],
    '/dashboard' => [
        'controller' => 'loginController',
        'method' => 'dashboard',
    ],
    '/user-edit'=> [
      'controller' => 'usersController',
      'method' => 'edit',
    ],
    '/products' => [
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
    '/categories' => [
        'controller' => 'categoriesController',
        'method' => 'index',
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
    '/cart' => [
        'controller' => 'cartsController',
        'method' => 'index',
    ],
    '/cart-insert' => [
        'controller' => 'cartsController',
        'method' => 'insert',
    ],
    '/cart-ejection' => [
        'controller' => 'cartsController',
        'method' => 'ejection',
    ],
    '/cart-pay' => [
        'controller' => 'cartsController',
        'method' => 'pay',
    ],
];

$login_routes = [
    '/login' => [
        'controller' => 'loginController',
        'method' => 'login',
    ],
    '/register' => [
        'controller' => 'loginController',
        'method' => 'register',
    ],
    '/' => [
    'controller' => 'loginController',
    'method' => 'register',
]
];

if(!empty($_SESSION)){
    if(isset($routes[$pathInfo])){
        $route = $routes[$pathInfo];
        $controller = $container->make($route['controller']);
        $method = $route['method'];
        $controller->$method();
    }
}else{
    $route = $login_routes[$pathInfo];
    $controller = $container->make($route['controller']);
    $method = $route['method'];
    $controller->$method();
}




?>