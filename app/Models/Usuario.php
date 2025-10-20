<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 importante
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios'; // 👈 fuerza a usar tu tabla personalizada

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
