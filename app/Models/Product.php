<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name', 'content', 'desc', 'price', 'category_id', 'meta_title', '	meta_keywords', 'meta_description', 'upload_id'
    ];
}
