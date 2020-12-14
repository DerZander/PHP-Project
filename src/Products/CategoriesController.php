<?php


namespace App\Products;


use App\Core\AbstractController;

class CategoriesController extends AbstractController
{
    public function __construct(
        CategoriesRepository $categoriesRepository
    )
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index(){
        $categories = $this->categoriesRepository->fetchAll();

        $this->render("categories/index", [
            'categories' => $categories,
        ]);
    }
}