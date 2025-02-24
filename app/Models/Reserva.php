<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = "reserva";

    protected $fillable = [
        "id",
        "fecha_inicio",
        "fecha_fin",
        "descripcion",
        "forma_pago",
        "estado",
        "monto",
        'id_inquilino',
        'id_user',
    ];
    
    public function inquilino()
    {
        return $this->belongsTo(Inquilino::class, 'id_inquilino');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function cuartos()
    {
        return $this->belongsToMany(Cuarto::class, 'cuarto_reserva', 'id_reserva', 'id_cuarto');
    }
}
