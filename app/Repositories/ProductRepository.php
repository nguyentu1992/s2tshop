<?php


namespace App\Repositories;
use App\Repositories\BaseRepository;


class ProductRepository  extends BaseRepository
{
    public function model()
    {
        return "App\\Models\\Product";
    }

    /**
     * Get detail products
     *
     * @param String $slug
     *
     * @return Array ProductStoreInfo
     */
    public function productDetail($id)
    {
        return $this->makeModel()
            ->where('id', $id)
            ->first();
    }

    /**
     * get list products
     *
     *
     */
    public function listProduct(){
        return $this->makeModel()
            ->where('count', '>' , 0)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    /**
     * get list products
     * @param $category_id
     *
     */
    public function listProductWithCategory($category_id){
        return $this->makeModel()
            ->select('products.*')
            ->join('categories', 'products.category_id', '=' , 'categories.id')
            ->where('categories.id', $category_id)
            ->where('products.count', '>' , 0)
            ->orderBy('products.created_at', 'desc')
            ->paginate(18);
    }

    /**
     * get list products
     * @param $category_id
     *
     */
    public function getDetailProduct($product_id){
        return $this->makeModel()
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.id', $product_id)
            ->first();
    }




}