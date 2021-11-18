<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public $fillable = [
        'Nombre','ApellidoPaterno','ApellidoMaterno','Dependencia','Correo','Foto',
        
    ];
    public $timestamps = true;
    
    
}
