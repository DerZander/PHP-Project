<?php
namespace App\Categories;

use PDO;

class CategoriesRepository
{
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    function fetchAllCategories()
    {
        return $this->pdo -> query("SELECT * FROM `categories`");
    }
}
?>