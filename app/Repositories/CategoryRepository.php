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
    public function listSitebar(){
        return $this->makeModel()
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