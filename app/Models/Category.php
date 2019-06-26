<?php

namespace App\Models;

use App\Models\BaseModel as Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 'parent_id'
    ];
}
