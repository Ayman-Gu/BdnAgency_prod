<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table='projects';
    
    protected $fillable = [
        'title', 'description', 'image', 'image_alt', 'image_title',
        'status', 'project_category_id'
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }
}
