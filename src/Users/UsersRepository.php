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

    public function findByUsername($username){
        $table = $this->getTableName();
        $model = $this->getModelName();
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
        return $stmt->fetch(PDO::FETCH_CLASS);
    }

    public function register($username, $email, $password){
        $table = $this->getTableName();
        $stmt = $this->pdo->prepare("INSERT INTO `$table` (`username`, `email`, `password`) VALUES (:username, :email, :password);");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ]);
        return true;
    }
}