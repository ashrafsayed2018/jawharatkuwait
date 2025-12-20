<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'long_description',
        'image',
        'meta_title',
        'meta_description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (!$model->slug) {
                $model->slug = Str::arabicSlug($model->title);
            }
            if (!$model->meta_title) {
                $model->meta_title = $model->title;
            }
            if (!$model->meta_description) {
                $model->meta_description = Str::limit(strip_tags($model->short_description ?: $model->long_description), 160);
            }
        });
    }

    public function galleries()
    {
        return $this->belongsToMany(Gallery::class, 'gallery_service');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
