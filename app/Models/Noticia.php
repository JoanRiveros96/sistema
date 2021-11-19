<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public $fillable = [
        'Usuario','Fecha','Titulo','Contenido','Imagen','Link',
        
    ];
    public $timestamps = true;
}
