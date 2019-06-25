<?php

/**
 * Base model extends Illuminate\Database\Eloquent\Model
 *
 * @author HUYHQ6159
 * Date: 1/9/2017
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Add use "enable" field for logic delete
     */

    /**
     * List field can sortable
     *
     * @var array
     */
    protected $sortable = [
        'created_at'
    ];

    /**
     * Get sortable field
     *
     * @return array
     */
    public function getSortable()
    {
        return $this->sortable;
    }
}
