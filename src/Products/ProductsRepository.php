<?php
namespace App\Products;

use PDO;

class ProductsRepository
{
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    function fetchAllProducts()
    {
        $stmt = $this->pdo->query("SELECT * FROM `products`");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "App\\products\\ProductModel");
    }

    function fetchProduct($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "App\\products\\ProductModel");
        return $stmt->fetch(PDO::FETCH_CLASS);
    }

    function fetchFilteredProducts($category)
    {
        $stmtCategory = $this->pdo->prepare("SELECT id FROM categories WHERE name = :category");
        $stmtCategory->execute(['category' => $category]);
        $stmtCategory->setFetchMode(PDO::FETCH_CLASS, "App\\Categories\\CategoryModel");
        $categoryId = $stmtCategory->fetch(PDO::FETCH_CLASS)->id;
        $stmt = $this->pdo->query("SELECT * FROM products WHERE category = {$categoryId}");
        $stmt->setFetchMode(PDO::FETCH_CLASS, "App\\products\\ProductModel");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "App\\products\\ProductModel");

    }
}
?>