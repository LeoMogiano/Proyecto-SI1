<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    use HasFactory;
    protected $fillable = ['Fecha_c','costoTotal','Id_prov'];
    public function productos(){
        return $this->belongsToMany(producto::class);
    }
}
