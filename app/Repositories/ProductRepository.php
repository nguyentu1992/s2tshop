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
     * @param $type
     *
     */
    public function listProductWithType($type){
        return $this->makeModel()
            ->where('category_id', $type)
            ->where('count', '>' , 0)
            ->orderBy('created_at', 'desc')
            ->get();
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
            ->get();
    }

}