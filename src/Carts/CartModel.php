<?php


namespace App\Carts;


use App\Core\AbstractModel;

class CartModel extends AbstractModel
{
    public $id;
    public $user_id;
    public $date;
    public $total_amount;
    public $total_price;
    public $paid;
}