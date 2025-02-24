<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtroRecibo extends Model
{
    use HasFactory;
    protected $table = "otro_recibo";
    
    protected $fillable = [
        "id",
        "a_cuenta",
        "debe",
        "descripcion",
        "fecha_pago",
        "metodo_pago",
        "monto_total",
        "estado",
        "recibi_de",
    ];
}
