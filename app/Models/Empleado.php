<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public $fillable = [
        'Usuario','Nombre','Dependencia','Descripcion','Foto','Correo',
        
    ];
    public $timestamps = true;
    
    
}
