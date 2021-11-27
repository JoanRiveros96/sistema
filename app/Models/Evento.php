<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $fillable = [
        'Usuario','Fecha','Titulo','Descripcion','Imagen','Link'
        
    ];
    public $timestamps = true;
}
