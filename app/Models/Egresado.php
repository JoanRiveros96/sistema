<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    public $fillable = [
        'Usuario','Status','AñoGrado','Nombre','Afinidad','Descripcion','Foto'
        
    ];
    public $timestamps = true;
}
