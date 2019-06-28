<?php


namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

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

    public function getList(){
        $listCategory = $this->categoryRepository->getList();
        return $listCategory;
    }

    /**
     *
     * Get List
     *
     * @param ProductRepository $productRepository
     */

    public function getListCateTab(){
        $listCategory = $this->categoryRepository->listCateTab();
        return $listCategory;
    }

    /**
     *
     *
     */
    public function findByCategoryId($id){
    }

}