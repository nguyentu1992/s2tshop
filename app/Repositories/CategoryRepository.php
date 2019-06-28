<?php


namespace App\Repositories;


use App\Repositories\BaseRepository;
use Carbon\Carbon;
use DB;

class CategoryRepository extends BaseRepository
{
    public function model()
    {
        return "App\\Models\\Category";
    }

    /**
     * Get detail categories
     *
     * @param String $slug
     *
     * @return Array
     */
    public function categoryDetail($id)
    {
        return $this->makeModel()
            ->where('id', $id)
            ->first();
    }

    /**
     *
     *
     */
    public function getList(){
        return $this->makeModel()
            ->where('status', 1)
            ->get();
    }

    /**
     *
     *
     */
    public function listCateTab(){
        return $this->makeModel()
            ->select('categories.*', 'products.*')
            ->join('products', 'categories.id', '=','products.category_id')
            ->where('categories.cate_tab', 1)
            ->where('products.count', '>' , 0)
            ->orderBy('products.created_at', 'desc')
            ->limit(5)
            ->get();
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
     * @param $category_id
     */
    public function getCategoryProduct($category_id){
        return $this->makeModel()
            ->where('id', $category_id)
            ->get();
    }
}