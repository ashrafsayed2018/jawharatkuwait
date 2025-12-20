<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image_path', 'title'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset($this->image_path);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'gallery_service');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
