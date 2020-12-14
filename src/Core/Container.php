<?php

namespace App\Core;


use App\Carts\CartsRepository;
use App\Carts\CartsController;

use App\Products\CategoriesAdminController;
use App\Products\CategoriesController;
use App\Products\CategoriesRepository;

use App\Users\LoginController;
use App\Users\LoginService;
use App\Users\UsersController;
use App\Users\UsersRepository;

use App\Products\ProductsAdminController;
use App\Products\ProductsController;
use App\Products\ProductsRepository;

use App\Products\RatingRepository;

use PDO;


class Container
{
    private $reciepts = [];
    private $instances = [];


    public function __construct()
    {
        $this->reciepts = [
            'loginController'=> function(){
                return new LoginController($this->make('loginService'));
            },
            'loginService' => function(){
                return new LoginService($this->make("usersRepository"));
            },
            'usersController'=> function(){
                return new UsersController(
                    $this->make('usersRepository')
                );
            },
            'usersRepository' => function(){
                return new UsersRepository($this->make("pdo"));
            },
            'productsAdminController' => function(){
                return new ProductsAdminController(
                    $this->make("productsRepository"),
                    $this->make("categoriesRepository")
                );
            },
            'productsController'=> function(){
                return new ProductsController(
                    $this->make('productsRepository'),
                    $this->make('ratingsRepository'),
                    $this->make('categoriesRepository')
                );
            },
            'productsRepository' => function() {
                return new ProductsRepository($this->make("pdo"));
            },
            'categoriesAdminController' => function(){
                return new CategoriesAdminController($this->make("categoriesRepository"));
            },
            'categoriesController'=> function(){
                return new CategoriesController($this->make('categoriesRepository'));
            },
            'categoriesRepository' => function() {
                return new CategoriesRepository($this->make("pdo"));
            },
            'cartsController' => function(){
                return new CartsController(
                    $this->make("cartsRepository"),
                    $this->make("productsRepository"),
                    $this->make('usersRepository')
                );
            },
            'cartsRepository' => function(){
                return new CartsRepository($this->make("pdo"));
            },
            'ratingsRepository' => function(){
                return new RatingRepository($this->make("pdo"));
            },
            'pdo' => function(){
                $pdo = new PDO('mysql:host=localhost;dbname=shop','root','');
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return$pdo;
            }
        ];
    }

    public function make($name)
    {
        if(!empty($this->instances[$name])){
            return $this->instances[$name];
        }
        if(isset($this->reciepts[$name])){
            $this->instances[$name] = $this->reciepts[$name]();
        }


        return $this->instances[$name];
    }
}