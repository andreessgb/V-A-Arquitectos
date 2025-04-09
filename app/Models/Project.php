<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'location', 
        'square_meters', 
        'type', 
        'status', 
        'budget', 
        'main_image', 
        'start_date', 
        'end_date',
        'user_id', // Aquí se almacena la relación con el cliente
    ];

    // Relación con el cliente (un proyecto tiene un cliente asignado)
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

