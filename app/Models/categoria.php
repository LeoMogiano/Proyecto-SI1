<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    protected $table='categorias'; //usa el nombre de la base de datos 
    protected $fillable = ['nombre'];
}
