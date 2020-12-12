<?php

namespace App\Core;

use PDO;
use App\Products\ProductsRepository;
use App\Products\ProductsController;

use App\Categories\CategoriesRepository;

class Container
{
    private $reciepts = [];
    private $instances = [];


    public function __construct()
    {
        $this->reciepts = [
            'productsController'=> function(){
                return new ProductsController(
                    $this->make('productsRepository')
                );
            },
            'productsRepository' => function() {
                return new ProductsRepository(
                    $this->make("pdo")
                );
            },
            'categoriesController'=> function(){
                return new ProductsController(
                    $this->make('categoriesRepository')
                );
            },
            'categoriesRepository' => function() {
                return new CategoriesRepository(
                    $this->make("pdo")
                );
            },
            'pdo' => function(){
                $pdo = new PDO(
                    'mysql:host=localhost;dbname=shop',
                    'root',
                    ''
                );
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
    /*
    private $pdo;
    private $postRepository;
    private $categoryRepository;

    public function getPdo()
    {
        if(!empty($this->pdo)){
            return $this->pdo;
        }
        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=shop',
            'root',
            ''
        );
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $this->pdo;
    }

    public function getProductsRepository(){
        if(!empty($this->postRepository)){
            return $this->postRepository;
        }
        $this->postRepository =  new ProductsRepository($this->getPdo());
        return $this->postRepository;
    }
    public function getCategoriesRepository(){
        if(!empty($this->categoryRepository)){
            return $this->categoryRepository;
        }
        $this->categoryRepository = new CategoriesRepository($this->getPdo());
        return $this->categoryRepository;
    }
*/
}