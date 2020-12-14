<?php


namespace App\Products;


use App\Core\AbstractController;

class ProductsAdminController extends AbstractController
{

    public function __construct(ProductsRepository $productsRepository, CategoriesRepository  $categoriesRepository)
    {
        $this->productsRepository = $productsRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index(){
        if($_SESSION['user_superuser']){
            $products = $this->productsRepository->fetchAll();
            $this->render("products/admin/index",[
                'products'=> $products,
            ]);
        }else{
            header("Location: index");
        }
    }

    public function create(){
        $message = null;
        $categories = $this->categoriesRepository->fetchAll();
        if(!empty($_POST['name']) AND !empty($_POST['price'] )){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $description = $_POST['description'];


            $this->productsRepository->create($name, $description, $price, $category);
            header("Location: products-admin");
            return;
        }else{
            $message = "Kann nicht erzeugt werden";
        }
        $this->render("products/admin/create",
            [
                "categories" => $categories,
                "message" => $message,
            ]
        );
    }


    public function edit(){
        $id = $_GET['id'];
        $entry = $this->productsRepository->fetchOne($id);
        $categories = $this->categoriesRepository->fetchAll();
        if ($_POST){
            $entry->name = $_POST['name'];
            $entry->description = $_POST['description'];
            $entry->price = $_POST['price'];
            $entry->category_id = $_POST['category'];
            $this->productsRepository->update($entry);
            header("Location: products-admin");
            return;
        }

        $entry_category = $this->categoriesRepository->fetchOne($entry->category_id);

        $this->render("products/admin/edit",[
            "entry" => $entry,
            "categories" => $categories,
            'entry_category' => $entry_category,
            ]);
     }

    public function delete(){
        $id = $_GET['id'];
        $this->productsRepository->delete($id);
        header("Location: products-admin");
        return;
    }
}