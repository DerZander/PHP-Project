<?php


namespace App\Products;


use App\Core\AbstractController;

class CategoriesAdminController extends AbstractController
{
    public function __construct(CategoriesRepository  $categoriesRepository){
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index(){
        if($_SESSION['superuser']){
            $categories = $this->categoriesRepository->fetchAll();
            $this->render("products/admin/categories_index",[
                'categories'=> $categories,
            ]);
        }else{
            header("Location: index");
        }
    }

    public function create(){
        $message = null;
        if(!empty($_POST['name'])){
            $name = $_POST['name'];
            $description = $_POST['description'];

            $this->categoriesRepository->create($name, $description);
            header("Location: categories-admin");
            return;
        }else{
            $message = "Kann nicht erzeugt werden";
        }
        $this->render("products/admin/categories_create",
            [
                "message" => $message,
            ]
        );
    }


    public function edit(){
        $id = $_GET['id'];
        $entry = $this->categoriesRepository->fetchOne($id);
        if ($_POST){
            $entry->name = $_POST['name'];
            $entry->description = $_POST['description'];
            $this->categoriesRepository->update($entry);
            header("Location: categories-admin");
            return;
        }
        $this->render("products/admin/categories_edit",[
            "entry" => $entry,
        ]);
    }

    public function delete(){
        $id = $_GET['id'];
        $this->categoriesRepository->delete($id);
        header("Location: categories-admin");
        return;
    }
}