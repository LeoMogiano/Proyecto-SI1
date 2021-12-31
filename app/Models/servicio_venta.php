<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio_venta extends Model
{
    use HasFactory;
    protected $table = "servicio_ventas";
    protected $fillable = ['cantidad','precio_tot','servicio_id','venta_id'];
}
