<?php
namespace App\Products;

use App\Core\AbstractRepository;
use PDO;

class CategoriesRepository extends AbstractRepository
{
    public function getTableName(){
        return "categories";
    }

    public function getModelName(){
        return "App\\Products\\CategoryModel";
    }

    public function create($name, $description){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("INSERT INTO `$table` (`name`, `description`) VALUES (:name, :description);");
        $stmt->execute([
            'name' => $name,
            'description' => $description,
        ]);
    }

    public function update(CategoryModel $model){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("UPDATE `{$table}` SET `name` = :name, `description` = :description WHERE `id` = :id;");
        $stmt->execute([
            'name' => $model->name,
            'description' => $model->description,
            'id' => $model->id,
        ]);
    }
}
?>