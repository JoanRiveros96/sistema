<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    public $fillable = [
        'Fecha','Usuario','Titulo','Contenido','Imagen'
        
    ];
    public $timestamps = true;
}
