<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_compra extends Model
{
    use HasFactory;
    protected $table = "producto_compras";
    
    protected $fillable = ['cantidad','precio_tot','producto_id','compra_id'];
}
