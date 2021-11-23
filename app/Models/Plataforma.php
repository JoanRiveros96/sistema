<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    public $fillable = [
        'Usuario','Titulo','Descripcion','Link',
        
    ];
    public $timestamps = true;
}
