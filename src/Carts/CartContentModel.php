<?php


namespace App\Carts;


use App\Core\AbstractModel;

class CartContentModel extends AbstractModel
{
    public $id;
    public $cart_id;
    public $product_id;
    public $amount;
    public $product_name;
    public $product_price;
}