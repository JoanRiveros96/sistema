<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admision extends Model
{
    public $fillable = [
        'Usuario','Fecha','Requisito','Link',
        
    ];
    public $timestamps = true;
}
