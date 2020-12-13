<?php
namespace App\Products;

use App\Core\AbstractRepository;
use PDO;

class ProductsRepository extends AbstractRepository
{
    public function getTableName(){
        return "products";
    }

    public function getModelName(){
        return "App\\Products\\ProductModel";
    }
    function fetchFilteredProducts($category)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();

        $categoryStmt = $this->pdo->prepare("SELECT * FROM `categories` WHERE `name` = :category");
        $categoryStmt->execute(['category' => $category]);
        $categoryStmt->setFetchMode(PDO::FETCH_CLASS, "App\\Products\\CategoryModel");
        $categoryId = $categoryStmt->fetch(PDO::FETCH_CLASS);
        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `category_id` = :categoryId");
        $stmt->execute(['categoryId' => $categoryId['id']]);

        $products = $stmt->fetchAll(PDO::FETCH_CLASS, $model);
        return $products;
    }

}
?>