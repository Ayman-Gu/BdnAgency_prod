<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $fillable = ['name'];
    protected $table='project_categories';

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
