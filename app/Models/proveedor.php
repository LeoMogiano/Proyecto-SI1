<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;
    protected $table='proveedores';
    protected $fillable=[
        'nombre',
        'email',
        'ubicación',
        'tiempoEstimado'
    ];
}
