<?php


namespace App\Repositories;

use App\Repositories\BaseRepository;
use Carbon\Carbon;


class UploadRepository extends BaseRepository
{
    public function model()
    {
        return "App\\Models\\Upload";
    }

    public function getData($original_name){
        return $this->makeModel()
            ->where('original_name', $original_name)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function findByUploadId($id){
        return $this->makeModel()->find($id);
    }


}