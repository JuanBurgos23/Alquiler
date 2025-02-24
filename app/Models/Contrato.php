<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $table = "contrato";

    protected $fillable = [
        "id",
        "fecha_contrato",
        "hora_contrato",
        "descripcion",
        "forma_pago",
        "estado",
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


    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'servicio_contrato', 'id_contrato', 'id_servicio');
    }

    public function cuartos()
    {
        return $this->belongsToMany(Cuarto::class, 'cuarto_contrato', 'id_contrato', 'id_cuarto');
    }
}
