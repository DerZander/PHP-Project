<?php


namespace App\Carts;


use App\Core\AbstractModel;

class CartContentModel extends AbstractModel
{
    public $id;
    public $product_id;
    public $amount;
    public $cart_id;
}