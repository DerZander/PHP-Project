<?php


namespace App\Carts;


use App\Core\AbstractController;
use App\Products\ProductsRepository;

class CartsController extends AbstractController
{
    public function __construct(CartsRepository $cartsRepository, ProductsRepository $productsRepository){
        $this->cartsRepository = $cartsRepository;
        $this->productsRepository = $productsRepository;
    }

    public function index(){
        $total_amount = 0;
        $total_price = 0;
        if(isset($_COOKIE['cart'])){
            foreach (unserialize($_COOKIE['cart']) AS $product){
                $total_amount += $product['amount'];
                $total_price += $product['product_price'];
            }
        }

        $this->render("carts/index", [
            'total_amount' => $total_amount,
            'total_price' => $total_price,
        ]);
    }

    public function insert(){
        $product_id = $_GET['product_id'];
        $product = $this->productsRepository->fetchOne($product_id);
        if (!empty($_POST)){
            $amount = $_POST["amount"];

            if(isset($_COOKIE['cart'])){
                $cart = unserialize($_COOKIE['cart']);
                $new_cart = [
                        'product_id'=>$product->id,
                        'product_name'=>$product->name,
                        'product_price'=>$product->price,
                        'amount'=>$amount,
                    ];
                array_push($cart, $new_cart);
            }else{
                $cart = [[
                    'product_id'=>$product->id,
                    'product_name'=>$product->name,
                    'product_price'=>$product->price,
                    'amount'=>$amount,
                ]];
            }

            setcookie("cart", serialize($cart), 0);
        }

        header("Location: cart");
    }
    public function ejection(){
        setcookie("cart", null, -3000);
        header("Location: cart");
    }

    public function pay(){
        date_default_timezone_set('UTC');
        if(!isset($_COOKIE['cart'])){
            header("Location: cart");
        }
        $user_id = $_SESSION['user_id'];
        $cart_id = $this->cartsRepository->create_cart($user_id);
        $total_amount = 0;
        $total_price = 0;
        foreach (unserialize($_COOKIE['cart']) AS $product){
            $this->cartsRepository->create_cart_content($product['product_id'], $product['amount'], $cart_id, $product['product_name'], $product['product_price']);
            $total_amount +=$product['amount'];
            $total_price += $product['product_price'];
        }


        $entry = $this->cartsRepository->fetchOne($cart_id);

        $entry->total_amount = $total_amount;
        $entry->total_price = $total_price;
        $entry->paid = date("Y-m-d", time());

        $this->cartsRepository->update_cart($entry);

        setcookie("cart", null, -3000);
        $this->render("carts/conclusion", [

        ]);
    }
}