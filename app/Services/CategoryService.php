<?php


namespace App\Services;


use App\Repositories\CategoryRepository;

class CategoryService
{
    /**
     * @var productRepository
     */
    protected $categoryRepository;

    /**
     * constructor
     *
     * @param CategoryRepository $categoryRepository
     *
     */
    public function __construct(
        CategoryRepository $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     *
     * Get List
     *
     */

    public function getSitebar(){
        $listProduct = $this->categoryRepository->listSitebar();
        return $listProduct;
    }

    /**
     *
     *
     */
    public function findByCategoryId($id){
    }

}