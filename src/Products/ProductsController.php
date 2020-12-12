<?php


namespace App\Products;


class ProductsController
{
    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
        #$this->categoriesRepository = $categoriesRepository;
    }

    protected function render($view, $params){
        foreach($params as $key => $value){
            ${$key} = $value;
        }
        include __DIR__ . "/../../views/{$view}.php";
    }

    public function index(){
        if ($_GET) {
            $products = $this->productsRepository->fetchFilteredProducts($_GET['category']);
        } else {
            $products = $this->productsRepository->fetchAllProducts();
        }
        #$categories = $this->categoriesRepository->fetchAllCategories();

        $this->render("products/index", ['products'=> $products]);
        //include __DIR__ . "/../../views/products/index.php";
    }

    public function detail(){
        $id = $_GET['id'];
        $product = $this->productsRepository->fetchProduct($id);
        include __DIR__ . "/../../views/products/detail.php";
    }

}
?>