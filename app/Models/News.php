<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = ['title', 'content', 'image', 'is_published'];
    
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }
}

