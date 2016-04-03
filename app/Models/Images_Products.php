<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images_Products extends Model
{
    protected $table = 'images_products';

    /**
     * @param $query
     * @param $id
     */
    public function  scopeProduct ($query, $id)
    {
        $query->where('products_id',$id);

    }
}
