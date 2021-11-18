<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public $fillable = [
        'Usuario','fecha','Titulo','Contenido','imagen','Link',
        
    ];
    public $timestamps = true;
}
