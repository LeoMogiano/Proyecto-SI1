<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $table='facturas';
    protected $fillable = ['Nro_aut','Fecha_F','nit','monTotal','Id_venta'];
}
