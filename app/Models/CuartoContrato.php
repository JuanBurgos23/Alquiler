<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuartoContrato extends Model
{
    use HasFactory;
    protected $table = "CuartoContrato";

    protected $fillable = [
        "id_cuarto",
        "id_contrato",
    ];

    //relacion
    public function cuarto()
    {
        return $this->belongsTo(Cuarto::class, 'id_cuarto');
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato');
    }
}
