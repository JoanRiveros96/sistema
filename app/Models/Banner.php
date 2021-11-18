<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $fillable = [
        'Id_empleado','Imagen','Link',
        
    ];
    public $timestamps = true;
    
}
