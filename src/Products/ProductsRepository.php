<?php
namespace App\Products;

use App\Core\AbstractRepository;

class ProductsRepository extends AbstractRepository
{
    public function getTableName(){
        return "products";
    }

    public function getModelName(){
        return "App\\Products\\ProductModel";
    }
    /*
    function fetchFilteredProducts($category)
    {
        $stmtCategory = $this->pdo->prepare("SELECT id FROM categories WHERE name = :category");
        $stmtCategory->execute(['category' => $category]);
        $stmtCategory->setFetchMode(PDO::FETCH_CLASS, "App\\Categories\\CategoryModel");
        $categoryId = $stmtCategory->fetch(PDO::FETCH_CLASS)->id;
        $stmt = $this->pdo->query("SELECT * FROM products WHERE category = {$categoryId}");
        $stmt->setFetchMode(PDO::FETCH_CLASS, "App\\products\\ProductModel");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "App\\products\\ProductModel");

    }*/
}
?>