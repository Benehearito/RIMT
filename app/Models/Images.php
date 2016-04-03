<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'album_id','imagen','order', 'vertical'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }




    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Albums::class, 'album_id');
    }

    /**
     * @param $query
     * @param $id
     */
    public function  scopeAlbum ($query, $id)
    {
        $query->where('album_id',$id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(){
        return $this->belongsToMany(Products::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany(Categories::class);
    }


    /**
     * @param $query
     * @param $name
     */
    public function  scopeName ($query, $name)
    {
        $name= trim($name);
        $query->where('imagen', 'like', '%'.$name.'%');
    }
}
