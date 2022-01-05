<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $table='productos';
    protected $fillable = ['nombre','color','precio','costo','descuento','stock','url','Id_categoria','Id_modelo'];
    public function ventas(){
        return $this->belongsToMany(venta::class);
    }
    public function compras(){
        return $this->belongsToMany(compra::class);
    }

}
