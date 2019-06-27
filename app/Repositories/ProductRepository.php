<?php


namespace App\Repositories;
use App\Repositories\BaseRepository;
use Carbon\Carbon;


class ProductRepository  extends BaseRepository
{
    public function model()
    {
        return "App\\Models\\Product";
    }

    /**
     *
     *
     */
    public function findByProductId($product_id){
        return $this->makeModel()
            ->find($product_id);
    }

    /**
     *
     *
     *
     */
    public function findByCategoryId($category_id){
        return $this->makeModel()
            ->where('category_id', $category_id)
            ->get();
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
            ->paginate(18);
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

    /**
     * Get list Product Score Info in Cookie
     *
     * @param array $dataProduct
     * @param $limit
     *
     * @return Array Score
     */
    public function getCookieProduct($dataProduct, $limit)
    {
        $now = Carbon::now();
        return $this->makeModel()
            ->whereIn('id', $dataProduct)
            ->limit($limit)
            ->get();

    }

    /**
     * Check cookie score in db
     *
     * @param array $dataProduct
     *
     * @return Array Score
     */
    public function checkCookieProduct($dataProduct)
    {
        $now = Carbon::now();
        return $this->makeModel()
            ->where('id', $dataProduct)
            ->first();
    }

}