<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuarto extends Model
{
    use HasFactory;
    protected $table = "cuarto";
    
    protected $fillable = [
        "id",
        "precio",
        "estado",
        "imagen",
        "id_dimension",
    ];

    public function dimension()
    {
        return $this->belongsTo(Dimension::class, 'id_dimension');
    }

    public function imagenes()
    {
        return $this->belongsToMany(Imagen::class, 'imagen_cuarto', 'id_cuarto', 'id_imagen');
    }
    public function contratos()
    {
        return $this->belongsToMany(Contrato::class, 'contrato_cuarto', 'id_cuarto', 'id_contrato');
    }
    public function reservas()
    {
        return $this->belongsToMany(Reserva::class, 'reserva_cuarto', 'id_cuarto', 'id_reserva');
    }
}
