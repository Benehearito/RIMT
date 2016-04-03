<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images_Categories extends Model
{
    protected $table = 'images_categories';

    /**
     * @param $query
     * @param $id
     */
    public function  scopeCategory ($query, $id)
    {
        $query->where('categories_id',$id);

    }
}
