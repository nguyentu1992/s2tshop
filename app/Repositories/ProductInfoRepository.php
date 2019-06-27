<?php


namespace App\Repositories;

use App\Repositories\BaseRepository;
use Carbon\Carbon;


class ProductInfoRepository extends BaseRepository
{
    public function model()
    {
        return "App\\Models\\ProductInfo";
    }



}