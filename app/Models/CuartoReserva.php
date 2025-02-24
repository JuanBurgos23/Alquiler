<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuartoReserva extends Model
{
    use HasFactory;
    protected $table = "CuartoReserva";

    protected $fillable = [
        "id_cuarto",
        "id_reserva",
    ];

    //relacion
    public function cuarto()
    {
        return $this->belongsTo(Cuarto::class, 'id_cuarto');
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}
