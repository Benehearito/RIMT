<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_es','order','album_id','slug'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Albums::class, 'album_id');
    }

    public function photos()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Albums::class, 'album_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Images::class, 'album_id');
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
    public function  scopeAlbumslug ($query, $slug)
    {
        $query->where('slug',$slug);
    }


    /**
     * @param $query
     * @param $id
     */
    public function  scopeByalbum ($query, $id)
    {
        $query->where('album_id',$id);

    }
}
