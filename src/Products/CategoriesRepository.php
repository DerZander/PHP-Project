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

}
?>