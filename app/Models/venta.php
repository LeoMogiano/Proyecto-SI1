<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;
    protected $fillable = ['Nro_v','Fecha_v','montoTotal','Id_us'];
    public function productos(){
        return $this->belongsToMany(producto::class);
    }
    
} 
