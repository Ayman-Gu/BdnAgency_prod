<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'permission_role';
    protected $fillable = ['role_id','permission_id'];

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function permission() {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}