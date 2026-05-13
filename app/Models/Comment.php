<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'body', 'is_approved'];

    protected $casts = ['is_approved' => 'boolean'];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
}
