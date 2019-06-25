<?php

namespace App\Models;

use App\Models\BaseModel as Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'content', 'desc', 'price','count', 'category_id', 'meta_title', '	meta_keywords', 'meta_description', 'upload_id', 'created_at', 'updated_at'
    ];
}
