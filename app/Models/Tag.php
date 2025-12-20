<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug', 'gallery_id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
