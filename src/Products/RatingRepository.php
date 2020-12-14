<?php
namespace App\Products;

use PDO;
use App\Core\AbstractRepository;

class RatingRepository extends AbstractRepository
{
    public function getTableName(){
        return "ratings";
    }

    public function getModelName(){
        return "App\\Products\\RatingModel";
    }

    public function create($product_id, $content, $stars){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("INSERT INTO `$table` (`date`, `rating`, `stars`, `product_id`, `user_id`) VALUES (current_timestamp(), :content, :stars, :product_id, :user_id);");
        $stmt->execute([
            'content' => $content,
            'product_id' => $product_id,
            'stars' => $stars,
            'user_id' => $_SESSION['user_id'],
        ]);
    }


    public function fetchAllByProduct($id){
        $table = $this->getTableName();
        $model = $this->getModelName();

        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `product_id` = :id");
        $stmt->execute(['id' => $id]);

        $ratings = $stmt->fetchAll(PDO::FETCH_CLASS, $model);
        return $ratings;
    }
    public function delete($id){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("DELETE FROM `{$table}` WHERE `id` = :id;");
        $stmt->execute([
            'id' => $id,
        ]);
    }
}
?>