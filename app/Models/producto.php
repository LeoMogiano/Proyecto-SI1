<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $table='productos';
    protected $fillable = ['nombre','color','precio','costo','stock','Id_categoria','Id_modelo'];
}