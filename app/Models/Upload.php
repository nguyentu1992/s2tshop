<?php

namespace App\Models;

use App\Models\BaseModel as Model;

class Upload extends Model
{
    protected $table = 'uploads';
    protected $fillable = [
        'filename', 'resized_name', 'original_name', 'product_id'
    ];
}
