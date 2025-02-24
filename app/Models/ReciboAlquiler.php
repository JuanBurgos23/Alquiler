<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReciboAlquiler extends Model
{
    use HasFactory;
    protected $table = "recibo_alquiler";
    
    protected $fillable = [
        "id",
        "a_cuenta",
        "debe",
        "descripcion",
        "fecha_alquiler",
        "fecha_pago",
        "metodo_pago",
        "monto_total",
        "estado",
        "recibi_de",
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato');
    }
}
