<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    public $fillable = [
        'Usuario','TipoInfo','Informacion','Imagen','Link',
        
    ];
    public $timestamps = true;
}
