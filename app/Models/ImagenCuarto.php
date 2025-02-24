<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenCuarto extends Model
{
    use HasFactory;
    protected $table = "imagencuarto";

    protected $fillable = [
        "id_imagen",
        "id_cuarto",
    ];

    //relacion
    public function imagen(){
        return $this->belongsTo(Imagen::class,'id_imagen');
    }

    public function cuarto(){
        return $this->belongsTo(Cuarto::class,'id_cuarto');
    }
}
