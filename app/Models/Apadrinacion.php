<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apadrinacion extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'cedula', 'telefono', 'direccion', 'mascota_id', 'monto', 'tiempo_consignacion'];
}
