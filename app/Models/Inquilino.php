<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    use HasFactory;

    protected $table = "inquilino";
    
    protected $fillable = [
        "id",
        "nombre",
        "paterno",
        "materno",
        "domicilio",
        "ci",
        "telefono",
        "fecha_nac",
        "correo",
        "telefono_referencia",
    ];

    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->paterno} {$this->materno}";
    }
}
