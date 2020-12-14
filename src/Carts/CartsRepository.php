<?php


namespace App\Carts;


use App\Core\AbstractRepository;
use PDO;

class CartsRepository extends AbstractRepository
{
    public function getTableName(){
        return "cart";
    }

    public function getModelName(){
        return "App\\Carts\\CartModel";
    }

    private function find_cart($user_id){
        $table = $this->getTableName();
        $model = $this->getModelName();
        $select = $this->pdo->prepare("SELECT id FROM $table WHERE `paid` IS NULL AND `user_id` = :user_id GROUP BY `date` DESC LIMIT 1; ");
        $select->execute(['user_id' => $user_id]);
        $select->setFetchMode(PDO::FETCH_CLASS, $model);
        return $select->fetch(PDO::FETCH_CLASS);
    }

    public function create_cart($user_id){
        $table = $this->getTableName();
        $cart = $this->find_cart($user_id);
        if($cart==false){
            $stmt = $this->pdo->prepare("INSERT INTO `$table` (`user_id`) VALUES (:user_id);");
            $stmt->execute([
                'user_id' => $user_id,
            ]);
            $cart = $this->find_cart($user_id);
        }
        $cart_id = $cart['id'];
        return $cart_id;
    }

    public function update_cart(CartModel $model){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("UPDATE `{$table}` SET `total_amount` = :total_amount, `total_price` = :total_price, `paid` = :paid WHERE `id` = :id;");
        $stmt->execute([
            'total_amount' => $model->total_amount,
            'total_price' => $model->total_price,
            'paid' => $model->paid,
            'id' => $model->id,
        ]);
    }

    public function create_cart_content($product_id, $amount, $cart_id, $product_name, $product_price){
        $table = "cart_content";
        $stmt = $this->pdo->prepare("INSERT INTO `$table` (`product_id`, `amount`, `cart_id`, `product_name`, `product_price`) VALUES (:product_id, :amount, :cart_id, :product_name, :product_price);");
        $stmt->execute([
            'product_id' => $product_id,
            'amount' => $amount,
            'cart_id' => $cart_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
        ]);
    }

    function fetchAllById($user_id)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $model);
    }

    function fetchAllOrder($id)
    {
        $table = "cart_content";
        $model = "App\\Carts\\CartContentModel";
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE cart_id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $model);
    }
}