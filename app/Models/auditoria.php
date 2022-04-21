<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditoria extends Model
{
    use HasFactory;

    public $fillable = [
        'id_responsable',
'tabla_modificada',
'request',
    ];
    public $timestamps = true;
}
