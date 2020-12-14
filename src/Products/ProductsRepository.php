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


    public function create($name, $description, $price, $category){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("INSERT INTO `$table` (`name`, `description`, `price`, `category_id` ) VALUES (:name, :description, :price, :category);");
        $stmt->execute([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'category' => $category,
        ]);
    }


    public function update(ProductModel $model){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("UPDATE `{$table}` SET `name` = :name, `description` = :description, `price` = :price, `category_id` = :category_id WHERE `id` = :id;");
        $stmt->execute([
            'name' => $model->name,
            'description' => $model->description,
            'price' => $model->price,
            'id' => $model->id,
            'category_id' => $model->category_id,
        ]);
    }

    public function delete($id){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("DELETE FROM `{$table}` WHERE `id` = :id;");
        $stmt->execute([
            'id' => $id,
        ]);
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