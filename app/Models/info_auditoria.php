<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info_auditoria extends Model
{
    use HasFactory;

    public $fillable = [
       'id_responsable', 
       'nombre_tabla',
       'id_tabla',
       'id_auditoria',
       'tipo_modificacion'

    ];
    public $timestamps = true;
}
