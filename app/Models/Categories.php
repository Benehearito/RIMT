<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_es','text_es','order','active','category_id'
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
        return $this->belongsToMany(Images::class,'images_categories')->withPivot('id', 'id')->withPivot('order', 'order')
            ->withTimestamps()->orderBy('images_categories.order', 'asc');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Categories::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }

    /**
     * @param $query
     * @param $id
     */
    public function  scopeOrderbytitle ($query)
    {
        $query->orderBy('title_es', 'asc');

    }

    /**
     * @param $query
     * @param $id
     */
    public function  scopeBycategory ($query, $id)
    {
        $query->where('category_id',$id);

    }


    /**
     * @param $query
     * @param $id
     */
    public function  scopeActive ($query)
    {
        $query->where('active',1);
    }
    /**
     * @param $query
     * @param $id
     */
    public function  scopeBase ($query)
    {
        $query->where('category_id',0);
    }
}
