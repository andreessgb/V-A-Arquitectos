<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relación uno a muchos con los proyectos (un usuario puede tener varios proyectos como cliente)
    public function projects()
    {
        return $this->hasMany(Project::class, 'user_id'); // 'user_id' debe coincidir con la columna en la migración de proyectos
    }

    // Método para verificar si el usuario es cliente (si tiene proyectos asignados)
    public function isClient()
    {
        return $this->projects()->exists(); // Si el usuario tiene proyectos asignados, es un cliente
    }

    // Relación muchos a muchos con los roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // Método para verificar si el usuario tiene un rol específico
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
}
