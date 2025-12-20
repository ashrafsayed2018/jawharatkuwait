<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'tags',
        'published_at',
        'meta_title',
        'meta_description',
        'service_id',
        'gallery_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'tags' => 'array',
    ];

    public function relatedTags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getImageAttribute($value)
    {
        if ($this->gallery_id) {
            return $this->gallery ? $this->gallery->image_url : null;
        }
        
        if ($value) {
            return str_starts_with($value, 'http') ? $value : asset($value);
        }
        
        return null;
    }

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
                $model->meta_description = Str::limit(strip_tags($model->content), 160);
            }
            if (is_string($model->tags)) {
                $model->tags = collect(explode(',', $model->tags))->map(fn($t) => trim($t))->filter()->values()->all();
            }
        });
    }
}
