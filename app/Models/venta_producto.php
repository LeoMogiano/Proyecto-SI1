<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta_producto extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad','precio_tot','descuento','producto_id','venta_id'];
    
}
