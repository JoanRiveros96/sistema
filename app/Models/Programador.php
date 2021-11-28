<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programador extends Model
{
    
    public $fillable = [
        'Usuario','Link','Descripcion',
        
    ];
    public $timestamps = true;
}
