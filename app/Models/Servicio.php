<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = "servicio";

    protected $fillable = [
        "id",
        "nombre",
        "precio"
    ];

    public function contratos()
    {
        return $this->belongsToMany(Contrato::class, 'servicio_contrat', 'id_servicio', 'id_contrato');
    }
}
