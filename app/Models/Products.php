<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id','title_es','text_es','price','discount','stock','dimension','order','active'
    ];

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    /**
     * @return mixed
     */
    public function images(){
        return $this->belongsToMany(Images::class)
                    ->withPivot('id', 'id')
                    ->withPivot('order', 'order')
                    ->withTimestamps()
                    ->orderBy('images_products.order', 'asc');
    }


    /**
     * @param $query
     * @param $id
     */
    public function  scopeCategory ($query, $id)
    {
        $query->where('category_id',$id);
    }

    /**
     * @param $query
     * @param $name
     */
    public function  scopeName ($query, $name)
    {
        $name= trim($name);
        $query->where('title_es', 'like', '%'.$name.'%');
    }

    /**
     * @param $query
     * @param $id
     */
    public function  scopeActive ($query)
    {
        $query->where('active',1);
    }


}
