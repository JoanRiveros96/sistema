<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    public $fillable = [
        'Usuario','Fecha','Titulo','Contenido','Imagen','Documento',
        
    ];
    public $timestamps = true;
}
