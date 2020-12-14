<?php


namespace App\Products;

use App\Core\AbstractController;

class ProductsController extends AbstractController
{
    public function __construct(
        ProductsRepository $productsRepository,
        RatingRepository $ratingRepository,
        CategoriesRepository $categoriesRepository
    )
    {
        $this->productsRepository = $productsRepository;
        $this->ratingRepository = $ratingRepository;
        $this->categoriesRepository = $categoriesRepository;
    }



    public function index(){
        if ($_GET) {
            $products = $this->productsRepository->fetchFilteredProducts($_GET['category']);
        } else {
            $products = $this->productsRepository->fetchAll();
        }
        $categories = $this->categoriesRepository->fetchAll();

        $this->render("products/index", [
            'products'=> $products,
            'categories' => $categories,
        ]);
    }

    public function detail(){
        $id = $_GET['id'];
        if(isset($_POST['content'])){
            if(!empty($_POST['content'])){
                $ratingtext = $_POST['content'];
                $stars = $_POST['stars'];
                $this->ratingRepository->create($id, $ratingtext, $stars);
            }
        }

        $product = $this->productsRepository->fetchOne($id);
        $ratings = $this->ratingRepository->fetchAllByProduct($id);
        $this->render("products/detail", [
            'product'=> $product,
            'ratings'=> $ratings
        ]);
    }

}
?>