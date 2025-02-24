<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $table = "imagen";

    protected $fillable = [
        "id",
        "nombre",
        
    ];
    // Relación con denuncias
    public function cuartos()
    {
        return $this->belongsToMany(Cuarto::class, 'imagen_cuarto', 'id_imagen', 'id_cuarto');
    }
}
