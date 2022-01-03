<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory;
    protected $fillable=[
        'descripción',
        'precio',
        'url',
        'Id_tp'
    ];
}
