<?php


namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;


class ProductService extends BaseService
{
    /**
     * @var productRepository
     */
    protected $productRepository;

    /**
     * @var categoryRepository
     */
    protected $categoryRepository;

    /**
     * constructor
     *
     * @param CategoryRepository $categoryRepository
     * @param ProductRepository $productRepository
     *
     */
    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     *
     * Get List
     *
     * @param ProductRepository $productRepository
     */

    public function getList(){
        $listProduct = $this->productRepository->listProduct();
        return $listProduct;
    }

    /**
     * Get List with type
     *
     *@param ProductRepository $productRepository
     */
    public function getListWithType($type){
        $listProduct = $this->productRepository->listProductWithType($type);
        return $listProduct;
    }

}