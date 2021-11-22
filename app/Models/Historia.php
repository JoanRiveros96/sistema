<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    public $fillable = [
        'Usuario','Año','Informacion','Imagen',
        
    ];
    public $timestamps = true;
}
