<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Each user belongs to one role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Helper methods
    public function hasRole($roleName)
    {
        return $this->role && $this->role->name === $roleName;
    }

    public function hasPermissionTo($permissionKey)
    {
        return $this->role && $this->role->permissions()->where('key', $permissionKey)->exists();
    }

    public function getPermissions()
    {
        return $this->role ? $this->role->permissions : collect();
    }
}
