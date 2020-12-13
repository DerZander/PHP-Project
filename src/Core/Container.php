<?php

namespace App\Core;


use App\Users\LoginController;
use App\Users\LoginService;
use App\Users\UsersRepository;

use App\Products\ProductsController;
use App\Products\RatingRepository;
use App\Products\ProductsRepository;
use App\Products\CategoriesRepository;

use PDO;


class Container
{
    private $reciepts = [];
    private $instances = [];


    public function __construct()
    {
        $this->reciepts = [
            'productsController'=> function(){
                return new ProductsController(
                    $this->make('productsRepository'),
                    $this->make('ratingsRepository'),
                    $this->make('categoriesRepository')
                );
            },
            'loginController'=> function(){
                return new LoginController($this->make('loginService'));
            },
            'loginService' => function(){
                return new LoginService($this->make("usersRepository"));
            },
            'productsRepository' => function() {
                return new ProductsRepository($this->make("pdo"));
            },
            'ratingsRepository' => function(){
                return new RatingRepository($this->make("pdo"));
            },
            'categoriesRepository' => function() {
                return new CategoriesRepository($this->make("pdo"));
            },
            'usersRepository' => function(){
                return new UsersRepository($this->make("pdo"));
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