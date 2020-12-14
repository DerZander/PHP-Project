<?php


namespace App\Carts;


use App\Core\AbstractController;
use App\Products\ProductsRepository;
use App\Users\UsersRepository;

class CartsController extends AbstractController
{
    public function __construct(CartsRepository $cartsRepository, ProductsRepository $productsRepository, UsersRepository $usersRepository){
        $this->cartsRepository = $cartsRepository;
        $this->productsRepository = $productsRepository;
        $this->usersRepository = $usersRepository;
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
        $user_id = $_SESSION['user_id'];
        $user = $this->usersRepository->fetchOne($user_id);
        if(empty($user->first_name) OR empty($user->last_name) OR empty($user->street) OR empty($user->housenumber) OR empty($user->postcode) OR empty($user->city)){
            $this->render("carts/conclusion", [
                "success" => false,
            ]);
            return;
        }
        date_default_timezone_set('UTC');
        if(!isset($_COOKIE['cart'])){
            header("Location: cart");
        }

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
            "success" => true,
        ]);
    }

    public function orders(){
        $user_id = $_SESSION['user_id'];
        $carts = $this->cartsRepository->fetchAllById($user_id);
        $this->render("carts/orders", [
            "carts" => $carts,
        ]);
    }
    public function order(){
        $id = $_GET['id'];
        $cart = $this->cartsRepository->fetchOne($id);
        $products = $this->cartsRepository->fetchAllOrder($id);

        $this->render("carts/order", [
            "cart" => $cart,
            "products" => $products,
        ]);
    }
}