<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    public $fillable = [
        'Usuario','Fecha','Requisito','Link','Costos','Utiles','Uniformes',
        
    ];
    public $timestamps = true;
    



}
