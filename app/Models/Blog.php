<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'Blogs';

    protected $fillable = [
        'title',
        'description',
        'image',
        'blog_category_id',
        'status',
        'image_alt',
        'image_title',
        'meta_keywords',
        'meta_description',
    ];

    public function category()
    {
    return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
