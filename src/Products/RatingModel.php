<?php
namespace App\Products;


use App\Core\AbstractModel;

class RatingModel extends AbstractModel
{
    public $id;
    public $rating;
    public $date;
    public $product_id;
    public $stars;
    public $user_id;

}