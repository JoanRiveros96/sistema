<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $fillable = [
        'Usuario','TipoRed','Link',
        
    ];
    public $timestamps = true;
}
