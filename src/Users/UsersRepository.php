<?php


namespace App\Users;


use App\Core\AbstractRepository;
use PDO;

class UsersRepository extends AbstractRepository
{
    public function getTableName(){
        return "users";
    }

    public function getModelName(){
        return "App\\Users\\UserModel";
    }

    public function create($username, $email, $password){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("INSERT INTO `$table` (`username`, `email`, `password`) VALUES (:username, :email, :password);");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ]);
        return true;
    }

    public function update(UserModel $model){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("UPDATE `{$table}` SET `first_name` = :first_name, `last_name` = :last_name,`birthday` = :birthday,`email` = :email,`street` = :street,`housenumber` = :housenumber,`postcode` = :postcode,`city` = :city WHERE `id` = :id;");
        $stmt->execute([
            'id' => $model->id,
            'first_name' => $model->first_name,
            'last_name' => $model->last_name,
            'birthday' => $model->birthday,
            'email' => $model->email,
            'street' => $model->street,
            'housenumber' => $model->housenumber,
            'postcode' => $model->postcode,
            'city' => $model->city,
        ]);
    }

    public function findByUsername($username){
        $table = $this->getTableName();
        $model = $this->getModelName();
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
        return $stmt->fetch(PDO::FETCH_CLASS);
    }


}